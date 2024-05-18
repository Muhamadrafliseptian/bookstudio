@extends('layouts.admin.core.main-admin')
@section('content')
    <div class="container py-3">
        @if (session("success"))
        <div class="alert alert-success">
            <strong>Berhasil, </strong> {!! session('success') !!}
        </div>
        @endif
        <div class="card shadow border-0 mt-2">
            <div class="card-body">
                <div class="card-title">
                    <h5 style="display: inline;">
                        Laporan Transaksi Per Bulan
                    </h5>
                    @if (!empty(session("bulan")))
                    <a href="{{ url('/download-pdf/' . session("bulan")) }}" class="btn btn-outline-danger btn-sm" style="float: right">
                        Download PDF
                    </a>
                    @endif
                    <br><br>
                    <form action="{{ url('/filter') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bulan"> Bulan </label>
                                    <select name="bulan" class="form-control" id="bulan">
                                        <option value="">- Pilih -</option>
                                        @php
                                            $bulan = [
                                                1 => 'Januari',
                                                2 => 'Februari',
                                                3 => 'Maret',
                                                4 => 'April',
                                                5 => 'Mei',
                                                6 => 'Juni',
                                                7 => 'Juli',
                                                8 => 'Agustus',
                                                9 => 'September',
                                                10 => 'Oktober',
                                                11 => 'November',
                                                12 => 'Desember',
                                            ];

                                        @endphp

                                        @foreach ($bulan as $num => $name)
                                            @if (empty(session("bulan")))
                                            <option value="{{ $num }}">
                                                {{ $name }}
                                            </option>
                                            @else
                                            <option value="{{ $num }}" {{ $num == session("bulan") ? 'selected' : '' }} >
                                                {{ $name }}
                                            </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 mt-4">
                                <button type="reset" class="btn btn-danger">
                                    Batal
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Filter
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <br>
                <hr>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">External ID</th>
                            <th>Nama</th>
                            <th class="text-center">Payment Status</th>
                            <th class="text-center">Payment Channel</th>
                            <th class="text-center">Payment Method</th>
                            <th class="text-center">Tanggal Pesan</th>
                            <th class="text-center">Waktu Pesan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transaction as $item)
                            <tr>
                                <td class="text-center">{{ $item->external_id }}</td>
                                <td>{{ $item->users->nama }}</td>
                                <td class="text-center">{{ $item->payment_status }}</td>
                                <td class="text-center">{{ $item->payment_channel }}</td>
                                <td class="text-center">{{ $item->payment_method }}</td>
                                <td class="text-center">{{ $item->tanggal_pesan }}</td>
                                <td class="text-center">{{ $item->waktu_pesan }}</td>
                            </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="6">
                                <strong class="text-danger">
                                    Maaf, Data Tidak Ditemukan
                                </strong>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
