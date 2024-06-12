@extends('layouts.admin.core.main-admin')

@section('content')
    <div class="container py-3">
        <form action="{{URL("/tambah_fasilitas/")}}" method="PUT">
            <label for="">
                Nama Fasilitas
            </label>
            <input type="text" name="nama" id="nama" class="form-control mt-3">
            <button type="submit" class="btn btn-sm btn-primary mt-3">
                Simpan
            </button>
        </form>
    </div>
@endsection