<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        // Lấy danh sách đơn hàng của người dùng hiện tại, kèm theo thông tin khách hàng và chi tiết đơn hàng
        $orders = Order::with(['user', 'orderDetails.product'])
            ->where('user_id', Auth::id())
            ->get()
            ->map(function ($order) {
                // Tính tổng tiền từ orderDetails (nếu có)
                $order->total_amount = $order->orderDetails ? $order->orderDetails->sum('amount') : 0;
                return $order;
            });

        return view('frontend.order', compact('orders'));
    }

    public function cancelOrder($orderId)
    {
        $order = Order::findOrFail($orderId);

        // Kiểm tra trạng thái đơn hàng trước khi hủy
        if ($order->status == 1) {
            $order->status = 0; // Đánh dấu đơn hàng là đã hủy (hoặc trạng thái hủy tương ứng)
            $order->delete();
            $order->save();
            // Bạn có thể thêm thông báo thành công
            return redirect()->route('site.order')->with('status', 'Đơn hàng đã được hủy thành công!');
        }

        // Nếu đơn hàng không thể hủy, trả về thông báo lỗi
        return redirect()->route('site.order')->with('error', 'Không thể hủy đơn hàng này!');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        $order = Order::findOrFail($id);

        // Kiểm tra quyền chỉnh sửa (người dùng chỉ được sửa đơn hàng của họ)
        if ($order->user_id !== Auth::id()) {
            return redirect()->route('site.order')->with('error', 'Bạn không có quyền chỉnh sửa đơn hàng này.');
        }

        // Cập nhật thông tin
        $order->user->address = $request->address;
        $order->user->phone = $request->phone;
        $order->user->save();

        return redirect()->route('site.order')->with('status', 'Thông tin đơn hàng đã được cập nhật.');
    }
}
