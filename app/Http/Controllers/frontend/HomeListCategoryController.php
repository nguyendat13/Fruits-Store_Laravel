<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeListCategoryController extends Controller
{
    public function index(Request $request)
    {
        // Lọc theo từ khóa tìm kiếm
        $query = Product::query();
        if ($search = $request->input('search')) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Chế độ hiển thị
        $viewMode = $request->input('view', 'grid'); // Mặc định là 'grid'

        // Lọc theo danh mục, thương hiệu, giá, và sắp xếp
        $categoryId = $request->input('category_id');
        $brand = $request->input('brand');
        $priceRange = $request->input('price');
        $sortBy = $request->input('sort_by');

        $query->where('category_id', '!=', 1)
            ->where('category_id', '!=', 11); // Đảm bảo bỏ qua category_id 1 và 11

        if ($categoryId && $categoryId != 'all') {
            $query->where('category_id', $categoryId);
        }

        if ($brand && $brand != 'all') {
            $query->where('brand', $brand);
        }

        // Lọc theo giá
        if ($priceRange && $priceRange != 'all') {
            $priceRange = explode('-', $priceRange);
            if (count($priceRange) > 1) {
                $query->whereBetween('price_buy', [$priceRange[0], $priceRange[1]]);
            } else {
                $query->where('price_buy', '>=', $priceRange[0]);
            }
        }

        // Sắp xếp sản phẩm
        if ($sortBy) {
            if ($sortBy == 'price-asc') {
                $query->orderBy('price_buy', 'asc');
            } elseif ($sortBy == 'price-desc') {
                $query->orderBy('price_buy', 'desc');
            } elseif ($sortBy == 'name-asc') {
                $query->orderBy('name', 'asc');
            }
        }

        // Lấy các sản phẩm đã lọc và phân trang
        $products = $query->paginate(12)->appends(request()->query());

        // Lấy danh mục
        $categories = Category::where('status', 1)
            ->where('parent_id', 1) // Điều kiện parent_id = 1
            ->orderBy('name', 'asc')
            ->get();

        // Trả view cùng với dữ liệu cần thiết
        return view('components.home-list-category', compact('products', 'categories', 'viewMode'));
    }
}
