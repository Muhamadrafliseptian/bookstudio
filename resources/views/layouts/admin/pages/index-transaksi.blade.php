@extends('layouts.admin.core.main-admin')
@section('content')
    <div class="container py-3">
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
                        @if (!$dataTransaksi->isEmpty())
                            @foreach ($dataTransaksi as $user)
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
            </div>
        </div>
    </div>
@endsection
