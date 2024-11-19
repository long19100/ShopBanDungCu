<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('frontend/css/app.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .search-container {
    display: flex; /* Sử dụng Flexbox */
    align-items: center; /* Căn giữa theo chiều dọc */
    width: 100%; /* Đảm bảo container chiếm 100% chiều rộng */
}

.search-container input[type="text"] {
    width: 450px; /* Chiếm toàn bộ chiều rộng */
    padding: 10px; /* Padding cho ô input */
    border: 1px solid #ccc; /* Màu viền */
    border-radius: 5px; /* Bo tròn góc */
    outline: none; /* Bỏ viền khi focus */
    transition: border-color 0.3s; /* Hiệu ứng chuyển tiếp */
}

.search-container input[type="text"]:focus {
    border-color: #007bff; /* Màu viền khi focus */
}

.search-container .search-btn {
    background-color: #007bff; /* Màu nền cho button */
    color: white; /* Màu chữ */
    border: none; /* Bỏ viền */
    border-radius: 25px; /* Bo tròn góc */
    padding: 10px 20px; /* Padding cho button */
    margin-left: 10px; /* Khoảng cách giữa input và button */
    cursor: pointer; /* Con trỏ chuột */
}

.search-container .search-btn:hover {
    background-color: #0056b3; /* Màu nền khi hover */
}

    </style>
</head>
<body>
    <header class="header">
        <div class="container-fluid">
            <div class="row" style="height: 70px;">
                <div class="col">
                    <div class="logo">
                        <a href="{{route("home")}}">The Baker's Corner</a>
                    </div>
                </div>
                <div class="col">
                    <div class="search-container">
                        <input type="text" placeholder="Tìm kiếm">
                        <button class="search-btn">&#128269;</button>
                    </div>
                </div>
                <div class="col">
                    <div class="col d-flex justify-content-end">
                        <div class="icons">
                            <a href="#"><i class="fas fa-bell me-3"></i></a>
                            <a href="{{ route('account.show') }}"><i class="fas fa-user me-3"></i></a>
                            <a href="{{ route('cart.view') }}"><i class="fas fa-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="height: 70px;">
                <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(0, 0, 0, 0.05);">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Trang Chủ</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link active" href="{{route("home")}}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" onclick="scrollToDetail()">
                                        Danh Mục
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{route("contact.show")}}">Liên Hệ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{route("donhang.index")}}">Đơn Hàng Của Tôi</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <div class="container mt-5">
        <h2>Đơn Hàng</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if($orders && count($orders) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Tên Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Giá</th>
                    <th>Tổng</th>
                    <th>Trạng Thái</th>
                    <th>Ngày Đặt</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <!-- Tên sản phẩm -->
                    <td>{{ $order->product->name }}</td> <!-- Lấy tên sản phẩm từ quan hệ product -->
                    
                    <!-- Số lượng -->
                    <td>{{ $order->qty }}</td> 
                    
                    <!-- Giá sản phẩm -->
                    <td>{{ $order->product->selling_price }} $</td>
                    
                    <!-- Tổng tiền -->
                    <td>{{ $order->total_price }} $</td> 
                    
                    <!-- Trạng thái -->
                    <td>
                        @if($order->status == 0)
                            <span class="badge bg-warning">Đang Xử Lý</span>
                        @elseif($order->status == 1)
                            <span class="badge bg-success">Thành Công</span>
                        @elseif($order->status == 2)
                            <span class="badge bg-secondary">Đã Hủy</span>
                        @endif
                    </td>
                    
                    <!-- Ngày tạo -->
                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>Hiện tại bạn chưa có đơn hàng nào!</p>
    @endif
    </div>
</body>
</html>
