<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 mt-3 border-bottom">
        <h1 class="h2" style="color: #4d4b4b;">Edit Product: {{ $products->name }}</h1>
    </div>

    <form action="{{ route('product.update', $products->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $products->name }}" required>
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ $products->slug }}" required>
        </div>

        <div class="mb-3">
            <label for="small_description" class="form-label">Small Description</label>
            <textarea class="form-control" id="small_description" name="small_description" rows="3" required>{{ $products->small_description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="5">{{ $products->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="original_price" class="form-label">Original Price</label>
            <input type="number" class="form-control" id="original_price" name="original_price" value="{{ $products->original_price }}" required>
        </div>

        <div class="mb-3">
            <label for="selling_price" class="form-label">Selling Price</label>
            <input type="number" class="form-control" id="selling_price" name="selling_price" value="{{ $products->selling_price }}" required>
        </div>

        <div class="mb-3">
            <label for="qty" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="qty" name="qty" value="{{ $products->qty }}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" class="form-control" id="image" name="image">
            <small class="form-text text-muted">Current Image: <img src="{{ asset('img/' . $products->image) }}" alt="{{ $products->name }}" class="img-fluid" style="width: 100px; height: auto;"></small>
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
        <a href="{{ route('product.all') }}" class="btn btn-secondary">Cancel</a>
    </form>
</main>
