<!DOCTYPE html>
<html lang="vi">


<header class="header">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('frontend/css/app.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <div class="container-fluid">
        <div class="row" style="height: 70px;">
            <div class="col">
                <div class="logo">
                    <a href="{{route("home")}}">The Baker's Corner</a>
                </div>
            </div>
            <div class="col">

                <div class="search-container">
                    <form action="{{ route('product.search') }}" method="GET" class="form-block">
                        <div class="container-form">
                            <input type="text" name="query" class="form-control" placeholder="Tìm kiếm sản phẩm" aria-label="Tìm kiếm sản phẩm">
                        </div>
                        <div class="container-form">
                            <button class="search-btn" type="submit">&#128269;</button>
                        </div>
                    </form>
                </div>
                
                
            </div>
            <div class="col">
                <div class="col d-flex justify-content-end">
                    <div class="icons">
                        <a href="#"><i class="fas fa-bell me-3"></i></a>
                        @if (Auth::check())
                            <a href="{{ route('account.show') }}"><i class="fas fa-user me-3"></i></a>
                        @else
                            <a href="{{ route('login.index') }}"><i class="fas fa-user me-3"></i></a>
                        @endif
                        <a href="{{ route('cart.view') }}"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="height: 70px;">
            <nav class="navbar navbar-expand-lg navbar-light " style="background-color: rgba(0, 0, 0, 0.05);">
                <div class="container-fluid">
                    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{route("home")}}">Trang Chủ</a>
                            </li>
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link active" href="javascript:void(0);" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" onclick="scrollToDetail()">
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

<body>

    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-mdb-ride="carousel">
        <div class="carousel-indicators">
            <button
                type="button"
                data-mdb-target="#carouselExampleCaptions"
                data-mdb-slide-to="0"
                class="active"
                aria-current="true"
                aria-label="Slide 1"></button>
            <button
                type="button"
                data-mdb-target="#carouselExampleCaptions"
                data-mdb-slide-to="1"
                aria-label="Slide 2"></button>
            <button
                type="button"
                data-mdb-target="#carouselExampleCaptions"
                data-mdb-slide-to="2"
                aria-label="Slide 3"></button>

        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/slide1.jpg') }}" class="d-block w-100" alt="Wild Landscape" />
                <div class="mask" style="background-color: rgba(0, 0, 0, 0.4)"></div>
                <div class="carousel-caption d-none d-sm-block mb-5">
                    <h1 style="color: #ccc">
                        <strong>Kinh Nghiệm & Công Thức Làm Bánh</strong>
                    </h1>

                    <p style="color: #ccc; font-size:30px;">
                        <strong>Đơn Giản - Nhanh Chóng - Dễ Thực Hiện</strong>
                    </p>

                    <a target="_blank" href="https://dungculambanh.com.vn/blog/" style="font-size: 30px;color:#ccc;">Tìm Hiểu Ngay
                    </a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/slide2.jpg') }}" class="d-block w-100" alt="Camera" />
                <div class="mask" style="background-color: rgba(0, 0, 0, 0.4)"></div>
                <div class="carousel-caption d-none d-md-block mb-5">
                    <h1 style="color: #ccc">
                        <strong>Siêu Thị Ngành Bánh Chất Lượng</strong>
                    </h1>

                    <p style="color: #ccc; font-size:30px;">
                        <strong>Mang Cả Thế Giới Làm Bánh Đặt Trong Tầm Mắt Bạn</strong>
                    </p>

                    <a target="_blank" href="https://dungculambanh.com.vn/gioi-thieu/" style="font-size: 30px;color:#ccc;">Giới Thiệu
                    </a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/slide3.jpg') }}" class="d-block w-100" alt="Exotic Fruits" />
                <div class="mask" style="background-color: rgba(0, 0, 0, 0.4)"></div>
                <div class="carousel-caption d-none d-md-block mb-5">
                    <h1 style="color: #ccc">
                        <strong>7 Cơ Sở Liên Kết</strong>
                    </h1>

                    <p style="color: #ccc; font-size:30px;">
                        <strong>Hà Nội - TP.Hồ Chí Minh - Hà Tĩnh</strong>
                    </p>

                    <a target="_blank" href="https://dungculambanh.com.vn/lien-he/" style="font-size: 30px;color:#ccc;">Liên Hệ
                    </a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleCaptions" data-mdb-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleCaptions" data-mdb-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="row" id="menu-left">
        <!-- Menu-left -->
        <div class="col col-lg-2">
            <aside class="left-menu">
                <ul>
                    <li><a href="{{route('tatcasanpham')}}">Tất cả sản phẩm</a></li>
                    <li><a href="{{route('nguyenlieu')}}">Nguyên liệu làm bánh</a></li>
                    <li><a href="{{route('dungcu')}}">Dụng cụ làm bánh</a></li>
                    <li><a href="{{route('khuonkhay')}}">Khuôn khay làm bánh</a></li>
                    <li><a href="{{route('tuihop')}}">Túi, hộp, cốc, lọ</a></li>
                </ul>
            </aside>
        </div>
    
   

    <script>
        function scrollToDetail() {
            document.getElementById('menu-left').scrollIntoView({ behavior: 'smooth' });
        }
    </script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>