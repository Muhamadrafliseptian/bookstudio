@extends('layouts.user.core.main-user')
@section('content')
    <div class="container py-5 w-50">
        <div class="card shadow border-0">
            <div class="card-body">
                <form method="POST" action="/auth/register/post">
                    @csrf
                    <label for="nama" class="mb-3">Nama</label><br>
                    <input type="text" id="nama" name="nama" class="form-control"><br>
                    <label for="no_hp" class="mb-3">Nomor Hp</label><br>
                    <input type="text" id="no_hp" name="no_hp" class="form-control"><br>
                    <label for="email" class="mb-3">Email:</label><br>
                    <input type="email" id="email" name="email" class="form-control"><br>
                    <label for="password" class="mb-3">Password</label><br>
                    <input type="password" id="password" name="password" class="form-control"><br><br>
                    <button type="submit" class="btn btn-sm btn-primary w-100">
                        Register
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                alert('{{ $error }}');
            @endforeach
        @endif
    </script>
@endsection
