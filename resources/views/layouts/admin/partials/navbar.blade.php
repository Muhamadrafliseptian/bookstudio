<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand ms-5" href="{{ url('/dashboard') }}">Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            @if (Auth::check())
                <li class="nav-item">
                    <a href="{{ url('/data_pengguna') }}" class="nav-link">Pengguna</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/data_admin') }}" class="nav-link">Admin</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">Data Booking</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">Saran</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">Kelola Studio</a>
                </li>
                <li class="nav-item">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="nav-link" style="border: none; background: none;">Logout</button>
                    </form>
                </li>
            @endif
        </ul>
    </div>
</nav>
