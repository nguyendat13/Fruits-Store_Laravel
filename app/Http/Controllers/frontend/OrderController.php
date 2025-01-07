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
        // Lấy danh sách đơn hàng của người dùng hiện tại
        $orders = Order::where('user_id', Auth::id())->get();

        foreach ($orders as $order) {
            $order->total_amount = OrderDetail::where('order_id', $order->id)->sum('amount');
        }

        // Lấy chi tiết đơn hàng của từng đơn hàng
        $orderDetails = OrderDetail::whereIn('order_id', $orders->pluck('id'))->get(); // Lấy chi tiết của tất cả các đơn hàng của người dùng

        return view('frontend.order', compact('orders', 'orderDetails'));
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
}
