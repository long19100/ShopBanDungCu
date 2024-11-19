<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 mt-3 border-bottom">
        <h1 class="h2" style="color: #4d4b4b;">Dashboard</h1>
    </div>

    <!-- Cards section -->
    <div class="row">
        <div class="col-md-4">
            <div class="card card-custom">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-person" style="color: #007bff;"></i> Total Users
                    </h5>
                    <p class="card-text">{{ $totalUsers }}</p> <!-- Hiển thị tổng số người dùng -->
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-custom">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-box" style="color: #28a745;"></i> Total Products
                    </h5>
                    <p class="card-text"> {{ $totalProduct}} </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-custom">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-cart" style="color: #ffc107;"></i> Total Orders
                    </h5>
                    <p class="card-text">{{ $totalOrder}}</p>
                </div>
            </div>
        </div>
    </div>
</main>

