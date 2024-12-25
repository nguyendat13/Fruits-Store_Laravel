<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Ten bat buoc nhap.',
            'image.required' => 'Vui long chon 1 hinh anh.',
            'image.image' => 'Tep tai len phai la mot hinh anh.',
            'image.mimes' => 'Hinh anh phai thuoc cac dinh dang: jpeg,png,jpg,gid,webp.',
        ];
    }
}
