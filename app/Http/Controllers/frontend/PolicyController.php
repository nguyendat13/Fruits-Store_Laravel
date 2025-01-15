<?php

namespace App\Http\Controllers\Frontend;  // Chỉ sử dụng namespace này thôi
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class PolicyController extends Controller
{

    // Chính sách vận chuyển
    public function shippingPolicy()
    {
        return view('frontend.policies.shipping-policy');
    }

    // Chính sách đổi trả
    public function returnPolicy()
    {
        return view('frontend.policies.return-policy');
    }

    // Chính sách thanh toán
    public function paymentPolicy()
    {
        return view('frontend.policies.payment-policy');
    }

    public function supportPolicy()
    {
        return view('frontend.policies.support-policy');
    }
}
