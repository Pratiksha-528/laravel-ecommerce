<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;

class CheckoutController extends Controller {
    public function checkout(Request $request) {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $order = $api->order->create([
            'receipt' => '123',
            'amount' => 50000, // amount in paise
            'currency' => 'INR'
        ]);

        return response()->json(["order_id" => $order['id']]);
    }

    public function methodName() {
        return response()->json(["status" => "Checkout GET working"]);
    }
}
