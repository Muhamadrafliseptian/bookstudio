@extends('layouts.user.core.main-user')
@section('content')
    <div class="container py-3">
        @if (session("error"))
        <div class="alert alert-danger">
            <strong>
                Maaf,
            </strong> {!! session("error") !!}
        </div>
        @endif
        <h5>
            Detail Paket
        </h5>
        <div class="row">
            <div class="col-md-6">
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
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <p>Fasilitas:</p>
                    <div class="row">
                        <div class="col-6">
                            <ul>
                                @foreach ($dataFasilitas as $item)
                                    <li>
                                        {{ $item->nama }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-6">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <p>
                                        <span>
                                            <b>
                                                Nama
                                            </b>
                                        </span>
                                        : {{ $detail->name }}
                                    </p>
                                    <p>
                                        <span>
                                            <b>
                                                Harga
                                            </b>
                                        </span>
                                        : Rp. {{ $detail->amount }}
                                    </p>
                                    <p class="mb-2">
                                        <span>
                                            <b>Durasi Sewa</b>
                                        </span>
                                        : {{ $detail->duration_start }} s/d {{ $detail->duration_end }}
                                        menit
                                    </p>
                                    @if (Auth::check())
                                        <form method="POST"
                                            action="{{ url('/create_payment', ['id_paket' => $detail->id_paket]) }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="" class="mb-2">
                                                    <b>Tanggal Sewa</b>
                                                </label>
                                                <input type="date" name="tanggal_pesan" id="tanggal_pesan"
                                                    class="form-control mb-2" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="waktu_pesan" class="mb-2">
                                                    <strong>
                                                        Waktu Sewa
                                                    </strong>
                                                </label>
                                                <select name="waktu_pesan" class="form-control" id="waktu_pesan">
                                                    <option value="">- Pilih -</option>
                                                    @php
                                                        $startHour = 10;
                                                        $endHour = 21;

                                                        for ($hour = $startHour; $hour <= $endHour; $hour++) {
                                                            $time = str_pad($hour, 2, '0', STR_PAD_LEFT) . ':00';
                                                            echo "<option value=\"$time\">$time</option>";
                                                        }
                                                    @endphp
                                                </select>
                                            </div>
                                            @if ($detail->id_paket == "PKT-1")
                                                @if ($count >= 10)
                                                <input type="hidden" name="klaim" value="1">
                                                <button type="submit" class="btn btn-sm btn-primary mt-3">
                                                    Pesan + Klaim
                                                </button>
                                                @else
                                                <button type="submit" class="btn btn-sm btn-primary mt-3">
                                                    Pesan Sekarang
                                                </button>
                                                @endif
                                            @else
                                                <button type="submit" class="btn btn-sm btn-primary mt-3">
                                                    Pesan Sekarang
                                                </button>
                                            @endif
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
