<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    // Hiển thị danh sách sản phẩm
    public function index()
    {
        $products = Product::paginate(12); // Lấy 12 sản phẩm mỗi trang
        $categories = Category::where('status', 1)->get();

        return view('frontend.product', compact('products', 'categories'));
    }

    // Hiển thị chi tiết sản phẩm
    public function detail($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail(); // Tìm sản phẩm theo slug
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get(); // Lấy sản phẩm liên quan

        return view('frontend.product-detail', compact('product', 'relatedProducts'));
    }
}
