@extends('layouts.admin.core.main-admin')
@section('content')
    <div class="container py-3">
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
                        @foreach ($dataSaran as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td> <!-- Nomor urut -->
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->isi_saran }}</td>
                                <td>{{ $data->created_at }}</td>
                                <td>
                                    <a href="mailto:{{ $data->email }}" class="btn btn-sm btn-primary">
                                        Balas
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
