<nav class="navbar navbar-expand-lg bg-dark navbar-dark text-white py-lg-1">
    <div class="container">
        <a class="navbar-brand text-white " href="{{ route('home') }}">Teste YTC Laravel</a>
        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNavDropdown-3" aria-controls="navbarNavDropdown-3" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNavDropdown-3">
            <ul class="ml-auto navbar-nav">
                <li class="nav-item">
                    <a class="nav-link px-lg-3 py-lg-4 text-white " href="{{ route('auth.customers.index') }}">Customers</a>
                </li>
            </ul>
            @guest
                <a class="btn btn-outline-light ml-lg-3" href="{{ route('login') }}">Login</a>
            @endguest
            @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-outline-light">Logout</button>
            </form>
            @endauth
        </div>
    </div>
</nav>