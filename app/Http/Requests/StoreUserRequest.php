<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:6|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            'address' => 'required|max:255',
            'gender' => 'required|in:male,female,other',
            'password' => 'required|min:6|confirmed',
            'status' => 'required|in:0,1,2', // Chấp nhận giá trị 0, 1, 2 cho status
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Ten bat buoc nhap.',
            'name.min' => 'Tên quá ngắn phải 6 ký tự trở lên.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',

            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã tồn tại, vui lòng chọn email khác.',

            'phone.required' => 'Số điện thoại là bắt buộc.',
            'phone.numeric' => 'Số điện thoại phải là số.',

            'address.required' => 'Địa chỉ là bắt buộc.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',

            'gender.required' => 'Vui lòng chọn giới tính.',
            'gender.in' => 'Giới tính không hợp lệ.',

            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.min' => 'Mật khẩu quá yếu.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
        ];
    }
}
