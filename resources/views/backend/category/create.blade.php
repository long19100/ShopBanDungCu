<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 mt-3 border-bottom">
        <h1 class="h2" style="color: #4d4b4b;">Thêm Danh Mục</h1>
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
      @if(session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
  @endif

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Tên Danh Mục</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Mô Tả</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Chọn Tệp Hình Ảnh</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                </div>

                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>
    </div>
</main>
