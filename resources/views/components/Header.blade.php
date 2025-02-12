<header>
    <div class="header__content container">
        <a href="{{ route('home') }}">
            <img src="{{ asset('assets/images/logo/logo.svg') }}" alt="logo" class="header__logo">
        </a>
        <nav class="header__nav">
            <div class="header__links">
                <a href="{{ route('products.index') }}">Catalog</a>
                @if (auth()->check() && auth()->user()->user_role_id == 3)
                    <a href="{{ route('product-categories.index') }}">Categories</a>
                @endif
            </div>
            <div class="header__user_buttons">
                @auth
                    <a href="{{ route('cart.index') }}" class="button">Cart</a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                @else
                    <a href="/login" class="button">Login</a>
                    <a href="/register" class="button">Register</a>
                @endauth
            </div>
        </nav>

    </div>
</header>
