<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Xác định xem người dùng có quyền thực hiện request này hay không.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Định nghĩa các rules cho validation.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];
    }

    /**
     * Tùy chỉnh thông báo lỗi.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không hợp lệ.Ví dụ abc@gmail.com',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
        ];
    }

    
}
