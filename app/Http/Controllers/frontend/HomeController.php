<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $isLoggedIn = Auth::check();

        $categories = Category::where('status', 1)
            ->where('parent_id', 0)
            ->orderBy('sort_order', 'DESC')
            ->get();

        $products = Product::where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->limit(12) // Giới hạn số sản phẩm
            ->get();

        $products = Product::where('price_sale', '>', 0)
            ->limit(3)
            ->get();  // Lấy sản phẩm có giảm giá

        return view('frontend.home', compact('categories', 'products', 'isLoggedIn'));
    }
}
