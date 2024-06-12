@extends('layouts.user.core.main-user')
@section('content')
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/landing-page/images/1.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/landing-page/images/2.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/landing-page/images/3.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="text-center p-5">
        <h5>
            Paket Studio
        </h5>

        <div class="row mt-5">
            @foreach ($paketData as $item)
                <div class="col-sm-4 mb-3 mb-sm-0">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{$item->name}}
                            </h5>
                            <p class="card-text">
                                Rp. {{$item->amount}}
                            </p>
                            <a href="{{ url('/detail_paket/' . $item->id_paket) }}" class="btn btn-sm btn-primary">lihat detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container">
        <div class="alert alert-success">
            Kumpulkan Hingga
            <strong>
                Minimal 10 Point.
            </strong> Agar Bisa Mendapatkan Akses
            <strong>
                Free 1 Jam
            </strong>
            <hr>
            <div>
                <strong>
                    Note : *Berlaku Hanya Untuk Paket 1 Jam*
                </strong>
            </div>
        </div>
    </div>
@endsection
