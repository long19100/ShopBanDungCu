<div class="col-md-auto" style="padding-top: 20px;">
    <main>
        <!-- Breadcrumb -->
        <div class="breadcrumb breadcumb container">
            <a href="{{ url('/') }}">Trang Chủ</a> <span>></span>
            <a href="{{ route('tatcasanpham') }}">Tất Cả Sản Phẩm</a> <span>></span>
            <span>{{ $product->name }}</span>
        </div>

        <!-- Product Detail Section -->
        <section class="product-row container">
            <div class="row">
                <div class="col-md-6">
                    <div class="product-img">
                        <img src="{{ asset('img/' . $product->image) }}" alt="{{ $product->name }}">
                        <div class="product-img-list">
                            <img class="product-img-item" src="{{ asset('img/' . $product->image) }}" alt="Thumbnail 1">
                            <img class="product-img-item" src="{{ asset('img/' . $product->image) }}" alt="Thumbnail 2">
                            <img class="product-img-item" src="{{ asset('img/' . $product->image) }}" alt="Thumbnail 3">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="product-info">
                        <h2 class="sp-item-name">{{ $product->name }}</h2>
                        <p class="product-info-detail-title">
                            Danh mục: {{ optional($product->category)->name ?? 'Không có danh mục' }}
                        </p>
                        <p class="product-info-detail-title">Còn: {{ $product->qty }} Sản phẩm</p>

                        <h3 class="box-header">Đặc điểm nổi bật</h3>
                        <ul class="product-description">
                            <li>{{ $product->small_description }}</li>
                        </ul>

                        <div class="product-info-price">
                            ${{ $product->selling_price }}
                            @if($product->original_price)
                                <s>{{ $product->original_price }}$</s>
                            @endif
                        </div>

                        <div class="product-quantity-wrapper">
                            <button class="product-quantity-btn" onclick="decreaseQuantity()">-</button>
                            <input type="number" value="1" class="product-quantity" id="quantity" min="1" style="width: 60px;">
                            <button class="product-quantity-btn" onclick="increaseQuantity()">+</button>
                        </div>

                        @if(auth()->check())
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="name" value="{{ $product->name }}">
                            <input type="hidden" name="price" value="{{ $product->selling_price }}">
                            <input type="hidden" name="qty" id="hidden-quantity" value="1">
                            <button type="submit" class="btn-flat btn-hover">Thêm vào giỏ hàng</button>
                        </form>
                        @else
                        <a href="{{ route('login') }}" class="btn-flat btn-hover">Đăng nhập để tiếp tục</a>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <!-- Product Description Section -->
        <section class="product-detail-description container">
            <h3 class="box-header">Mô Tả</h3>
            <div class="product-detail-description-content">
                <p>{{ $product->description }}</p>
            </div>
        </section>

        <!-- Đánh Giá Section -->
    </main>
</div>

<script>
    function increaseQuantity() {
        let quantityInput = document.getElementById('quantity');
        let newQuantity = parseInt(quantityInput.value) + 1;
        quantityInput.value = newQuantity;
        document.getElementById('hidden-quantity').value = newQuantity;
    }

    function decreaseQuantity() {
        let quantityInput = document.getElementById('quantity');
        let newQuantity = parseInt(quantityInput.value) - 1;
        if (newQuantity >= 1) {
            quantityInput.value = newQuantity;
            document.getElementById('hidden-quantity').value = newQuantity;
        }
    }
</script>
