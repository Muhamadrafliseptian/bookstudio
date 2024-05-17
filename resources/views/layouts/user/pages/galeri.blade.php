@extends('layouts.user.core.main-user')
@section('content')
    <div class="container py-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card shadow border-0">
                    <img src="{{ asset('assets/landing-page/images/1.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Logo Of MIC</h5>
                        <p class="card-text">Logo Official dari MIC Dance Studio</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow border-0">
                    <img src="{{ asset('assets/landing-page/images/3.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Member Of MIC</h5>
                        <p class="card-text">Berikut adalah anggota-anggota MIC .</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow border-0">
                    <img src="{{ asset('assets/landing-page/images/7.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Event MIC</h5>
                        <p class="card-text">Event yang diadakan oleh MIC Dance Studio.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
