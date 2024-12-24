<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::select("id", "name", "link", "position", "type", "status")
            ->orderBy('created_at', 'DESC')->paginate(10);
        return view('backend.menu.index', compact('menus'));
    }
    public function trash()
    {
        $menus = Menu::onlyTrashed()->orderBy('deleted_at', 'DESC')->paginate(10);
        return view('backend.menu.trash', compact('menus'));
    }

    public function delete(string $id)
    {
        $menu = Menu::find($id);
        if ($menu) {
            $menu->delete();
            return redirect()->route('menu.index')->with('success', 'Xóa banner thành công!');
        }

        return redirect()->route('menu.index')->with('error', 'Không tìm thấy banner!');
    }

    public function restore(string $id)
    {
        $menu = Menu::withTrashed()->where('id', $id);
        if ($menu->first() != null) {
            $menu->restore();
            return redirect()->route('menu.trash')->with('success', 'Xóa banner thành công!');
        }

        return redirect()->route('menu.trash')->with('error', 'Không tìm thấy banner!');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::orderBy('sort_order', 'ASC')
            ->select("id", "name", "sort_order")
            ->get();
        return view('backend.menu.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->link = $request->link;
        $menu->position = $request->position;
        $menu->type = $request->type;
        $menu->sort_order = $request->sort_order;
        $menu->created_by = Auth::id() ?? 1;
        $menu->created_at = date('Y-m-d H:i:s');
        $menu->status = $request->status ?? 0;
        $menu->save();
        return redirect()->route('menu.index')->with('success', 'them thanh cong');
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
        $menu = Menu::withTrashed()->where('id', $id)->first();
        if ($menu != null) {
            if ($menu->image && File::exists(public_path("images/menu/" . $menu->image))) {
                File::delete(public_path("images/menu/" . $menu->image));
            }
            $menu->forceDelete();

            return redirect()->route("menu.trash")
                ->with('success', 'xoa thanh cong');
        }
        return redirect()->route('menu.trash')->with('error', 'mẫu tin không còn tồn tại');
    }
}
