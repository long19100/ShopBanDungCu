<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class HomeController extends Controller
{
    public function index()
    {
        $products = Products::paginate(16);
        return view('frontend.home', compact('products'));
    }

    // Hiển thị nguyên liệu
    public function showIngredient()
    {
        $products = Products::where('category_id', 2)->paginate(16);
        return view('frontend.home', compact('products'));
    }

    // Hiển thị dụng cụ
    public function showTools()
    {
        $products = Products::where('category_id', 1)->paginate(16);
        return view('frontend.home', compact('products'));
    }

    // Hiển thị khuôn khay 
    public function showTray()
    {
        $products = Products::where('category_id', 3)->paginate(16);
        return view('frontend.home', compact('products'));
    }

    // Hiển thị túi, hộp
    public function showBox()
    {
        $products = Products::where('category_id', 4)->paginate(16);
        return view('frontend.home', compact('products'));
    }

    public function allProduct()
    {
        $products = Products::paginate(16);
        return view('frontend.home', compact('products'));
    }

    public function show($id)
    {
        $product = Products::find($id);

        if (!$product) {
            return abort(404, 'Sản phẩm không tồn tại.');
        }

        $category = Category::find($product->category_id);

        return view('frontend.product', compact('product', 'category'));
    }

    
    
}
