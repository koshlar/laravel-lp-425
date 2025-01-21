<footer>
    <div class="header__content container">
        <h1>Logo</h1>
        @auth
            <h2>Hi user!</h2>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @else
            <a href="/login" class="button">Login</a>
            <a href="/register" class="button">Register</a>
        @endauth
    </div>
</footer>
