@extends('layouts.admin.core.main-admin')
@section('content')
    <div class="container py-3">
        <div class="card shadow border-0 mt-5">
            <div class="card-body">
                <div class="card-title">
                    <h5>
                        Data Fasilitas
                    </h5>
                </div>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataFasilitas as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td> <!-- Nomor urut -->
                                <td>{{ $data->nama }}</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="btn btn-sm btn-primary me-3">
                                            Tambah
                                        </div>
                                        <a class="btn btn-sm btn-warning me-3"
                                            href="{{ url('/edit_fasilitas/' . $data->id_fasilitas) }}">
                                            Edit
                                        </a>
                                        <form action="{{ url('/delete_fasilitas/' . $data->id_fasilitas) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
