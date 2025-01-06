<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('site.login')->with('warning', 'Vui lòng đăng nhập để truy cập!');
        }

        $user = Auth::user();

        // Kiểm tra quyền của người dùng
        if ($user->roles !== 'customer') {
            return redirect()->route('admin.home')->with('error', 'Bạn không có quyền truy cập!');
        }

        return $next($request);
    }
}
