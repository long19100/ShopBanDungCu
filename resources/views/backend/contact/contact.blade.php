<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 mt-3 border-bottom">
        <h1 class="h2" style="color: #4d4b4b;">Quản lý Liên hệ</h1>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Nội dung</th>
                <th>Ngày gửi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->message }}</td>
                    <td>{{ \Carbon\Carbon::parse($contact->ngaygui)->format('d/m/Y') }}</td> <!-- Định dạng ngày thành 'd/m/Y' -->
                </tr>
            @endforeach
        </tbody>
    </table>
</main>
