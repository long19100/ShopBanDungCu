<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;

class CategoryController extends Controller
{
    // Hiển thị form thêm danh mục
    public function index()
    {
        $adminUser = User::where('role_as', 1)->first();

        return view('backend.layouts.categories', [
            'userName' => $adminUser->name ?? 'Admin'
        ]);
    }

    public function showAll()
    {
        // Lấy tất cả danh mục từ cơ sở dữ liệu
        $categories = Category::all();
        $adminUser = User::where('role_as', 1)->first();

        // Trả về view với danh sách danh mục
        return view('backend.layouts.allCategories', [
            'categories' => $categories,
            'userName' => $adminUser->name ?? 'Admin',
        ]);
    }

    // Xử lý lưu danh mục
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'created_at' => 'nullable|date',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->created_at = now();

        // Xử lý file hình ảnh
        if ($request->hasFile('image')) {
            $imageName = $request->image->getClientOriginalName(); // Lấy tên gốc của file
            // Di chuyển file vào thư mục public/img
            $request->image->move(public_path('img'), $imageName);
            $category->image = $imageName; // Gán tên file vào trường image của category
        }

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Danh mục đã được thêm thành công!');
    }

    public function destroy($id)
    {
        // Tìm danh mục theo ID
        $category = Category::find($id);

        // Nếu danh mục không tồn tại, trả về thông báo lỗi
        if (!$category) {
            return redirect()->route('categories.all')->with('error', 'Danh mục không tồn tại!');
        }

        // Xóa danh mục
        $category->delete();

        return redirect()->route('categories.all')->with('success', 'Danh mục đã được xóa thành công!');
    }

    public function edit($id)
    {
        $userName = User::where('role_as', 1)->value('name');
        $category = Category::findOrFail($id);
        
        return view('backend.layouts.editCategories', compact('category', 'userName'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('img'), $imageName);
            $category->image = $imageName;
        }

        $category->save();

        return redirect()->route('categories.all')->with('success', 'Danh mục đã được cập nhật thành công!');
    }
}
