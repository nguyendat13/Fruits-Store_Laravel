<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    function index()
    {
        // Thông tin liên hệ
        $contactInfo = [
            'address' => '123 Đường ABC, Thành phố XYZ, Việt Nam',
            'phone' => '+84 123 456 789',
            'email' => 'info@yourcompany.com',
        ];

        // Truyền dữ liệu sang view
        return view('frontend.contact.contact', compact('contactInfo'));
    }
    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|max:15',
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $contact = new Contact();
        $contact->user_id = Auth::id() ?? 0; // Gán giá trị 0 nếu không có người dùng đăng nhập
        $contact->name = $validated['name'];
        $contact->email = $validated['email'];
        $contact->phone = $validated['phone'];
        $contact->title = $validated['title'];
        $contact->content = $validated['content'];
        $contact->created_by = Auth::id() ?? 0; // Sử dụng Auth::id() hoặc giá trị mặc định
        $contact->status = 0; // Mặc định chưa xử lý
        $contact->save();

        return redirect()->route('frontend.contact.contact')->with('success', 'Tin nhắn của bạn đã được gửi thành công! Chúng tôi sẽ phản hồi sớm nhất.');
    }
}
