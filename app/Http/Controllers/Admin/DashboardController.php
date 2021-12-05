<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Helpers\CurrencyHelper;
use DB;

class DashboardController extends Controller
{
    // index function get and sum variables from the db and format the prices passes then to the view and returns the view admin.dasboard
    public function index()
    {
        // set the title
        $meta_title = "Dashboard";
        // get the number of users from the db
        $userCount = DB::table('users')->count();
        // get the number of courses from the db
        $courseCount = DB::table('courses')->count();
        // get the currency
        $currency = CurrencyHelper::getCurrencyString();
        // get the sum of the price of all sales
        $salesTotalSum = DB::table('orders')->sum('price');
        // format the price
        $salesTotalSum = CurrencyHelper::getSetPriceFormat($salesTotalSum);
        // get the total amount of orders from the db
        $orderSum = DB::table('orders')->count();

        return view('admin.dashboard', compact('meta_title', 'userCount', 'courseCount', 'currency', 'salesTotalSum', 'orderSum'));
    }
}
