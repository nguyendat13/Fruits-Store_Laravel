<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{


    // Đăng nhập
    public function login()
    {
        // Kiểm tra nếu người dùng đã đăng nhập thì không cho phép vào lại trang login
        if (Auth::check()) {
            return redirect()->route('site.profile')->with('info', 'Bạn đã đăng nhập rồi.');
        }
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
            // Kiểm tra nếu tài khoản đang bị khóa
            if ($user->locked_until && now()->lt($user->locked_until)) {
                return redirect()->route('site.login')->withErrors(['email' => 'Tài khoản của bạn đang bị khóa. Vui lòng thử lại sau ' . $user->locked_until->diffInSeconds(now()) . ' giây.']);
            }

            // Nếu tài khoản không bị khóa, reset lại số lần đăng nhập sai và thời gian khóa
            $user->update([
                'login_attempts' => 0,
                'locked_until' => null,
            ]);

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
                // Mật khẩu không đúng, tăng số lần thử
                $user->increment('login_attempts');

                // Kiểm tra nếu số lần thử đăng nhập sai lớn hơn 5
                if ($user->login_attempts >= 5) {
                    // Khóa tài khoản trong 30 giây
                    $user->update([
                        'locked_until' => now()->addSeconds(30), // Khóa tài khoản trong 30 giây
                    ]);
                    return redirect()->route('site.login')->withErrors(['email' => 'Tài khoản của bạn đã bị khóa sau 5 lần đăng nhập sai.']);
                }

                // Mật khẩu không đúng
                return redirect()->route('site.login')->withErrors(['password' => 'Mật khẩu không đúng.']);
            }
        } else {
            // Email hoặc username không tồn tại
            return redirect()->route('site.login')->withErrors(['email' => 'Tài khoản không tồn tại.']);
        }
    }



    // Đăng ký
    public function register()
    {
        return view('frontend.register'); // Hiển thị form đăng ký
    }

    public function doregister(StoreUserRequest  $request)
    {
        // try {
        //     if (User::where('email', $request->email)->exists()) {
        //         return back()->withErrors(['email' => 'Email đã tồn tại, vui lòng chọn email khác.'])->withInput();
        //     }
        //     // Tạo người dùng mới
        //     $user = User::create([
        //         'name' => $request->name,
        //         'email' => $request->email,
        //         'phone' => $request->phone,
        //         'address' => $request->address,
        //         'gender' => $request->gender,
        //         'password' => Hash::make($request->password),
        //         'roles' => 'customer',
        //         'status' => $request->status,
        //     ]);

        //     // Đăng nhập ngay sau khi tạo tài khoản
        //     Auth::login($user);

        //     return redirect()->route('site.login')->with('success', 'Đăng ký thành công!');
        // } catch (\Exception $e) {
        //     return back()->withErrors(['error' => 'Có lỗi xảy ra khi đăng ký. Vui lòng thử lại!'])->withInput();
        // }

        $user = new User();

        $user->name = $request->name;
        if (!empty($request->password)) {
            $user->password = bcrypt($request->password); // Mã hóa mật khẩu
        }
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->roles = 'customer';
        $user->status = 2;

        $user->created_by = Auth::id() ?? 1; // Gán ID người tạo
        $user->save();
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

    public function updateProfile(Request $request, $id)
    {
        // Kiểm tra xem người dùng có đăng nhập hay không
        if (!Auth::check()) {
            return redirect()->route('site.login')->with('warning', 'Vui lòng đăng nhập để cập nhật thông tin.');
        }

        // Kiểm tra người dùng tồn tại
        $user = User::find($id);  // Dùng `find` thay vì `where` để lấy đối tượng trực tiếp
        if (!$user) {
            return redirect()->route('site.profile')->with('error', 'Người dùng không tồn tại.');
        }

        // Cập nhật thông tin người dùng
        $user->name = $request->name;
        if ($request->password) {
            $user->password = bcrypt($request->password);  // Mã hóa mật khẩu mới
        }
        $user->fullname = $request->fullname;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->roles = $request->roles;

        $user->updated_by = Auth::id() ?? 1;
        $user->updated_at = now();  // Dùng `now()` để lấy thời gian hiện tại
        $user->status = 2;
        $user->save();

        return redirect()->route('site.profile')->with('success', 'Cập nhật thông tin thành công!');
    }

    public function updatePassword(Request $request, $id)
    {
        // Kiểm tra xem người dùng có đăng nhập hay không
        if (!Auth::check()) {
            return redirect()->route('site.login')->with('warning', 'Vui lòng đăng nhập để thay đổi mật khẩu.');
        }

        // Lấy thông tin người dùng
        $user = User::find($id);  // Dùng `find` để lấy người dùng
        if (!$user) {
            return redirect()->route('site.profile')->with('error', 'Người dùng không tồn tại.');
        }

        // Validate dữ liệu đầu vào
        $request->validate([
            'oldPassword' => 'required|string',
            'newPassword' => 'required|string|min:6|confirmed',  // Xác nhận mật khẩu
        ]);

        // Kiểm tra mật khẩu cũ có đúng không
        if (!Hash::check($request->oldPassword, $user->password)) {
            return back()->withErrors(['oldPassword' => 'Mật khẩu cũ không đúng.']);
        }

        // Kiểm tra mật khẩu mới có hợp lệ không
        if ($request->newPassword == $request->oldPassword) {
            return back()->withErrors(['newPassword' => 'Mật khẩu mới không được trùng với mật khẩu cũ.']);
        }

        // Cập nhật mật khẩu mới
        try {
            $user->password = Hash::make($request->newPassword);
            $user->save();
            // Đăng xuất người dùng ngay sau khi thay đổi mật khẩu thành công
            Auth::logout();
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Có lỗi xảy ra khi lưu mật khẩu: ' . $e->getMessage()]);
        }

        return redirect()->route('site.login')->with('success', 'Thay đổi mật khẩu thành công!');
    }
}
