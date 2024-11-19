<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 mt-3 border-bottom">
        <h1 class="h2" style="color: #4d4b4b;">All Products</h1>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                        <img src="{{ asset('img/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid" style="width: 100px; height: auto;">
                    </td>
                    <td>
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-edit">Edit</a> 
                    </td>
                    <td>
                        <form action="{{ route('product.delete', $product->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>
