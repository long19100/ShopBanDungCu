<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Products;

class ProductController extends Controller
{
    public function index()
    {
        $adminUser = User::find(1);
        $categories = Category::all();

        return view('backend.layouts.product', [
            'userName' => $adminUser->name,
            'categories' => $categories
        ]);
    }

    public function showAll(Request $request)
    {
        $adminUser = User::find(1);
        $products = Products::all(); // Lấy tất cả sản phẩm

        // Kiểm tra nếu không có sản phẩm nào
        if ($products->isEmpty()) {
            return redirect()->route('products.all')->with('error', 'Không có sản phẩm nào!');
        }

        return view('backend.layouts.allproduct', [
            'products' => $products,
            'userName' => $adminUser->name,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products',
            'small_description' => 'required|string',
            'description' => 'nullable|string',
            'original_price' => 'required|numeric|max:2000000',
            'selling_price' => 'required|numeric|max:2000000',
            'qty' => 'required|integer|min:1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $products = new Products(); // Tạo một sản phẩm mới
        $products->name = $request->name;
        $products->slug = $request->slug;
        $products->category_id = $request->category_id;
        $products->small_description = $request->small_description;
        $products->description = $request->description;
        $products->original_price = $request->original_price;
        $products->selling_price = $request->selling_price;
        $products->qty = $request->qty;
        $products->created_at = now();

        // Xử lý file hình ảnh
        if ($request->hasFile('image')) {
            $imageName = $request->image->getClientOriginalName();
            $request->image->move(public_path('img'), $imageName);
            $products->image = $imageName; // Sửa thành $products
        }

        $products->save(); // Lưu sản phẩm

        return redirect()->route('product.create')->with('success', 'Sản phẩm đã được thêm thành công!');
    }

    public function destroy($id)
    {
        // Tìm sản phẩm theo ID
        $products = Products::find($id);

        if (!$products) {
            return redirect()->route('products.all')->with('error', 'Sản phẩm không tồn tại!');
        }

        $products->delete(); // Xóa sản phẩm

        return redirect()->route('products.all')->with('success', 'Sản phẩm đã được xóa thành công!');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Tìm kiếm sản phẩm dựa trên tên và phân trang kết quả
        $products = Products::where('name', 'LIKE', '%' . $query . '%')->paginate(8);

        return view('frontend.home', [
            'products' => $products,
        ]);
    }
    public function edit($id)
    {
        $userName = User::where('role_as', 1)->value('name');
        $products = Products::find($id);
    
        if (!$products) {
            return redirect()->route('product.all')->with('error', 'Sản phẩm không tồn tại!');
        }
    
        return view('backend.layouts.editProduct', compact('products', 'userName'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug,' . $id,
            'small_description' => 'required|string',
            'description' => 'nullable|string',
            'original_price' => 'required|numeric|max:2000000',
            'selling_price' => 'required|numeric|max:2000000',
            'qty' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        $product = Products::findOrFail($id);
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->small_description = $request->small_description;
        $product->description = $request->description;
        $product->original_price = $request->original_price;
        $product->selling_price = $request->selling_price;
        $product->qty = $request->qty;

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('img'), $imageName);
            $product->image = $imageName;
        }
    
        $product->save();

        return redirect()->route('product.all')->with('success', 'Sản phẩm đã được cập nhật thành công!');
    }
}


