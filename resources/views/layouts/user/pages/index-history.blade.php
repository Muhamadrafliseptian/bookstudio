@extends('layouts.user.core.main-user')

@section('content')
    <div class="container py-3">
        <h5>
            Riwayat Booking
        </h5>
        <div class="row">
            @if (!$history->isEmpty())
                @foreach ($history as $item)
                    <div class="col-md-6 col-lg-4">
                        <div class="card shadow border-0 mb-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h5>Detail Pemesan</h5>
                                        <p class="mb-0">Nama: <b>{{ $item->users->nama }}</b></p>
                                        <p class="mb-0">Jenis Paket: <b>{{ $item->paket->name }}</b></p>
                                        <p class="mb-2">Harga: Rp. <b>{{ $item->paket->amount }}</b></p>
                                    </div>
                                    <div class="col-12">
                                        <h5>Detail Pembayaran</h5>
                                        <p class="mb-0">Tanggal Booking: {{ $item->tanggal_pesan }}</p>
                                        @if ($item->payment_status === 'PENDING')
                                            <p>Status Pembayaran: <span
                                                    class="text-danger"><b>{{ $item->payment_status }}</b></span></p>
                                            <a href="{{ url($item->invoice_url) }}" class="btn btn-sm btn-primary">Bayar
                                                Sekarang</a>
                                        @else
                                            <p class="mb-0">Kode Booking: <b>{{ $item->kode_booking }}</b></p>
                                            <p class="mb-0">Status Pembayaran: <span
                                                    class="text-success"><b>{{ $item->payment_status }}</b></span></p>
                                            <p class="mb-0">Metode Pembayaran: <b>{{ $item->payment_method }}</b></p>
                                            <p class="mb-0">Jenis Pembayaran: <b>{{ $item->payment_channel }}</b></p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-info text-center mt-4">
                    <h5>Kamu Belum Pernah Booking Studio Kami</h5>
                </div>
            @endif

        </div>
    </div>
@endsection
