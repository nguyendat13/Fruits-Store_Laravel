<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;  // Đảm bảo đã import model Banner
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
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
            return redirect()->route('product.index')->with('success', 'Xóa banner thành công!');
        }

        return redirect()->route('product.index')->with('error', 'Không tìm thấy banner!');
    }

    public function restore(string $id)
    {
        $product = Product::withTrashed()->where('id', $id);
        if ($product->first() != null) {
            $product->restore();
            return redirect()->route('product.trash')->with('success', 'Xóa banner thành công!');
        }

        return redirect()->route('product.trash')->with('error', 'Không tìm thấy banner!');
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
    public function store(Request $request)
    {
        $product = new Product();

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $filename = date('YmdHis') . "." . $extension;
            $file->move(public_path('images/product'), $filename);
            $product->thumbnail = $filename;
        }
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->slug = $request->slug;
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
        return view('backend.product.edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.product.show');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
            if ($product->image && File::exists(public_path("images/product/" . $product->image))) {
                File::delete(public_path("images/product/" . $product->image));
            }
            $product->forceDelete();

            return redirect()->route("product.trash")
                ->with('success', 'xoa thanh cong');
        }
        return redirect()->route('product.trash')->with('error', 'mẫu tin không còn tồn tại');
    }

    public function status($id)
    {
        //
    }
}
