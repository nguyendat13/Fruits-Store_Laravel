<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    // Hiển thị trang đăng nhập
    public function login()
    {
        return view('backend.user.login');
    }

    // Xử lý đăng nhập
    public function dologin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Kiểm tra đăng nhập
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Kiểm tra quyền admin
            if ($user->roles !== 'admin' && $user->status !== 1) {
                Auth::logout();
                return redirect()->route('admin.login')->with('error', 'Bạn không có quyền truy cập.');
            }

            Log::info('Admin logged in:', ['email' => $user->email]);
            return redirect()->route('dashboard.index')->with('success', 'Đăng nhập thành công.');
        }

        return redirect()->route('admin.login')->with('error', 'Email hoặc Mật khẩu không chính xác.');
    }

    // Xử lý đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with('success', 'Đăng xuất thành công.');
    }
}
