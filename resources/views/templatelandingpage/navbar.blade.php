<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <img src="{{asset('gambarhotel/insitu.png')}}" width="30" class="m-2" height="30" class="d-inline-block align-top" alt="">
        <a class="navbar-brand" href="/">Hotel Hebat Insitu</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        {{-- @guest --}}
        <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#facility">Fasilitas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#room">Room</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#saran">Saran</a>
        </li>
        @guest
        <li class="nav-item">
            <a class="nav-link" href="/login/">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/register/">Register</a>
        </li>
        @endguest
        {{-- @endguest --}}
        @auth
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{Auth::user()->name}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    </ul>
                    </li>
                    <li class="nav-item">
                        @if (Auth::user()->role == 'admin')
                        <a class="nav-link" href="/admin.admin">Dashboard Admin</a>
                        @endif
                        @if (Auth::user()->role == 'resepsionis')
                        <a class="nav-link" href="/resepsionis.resepsionis">Dasboard Resepsionis</a>
                        @endif
                        @if (Auth::user()->role == 'tamu')
                        <a class="nav-link" href="/tamu.home">Dashboard</a>
                        @endif
                    </li>
            </ul>
        @endauth
        </ul>
    </div>
    </div>
</nav>