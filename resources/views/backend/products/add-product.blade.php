<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 mt-3 border-bottom">
        <h1 class="h2" style="color: #4d4b4b;">Add Product</h1>
    </div>

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
    
      <!-- Hiển thị thông báo thành công nếu có -->

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" class="form-control" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="small_description" class="form-label">Small Description</label>
            <textarea name="small_description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="5" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="original_price" class="form-label">Original Price ($)</label>
            <input type="text" name="original_price" class="form-control" style="width: 150px;" required>
        </div>

        <div class="form-group mb-3">
            <label for="selling_price" class="form-label">Selling Price ($)</label>
            <input type="number" name="selling_price" class="form-control" style="width: 150px;" required>
        </div>

        <div class="form-group mb-3">
            <label for="quality" class="form-label">Quality</label>
            <input type="number" name="qty" class="form-control" style="width: 150px;" required>
        </div>

        <div class="form-group mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control-file" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</main>
