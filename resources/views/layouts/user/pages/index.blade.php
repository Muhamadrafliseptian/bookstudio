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
                <img src="{{ asset('assets/landing-page/images/6.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>MIC DANCE STUDIO</h5>
                    <p>.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/landing-page/images/5.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>MIC DANCE STUDIO</h5>
                    <p>.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/landing-page/images/4.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>MIC DANCE STUDIO</h5>
                    <p>Teacher Of MIC DANCE STUDIO.</p>
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
@endsection
