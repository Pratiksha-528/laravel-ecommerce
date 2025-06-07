<?php

namespace App\Http\Controllers;

use App\Models\CartItem;

class CartCMSController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('product')->where('user_id', 1)->get();

        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item->product->price * $item->quantity;
        }

        return view('admin.cart.index', compact('cartItems', 'total'));
    }
}
