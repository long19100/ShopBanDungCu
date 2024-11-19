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

.btn-success {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff
}
.btn-success:hover {
    color: #fff;
    background-color: #0056b3;
    border-color: #0056b3
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
                            <a href="#"><i class="fas fa-shopping-cart"></i></a>
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
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <div class="container mt-5">
        <h2>Giỏ Hàng</h2>

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

        @if($products && count($products) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Tên Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Giá</th>
                        <th>Tổng</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product['name'] }}</td>
                            <td>{{ $product['qty'] }}</td>
                            <td>${{ number_format($product['price']) }}</td>
                            <td>${{ number_format($product['total']) }}</td>
                            <td>
                                <a href="{{ route('cart.remove', $product['id']) }}" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <form action="{{ route('cart.placeOrder') }}" method="POST">
                @csrf
                <div class="text-end mt-3">
                    @foreach($products as $product)
                        <input type="hidden" name="product_id[]" value="{{ $product['id'] }}">
                        <input type="hidden" name="total[]" value="{{ $product['total'] }}">
                    @endforeach
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <button type="submit" class="btn btn-success">Đặt hàng</button>
                </div>
            </form>
        @else
            <p>Giỏ hàng trống!</p>
        @endif
    </div>
</body>
</html>
