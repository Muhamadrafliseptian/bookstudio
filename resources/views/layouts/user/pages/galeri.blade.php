@extends('layouts.user.core.main-user')
@section('content')
    <div class="container py-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card shadow border-0">
                    <img src="{{ asset('assets/landing-page/images/1.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Studio A</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
                            content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow border-0">
                    <img src="{{ asset('assets/landing-page/images/2.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Studio B</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
                            content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow border-0">
                    <img src="{{ asset('assets/landing-page/images/2.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Studio C</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
                            content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
