<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name'=>'required',
            'thumbnail'=>'required|image|mimes:jpeg,png,jpg,gif,webp',
        ];

    }
    public function messages():array
    {
        return [
            'name.required'=>'Ten bat buoc nhap.',
            'thumbnail.required'=>'Vui long chon 1 hinh anh.',
            'thumbnail.image'=>'Tep tai len phai la mot hinh anh.',
            'thumbnail.mimes'=>'Hinh anh phai thuoc cac dinh dang: jpeg,png,jpg,gid,webp.',
        ];
    }
}
