<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class MenuController extends Controller
{
    public function status($id)
    {
        $menu = Menu::findOrFail($id);

        // Đổi trạng thái
        $menu->status = !$menu->status;
        $menu->save();

        // Chuyển hướng về trang trước đó với thông báo
        return redirect()->route('menu.index')->with('success', 'Cập nhật trạng thái thành công!');
    }
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
            return redirect()->route('menu.index')->with('success', 'Xóa menu thành công!');
        }

        return redirect()->route('menu.index')->with('error', 'Không tìm thấy menu!');
    }

    public function restore(string $id)
    {
        $menu = Menu::withTrashed()->where('id', $id);
        if ($menu->first() != null) {
            $menu->restore();
            return redirect()->route('menu.trash')->with('success', 'Xóa menu thành công!');
        }

        return redirect()->route('menu.trash')->with('error', 'Không tìm thấy menu!');
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
    public function store(StoreMenuRequest $request)
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
        $menu = Menu::find($id);
        if (!$menu) {
            return redirect()->route('menu.index')->with('error', 'menu không tồn tại.');
        }

        return view('backend.menu.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::where('id', $id)->firstOrFail();
        $menus = Menu::orderBy('sort_order', 'ASC')
            ->select("id", "name", "sort_order", "status")
            ->get();
        return view('backend.menu.edit', compact('menu', 'menus'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMenuRequest $request, $id)
    {
        $menu = Menu::where('id', $id)->first();
        $menu->name = $request->name;
        $menu->link = $request->link;
        $menu->position = $request->position;
        $menu->type = $request->type;
        $menu->sort_order = $request->sort_order;
        $menu->updated_by = Auth::id() ?? 1;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->status = $request->status ?? 0;
        $menu->save();
        return redirect()->route('menu.index')->with('success', 'cap nhat thanh cong');
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
