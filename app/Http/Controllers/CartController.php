<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Products; 
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        // Giả định giỏ hàng được lưu trong session
        $cart = session()->get('cart', []);
        return view('frontend.giohang', compact('cart'));
    }

    public function add(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'qty' => 'required|integer|min:1',
        ]);
    
        // Lấy giỏ hàng từ session
        $cart = session()->get('cart', []);
    
        // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng lên
        if (isset($cart[$request->id])) {
            $cart[$request->id]['qty'] += $request->qty;
        } else {
            // Thêm sản phẩm mới vào giỏ hàng
            $cart[$request->id] = [
                'id' => $request->id, // Lưu id của sản phẩm
                'name' => $request->name,
                'price' => $request->price,
                'qty' => $request->qty,
                'total' => $request->price * $request->qty, // Tính tổng giá cho sản phẩm
            ];
        }
    
        // Lưu giỏ hàng vào session
        session()->put('cart', $cart);
    
        // Nếu người dùng đã đăng nhập, lưu vào bảng orders
        if (Auth::check()) {
            // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
            if (isset($cart[$request->id])) {
                // Thêm hoặc cập nhật đơn hàng
                Order::updateOrCreate(
                    [
                        'user_id' => Auth::user()->id,
                        'product_id' => $request->id,
                    ],
                    [
                        'qty' => $cart[$request->id]['qty'], // Cập nhật số lượng
                        'created_at' => now(),
                    ]
                );
            }
        }
    
        return redirect()->route('cart.view')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }
    

    public function remove($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        // Nếu đã lưu vào bảng order, xóa cũng cần phải xử lý ở đây
        if (Auth::check()) {
            Order::where('user_id', Auth::user()->id)->where('product_id', $id)->delete();
        }

        return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng!');
    }

    public function showCart()
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!Auth::check()) {
            return redirect()->route('login.index')->with('error', 'Bạn cần đăng nhập để xem giỏ hàng.');
        }

        // Lấy danh sách đơn hàng của người dùng
        $userId = Auth::id();
        $orders = DB::table('orders')->where('user_id', $userId)->get();

        // Lấy danh sách sản phẩm tương ứng với product_id
        $products = [];
        foreach ($orders as $order) {
            $product = Products::find($order->product_id);
            if ($product) {
                $products[] = [
                    'id' => $order->product_id, // Thêm ID sản phẩm để xóa nếu cần
                    'name' => $product->name,
                    'qty' => $order->qty, // Bạn cần có cột qty trong bảng orders
                    'price' => $product->selling_price,
                    'total' => $product->selling_price * $order->qty, // Tính tổng giá
                ];
            }
        }

        return view('frontend.giohang', compact('products'));
    }


    public function placeOrder(Request $request)
{
    // Lấy thông tin từ request
    $userId = $request->input('user_id');
    
    // Lấy giỏ hàng từ session
    $cartItems = session()->get('cart', []);
    
    // Kiểm tra giỏ hàng có sản phẩm không
    if (empty($cartItems)) {
        return redirect()->route('cart.view')->with('error', 'Giỏ hàng trống!');
    }

    // Lặp qua từng sản phẩm trong giỏ hàng và lưu vào order_detail
    foreach ($cartItems as $cartItem) {
        // Lấy thông tin từ giỏ hàng
        $productId = $cartItem['id']; // ID sản phẩm
        $quantity = $cartItem['qty']; // Số lượng sản phẩm trong giỏ hàng
        $totalPrice = $cartItem['total']; // Tổng giá cho sản phẩm

        // Lưu vào bảng order_detail
        $orderDetail = new OrderDetail();
        $orderDetail->user_id = $userId;
        $orderDetail->product_id = $productId;
        $orderDetail->total_price = $totalPrice;
        $orderDetail->qty = $quantity; // Lưu số lượng từ giỏ hàng vào order_detail
        $orderDetail->status = 0; // Trạng thái mặc định là 0 (Đang xử lý)
        $orderDetail->created_at = now();
        $orderDetail->save();

        // Trừ số lượng trong bảng products
        $product = Products::find($productId);
        if ($product && $product->qty >= $quantity) {
            // Giảm số lượng sản phẩm trong bảng products
            $product->decrement('qty', $quantity);
        } else {
            // Nếu không đủ số lượng, trả về thông báo lỗi
            return redirect()->route('cart.view')->with('error', 'Số lượng sản phẩm không đủ!');
        }
    }

    // Lấy các đơn hàng liên quan đến người dùng
    $orders = Order::where('user_id', $userId)->get();
    
    // Xóa tất cả đơn hàng liên quan từ bảng orders
    foreach ($orders as $order) {
        $order->delete();
    }

    // Xóa giỏ hàng trong session
    session()->forget('cart');

    // Trả về thông báo thành công
    return redirect()->route('cart.view')->with('success', 'Đặt hàng thành công!');
}

}
