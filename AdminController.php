<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;

class AdminController extends Controller
{
    public function showLogin() {
        return view('admin.login');
    }

    public function login(Request $request) {
        if ($request->username === 'admin' && $request->password === 'admin') {
            session(['admin_logged_in' => true]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['Invalid credentials']);
    }

    public function dashboard() {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $totalProducts = Product::count();
        $totalCartItems = CartItem::count();

        return view('admin.dashboard', compact('totalProducts', 'totalCartItems'));
    }

    public function logout() {
        session()->forget('admin_logged_in');
        return redirect()->route('admin.login');
    }
}
