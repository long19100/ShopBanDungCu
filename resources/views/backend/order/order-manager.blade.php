<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 mt-3 border-bottom">
        <h1 class="h2" style="color: #4d4b4b;">Order Management</h1>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Address</th>
                <th>Total</th>
                <th>Time Order</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>
                        {{ $order->user->name }} <br>
                        <small>{{ $order->user->email }}</small> <!-- Hiển thị tài khoản email dưới tên -->
                    </td>
                    <td>{{ $order->product->name }}</td> <!-- Lấy tên sản phẩm -->
                    <td>{{ $order->qty }}</td> <!-- Số lượng sản phẩm -->
                    <td>{{ $order->user->address }}</td> <!-- Địa chỉ của người dùng -->
                    <td>${{ number_format($order->total_price, 2) }}</td> <!-- Tổng giá trị đơn hàng -->
                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i') }}</td> <!-- Thời gian đặt hàng -->
                </tr>
            @endforeach
        </tbody>
    </table>
</main>
