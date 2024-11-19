<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class AuthController extends Controller
{
    // Hiển thị form đăng nhập
    public function index()
    {
        if (Auth::check()) {
            // Nếu người dùng là admin, chuyển hướng đến trang admin
            if (Auth::user()->role_as == 1) {
                return redirect()->route('admin');
            }
            
            // Nếu người dùng là người dùng thường, chuyển hướng đến trang home
            return redirect()->intended('/');
        }
    
        // Nếu chưa đăng nhập, hiển thị trang đăng nhập
        return view('login');
    }

    // Xử lý đăng nhập
    public function login(LoginRequest $request) 
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            if ($user->role_as == 1) {
                return redirect()->route('admin')->with('success', 'Đăng nhập thành công!');
            }
    
            // Trả về view với thông báo thành công
            return redirect()->intended('/')->with('success', 'Đăng nhập thành công!');
        }
    
        return back()->withErrors([
            'error' => 'Email hoặc mật khẩu không đúng',
        ])->withInput();
    }
    

    public function logout(Request $request)
    {
        Auth::logout(); // Đăng xuất người dùng
        $request->session()->invalidate(); // Xóa session
        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect('/login')->with('success', 'Bạn đã đăng xuất thành công.');
    }
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(RegisterRequest $request)
    {
        // Xác thực dữ liệu đầu vào
        $validatedData = $request->validated();

        // Tạo người dùng mới
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->address = $validatedData['address'];
        $user->phone = $validatedData['phone'];
        $user->password = bcrypt($validatedData['password']); // Mã hóa mật khẩu
        $user->role_as = 0; // Gán role_as mặc định
        $user->created_at = now();

        // Lưu người dùng vào cơ sở dữ liệu
        $user->save();

        // Đăng nhập người dùng mới
        Auth::login($user);

        // Chuyển hướng đến trang đăng nhập với thông báo thành công
        return redirect()->route('login.index')->with('success', 'Đăng ký thành công! Bạn có thể đăng nhập.');
    }
}
