@extends('layouts.admin.core.main-admin')

@section('content')
    <div class="container py-3">
        <form action="{{URL("/edit_fasilitas/" . $detail->id_fasilitas)}}" method="PUT">
            <label for="">
                Nama Fasilitas
            </label>
            <input type="text" name="nama" id="nama" class="form-control mt-3" value="{{$detail->nama}}">
            <button type="submit" class="btn btn-sm btn-primary mt-3">
                Simpan
            </button>
        </form>
    </div>
@endsection