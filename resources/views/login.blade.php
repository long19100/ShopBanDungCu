<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css"> <!-- Giữ nguyên CSS của bạn -->
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">
                        <!-- Hiển thị thông báo lỗi -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
  @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="text" id="email" name="email" class="form-control">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <a href="#">Forgot your password?</a><br>
                        <a href="{{ route('register') }}" class="text-decoration-none">Bạn chưa có tài khoản? Đăng ký ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Kiểm tra session để hiển thị thông báo -->
    @include('sweetalert::alert')

    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Thành công',
                text: '{{ session('success') }}',
                timer: 3000,
                timerProgressBar: true,
                toast: true,
                position: 'top-right',
                showConfirmButton: false
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Lỗi đăng nhập',
                text: '{{ session('error') }}',
                timer: 3000,
                timerProgressBar: true,
                toast: true,
                position: 'top-right',
                showConfirmButton: false
            });
        @endif
    </script>
</body>
</html>

