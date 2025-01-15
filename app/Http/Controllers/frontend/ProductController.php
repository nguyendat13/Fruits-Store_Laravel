<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;

class ProductController extends Controller
{
    // Hiển thị danh sách sản phẩm
    public function index(Request $request)
    {
        //chế độ hiển thị
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

        if ($brand && $brand != 'all') {
            $query->where('brand', $brand);
        }
        // Lọc theo giá
        if ($request->input('price_buy') && $request->input('price_buy') != 'all') {
            $priceRange = explode('-', $request->input('price_buy'));
            if (count($priceRange) == 2) {
                $query->whereBetween('price_buy', [$priceRange[0], $priceRange[1]]);
            } elseif (count($priceRange) == 1) {
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
        // Kiểm tra nếu không có sản phẩm
        $noProducts = $products->isEmpty();

        $categories = Category::where('status', 1)
            ->where('parent_id', 1) // Điều kiện parent_id = 0
            ->orderBy('name', 'asc') // Sắp xếp theo tên danh mục
            ->get();
        return view('frontend.products.product', compact('products', 'categories', 'viewMode', 'noProducts'));
    }

    public function search(Request $request)
    {
        // Lấy từ khóa tìm kiếm
        $keyword = $request->input('q');

        // Truy vấn sản phẩm dựa trên từ khóa
        $products = Product::query()
            ->where('name', 'like', "%{$keyword}%")
            ->orWhere('description', 'like', "%{$keyword}%")
            ->paginate(10); // Phân trang 10 sản phẩm

        // Trả về view cùng kết quả tìm kiếm
        return view('frontend.products.search', compact('products', 'keyword'));
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
        return view('frontend.products.product-detail', compact('product', 'relatedProducts'));
    }

    public function showCategory(Request $request, $slug)
    {
        // Tìm danh mục theo slug
        $category = Category::where('slug', $slug)->firstOrFail();

        // Tìm các danh mục con nếu có
        $subcategories = Category::where('parent_id', $category->id)->get();

        // Query sản phẩm thuộc danh mục hiện tại và các danh mục con
        $productsQuery = Product::whereHas('category', function ($query) use ($category) {
            $query->where('id', $category->id)
                ->orWhere('parent_id', $category->id);
        });

        // Sắp xếp sản phẩm
        $sort = $request->get('sort', 'newest');
        if ($sort === 'price_asc') {
            $productsQuery->orderBy('price_buy', 'asc');
        } elseif ($sort === 'price_desc') {
            $productsQuery->orderBy('price_buy', 'desc');
        } else {
            $productsQuery->orderBy('created_at', 'desc'); // Mặc định: Mới nhất
        }

        // Phân trang sản phẩm
        $products = $productsQuery->paginate(12)->appends($request->query());

        // Trả về view với dữ liệu
        return view('frontend.products.category', compact('products', 'category', 'subcategories', 'sort'));
    }

    public function category(Request $request)
    {
        $viewMode = $request->input('view', 'grid'); // Mặc định là 'grid'
        $categoryId = $request->input('category_id', 'all');
        $sortBy = $request->input('sort_by', null);
        $priceRange = $request->input('price_buy', 'all');

        // Khởi tạo query cơ bản
        $query = Product::query()->whereNotIn('category_id', [1, 11]);

        // Lọc theo danh mục
        if ($categoryId !== 'all') {
            $query->where('category_id', $categoryId);
        }

        // Lọc theo giá
        if ($priceRange !== 'all') {
            $priceRange = explode('-', $priceRange);
            if (count($priceRange) > 1) {
                $query->whereBetween('price_buy', [$priceRange[0], $priceRange[1]]);
            } else {
                $query->where('price_buy', '>=', $priceRange[0]);
            }
        }

        // Sắp xếp
        if ($sortBy) {
            switch ($sortBy) {
                case 'price-asc':
                    $query->orderBy('price_buy', 'asc');
                    break;
                case 'price-desc':
                    $query->orderBy('price_buy', 'desc');
                    break;
                case 'name-asc':
                    $query->orderBy('name', 'asc');
                    break;
            }
        }

        // Phân trang sản phẩm
        $products = $query->paginate(12)->appends($request->query());

        // Lấy danh sách danh mục
        $categories = Category::where('status', 1)
            ->whereNotIn('id', [1])
            ->orderBy('name', 'asc')
            ->get();

        return view('frontend.products.product-category', compact('products', 'categories', 'viewMode'));
    }

    public function brand(Request $request)
    {
        $viewMode = $request->input('view', 'grid');
        $brandId = $request->input('brand_id', 'all');
        $sortBy = $request->input('sort_by', null);
        $priceRange = $request->input('price_buy', 'all');

        // Khởi tạo query cơ bản
        $query = Product::query()->whereNotIn('category_id', [1, 11]);

        // Lọc theo thương hiệu
        if ($brandId !== 'all') {
            $query->where('brand_id', $brandId);
        }

        // Lọc theo giá
        if ($priceRange !== 'all') {
            $priceRange = explode('-', $priceRange);
            if (count($priceRange) > 1) {
                $query->whereBetween('price_buy', [$priceRange[0], $priceRange[1]]);
            } else {
                $query->where('price_buy', '>=', $priceRange[0]);
            }
        }

        // Sắp xếp
        if ($sortBy) {
            switch ($sortBy) {
                case 'price-asc':
                    $query->orderBy('price_buy', 'asc');
                    break;
                case 'price-desc':
                    $query->orderBy('price_buy', 'desc');
                    break;
                case 'name-asc':
                    $query->orderBy('name', 'asc');
                    break;
            }
        }

        // Phân trang sản phẩm
        $products = $query->paginate(12)->appends($request->query());

        // Lấy danh sách thương hiệu
        $brands = Brand::where('status', 1)->orderBy('name', 'asc')->get();

        return view('frontend.products.product-brand', compact('products', 'brands', 'viewMode'));
    }

    public function showBrand(Request $request, $slug)
    {
        // Tìm thương hiệu theo slug
        $brand = Brand::where('slug', $slug)->firstOrFail();

        // Tìm các thương hiệu con nếu có
        // $subbrands = Brand::where('parent_id', $brand->id)->get();

        // Query sản phẩm thuộc thương hiệu hiện tại và các thương hiệu con
        $productsQuery = Product::whereHas('brand', function ($query) use ($brand) {
            $query->where('id', $brand->id);
            // ->orWhere('parent_id', $brand->id);
        });

        // Sắp xếp sản phẩm
        $sort = $request->get('sort', 'newest');
        if ($sort === 'price_asc') {
            $productsQuery->orderBy('price_buy', 'asc');
        } elseif ($sort === 'price_desc') {
            $productsQuery->orderBy('price_buy', 'desc');
        } else {
            $productsQuery->orderBy('created_at', 'desc'); // Mặc định: Mới nhất
        }

        // Phân trang sản phẩm
        $products = $productsQuery->paginate(12)->appends($request->query());

        // Trả về view với dữ liệu
        return view('frontend.products.brand', compact('products', 'brand', 'sort'));
    }
}
