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
                    <a href="{{ url('/data_transaksi') }}" class="nav-link">Transaksi</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/data_saran') }}" class="nav-link">Saran</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/transaksi') }}" class="nav-link">
                        Laporan
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/logout') }}" class="nav-link">
                        Logout
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>
