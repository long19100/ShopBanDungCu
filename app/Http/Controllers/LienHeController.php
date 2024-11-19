<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest; 
use App\Models\LienHe; 
use App\Models\User;

class LienHeController extends Controller
{
    // Hàm hiển thị trang liên hệ
    public function showContactForm()
    {
        return view('frontend.lienhe'); 
    }

    // Hàm xử lý lưu thông tin liên hệ
    public function submitContactForm(ContactRequest $request) 
    {
        // Tạo bản ghi liên hệ mới
        $lienHe = new LienHe();
        $lienHe->name = $request->name;
        $lienHe->email = $request->email;
        $lienHe->phone = $request->phone;
        $lienHe->message = $request->message;
        $lienHe->save();

        // Chuyển hướng kèm thông báo thành công
        return redirect()->back()->with('success', 'Thông tin liên hệ của bạn đã được gửi thành công!');
    }

    // Hàm hiển thị danh sách tất cả người liên hệ
    public function showAllContacts()
    {
        // Lấy tên của admin có role_as = 1
        $userName = User::where('role_as', 1)->value('name'); 
        
        // Lấy tất cả bản ghi từ bảng lienhe
        $contacts = LienHe::all(); 
        
        // Trả về view cùng với dữ liệu
        return view('backend.layouts.lienhe', compact('contacts', 'userName')); 
    }
}
