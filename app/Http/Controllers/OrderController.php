<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\User;


class OrderController extends Controller
{
    // Hàm hiển thị danh sách các đơn hàng
    public function index()
    {
        // Lấy thông tin admin (giả sử id=1 là admin)
        $adminUser = User::find(1);

        // Lấy tất cả dữ liệu từ bảng order_detail, cùng với thông tin user và product
        $orders = OrderDetail::with('user', 'product')->get();

        // Trả về view cùng với dữ liệu
        return view('backend.layouts.orderManager', [
            'userName' => $adminUser->name,
            'orders' => $orders
        ]);
    }

    
}
