<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('../backend/css/style.css') }}">
    <style>
        /* Bạn có thể thêm CSS tùy chỉnh ở đây nếu cần */
    </style>
</head>
<body>
    <div class="container-fluid d-flex">
        @include('backend.sidebar') 
        <main class="content flex-grow-1">
            @include('backend.dashboard.dashboard') 
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Kiểm tra session 'success' và hiển thị toast
        @if(session('success'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });
        @endif
    </script>
</body>
</html>
