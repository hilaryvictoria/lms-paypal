<?php

// Importing all the controllers used in the webapp
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\BraintreeController;
use App\Http\Controllers\Admin\StripeController;
use App\Http\Controllers\Admin\PaypalController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FrontendCourseController;
use App\Http\Controllers\Member\MemberDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Builtin authentication routes
Auth::routes();

// Index route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Checkout routes
Route::get('checkout/{courseSlug}', [CheckoutController::class, 'index'])->name('checkout')->middleware('auth');
// route for data validation before payment
Route::post('checkout/validate/{courseId}/{courseSlug}', [CheckoutController::class, 'prePaymentValidation'])->name('checkout.validate');
// route for processing data after successful payment
Route::post('checkout/fulfill/order', [CheckoutController::class, 'fulfillOrder'])->name('checkout.fulfill.order');
Route::post('payment/braintree', [BraintreeController::class, 'braintreePayment'])->name('braintree.payment');
Route::post('payment/stripe/{paymentIntentId}', [StripeController::class, 'getStripePaymentIntent'])->name('stripe.payment');
Route::get('checkout/success/thank-you', [CheckoutController::class, 'showThanks'])->name('thanks');

// Privacy & Terms routes, both managed by PageController
Route::get('privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('terms', [PageController::class, 'terms'])->name('terms');

// Frontend Course routes
Route::get('courses', [FrontendCourseController::class, 'index'])->name('courses.index');
Route::get('courses/{courseId}', [FrontendCourseController::class, 'show'])->name('courses.show');
Route::get('courses/lessons/{lessonId}', [FrontendCourseController::class, 'showLesson'])->name('courses.show_lesson')->middleware('auth');


// Routes for Admin group
Route::group(
    [
        // This options will be applied to all the routes I will define below into the anonymous function
        'as' => 'admin.', // all the names of the routes will start with member.
        'prefix' => 'admin', // all the url of the routes will start with /member.
        'middleware' => ['auth', 'admin']
    ], // only user who is both logged in and admin can reach the routes defined 

    function () {
        // Admin dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        //Course routes
        Route::get('courses', [CourseController::class, 'index'])->name('courses');
        // Create a new course
        Route::get('courses/create', [CourseController::class, 'create'])->name('courses.create');
        // Save a new course (post request from the form on courses.create)
        Route::post('courses', [CourseController::class, 'store'])->name('courses.store');
        // Edit an existing course
        Route::get('courses/{courseId}/edit', [CourseController::class, 'edit'])->name('courses.edit');
        // Update an existing course
        Route::put('courses/{courseId}', [CourseController::class, 'update'])->name('courses.update');
        // Delete a course
        Route::delete('courses/{courseId}', [CourseController::class, 'destroy'])->name('courses.destroy');

        // Category routes
        Route::get('categories', [CategoryController::class, 'index'])->name('categories');
        // Create a new category
        Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
        // Save a new course (post request from the form on courses.create)
        Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
        // Edit an existing category
        Route::get('categories/{categoryId}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        // Update an existing category
        Route::put('category/{categoryId}', [CategoryController::class, 'update'])->name('categories.update');
        // Delete a course
        Route::delete('category/{categoryId}', [CategoryController::class, 'destroy'])->name('categories.destroy');

        // Lessons routes
        Route::get('lessons', [LessonController::class, 'index'])->name('lessons');
        // Create a new category
        Route::get('lessons/create', [LessonController::class, 'create'])->name('lessons.create');
        // Get categories from course
        Route::get('category/ajax/{courseId}', [LessonController::class, 'getCategory']);
        // Save a new course (post request from the form on courses.create)
        Route::post('lessons', [LessonController::class, 'store'])->name('lessons.store');
        // Edit an existing lesson
        Route::get('lessons/{lessonId}/edit', [LessonController::class, 'edit'])->name('lessons.edit');
        // Update an existing lesson
        Route::put('lesson/{categoryId}', [LessonController::class, 'update'])->name('lessons.update');
        // Delete a course
        Route::delete('lesson/{categoryId}', [LessonController::class, 'destroy'])->name('lessons.destroy');


        // Braintree routes
        Route::get('payments/braintree', [BraintreeController::class, 'index'])->name('braintree');
        Route::put('payments/braintree/update', [BraintreeController::class, 'update'])->name('braintree.update');

        // Stripe routes
        Route::get('payments/stripe', [StripeController::class, 'index'])->name('stripe');
        Route::put('payments/stripe/update', [StripeController::class, 'update'])->name('stripe.update');

        // PayPal routes
        Route::get('payments/paypal', [PaypalController::class, 'index'])->name('paypal');
        Route::put('payments/paypal/update', [PaypalController::class, 'update'])->name('paypal.update');

        // Settings route
        Route::get('payments/settings', [SettingsController::class, 'index'])->name('settings');
        Route::put('payments/settings/update', [SettingsController::class, 'update'])->name('settings.update');

        // Users route
        Route::get('users', [UsersController::class, 'index'])->name('users');
        Route::delete('users/{userId}', [UsersController::class, 'destroy'])->name('users.destroy');

        // Orders route
        Route::get('orders', [OrdersController::class, 'index'])->name('orders');
        Route::delete('orders/{orderId}', [OrdersController::class, 'destroy'])->name('orders.destroy');
    }
);


// Routes for Member group
Route::group(
    [
        // This options will be applied to all the routes I will define below into the anonymous function
        'as' => 'member.', // all the names of the routes will start with member.
        'prefix' => 'member', // all the routes defined will start with member/
        'middleware' => ['auth']
    ], // only logged in user can reach the routes defined below

    function () {
        Route::get('dashboard', [MemberDashboardController::class, 'index'])->name('dash');
    }
);
