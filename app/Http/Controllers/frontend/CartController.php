<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Hiển thị giỏ hàng
    public function index()
    {
        $cart = session()->get('cart', []);
        $totalPrice = 0;

        // Tính tổng số tiền giỏ hàng
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['qty'];
        }

        return view("frontend.cart", compact('cart', 'totalPrice'));
    }


    // In GiohangController

    public function getCartCount()
    {
        $cart = session()->get('cart', []);
        $totalQty = 0; // Tổng số lượng sản phẩm

        foreach ($cart as $item) {
            $totalQty += $item['qty']; // Cộng dồn số lượng của từng sản phẩm
        }

        return response()->json(['count' => $totalQty]);
    }


    // Thêm sản phẩm vào giỏ hàng
    public function addcart($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
        }

        $cart = session()->get('cart', []);
        $qty = (isset($cart[$id])) ? ($cart[$id]['qty'] + 1) : 1;

        $cart[$id] = [
            'name' => $product->name,
            'price' => $product->price_buy,
            'qty' => $qty,
            'thumbnail' => $product->thumbnail
        ];

        session()->put('cart', $cart);

        // Cập nhật số lượng giỏ hàng bằng cách tính số lượng từ giỏ hàng
        $totalQty = 0;
        foreach ($cart as $item) {
            $totalQty += $item['qty']; // Tính tổng số lượng
        }
        session()->put('cart_count', $totalQty); // Cập nhật số lượng vào session
        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng');
    }

    // Cập nhật giỏ hàng
    public function updatecart(Request $request)
    {
        $cart = session()->get('cart', []);
        $qty = $request->qty; // Lấy dữ liệu số lượng từ request

        foreach ($qty as $id => $n) {
            if (isset($cart[$id])) {
                $cart[$id]['qty'] = max(1, $n); // Đảm bảo số lượng tối thiểu là 1
            }
        }

        session()->put('cart', $cart);
        session()->put('cart_count', count($cart));

        return redirect()->back()->with('success', 'Giỏ hàng đã được cập nhật');
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function delcart($id = null)
    {
        if ($id === null) {
            session()->forget('cart');
            session()->forget('cart_count');
        } else {
            $cart = session()->get('cart', []);
            if (array_key_exists($id, $cart)) {
                unset($cart[$id]);
            }
            session()->put('cart', $cart);
            session()->put('cart_count', count($cart));
        }

        return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng');
    }
    public function procced()
    {

        $cart = session()->get('cart', []);
        $total = 0;
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Giỏ hàng của bạn trống. Vui lòng thêm sản phẩm.');
        }
        foreach ($cart as $item) {
            $total += $item['qty'] * $item['price'];
        }
        return view("frontend.procced", compact('total'));
    }
    // Thanh toán
    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Giỏ hàng của bạn trống. Vui lòng thêm sản phẩm trước khi thanh toán.');
        }

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để thanh toán.');
        }

        $user = Auth::user();
        $order = new Order();
        $order->user_id = $user->id;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->created_by = $user->id;
        $order->created_at = date('Y-m-d H:i:s');
        $order->status = 1; // Đang xử lý
        $order->save();

        foreach ($cart as $id => $item) {
            $orderdetail = new OrderDetail();
            $orderdetail->order_id = $order->id;
            $orderdetail->product_id = $id;
            $orderdetail->qty = $item['qty'];
            $orderdetail->price = $item['price'];
            $orderdetail->amount = $item['qty'] * $item['price'];
            $orderdetail->save();
        }

        session()->forget('cart');
        session()->forget('cart_count');

        return redirect()->route('site.thanks')->with('success', 'Đặt hàng thành công!');
    }

    // Trang cảm ơn sau thanh toán
    public function thanks()
    {
        return view('frontend.thanks');
    }
}
