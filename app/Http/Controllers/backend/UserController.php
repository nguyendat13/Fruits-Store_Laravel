<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select("id", "name", "password", "fullname", "gender", "thumbnail", "email", "phone", "address", "roles", "status")
            ->orderBy('created_at', 'DESC')->paginate(10);
        return view('backend.user.index', compact('users'));
    }
    public function trash()
    {
        $users = User::onlyTrashed()->orderBy('deleted_at', 'DESC')->paginate(10);
        return view('backend.user.trash', compact('users'));
    }

    public function delete(string $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('user.index')->with('success', 'Xóa banner thành công!');
        }

        return redirect()->route('user.index')->with('error', 'Không tìm thấy banner!');
    }

    public function restore(string $id)
    {
        $user = User::withTrashed()->where('id', $id);
        if ($user->first() != null) {
            $user->restore();
            return redirect()->route('user.trash')->with('success', 'Xóa banner thành công!');
        }

        return redirect()->route('user.trash')->with('error', 'Không tìm thấy banner!');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User();
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->fullname = $request->fullname ?? '';
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->roles = $request->roles;
        $user->status = $request->status;

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/user'), $filename);
            $user->thumbnail = $filename;
        } else {
            $user->thumbnail = 'default-thumbnail.jpg';
        }

        $user->created_by = Auth::id() ?? 1; // Gán ID người tạo
        $user->save();

        return redirect()->route('user.index')->with('success', 'Thêm người dùng thành công!');
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
        $user = User::withTrashed()->where('id', $id)->first();
        if ($user != null) {
            if ($user->image && File::exists(public_path("images/user/" . $user->image))) {
                File::delete(public_path("images/user/" . $user->image));
            }
            $user->forceDelete();

            return redirect()->route("user.trash")
                ->with('success', 'xoa thanh cong');
        }
        return redirect()->route('user.trash')->with('error', 'mẫu tin không còn tồn tại');
    }
}
