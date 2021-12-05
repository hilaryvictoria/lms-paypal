<?php

namespace App\Helpers;

use DB;

class PaymentGatewayBladeCreationHelper
{
    public static function createBraintreeBladeFile($isPayPalEnabled)
    {
        $paymentGatewayPath = 'resources/views/js-for-views/payment-gateway-js/';
        $brainTreeTemplate = file_get_contents($paymentGatewayPath . 'templates/braintree-js-template.blade.php');
        if ($isPayPalEnabled) {
            $brainTreeTemplate = str_replace("|paypal-placeholder|", "paypal: { flow: 'vault' }", $brainTreeTemplate);
        } else {
            $brainTreeTemplate = str_replace("|paypal-placeholder|", "", $brainTreeTemplate);
        }

        $braintreeBlade = fopen(base_path($paymentGatewayPath . 'braintree-js.blade.php'), 'w');
        fwrite($braintreeBlade, $brainTreeTemplate);
        fclose($braintreeBlade);
    }

    public static function createPaypalSmartBladeFile()
    {
        // getting the settings table
        $settings = DB::table('settings')->first();
        // if the settings are null then it doesn't make any sense to move forward into this method
        if (is_null($settings)) {
            return;
        }
        // getting the paypal settings from db
        $payPalSettings = DB::table('pay_pal_settings')->first();
        // if the selected environment is sandbox
        if ($payPalSettings->paypal_smart_environment == 'sandbox') {
            // we are setting our sandbox client id
            $payPalClientId = $payPalSettings->paypal_smart_sandbox_client;
        }
        // if the selected environment is production
        elseif ($payPalSettings->paypal_smart_environment == 'production') {
            // we are setting our production client id
            $payPalClientId = $payPalSettings->paypal_smart_production_client;
        } else {
            // if the selected environment is neither sandbox or production it means we have a problem and the method should stop here
            return;
        }

        // in this variable we will save the disabled options
        $disabledOptionsString = self::getDisabledOptionsString($settings);
        $payPalPath = 'resources/views/js-for-views/payment-gateway-js/';
        $payPalTemplate = file_get_contents(resource_path('views/js-for-views/payment-gateway-js/templates/paypal-smart-js-template.blade.php'));
        $payPalTemplate = str_replace("|paypal-client-id|", $payPalClientId, $payPalTemplate);
        $payPalTemplate = str_replace("|currency|", $settings->currency, $payPalTemplate);
        $payPalTemplate = str_replace("|paypal-disabled-options|", $disabledOptionsString, $payPalTemplate);
        // we open this file and override its content
        $paypalBlade = fopen(resource_path('views/js-for-views/payment-gateway-js/paypal-smart-js.blade.php'), 'w');
        fwrite($paypalBlade, $payPalTemplate);
        fclose($paypalBlade);
    }

    public static function getDisabledOptionsString($settings)
    {
        // This method either returns an empty string or the correct string for disabling the options we set as disabled in the paypal smart buttons settings
        // correct string disable-funding=card,sofort,... 
        // the keys of the array are the name of the smart payment buttons and the value will come from the database 
        $disabledOptionsArray = array(
            'card' => $settings->enable_pp_smart_card,
            'credit' => $settings->enable_pp_smart_credit,
            'bancontact' => $settings->enable_pp_smart_bancontact,
            'blik' => $settings->enable_pp_smart_blik,
            'eps' => $settings->enable_pp_smart_eps,
            'giropay' => $settings->enable_pp_smart_giropay,
            'ideal' => $settings->enable_pp_smart_ideal,
            'mercadopago' => $settings->enable_pp_smart_mercadopago,
            'mybank' => $settings->enable_pp_smart_mybank,
            'p24' => $settings->enable_pp_smart_p24,
            'sepa' => $settings->enable_pp_smart_sepa,
            'sofort' => $settings->enable_pp_smart_sofort,
            'venmo' => $settings->enable_pp_smart_venmo
        );
        // boolean flag
        $isAnythingDisabled = false;
        // we loop through the array key values pair
        foreach ($disabledOptionsArray as $key => $value) {
            // if anything is set to 0, so is disabled 
            if ($value == 0) {
                // we set the flag to true
                $isAnythingDisabled = true;
                break;
            }
        }

        // we build the correct string
        $returnString = "";
        // if at least one is disabled
        if ($isAnythingDisabled) {
            // we will return this string
            $returnString .= "&disable-funding=";
            // we loop again through the array
            foreach ($disabledOptionsArray as $key => $value) {
                if ($value == 0) {
                    // we are concatenating to the returnString the key and the comma
                    $returnString .= $key . ",";
                }
            }
            // we delete the last comma
            $returnString = substr($returnString, 0, -1);
        }

        return $returnString;
    }
}
