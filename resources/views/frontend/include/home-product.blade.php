<!-- Product Section -->
<div class="col-md-auto" style="padding-top: 20px; margin-left:10px;">
    <main>
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="row">
                        @if($products->isEmpty())
                            <p>Không tìm thấy sản phẩm nào!</p>
                        @else
                            @foreach ($products as $product)
                                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                                    <a href="{{ route('sanpham', $product->id) }}" class="text-decoration-none">
                                        <div class="card">
                                            <img src="{{ asset('img/'.$product->image) }}" class="card-img-top" alt="{{ $product->name }}" />
                                            <div class="card-body text-center">
                                                <h5 class="card-title mb-2">{{ $product->name }}</h5>
                                                <h6 class="mb-3 price">
                                                    @if($product->original_price)
                                                        <s>{{ $product->original_price }}$</s>
                                                    @endif
                                                    <strong class="ms-2 sale">{{ $product->selling_price }}$</strong>
                                                </h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <nav aria-label="Page navigation example" class="custom-pagination">
            <ul>
                @if ($products->onFirstPage())
                    <li class="disabled"><span>&laquo; Trang trước</span></li>
                @else
                    <li><a href="{{ $products->previousPageUrl() }}" rel="prev">&laquo; Trang trước</a></li>
                @endif
        
                @for ($i = 1; $i <= $products->lastPage(); $i++)
                    @if ($i == $products->currentPage())
                        <li class="active"><span>{{ $i }}</span></li>
                    @else
                        <li><a href="{{ $products->url($i) }}">{{ $i }}</a></li>
                    @endif
                @endfor
        
                @if ($products->hasMorePages())
                    <li><a href="{{ $products->nextPageUrl() }}" rel="next">Trang sau &raquo;</a></li>
                @else
                    <li class="disabled"><span>Trang sau &raquo;</span></li>
                @endif
            </ul>
        </nav>

        
    </main>
</div>
