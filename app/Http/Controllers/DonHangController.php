<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;

use Illuminate\Support\Facades\Auth;


class DonHangController extends Controller
{
    // Hàm hiển thị danh sách các đơn hàng
    public function index()
    {
        // Lấy tất cả đơn hàng của người dùng hiện tại
        $orders = OrderDetail::with('product') // Liên kết với bảng products
            ->where('user_id', Auth::id()) // Chỉ lấy đơn hàng của user hiện tại
            ->get();

        // Truyền dữ liệu qua view
        return view('frontend.donhang', compact('orders'));
    }
}
