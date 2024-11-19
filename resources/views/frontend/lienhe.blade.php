<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Thêm SweetAlert2 -->
    <style>
        .container {
            margin-top: 20px;
        }

        .mb-2 {
            margin-bottom: 20px;
        }

        .btn {
            background: #0d6efd;
            color: white;
        }

        .btn:hover {
            background: rgba(13, 110, 253, 0.8);
            color: black;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="mb-2">
            <a href="{{ route('home') }}" class="btn">
                <i class="fas fa-arrow-left"></i> Quay lại trang chủ
            </a>
        </div>

        <h2 class="text-center">Liên hệ với chúng tôi</h2>
        <form id="contactForm" action="{{ route('contact.submit') }}" method="POST" novalidate>
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Họ và tên</label>
                <input type="text" class="form-control" id="name" name="name" required>
                <div class="invalid-feedback">Vui lòng nhập tên của bạn.</div>
                <div class="error-message text-danger" id="nameError"></div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <div class="invalid-feedback">Vui lòng nhập đúng định dạng email.</div>
                <div class="error-message text-danger" id="emailError"></div>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Số điện thoại</label>
                <input type="tel" class="form-control" id="phone" name="phone" pattern="^[0-9]{10}$" required>
                <div class="invalid-feedback">Vui lòng nhập đúng định dạng số điện thoại (10 chữ số).</div>
                <div class="error-message text-danger" id="phoneError"></div>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Nội dung</label>
                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                <div class="invalid-feedback">Vui lòng nhập nội dung liên hệ.</div>
                <div class="error-message text-danger" id="messageError"></div>
            </div>
            <button type="submit" class="btn btn-primary">Gửi</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Kiểm tra dữ liệu nhập trước khi gửi
        (function () {
            'use strict';
            var forms = document.querySelectorAll('.needs-validation');

            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
        })();

        // Hiển thị thông báo lỗi ngay dưới các input
        $('#contactForm').on('submit', function (event) {
            event.preventDefault();

            // Reset các thông báo lỗi trước khi gửi
            $('.error-message').text('');

            // Thực hiện gửi form qua Ajax
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    // Xử lý thông báo thành công
                    Swal.fire({
                        icon: 'success',
                        title: 'Gửi thành công!',
                        text: 'Cảm ơn bạn đã liên hệ. Chúng tôi sẽ phản hồi sớm nhất có thể.'
                    });
                    $('#contactForm')[0].reset(); // Xóa dữ liệu sau khi gửi
                },
                error: function (xhr) {
                    // Xử lý lỗi
                    let errors = xhr.responseJSON.errors;

                    // Hiển thị thông báo lỗi cho từng trường
                    if (errors.name) {
                        $('#nameError').text(errors.name.join(', '));
                    }
                    if (errors.email) {
                        $('#emailError').text(errors.email.join(', '));
                    }
                    if (errors.phone) {
                        $('#phoneError').text(errors.phone.join(', '));
                    }
                    if (errors.message) {
                        $('#messageError').text(errors.message.join(', '));
                    }
                }
            });
        });
    </script>
</body>

</html>
