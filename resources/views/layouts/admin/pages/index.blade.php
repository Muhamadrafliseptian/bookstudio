@extends('layouts.admin.core.main-admin')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="d-flex justify-content-between fw-bold">
                @if (session('username'))
                    <h5>Selamat datang, {{ session('username') }}!</h5>
                @endif
                <p id="current-time"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow border-0 bg-primary text-light">
                    <div class="card-body">
                        <h5 class="card-title">{{ $totalUser }}</h5>
                        <p class="card-text">Jumlah Pengguna</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow border-0 bg-success text-light">
                    <div class="card-body">
                        <h5 class="card-title">{{ $totalAdmin }}</h5>
                        <p class="card-text">Jumlah Admin</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow border-0 bg-warning text-light">
                    <div class="card-body">
                        <h5 class="card-title">{{ $totalPesan }}</h5>
                        <p class="card-text">Jumlah Pesan</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card shadow border-0 mt-5">
                    <div class="card-body">
                        <div class="card-title">
                            <h5>
                                Data Pengguna
                            </h5>
                        </div>
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No Hp</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userData as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->no_hp }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if (count($userData) >= 1)
                            <a class="text-end text-dark" style="text-decoration: none"
                                href="{{ url('/data_pengguna') }}">Show All</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card shadow border-0 mt-5">
                    <div class="card-body">
                        <div class="card-title">
                            <h5>
                                Data Administrator
                            </h5>
                        </div>
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No Hp</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($adminData as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td> <!-- Nomor urut -->
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->no_hp }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if (count($userData) >= 1)
                            <a class="text-end text-dark" style="text-decoration: none"
                                href="{{ url('/data_admin') }}">Show All</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="card shadow border-0 mt-5">
                <div class="card-body">
                    <div class="card-title">
                        <h5>
                            Data Transaksi
                        </h5>
                    </div>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>No Hp</th>
                                <th>Paket</th>
                                <th>Harga</th>
                                <th>Metode Pembayaran</th>
                                <th>Jenis Pembayaran</th>
                                <th>Status Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!$dataPesan->isEmpty())
                                @foreach ($dataPesan as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->users->nama }}</td>
                                        <td>{{ $user->users->no_hp }}</td>
                                        <td>{{ $user->paket->name }}</td>
                                        <td>{{ $user->paket->amount }}</td>
                                        <td>{{ $user->payment_method }}</td>
                                        <td>{{ $user->payment_channel }}</td>
                                        <td>{{ $user->payment_status }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="12" class="text-center">
                                        <div class="alert alert-info mt-4">
                                            <h5>Data Transaksi Tidak Ada</h5>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    @if (count($dataPesan) >= 1)
                        <a class="text-end text-dark" style="text-decoration: none"
                            href="{{ url('/data_transaksi') }}">Show All</a>
                    @endif
                </div>
            </div>
        </div>
        <div>
            <div class="card shadow border-0 mt-5">
                <div class="card-body">
                    <div class="card-title">
                        <h5>
                            Kotak Saran
                        </h5>
                    </div>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Isi Saran</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!$saranData->isEmpty())
                                @foreach ($saranData as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td> <!-- Nomor urut -->
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->isi_saran }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <a href="mailto:{{ $user->email }}" class="btn btn-sm btn-primary">
                                                Balas
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" class="text-center">
                                        <div class="alert alert-info mt-4">
                                            <h5>Data Saran Tidak Ada</h5>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    @if (count($saranData) >= 1)
                        <a class="text-end text-dark" style="text-decoration: none" href="{{ url('/data_saran') }}">Show
                            All</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        function updateClock() {
            var now = new Date();
            var options = {
                timeZone: 'Asia/Jakarta',
                hour: 'numeric',
                minute: 'numeric',
                second: 'numeric'
            };
            var formattedTime = now.toLocaleString('id-ID', options) + ' WIB';
            document.getElementById('current-time').textContent = formattedTime;
        }

        updateClock();

        setInterval(updateClock, 1000);
    </script>
@endsection
