<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    // Hiển thị trang đăng nhập
    public function login()
    {
        return view("backend.user.login");
    }

    // Xử lý đăng nhập
    public function dologin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        // Kiểm tra nếu người dùng nhập thiếu thông tin
        if (empty($email) || empty($password)) {
            return redirect()->route('admin.login')->with('error', 'Vui lòng điền đầy đủ thông tin.');
        }

        // Ghi lại dữ liệu đăng nhập để debug
        Log::info('Login attempt with email:', ['email' => $email]);

        // Kiểm tra email trong cơ sở dữ liệu
        $user = User::where('email', $email)->first();

        // Kiểm tra nếu người dùng không tồn tại
        if (!$user) {
            return redirect()->route('admin.login')->with('error', 'Email không tồn tại');
        }

        // Kiểm tra trạng thái người dùng, nếu không hoạt động thì không cho đăng nhập
        if ($user->status == 0) {
            return redirect()->route('admin.login')->with('error', 'Tài khoản của bạn đã bị khóa');
        }

        // Kiểm tra đăng nhập với Auth::attempt
        $data_login = [
            'email' => $email,
            'password' => $password,
        ];

        // Kiểm tra đăng nhập
        if (Auth::attempt($data_login)) {
            // Nếu đăng nhập thành công, chuyển đến trang quản trị
            Log::info('Login successful for email:', ['email' => $email]);
            return redirect()->route('dashboard.index');
        }

        // Nếu đăng nhập thất bại, hiển thị lỗi
        Log::warning('Login failed for email:', ['email' => $email]);
        return redirect()->route('admin.login')->with('error', 'Thông tin không chính xác');
    }



    // Xử lý đăng xuất
    public function logout()
    {
        Auth::logout(); // Đăng xuất người dùng
        return redirect()->route('admin.login'); // Quay lại trang đăng nhập
    }
}
