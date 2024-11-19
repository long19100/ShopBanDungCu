<nav class="col-md-3 col-lg-2 d-md-block sidebar">
    <h5 class="py-3 text-center">{{ $userName }}</h5>
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin') ? 'active' : '' }}" href="{{ route('admin') }}">
                    <i class="bi bi-house-door m-right"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.manage') ? 'active' : '' }}" href="{{ route('user.manage') }}">
                    <i class="bi bi-person m-right"></i> User Manage
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('order.manage') ? 'active' : '' }}" href="{{route("orders.index")}}">
                    <i class="bi bi-bag m-right"></i> Order Manage
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('categories.all') ? 'active' : '' }}" href="{{ route('categories.all') }}">
                    <i class="bi bi-list m-right"></i> All Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('categories.create') ? 'active' : '' }}" href="{{ route('categories.create') }}">
                    <i class="bi bi-plus-circle m-right"></i> Add Category
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('product.all') ? 'active' : '' }}" href="{{ route('product.all') }}">
                    <i class="bi bi-box m-right"></i> All Products
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('product.create') ? 'active' : '' }}" href="{{ route('product.create') }}">
                    <i class="bi bi-plus-circle m-right"></i> Add Product
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('contacts.index') ? 'active' : '' }}" href="{{ route('contacts.index') }}">
                    <i class="bi bi-people-fill m-right"></i> Contact
                </a>
            </li>            
        </ul>

        <!-- Nút Logout -->
        <div class="text-center mt-4">
            <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none;">
                @csrf
            </form>
            <a class="btn btn-danger" href="#" role="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
        </div>
    </div>
</nav>
