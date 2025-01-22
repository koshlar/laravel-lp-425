<header>
    <div class="header__content container">
        <h1>Logo</h1>
        <nav class="header__links">
            <a href="{{ route('products.index') }}">Catalog</a>
        </nav>
        <div class="header__user_buttons">
            @auth
                <h2></h2>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @else
                <a href="/login" class="button">Login</a>
                <a href="/register" class="button">Register</a>
            @endauth
        </div>
    </div>
</header>
