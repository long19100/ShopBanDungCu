<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 mt-3 border-bottom">
        <h1 class="h2" style="color: #4d4b4b;">All Categories</h1>
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
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <img src="{{ asset('img/' . $category->image) }}" alt="{{ $category->name }}" class="img-fluid"
                        style="width: 100px; height: auto;">
                </td>
                <td>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-edit">Edit</a>
                </td>
                <td>
                    <form action="{{ route('categories.delete', $category->id) }}" method="POST"
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