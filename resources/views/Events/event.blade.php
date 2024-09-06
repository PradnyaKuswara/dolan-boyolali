@extends('layouts.app')

@section('title', 'Events')

@section('content')
<div class="hero overlay animate__animated animate__fadeIn">
    <div class="position: relative; display: inline-block; overflow: hidden; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
        <img src="assets/images/IMG_5626.JPG" alt="Image" style="display: block; width: 100%; height: auto;">
    </div>

    <div class="container pt-5">
        <div class="row pt-5">
            <div class="col-12">
                <h1 class="text-center text-white" data-aos="fade-up">Acara</h1>
            </div>
            <div class="col-12">
                <!-- Search Bar -->
                <form class="input-group mb-4" method="GET" action="{{ route('carievent') }}">
                    <input type="search" class="form-control rounded-pill" placeholder="Cari Event" aria-label="Search"
                        name="search" style="border-top-right-radius: 0; border-bottom-right-radius: 0;">
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


<div class="content-budaya mb-5">
    <div class="container">
        <div class="row py-5">
            <div class="col-12">
                <h2 class="text fw-semibold" style="color: #EE4E4E" data-aos="fade-right">Acara</h2>
                <p class="mb-5 text-secondary" data-aos="fade-right">Ikuti Acara yang menarik di Boyolali, jangan sampai terlewatkan!</p>
            </div>
        </div>
        <div class="row">
            @forelse ($events as $event)
                <div class="col-md-3" data-aos="zoom-in">
                    <div class="card mb-4" style="height: 100%;">
                        <img src="{{ $event->fotoEvent() }}" class="card-img-top" alt="{{ $event->nama_event }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ Str::limit($event->nama_event, 20) }}</h5>
                            <p class="card-text mb-4">{{ Str::limit($event->deskripsi_event, 50) }}</p>
                            <a href="{{ route('deskripsievent', $event) }}" class="btn btn-dark mt-auto">SELENGKAPNYA</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-lg-12">
                    <h3 class="text-center">Tidak ada event</h3>
                </div>
            @endforelse
        </div>
    </div>
</div>

<div class="mt-2 d-flex justify-content-center align-items-center">
    {{ $events->links('pagination::simple-bootstrap-5') }}
</div>
@endsection

