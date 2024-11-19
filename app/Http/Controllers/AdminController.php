<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\OrderDetail;
class AdminController extends Controller
{
    public function index()
{
    // Kiểm tra xem người dùng đã đăng nhập chưa
    if (!Auth::check()) {
        return redirect('/login')->with('error', 'Bạn cần đăng nhập để truy cập trang này.');
    }

    // Kiểm tra xem người dùng có role_as là admin (1)
    if (Auth::user()->role_as != 1) {
        return redirect('/login')->with('error', 'Bạn không có quyền truy cập trang này.');
    }

    // Nếu là admin, kiểm tra nếu cố gắng truy cập lại trang login
    if (request()->url() == route('login')) {
        return redirect('/admin')->with('error', 'Bạn đã đăng nhập rồi, không thể truy cập trang đăng nhập.');
    }

    // Nếu là admin, lấy thông tin người dùng
    $adminUser = User::find(1);
    $totalUsers = User::count();
    $totalProduct = Products::count();
    $totalOrder = OrderDetail::count();

    return view('backend.layouts.admin', [
        'userName' => $adminUser->name,
        'totalUsers' => $totalUsers,
        'totalOrder' => $totalOrder,
        'totalProduct' => $totalProduct,
    ]);
}

   

}
