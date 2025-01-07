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


    public function dologin(Request $request)
    {
        // Xác thực thông tin đầu vào
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $email = $request->email;
        $password = $request->password;
        $args = [
            ['status', '=', 2], // Chỉ cho phép người dùng có trạng thái hoạt động
        ];

        // Kiểm tra xem đầu vào là email hay username
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $args[] = ['email', '=', $email];
        } else {
            $args[] = ['username', '=', $email];
        }

        $user = User::where($args)->first();

        if ($user) {
            // Kiểm tra mật khẩu
            if (Hash::check($password, $user->password)) {
                // Kiểm tra quyền của người dùng
                if ($user->roles !== 'customer' && $user->status !== 2) {
                    return redirect()->back()->withErrors(['email' => 'Bạn không có quyền truy cập với vai trò hiện tại.']);
                }

                // Lưu thông tin vào session
                Auth::login($user, $request->has('remember'));

                // Chuyển hướng đến trang profile
                return redirect()->route('site.profile')->with('success', 'Đăng nhập thành công!');
            } else {
                // Mật khẩu không đúng
                return redirect()->route('site.login')->withErrors(['password' => 'Mật khẩu không đúng.']);
            }
        } else {
            // Email hoặc username không tồn tại
            return redirect()->route('site.login')->withErrors(['email' => 'Tên đăng nhập hoặc email không tồn tại.']);
        }
    }

    // Đăng ký
    public function register()
    {
        return view('frontend.register'); // Hiển thị form đăng ký
    }

    public function doregister(Request $request)
    {
        // Xác thực dữ liệu
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            'address' => 'required|max:255',
            'gender' => 'required|in:male,female,other',
            'password' => 'required|min:6|confirmed',
        ]);

        // Tạo người dùng mới
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'gender' => $validated['gender'],
            'password' => Hash::make($validated['password']),
            'roles' => 'customer', // Mặc định là customer
            'status' => 2, // Mặc định là customer
        ]);

        // Đăng nhập ngay sau khi tạo tài khoản
        Auth::login($user);

        return redirect()->route('site.login')->with('success', 'Đăng ký thành công!');
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
