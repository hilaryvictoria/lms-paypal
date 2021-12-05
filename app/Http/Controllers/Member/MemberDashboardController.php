<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Auth;
use App\Helpers\CurrencyHelper;
use App\Models\Order\Order;

class MemberDashboardController extends Controller
{
    public function index()
    {
        // we get the authenticated user (should not be null, as route is protected by the auth middleware)
        $authUser = Auth::user();
        // we get the orders of the user, the user_id column should match the authenticated user id, we order the results by descendent id and paginate by 5
        $orders = Order::where('user_id', $authUser->id)->orderBy('id', 'DESC')->paginate(5);
        $currency = CurrencyHelper::getCurrencyString();
        // we return the member.dashboard view with the variables defined
        return view('member.dashboard', compact('authUser', 'orders', 'currency'));
    }
}
