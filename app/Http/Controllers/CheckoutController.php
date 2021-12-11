<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country\Country;
use DB;
use Auth;
use Braintree;
use App\Helpers\CurrencyHelper;
use Illuminate\Support\Facades\Validator;
use App\Rules\OnlyAsciiCharacters;
use App\Models\UserCourse\UserCourse;
use App\Helpers\OrderDataHelper;
use App\Models\Order\Order;
// I import Mail
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;


class CheckoutController extends Controller
{
    public function index($courseSlug)
    {
        $course = DB::table('courses')->where('slug', $courseSlug)->first();
        if (is_null($course)) {
            abort(403, 'Invalid course!');
        }

        $authUser = Auth::user();
        $userCourse = DB::table('user_courses')->where('user_id', $authUser->id)->where('course_id', $course->id)->first();
        if ((!is_null($userCourse)) && ($authUser->role->id != 1)) {
            abort(403, 'You already have access to this course!');
        }

        $countries = Country::with('statesInOrder')->orderBy('name', 'ASC')->get();

        $email = $authUser->email;

        $settings = DB::table('settings')->first();
        if (is_null($settings)) {
            abort(403, 'Settings not found!');
        }
        $currencyTextRaw = $settings->currency;
        $currency = CurrencyHelper::getCurrencyString();
        $braintreeEnabled = $settings->enable_braintree;
        $stripeEnabled = $settings->enable_stripe;
        // If Paypal payment setting is not enabled = 0, if enabled = 1
        $payPalSmartEnabled = $settings->enable_paypal_smart;

        $btToken = "";
        $brainTreeLabel = "Credit card by Braintree";
        if ($braintreeEnabled) {
            $payPalWithinBraintreeEnabled = $settings->enable_paypal_in_bt;
            if ($payPalWithinBraintreeEnabled) {
                $brainTreeLabel = "Credit Card and PayPal by Braintree";
            }

            $btSettings = DB::table('braintree_settings')->first();
            if (is_null($btSettings)) {
                abort(403, 'Braintree settings not found!');
            }
            if ($btSettings->braintree_environment == 'sandbox') {
                $gateway = new Braintree\Gateway([
                    'environment' => $btSettings->braintree_environment,
                    'merchantId' => $btSettings->braintree_sandbox_merchant_id,
                    'publicKey' => $btSettings->braintree_sandbox_public_key,
                    'privateKey' => $btSettings->braintree_sandbox_private_key
                ]);
            } else {
                $gateway = new Braintree\Gateway([
                    'environment' => $btSettings->braintree_environment,
                    'merchantId' => $btSettings->braintree_production_merchant_id,
                    'publicKey' => $btSettings->braintree_production_public_key,
                    'privateKey' => $btSettings->braintree_production_private_key
                ]);
            }

            $btToken = $gateway->ClientToken()->generate();
        }

        $stripePubKey = "";
        if ($stripeEnabled) {
            $stripeSettings = DB::table('stripe_settings')->first();
            if (is_null($stripeSettings)) {
                abort(403, 'Stripe settings not found!');
            }
            if ($stripeSettings->stripe_environment == "test") {
                $stripePubKey = $stripeSettings->stripe_test_publishable_key;
            } else {
                $stripePubKey = $stripeSettings->stripe_live_publishable_key;
            }
        }


        return view('checkout', compact(
            'course',
            'countries',
            'email',
            'currency',
            'braintreeEnabled',
            'stripeEnabled',
            'payPalSmartEnabled',
            'brainTreeLabel',
            'btToken',
            'stripePubKey',
            'currencyTextRaw'
        ));
    }

    public function prePaymentValidation(Request $request, $courseId, $courseSlug)
    {
        $validator = Validator::make($request->all(), [
            // validation rules for the specific elements
            'first_name' => ['required', 'string', 'max:191', new OnlyAsciiCharacters],
            'last_name' => ['required', 'string', 'max:191', new OnlyAsciiCharacters],
            // new OnlyAsciiCharacters is a custom rule which is necessary to Braintree
            'street' => ['required', 'string', 'max:191'],
            'apartment' => ['nullable', 'string', 'max:191'],
            'phone' => ['nullable', 'string', 'max:191'],
            'city' => ['required', 'string', 'max:191'],
            // exists:state,state_code state has to exist in the states table and in the state_code column this validation is more important to braintree and stripe
            'state' => ['required', 'string'], //, 'exists:states,state_code'
            'country' => ['required', 'string'], //, 'exists:countries,code'
            'zip' => ['required', 'string', 'max:150'],
        ]);
        // if validation fails we return errors as a response
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        // we are getting the course based in the course id that was in our url, if there is no course with that id there is a problem and we return an error
        $courseToBuy = DB::table('courses')->find($courseId);
        if (is_null($courseToBuy)) {
            return response()->json(['error' => 'Il corso non esiste']);
        }
        // checking the slug of the course that we got from the db and comparing it with the slug we got from the url, if they are different we return a discrepancy error
        if ($courseToBuy->slug != $courseSlug) {
            return response()->json(['error' => 'I dati del corso non corrispondono']);
        }
        // comparing the price of the course with the total that comes from the url if different we return an error
        if ($courseToBuy->price != $request->total) {
            return response()->json(['error' => 'I dati del prezzo non corrispondono']);
        }
        // if validation is successful we return a json response with successful_validation key and success value
        return response()->json(['successful_validation' => 'success']);
    }

    // Email confirmation
    public function sendOrderConfirmationMail($order)
    {
        Mail::to($order->user_email)->send(new OrderMail($order));
    }

    public function fulfillOrder(Request $request)
    {
        $user = Auth::user();
        // we get the authenticated user (checkout requires the user to be authenticated)
        if (is_null($user)) {
            // if the payment is successful but we can not get the auth user we redirect back with faliure message
            return redirect()->back()->withInput()->with('failureMsg', 'Pagamento ricevuto ma utente loggato non trovato! Contatta assistenza@virginiamaternitycoach.it');
        }

        $course = DB::table('courses')->find($request->course);
        // if the payment is successful but we can't find the course inside our db we redirect back with faliure message
        if (is_null($course)) {
            return redirect()->back()->withInput()->with('failureMsg', 'Pagamento ricevuto ma corso non trovato! Contatta assistenza@virginiamaternitycoach.it');
        }
        $transactionId = $request->transaction_id;
        // we istantiate an empty array 
        $orderData = array();
        // we use the getOrderData method of the OrderDataHelper Class and we pass the empty array and other data to it
        OrderDataHelper::getOrderData($orderData, $request, $user, $course->title, $transactionId);
        // we instantiate a new Order (this means we will insert a row into the order table)
        $order = new Order;
        foreach ($orderData as $key => $orderValue) {
            // in our order->key (column_name) we are going to insert the element of the array $orderData[$key]
            $order->$key = $orderData[$key];
        }
        // we save the new row
        $order->save();
        // we give access to the course to the user
        $userCourse = DB::table('user_courses')->where('user_id', $user->id)->where('course_id', $course->id)->first();
        if (is_null($userCourse)) {
            $newUserCourse = new UserCourse;
            $newUserCourse->user_id = $user->id;
            $newUserCourse->course_id = $course->id;
            $newUserCourse->save();
        }
        // Sending email confirmation
        $this->sendOrderConfirmationMail($order);

        return redirect()->route('thanks');
    }



    public function showThanks()
    {
        return view('thank-you');
    }
}
