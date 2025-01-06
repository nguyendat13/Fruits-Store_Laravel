<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    // Đăng nhập
    public function login()
    {
        $isLoggedIn = Auth::check();

        return view('frontend.login'); // Hiển thị form đăng nhập
    }

    // public function dologin(Request $request)
    // {
    //     $email = $request->email;
    //     $password = $request->password;
    //     $args = [
    //         ['status', '=', 1],
    //     ];
    //     if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //         $args[] = ['email', '=', $email];
    //     } else {
    //         $args[] = ['username', '=', $email];
    //     }
    //     $user = User::where($args)->first();
    //     if ($user != null) {
    //         if (Hash::check($password, $user->password)) {
    //             session()->put('user_site', $user);
    //             return redirect()->route('frontend.home')->with('success', 'dang nhap thanh cong');
    //         } else {
    //             return redirect()->route('site.login')->with('error', 'mat khau không dung');
    //         }
    //     } else {
    //         return redirect()->route('site.login')->with('error', 'ten dang nhap hoac email khong ton tai');
    //     }
    // }
    public function dologin(Request $request)
    {
        // Xác thực thông tin đăng nhập
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($validated, $request->has('remember'))) {
            $user = Auth::user();

            // Kiểm tra role
            if ($user->roles !== 'customer') {
                Auth::logout(); // Đăng xuất nếu không phải role customer
                return redirect()->back()
                    ->withErrors(['email' => 'Bạn không có quyền truy cập với vai trò hiện tại.']);
            }

            // Đăng nhập thành công, chuyển hướng
            return redirect()->route('site.profile');
        }

        // Nếu xác thực thất bại
        return redirect()->back()->withErrors(['email' => 'Email hoặc mật khẩu không đúng.']);
    }

    // Đăng ký
    public function register()
    {
        return view('site.register'); // Hiển thị form đăng ký
    }

    public function doregister(Request $request)
    {
        // Kiểm tra dữ liệu form
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'name' => 'required|max:255',
        ]);

        // Tạo người dùng mới
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user); // Đăng nhập ngay sau khi tạo tài khoản

        return redirect()->route('site.profile'); // Redirect tới trang thông tin người dùng
    }

    // Đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect()->route('site.login'); // Redirect về trang đăng nhập sau khi đăng xuất
    }

    // Xem thông tin người dùng
    public function profile()
    {
        if (!Auth::check()) {
            return redirect()->route('site.login')->with('warning', 'Vui lòng đăng nhập để xem thông tin.');
        }

        $user = Auth::user(); // Lấy thông tin người dùng đã đăng nhập
        return view('frontend.profile', compact('user')); // Truyền dữ liệu vào view
    }
}
