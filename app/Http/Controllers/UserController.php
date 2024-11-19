<?php
namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
{
    // Lấy thông tin người dùng hiện tại
    $adminUser = User::find(1);
    $users = User::all();

    // Trả về view và truyền dữ liệu
    return view('backend.layouts.manage', [
        'users' => $users,
        'userName' => $adminUser->name,
    ]);
}

    
}


?>