<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;

class ProductController extends Controller
{
    // Hiển thị danh sách sản phẩm
    public function index(Request $request)
    {

        $viewMode = $request->input('view', 'grid'); // Mặc định là 'grid'

        // Lọc theo danh mục
        $categoryId = $request->input('category_id');
        $brand = $request->input('brand');
        $priceRange = $request->input('price');
        $sortBy = $request->input('sort_by');

        // Lọc sản phẩm theo các điều kiện
        $query = Product::query()
            ->where('category_id', '!=', 1)
            ->where('category_id', '!=', 11);

        if ($categoryId && $categoryId != 'all') {
            $query->where('category_id', $categoryId);
        }

        // if ($brand && $brand != 'all') {
        //     $query->where('brand', $brand);
        // }

        // if ($priceRange && $priceRange != 'all') {
        //     $priceRange = explode('-', $priceRange);
        //     if (count($priceRange) > 1) {
        //         $query->whereBetween('price', [$priceRange[0], $priceRange[1]]);
        //     } else {
        //         $query->where('price', '>=', $priceRange[0]);
        //     }
        // }

        // if ($sortBy) {
        //     if ($sortBy == 'price-asc') {
        //         $query->orderBy('price', 'asc');
        //     } elseif ($sortBy == 'price-desc') {
        //         $query->orderBy('price', 'desc');
        //     } elseif ($sortBy == 'name-asc') {
        //         $query->orderBy('name', 'asc');
        //     }
        // }

        // Lấy các sản phẩm đã lọc và phân trang
        $products = $query->paginate(12);


        $categories = Category::where('status', 1)
            ->where('parent_id', 1) // Điều kiện parent_id = 0
            ->orderBy('name', 'asc') // Sắp xếp theo tên danh mục
            ->get();
        return view('frontend.product', compact('products', 'categories', 'viewMode'));
    }

    // Hiển thị chi tiết sản phẩm
    public function detail($slug)
    {
        // Lấy sản phẩm theo slug
        $product = Product::where('slug', $slug)->firstOrFail();

        // Lấy sản phẩm liên quan cùng danh mục (trừ sản phẩm hiện tại)
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();


        // Truyền dữ liệu vào view
        return view('frontend.product-detail', compact('product', 'relatedProducts'));
    }
}
