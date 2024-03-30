<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">MIC Dance Studio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/galeri') }}">Galeri</a>
                </li>
                @if (Auth::check())
                    <li class="nav-item">
                        <a href="{{ url('/history_booking') }}" class="nav-link" style="border: none; background: none;">Riwayat Booking</a>
                    </li>
                    <li class="nav-item">
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="nav-link"
                                style="border: none; background: none;">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/auth/login" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="/auth/register" class="nav-link">Register</a>
                    </li>
                @endif
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link">{{ session('username') }}</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
