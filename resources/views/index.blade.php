@extends('layouts.app')

@section('title', 'DolanBoyolali')

@section('content')

<div class="hero overlay">
    <div class="container">
        <div class="row align-items-center justify-content-start">
            <div class="col-lg-10">
                <h1 class="heading" data-aos="fade-up" data-aos-duration="300" data-aos-delay="500">Selamat Datang di <span style="color: #EE4E4E">Boyolali</span></h1>
                <p class="mb-5 sub-heading" data-aos="fade-up" data-aos-duration="400" data-aos-delay="600" style="color: beige">
                    Sebuah kota kecil yang terletak di Provinsi Jawa Tengah, Indonesia. Kota ini dikenal dengan keindahan alamnya yang menakjubkan dan budaya tradisional Jawa yang masih kental.
                </p>
            </div>
        </div>
    </div>
</div>

{{-- Tentang Kami --}}
<section class="about">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="500">
                <h2 class="fw-bold" style="color: #EE4E4E">Tentang Kami</h2>
                <p class="mb-5 text-secondary">Dolan Boyolali hadir sebagai bentuk dukungan yang bertujuan untuk meningkatkan potensi wisata
                     dan melindungi adat istiadat, tradisi, seni budaya, serta kearifan lokal masyarakat Boyolali.</p>
                <a href="{{ route('tentang-kami') }}" class="btn btn-primary rounded-5">Baca Selengkapnya</a>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="600">
                <img src="assets/images/Sapi.jpg" alt="Boyolali Image" class="img-fluid rounded-3 shadow-lg">
            </div>
        </div>
    </div>
</section>

<div class="divider"></div>

{{-- Destinasi --}}
<section class="destination">
    <div class="container">
        <div class="row pb-2">
            <div class="col-lg-12">
                <h2 class="text-start fw-bold" style="color: #EE4E4E">Destinasi Wisata</h2>
                <p class="mb-5 text-secondary">Tempat yang menarik di Boyolali, untuk membuat liburan Anda sempurna dan jangan sampai terlewatkan!</p>
            </div>
        </div>
        <div class="row gy-2" data-aos="fade-up" data-aos-duration="500">
            @forelse ($wisatas as $wisata)
                <div class="col-lg-3 d-flex align-items-stretch">
                    <a href="{{ route('deskripsiwisata', $wisata) }}" class="text-decoration-none w-100">
                        <div class="img-destination d-flex flex-column" style="height: 100%;">
                            <img src="{{ $wisata->fotoWisata() }}" alt="{{ $wisata->nama_wisata }}" class="img-fluid rounded" style="height: 200px; object-fit: cover;">
                            <div class="caption mt-auto">
                                <p class="text-center">{{ $wisata->nama_wisata }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-lg-12">
                    <h3 class="text-center">Tidak ada destinasi wisata</h3>
                </div>
            @endforelse
            <div class="d-flex justify-content-center mt-4">
                <a href="{{ route('destinasiwisata') }}" class="p-3 rounded text-center text-decoration-none" style="color:black; border: 2px solid #EE4E4E;">
                    <b>Tampilkan Semua Wisata</b>
                </a>
            </div>
        </div>
    </div>
</section>


<div class="divider"></div>

<!-- Event Section -->
<section class="destination">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 pb-2">
                <h2 class="text fw-semibold" style="color: #EE4E4E">Acara</h2>
                <p class="mb-5 text-secondary">Ikuti Acara yang menarik di Boyolali, jangan sampai terlewatkan!</p>
            </div>
        </div>
        <div class="row align-items-center justify-content-center" data-aos="fade-down" data-aos-duration="600">
            @forelse ($events as $event)
                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="{{ route('deskripsievent', $event) }}" class="text-decoration-none">
                        <div class="card h-100 info-card">
                            <img src="{{ $event->fotoEvent() }}" alt="{{ $event->nama_event }}" class="card-img-top info-img">
                            <div class="card-body">
                                <h5 class="card-title">{{ $event->nama_event }}</h5>
                                <p class="card-text">{{ Str::limit($event->deskripsi_event, 80) }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-lg-12">
                    <h3 class="text-center">Tidak ada Acara</h3>
                </div>
            @endforelse
            <div class="d-flex justify-content-center mt-4">
                <a href="{{ route('events') }}" class="p-3 rounded text-center text-decoration-none" style="color:black; border: 2px solid #EE4E4E;">
                    <b>Tampilkan Semua Acara</b>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

<style>
    .hero {
        position: relative;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
        background-image: url('assets/images/photo-1685360594641-91fb52833b3b.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .hero .heading {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .hero .sub-heading {
        font-size: 1.5rem;
    }

    .about, .destination, .guide {
        padding: 5rem 0;
        background-color: #f9f9f9;
    }

    .about .btn-primary {
        background-color: #EE4E4E;
        border-color: #EE4E4E;
    }

    .destination .img-destination, .guide .card {
        overflow: hidden;
        border-radius: 1.5rem;
        transition: transform 0.3s ease;
    }

    .destination .img-destination:hover, .guide .card:hover {
        transform: scale(1.05);
    }

    .destination .caption, .guide .card-body {
        padding: 1rem;
        border-radius: 0 0 1.5rem 1.5rem;
        text-align: center;
    }

    .info-card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .info-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .info-img {
        height: 200px;
        object-fit: cover;
        border-bottom: 2px solid #eee;
    }

    .card-body {
        padding: 1.5rem;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #000;
    }

    .card-text {
        font-size: 1rem;
        color: #6c757d;
        margin-top: auto;
    }

    .divider {
        border-top: 2px solid #EE4E4E;
        width: 75%;
        margin: auto;
    }
</style>
