@extends('layouts.app')

@section('title', 'Event Boyolali')

@section('content')

    <div class="content-deskripsi-event pt-5">
        <div class="container">
            <div class="row py-5 justify-content-center">
                <h1>{{ $event->nama_event }}</h1>
                <div class="col-md-8 mt-4">
                    <div class="d-flex justify-content-center mb-3">
                        <img src="{{ $event->fotoEvent() }}" class="img-fluid rounded shadow mb-3"
                            alt="{{ $event->nama_event }}" data-bs-toggle="modal" data-bs-target="#imageModal">
                    </div>

                    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <img src="{{ $event->fotoEvent() }}" class="img-fluid rounded"
                                        alt="{{ $event->nama_event }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        @forelse ($event->galeris as $galeri)
                            <div class="col-lg-3 col-md-4 col-6 mb-4">
                                <div class="card border-0 shadow-sm">
                                    <img src="{{ $galeri->fotoGaleri() }}" alt="Gambar Event {{ $loop->iteration }}"
                                        class="img-fluid rounded" data-bs-toggle="modal"
                                        data-bs-target="#imageModal{{ $loop->iteration }}">
                                </div>
                            </div>

                            <div class="modal fade" id="imageModal{{ $loop->iteration }}" tabindex="-1"
                                aria-labelledby="imageModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-body p-0">
                                            <img src="{{ $galeri->fotoGaleri() }}" class="img-fluid rounded"
                                                alt="{{ $galeri->nama_galeri }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <h3 class="text-center">Tidak ada galeri</h3>
                            </div>
                        @endforelse
                    </div>
                    <p class="card-text" style="text-align: justify">{{ $event->deskripsi_event }}</p>
                    <hr class="pro-hr">
                    <div class="map-image mb-3 d-flex justify-content-center mt-4">
                        <iframe src="{{ $event->lokasi_event }}" width="100%" height="450"
                            style="border:0; border-radius: 10px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);"></iframe>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm border-0">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="mb-0">Acara Populer</h5>
                        </div>
                        <div class="card-body">
                            <div class="nearby-places">
                                @forelse ($popularEvents as $popular)
                                    <a href="{{ route('deskripsievent', $popular) }}" class="text-decoration-none">
                                        <div class="nearby-place-item mb-3">
                                            <img src="{{ $popular->fotoEvent() }}" class="img-fluid rounded mb-2"
                                                alt="{{ $popular->nama_event }}"
                                                style="width: 100%; height: auto; object-fit: cover;">
                                            <h6 class="card-title mb-1">{{ $popular->nama_event }}</h6>
                                        </div>
                                    </a>
                                @empty
                                    <p class="text-muted">Tidak ada acara populer</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
