<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductCMSController extends Controller
{
    public function index()
    {
        // Eager load product images
        $products = Product::with('images')->get();

        return view('admin.products.index', compact('products'));
    }
}
