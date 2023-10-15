<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a href="#" class="navbar-toggler">Navbar</a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a href="/" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('product.index') }}" class="nav-link">Product</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('profile') }}" class="nav-link">Profile</a>
            </li>
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="nav-link">Logout</button>
                </form>
            </li>
        </ul>
    </div>
</nav>
