<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::select("id",  "name", "slug", "image", "status")
            ->orderBy('created_at', 'DESC')
            ->paginate(8);

        return view('backend.category.index', compact('categories'));
    }
    public function trash()
    {
        $categories = Category::onlyTrashed()
            ->orderBy('deleted_at', 'DESC')
            ->paginate(10); // Phân trang
        return view('backend.category.trash', compact('categories'));
    }

    public function delete(string $id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            return redirect()->route('category.index')->with('success', 'Xóa banner thành công!');
        }

        return redirect()->route('category.index')->with('error', 'Không tìm thấy banner!');
    }

    public function restore(string $id)
    {
        $category = Category::withTrashed()->where('id', $id);
        if ($category->first() != null) {
            $category->restore();
            return redirect()->route('category.trash')->with('success', 'Xóa banner thành công!');
        }

        return redirect()->route('category.trash')->with('error', 'Không tìm thấy banner!');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('sort_order', 'ASC')
            ->select("id", "name", "sort_order")
            ->get();
        return view('backend.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->extension();
            $filename = date('YmdHis') . "." . $extension;
            $file->move(public_path('images/category'), $filename);
            $category->image = $filename;

            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->description = $request->description;
            $category->sort_order = $request->sort_order;
            $category->created_by = Auth::id() ?? 1;
            $category->created_at = date('Y-m-d H:i:s');
            $category->status = $request->status ?? 0;
            $category->save();
            return redirect()->route('category.index')->with('success', 'them thanh cong');
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
        $category = Category::withTrashed()->where('id', $id)->first();
        if ($category != null) {
            if ($category->image && File::exists(public_path("images/category/" . $category->image))) {
                File::delete(public_path("images/category/" . $category->image));
            }
            $category->forceDelete();

            return redirect()->route("category.trash")
                ->with('success', 'xoa thanh cong');
        }
        return redirect()->route('category.trash')->with('error', 'mẫu tin không còn tồn tại');
    }
}
