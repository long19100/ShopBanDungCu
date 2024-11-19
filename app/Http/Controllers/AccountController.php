<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function show()
    {
        return view('account.show'); // Chỉ định view cho trang thông tin tài khoản
    }
}

