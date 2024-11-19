
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 mt-3 border-bottom">
        <h1 class="h2" style="color: #4d4b4b;">Edit Category</h1>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $category->id }}</td>
                <td>
                    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                </td>
                <td>
                    <img src="{{ asset('img/' . $category->image) }}" alt="{{ $category->name }}" class="img-fluid" style="width: 100px; height: auto;">
                    <div class="mt-2">
                        <input type="file" name="image" class="form-control">
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Update Category</button>
        <a href="{{ route('categories.all') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</main>

