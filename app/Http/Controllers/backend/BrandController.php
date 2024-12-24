<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;  // Đảm bảo đã import model brand
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Lấy danh sách các thương hiệu, chỉ lấy các thương hiệu có trạng thái 'active' (status = 1)
        $brands = Brand::select("id", "name", "slug", "image", "description", "status")
            ->orderBy('created_at', 'DESC')
            ->paginate(8);

        // Trả về view với dữ liệu
        return view('backend.brand.index', compact('brands'));
    }
    public function trash()
    {
        $brands = Brand::onlyTrashed()
            ->orderBy('deleted_at', 'DESC')
            ->paginate(10); // Phân trang
        return view('backend.brand.trash', compact('brands'));
    }

    public function delete(string $id)
    {
        $brand = Brand::find($id);
        if ($brand) {
            $brand->delete();
            return redirect()->route('brand.index')->with('success', 'Xóa brand thành công!');
        }

        return redirect()->route('brand.index')->with('error', 'Không tìm thấy brand!');
    }

    public function restore(string $id)
    {
        $brand = Brand::withTrashed()->where('id', $id);
        if ($brand->first() != null) {
            $brand->restore();
            return redirect()->route('brand.trash')->with('success', 'Xóa brand thành công!');
        }

        return redirect()->route('brand.trash')->with('error', 'Không tìm thấy brand!');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::orderBy('sort_order', 'ASC')
            ->select("id", "name", "sort_order")
            ->get();
        return view('backend.brand.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = new Brand();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->extension();
            $filename = date('YmdHis') . "." . $extension;
            $file->move(public_path('images/brand'), $filename);
            $brand->image = $filename;

            $brand->name = $request->name;
            $brand->slug = $request->slug;
            $brand->description = $request->description;
            $brand->sort_order = $request->sort_order;
            $brand->created_by = Auth::id() ?? 1;
            $brand->created_at = date('Y-m-d H:i:s');
            $brand->status = $request->status ?? 0;
            $brand->save();
            return redirect()->route('brand.index')->with('success', 'them thanh cong');
        } else {
            return back()->with('error', 'chua chon hinh');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $brand = Brand::withTrashed()->where('id', $id)->first();
        if ($brand != null) {
            if ($brand->image && File::exists(public_path("images/brand/" . $brand->image))) {
                File::delete(public_path("images/brand/" . $brand->image));
            }
            $brand->forceDelete();

            return redirect()->route("brand.trash")
                ->with('success', 'xoa thanh cong');
        }
        return redirect()->route('brand.trash')->with('error', 'mẫu tin không còn tồn tại');
    }
}
