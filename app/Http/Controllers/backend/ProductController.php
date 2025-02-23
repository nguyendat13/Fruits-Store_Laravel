<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;  // Đảm bảo đã import model product
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Str; // Đảm bảo bạn đã import Str

class ProductController extends Controller
{
    public function status($id)
    {
        $product = Product::findOrFail($id);

        // Đổi trạng thái
        $product->status = !$product->status;
        $product->save();

        // Chuyển hướng về trang trước đó với thông báo
        return redirect()->route('product.index')->with('success', 'Cập nhật trạng thái thành công!');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::select("id", "name", "category_id", "brand_id", "slug", "thumbnail", "status")
            ->orderBy('created_at', 'DESC')
            ->with('category', 'brand')
            ->paginate(8);
        return view('backend.product.index', compact('products'));
    }
    public function trash()
    {
        $products = Product::onlyTrashed()->orderBy('deleted_at', 'DESC')->paginate(10);
        return view('backend.product.trash', compact('products'));
    }

    public function delete(string $id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return redirect()->route('product.index')->with('success', 'Xóa product thành công!');
        }

        return redirect()->route('product.index')->with('error', 'Không tìm thấy product!');
    }

    public function restore(string $id)
    {
        $product = Product::withTrashed()->where('id', $id);
        if ($product->first() != null) {
            $product->restore();
            return redirect()->route('product.trash')->with('success', 'Xóa product thành công!');
        }

        return redirect()->route('product.trash')->with('error', 'Không tìm thấy product!');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        $brands = Brand::select('id', 'name')->get();

        return view('backend.product.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        // Kiểm tra nếu sản phẩm có tên trùng với tên đã có trong hệ thống
        $existingProduct = Product::where('name', $request->name)->first();
        if ($existingProduct) {
            return back()->with('error', 'Sản phẩm đã tồn tại');
        }
        $product = new Product();

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $filename = date('YmdHis') . "." . $extension;
            $file->move(public_path('storage/images/product/'), $filename);
            $product->thumbnail = $filename;
        }
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->slug = $request->slug ?: Str::slug($request->name); // Tạo slug từ tên sản phẩm nếu không có slug
        $product->content = $request->content;
        $product->description = $request->description;
        $product->price_buy = $request->price_buy;
        $product->price_sale = $request->price_sale ?? 0; // Giá giảm có thể không bắt buộc
        $product->qty = $request->qty;
        $product->detail = $request->detail ?? '';
        $product->status = $request->status;
        $product->created_by = Auth::id() ?? 1;
        $product->created_at = now();

        // Lưu sản phẩm vào database
        $product->save();

        return redirect()->route('product.index')->with('success', 'Thêm sản phẩm thành công!');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::select('id', 'name')->get(); // Lấy danh sách categories
        $brands = Brand::select('id', 'name')->get(); // Lấy danh sách brands
        $product = Product::where('id', $id)->firstOrFail();
        $products = Product::select("id", "name", "status")
            ->get();
        return view('backend.product.edit', compact('product', 'products', 'categories', 'brands'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('product.index')->with('error', 'product không tồn tại.');
        }

        return view('backend.product.show', compact('product'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        // Kiểm tra nếu sản phẩm có tên trùng với tên đã có trong hệ thống (ngoại trừ sản phẩm hiện tại)
        $existingProduct = Product::where('name', $request->name)
            ->where('id', '!=', $id) // Đảm bảo không kiểm tra chính sản phẩm này
            ->first();

        if ($existingProduct) {
            return back()->with('error', 'Sản phẩm đã tồn tại');
        }

        // Lấy sản phẩm hiện tại
        $product = Product::findOrFail($id); // Sử dụng findOrFail để đảm bảo sản phẩm tồn tại

        // Kiểm tra và thay đổi hình ảnh nếu có ảnh mới
        if ($request->hasFile('thumbnail')) {
            // Xóa ảnh cũ nếu có và tồn tại
            if ($product->thumbnail && File::exists(public_path("storage/images/product/" . $product->thumbnail))) {
                File::delete(public_path("storage/images/product/" . $product->thumbnail));
            }

            // Thêm ảnh mới
            $file = $request->file('thumbnail');
            $extension = $file->extension();
            $filename = now()->format('YmdHis') . "." . $extension; // Sử dụng Carbon để lấy thời gian hiện tại
            $file->move(public_path('storage/images/product'), $filename);
            $product->thumbnail = $filename;
        }

        // Cập nhật các thông tin còn lại
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->slug = $request->slug ?: Str::slug($request->name); // Tạo slug tự động nếu không có slug
        $product->content = $request->content;
        $product->description = $request->description;
        $product->price_buy = $request->price_buy;
        $product->price_sale = $request->price_sale ?? 0; // Giá giảm có thể không bắt buộc
        $product->qty = $request->qty;
        $product->detail = $request->detail ?? '';
        $product->status = $request->status ?? 0;
        $product->updated_by = Auth::id() ?? 1;
        $product->updated_at = now(); // Sử dụng Carbon để lưu thời gian chính xác hơn

        // Lưu sản phẩm đã cập nhật
        $product->save();

        // Trả về thông báo thành công
        return redirect()->route('product.index')->with('success', 'Cập nhật sản phẩm thành công');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::withTrashed()->where('id', $id)->first();
        if ($product != null) {
            if ($product->image && File::exists(public_path("storage/images/product/" . $product->image))) {
                File::delete(public_path("storage/images/product/" . $product->image));
            }
            $product->forceDelete();

            return redirect()->route("product.trash")
                ->with('success', 'xoa thanh cong');
        }
        return redirect()->route('product.trash')->with('error', 'mẫu tin không còn tồn tại');
    }
}
