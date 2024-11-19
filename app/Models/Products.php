<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    // Đặt tên bảng nếu không sử dụng bảng theo chuẩn
    protected $table = 'products'; // Nếu bảng của bạn không có tên mặc định là categories thì bỏ qua dòng này

    // Các trường có thể gán giá trị hàng loạt
    protected $fillable = [
        'id',
        'category_id',
        'name',
        'slug',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'image',
        'qty',
        'created_at',
    ];

    // Nếu bạn không cần sử dụng timestamps thì có thể bỏ qua
    public $timestamps = false; // Mặc định là true

    //Phương thức quan hệ voi bảng Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
