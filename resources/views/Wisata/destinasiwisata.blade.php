@extends('layouts.app')

@section('title', 'Destinasi Wisata')

@section('content')

<div class="hero overlay animate__animated animate__fadeIn">
    <div class="img-bg rellax" data-rellax-speed="-2">
        <img src="{{ asset('assets/images/IMG_1802.jpg') }}" alt="Image" style="display: block; width: 100%; height: auto;">
    </div>
    <div class="container pt-5">
        <div class="row pt-5">
            <div class="col-12">
                <h1 class="text-center text-white" data-aos="fade-up">Destinasi Wisata</h1>
            </div>
            <div class="col-12">
                <!-- Search Bar -->
                <form class="input-group mb-4" method="GET" action="{{ route('cariwisata') }}">
                    <input type="search" class="form-control rounded-pill" placeholder="Cari Wisata"
                        aria-label="Search" name="search"
                        style="border-top-right-radius: 0; border-bottom-right-radius: 0;">
                    <button class="btn btn-success rounded-pill" type="submit"
                        style="border-top-left-radius: 0; border-bottom-left-radius: 0;">Cari</button>
                </form>
                @error('search')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</div>

<div class="content-inspirasi-wisata-jawa mb-5">
    <div class="container">
        <div class="row py-5">
            <div class="col-12">
                <h2 class="text-start fw-bold" style="color: #EE4E4E" data-aos="fade-right"> Wisata Boyolali </h2>
                <p class="mb-5 text-secondary" data-aos="fade-right">Tempat yang menarik di Boyolali, untuk membuat liburan Anda sempurna dan jangan sampai terlewatkan!</p>
            </div>
        </div>
        <div class="row">
            @forelse ($wisatas as $wisata)
                <div class="col-md-4 d-flex align-items-stretch mb-4">
                    <div class="card shadow-sm border-0" data-aos="fade-up" style="display: flex; flex-direction: column;">
                        <img src="{{ $wisata->fotoWisata() }}" class="card-img-top" alt="{{ $wisata->nama_wisata }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <p class="text-muted mb-1">{{ $wisata->created_at->format('F d, Y') }}</p>
                            <h5 class="card-title">{{ Str::limit($wisata->nama_wisata, 30) }}</h5>
                            <p class="card-text">{{ Str::limit($wisata->deskripsi_wisata, 50) }}</p>
                            <a href="{{ route('deskripsiwisata', $wisata) }}" class="btn btn-dark mt-auto">SELENGKAPNYA</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-lg-12">
                    <h3 class="text-center">Tidak ada destinasi wisata</h3>
                </div>
            @endforelse
        </div>
        <div class="mt-2 d-flex justify-content-center align-items-center">
            {{ $wisatas->links('pagination::simple-bootstrap-5') }}
        </div>
    </div>
</div>

@endsection
