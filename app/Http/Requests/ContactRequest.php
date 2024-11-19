<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Cho phép mọi người gửi yêu cầu
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|regex:/^[0-9]{10}$/',
            'message' => 'required|string|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên của bạn.',
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Vui lòng nhập đúng định dạng email.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.regex' => 'Số điện thoại phải gồm 10 chữ số.',
            'message.required' => 'Vui lòng nhập nội dung liên hệ.',
        ];
    }
}
