@extends('layouts.user.core.main-user')

@section('content')
    <div class="container py-5 w-50">
        <div class="card shadow border-0">
            <div class="card-body">
                <form action="/login" method="POST" onsubmit="return validateLoginForm()">
                    @csrf
                    <label for="email" class="mb-3">Email:</label><br>
                    <input type="email" name="email" id="email" class="form-control"><br>
                    <label for="password" class="mb-3">Password</label><br>
                    <input type="password" name="password" id="password" class="form-control mb-4">
                    <button type="submit" class="btn btn-sm btn-primary w-100">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
    @if (isset($alertMessage))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ $alertMessage }}'
            });
        </script>
    @endif
    <script>
        function validateLoginForm() {
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;

            if (email.trim() == '' || password.trim() == '') {
                alert("Email dan password harus diisi");
                return false;
            }
            return true;
        }
    </script>
@endsection
