<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Đặt tên bảng nếu không sử dụng bảng theo chuẩn
    protected $table = 'categories'; // Nếu bảng của bạn không có tên mặc định là categories thì bỏ qua dòng này

    // Các trường có thể gán giá trị hàng loạt
    protected $fillable = [
        'id',
        'name',
        'slug',
        'description',
        'status',
        'image',
        'created_at',
    ];

    // Nếu bạn không cần sử dụng timestamps thì có thể bỏ qua
    public $timestamps = false; // Mặc định là true

    // Bạn có thể thêm các phương thức hoặc quan hệ ở đây nếu cần
}
