<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LienHeController;
use App\Models\Products;
use Illuminate\Support\Facades\Route;

// Route for home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/danhmuc/nguyenlieulambanh/', [HomeController::class, 'showIngredient'])->name('nguyenlieu');
Route::get('/danhmuc/dungculambanh/', [HomeController::class, 'showTools'])->name('dungcu');
Route::get('/danhmuc/khuonkhaylambanh/', [HomeController::class, 'showTray'])->name('khuonkhay');
Route::get('/danhmuc/tuihopcoclo/', [HomeController::class, 'showBox'])->name('tuihop');
Route::get('/danhmuc/tatcasanpham', [HomeController::class, 'allProduct'])->name('tatcasanpham');
Route::get('/sanpham/{id}', [HomeController::class, 'show'])->name('sanpham');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.view');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add'); // Thêm sản phẩm vào giỏ hàng
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove'); // Xóa sản phẩm khỏi giỏ hàng
Route::post('/cart/place-order', [CartController::class, 'placeOrder'])->name('cart.placeOrder');

Route::get('/donhang', [DonHangController::class, 'index'])->name('donhang.index');

Route::post('/cart/order', [CartController::class, 'storeOrder'])->name('order.store'); // Lưu đơn hàng

// Route for admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin');

// Route for account
Route::get('/account', [AccountController::class, 'show'])->name('account.show');

// Route for user
Route::get('/admin/user-manage', [UserController::class, 'index'])->name('user.manage');

// Route for login and register
Route::get('/login', [AuthController::class, 'index'])->name('login.index');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Route for categories
Route::get('/admin/categories/create', [CategoryController::class, 'index'])->name('categories.create');
Route::post('/categories/add-category', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/admin/categories/all', [CategoryController::class, 'showAll'])->name('categories.all');
Route::delete('/admin/categories/all/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');


//Route for products
Route::get('/admin/product/create', [ProductController::class, 'index'])->name('product.create');
Route::post('/admin/product/add-product', [ProductController::class, 'store'])->name('product.store');
Route::get('/admin/product/all', [ProductController::class, 'showAll'])->name('product.all');
Route::delete('/admin/product/all/{id}', [Products::class, 'destroy'])->name('product.delete');
Route::get('/search', [ProductController::class, 'search'])->name('product.search');
Route::get('product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('product/update/{id}', [ProductController::class, 'update'])->name('product.update');

// Route for orders
Route::get('/admin/orders', [OrderController::class, 'index'])->name('orders.index');

//Route for contact
Route::get('/admin/contacts', [LienHeController::class, 'showAllContacts'])->name('contacts.index'); 
Route::get('/lien-he', [LienHeController::class, 'showContactForm'])->name('contact.show'); 
Route::post('/lien-he', [LienHeController::class, 'submitContactForm'])->name('contact.submit'); 


