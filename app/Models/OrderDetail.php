<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    // Đặt tên bảng nếu không sử dụng bảng theo chuẩn
    protected $table = 'order_detail'; 

    // Các trường có thể gán giá trị hàng loạt
    protected $fillable = [
        'id',
        'user_id',
        'product_id',
        'order_id',
        'total_price',
        'qty',
        'status',
        'created_at',
    ];

    // Nếu bạn không cần sử dụng timestamps thì có thể bỏ qua
    public $timestamps = false;

    // Định nghĩa mối quan hệ với model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Định nghĩa mối quan hệ với model Product
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }
}
