<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tài khoản</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <header>
            <h1 class="text-center">Thông tin tài khoản</h1>
        </header>

        <div class="card">
            <div class="card-header">
                Thông tin cá nhân
            </div>
            <div class="card-body">
                <p><strong>Tên:</strong> {{ Auth::user()->name }}</p>
                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                <p><strong>Số điện thoại:</strong> {{ Auth::user()->phone }}</p>
                <p><strong>Địa chỉ:</strong> {{ Auth::user()->address }}</p>
            </div>
        </div>

        <div class="text-center mt-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Đăng xuất</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
