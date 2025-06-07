<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;

class CartController extends Controller
{
    // Display all cart items for all users (or customize as needed)
    public function index()
    {
        // Eager load 'user' and 'product' relationships for efficiency
        $carts = CartItem::with(['user', 'product'])->get();

        return view('admin.carts.index', compact('carts'));
    }

    // Add or update cart item for user_id = 1 (example user)
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1'
        ]);

        CartItem::updateOrCreate(
            ['user_id' => 1, 'product_id' => $request->product_id], // fix user id as needed
            ['quantity' => $request->quantity ?? 1]
        );

        return response()->json(['message' => 'Product added to cart.']);
    }

    // Update cart item quantity
    public function update(Request $request, $id)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);

        $item = CartItem::findOrFail($id);
        $item->update(['quantity' => $request->quantity]);

        return response()->json(['message' => 'Cart updated.']);
    }

    // Remove item from cart
    public function destroy($id)
    {
        $item = CartItem::findOrFail($id);
        $item->delete();

        return response()->json(['message' => 'Item removed from cart.']);
    }
}
