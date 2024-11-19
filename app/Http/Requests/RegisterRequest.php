<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'address' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'password' => 'required|string|min:6|confirmed', // 'confirmed' yêu cầu trường password_confirmation
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
            'name.required' => 'Vui lòng nhập tên.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã tồn tại.',
            'address.required' => 'Vui lòng nhập địa chỉ.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
        ];
    }
}
