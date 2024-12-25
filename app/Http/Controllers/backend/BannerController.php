<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;  // Đảm bảo đã import model Banner
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::select("id", "name", "link", "image", "position", "status")
            ->orderBy('created_at', 'DESC')
            ->paginate(8);
        return view('backend.banner.index', compact('banners'));
    }

    public function trash()
    {
        $banners = Banner::onlyTrashed()
            ->orderBy('deleted_at', 'DESC')
            ->paginate(5);
        return view('backend.banner.trash', compact('banners'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banners = Banner::orderBy('sort_order', 'ASC')
            ->select("id", "name", "sort_order")
            ->get();
        return view('backend.banner.create', compact('banners'));
    }

    public function delete(string $id)
    {
        $banner = Banner::find($id);
        if ($banner) {
            $banner->delete();
            return redirect()->route('banner.index')->with('success', 'Xóa banner thành công!');
        }

        return redirect()->route('banner.index')->with('error', 'Không tìm thấy banner!');
    }

    public function restore(string $id)
    {
        $banner = Banner::withTrashed()->where('id', $id);
        if ($banner->first() != null) {
            $banner->restore();
            return redirect()->route('banner.trash')->with('success', 'Xóa banner thành công!');
        }

        return redirect()->route('banner.trash')->with('error', 'Không tìm thấy banner!');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banner = new Banner();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->extension();
            $filename = date('YmdHis') . "." . $extension;
            $file->move(public_path('images/banner'), $filename);
            $banner->image = $filename;

            $banner->name = $request->name;
            $banner->link = $request->link;
            $banner->position = $request->position;
            $banner->description = $request->description;
            $banner->sort_order = $request->sort_order;
            $banner->created_by = Auth::id() ?? 1;
            $banner->created_at = date('Y-m-d H:i:s');
            $banner->status = $request->status ?? 0;
            $banner->save();
            return redirect()->route('banner.index')->with('success', 'them thanh cong');
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
        $banner = Banner::find($id);
        if (!$banner) {
            return redirect()->route('banner.index')->with('error', 'Banner không tồn tại.');
        }

        return view('backend.banner.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::where('id', $id)->firstOrFail();
        $banners = Banner::orderBy('sort_order', 'ASC')
            ->select("id", "name", "sort_order", "status")
            ->get();
        return view('backend.banner.edit', compact('banner', 'banners'));
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
        $banner = Banner::where('id', $id)->first();
        $banner->name = $request->name;
        $banner->link = $request->link;

        if ($request->hasFile('image')) {
            if ($banner->image && File::exists(public_path("storage/images/banner/" . $banner->image))) {
                File::delete(public_path("storage/images/banner/" . $banner->image));
            }
            $file = $request->file('image');
            $extension = $file->extension();
            $filename = date('YmdHis') . "." . $extension;
            $file->move(public_path('storage/images/banner'), $filename);
            $banner->image = $filename;
        }
        $banner->position = $request->position;
        $banner->description = $request->description;
        $banner->sort_order = $request->sort_order;
        $banner->updated_by = Auth::id() ?? 1;
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->status = $request->status ?? 0;
        $banner->save();
        return redirect()->route('banner.index')->with('success', 'cap nhat thanh cong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::withTrashed()->where('id', $id)->first();
        if ($banner != null) {
            if ($banner->image && File::exists(public_path("images/banner/" . $banner->image))) {
                File::delete(public_path("images/banner/" . $banner->image));
            }
            $banner->forceDelete();

            return redirect()->route("banner.trash")
                ->with('success', 'xoa thanh cong');
        }
        return redirect()->route('banner.trash')->with('error', 'mẫu tin không còn tồn tại');
    }
}
