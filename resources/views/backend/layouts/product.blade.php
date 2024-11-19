<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('../backend/css/style.css') }}">

    <!-- Thêm SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container-fluid d-flex">
        @include('backend.sidebar') 
        <main class="content flex-grow-1">
            @include('backend.products.add-product') 
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Sử dụng SweetAlert để hiển thị thông báo thành công
        @if(session('success'))
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Thành công!',
                    text: '{{ session('success') }}', // Hiển thị thông báo thành công
                    showConfirmButton: false,
                    timer: 3000 // Tự động tắt sau 3 giây
                });
            });
        @endif
    </script>
</body>
</html>
