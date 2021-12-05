<?php

namespace App\Helpers;

use App\Models\Setting\Setting;
use App\Models\Checkout\Currency;

class CurrencyHelper
{
    public static function getSetPriceFormat($priceWithTwoDecimals)
    {
        $settings = Setting::first();
        $isCommaTheDecimalSeparator = $settings->comma_is_decimal_separator;
        $isIntegerPriceUsed = $settings->use_integer_prices;

        $priceStringToReturn = $priceWithTwoDecimals;
        if( ($isIntegerPriceUsed) && ($priceWithTwoDecimals < 1000) )
        {
            return intval($priceStringToReturn);
        }

        if( (!$isIntegerPriceUsed) && ($priceWithTwoDecimals < 1000) )
        {
            $priceString = strval($priceWithTwoDecimals);
            if($isCommaTheDecimalSeparator)
            {
                return str_replace('.', ',', $priceString);
            }
            else
            {
                return $priceStringToReturn;
            }
        }

        if( ($isIntegerPriceUsed) && ($priceWithTwoDecimals >= 1000) )
        {
            $priceString = strval(intval($priceStringToReturn));
            if($isCommaTheDecimalSeparator)
            {
                return number_format($priceString, null, null, '.');
            }
            else
            {
                return number_format($priceString, null, null, ',');
            }
        }

        if( (!$isIntegerPriceUsed) && ($priceWithTwoDecimals >= 1000) )
        {
            $priceStringWithTwoDecimals = strval($priceWithTwoDecimals);
            $positionOfPeriod = strpos($priceStringWithTwoDecimals, '.');
            $priceStringInt = substr($priceStringWithTwoDecimals, 0, $positionOfPeriod);
            $decimalsString = substr($priceStringWithTwoDecimals, $positionOfPeriod + 1);

            if($isCommaTheDecimalSeparator)
            {
                $separatedPriceInt = number_format($priceStringInt, null, null, '.');
                return $separatedPriceInt . ',' . $decimalsString;
            }
            else
            {
                $separatedPriceInt = number_format($priceStringInt, null, null, ',');
                return $separatedPriceInt . '.' . $decimalsString;
            }
        }

        return $priceStringToReturn;
    }

    // This function look for the currency we set in the settings
    // if we set USD, EUR or GBP and we checked we tant the currency symbol to be shown it returns the symbol
    public static function getCurrencyString()
    {
        // getting our settings 
        $settings = Setting::first();
        // we are getting currency from our settings 'USD'
        $currencyText = $settings->currency;
        // we concatenate a space to the currencyText 'USD '
        $adjustedCurrencyText = $currencyText . ' ';
        // If in the settings we set that we want to use a currency symbol
        if( $settings->use_currency_symbol == 1 )
        {
            // if our currency is either USD EUR or GBP
            if( $currencyText == 'USD' || $currencyText == 'EUR' || $currencyText == 'GBP'  )
            {
                // we get the currency from our currency table
                $currencyData = Currency::where('name', $currencyText)->first();
                // if we found a currency (currencyData should not be null)
                if( !is_null($currencyData) )
                {
                    // we are getting the symbol of the currencyData associated array
                    $adjustedCurrencyText = $currencyData->symbol;
                }
            }
        }
        // we will return the symbol
        return $adjustedCurrencyText;
    }
}
