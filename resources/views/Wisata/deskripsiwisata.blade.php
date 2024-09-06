@extends('layouts.app')

@section('title', 'DolanBoyolali')

@section('content')

    <div class="content-petualangan pt-5">
        <div class="container">
            <div class="row py-5 justify-content-center">
                <h1>{{ $wisata->nama_wisata }}</h1>
                <div class="col-md-8 mt-4">
                    <div class="d-flex justify-content-center mb-3">
                        <img src="{{ $wisata->fotoWisata() }}" class="img-fluid rounded shadow mb-3"
                            alt="{{ $wisata->nama_wisata }}" data-bs-toggle="modal" data-bs-target="#imageModal">
                    </div>
                    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <img src="{{ $wisata->fotoWisata() }}" class="img-fluid rounded"
                                        alt="{{ $wisata->nama_wisata }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        @forelse ($wisata->galeris as $galeri)
                            <div class="col-lg-3 col-md-4 col-6 mb-4">
                                <div class="card border-0 shadow-sm">
                                    <img src="{{ $galeri->fotoGaleri() }}" alt="Gambar Wisata {{ $loop->iteration }}"
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
                                <h3 class="text-center" style="display: none;">Tidak ada galeri</h3>
                            </div>
                        @endforelse
                    </div>
                    <p class="card-text" style="text-align: justify">{{ $wisata->deskripsi_wisata }}</p>
                    <hr class="pro-hr">
                    <div class="map-image mb-3 d-flex justify-content-center mt-4">
                        <iframe src="{{ $wisata->lokasi_wisata }}" width="100%" height="450"
                            style="border:0; border-radius: 10px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);"></iframe>
                    </div>

                    <div class="card mt-4 shadow-sm border-0">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="mb-0"><i class="fas fa-comment-dots me-2"></i>Ulasan Wisata</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.dashboard.ulasans.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="wisata_id" value="{{ $wisata->id }}">
                                <div class="form-group mb-3">
                                    <label for="ulasan" class="form-label">Ulasan</label>
                                    <textarea class="form-control" id="ulasan" name="komentar" rows="4" placeholder="Tulis ulasan Anda"></textarea>
                                    @error('komentar')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success w-100"><i
                                        class="fas fa-paper-plane me-2"></i>Kirim Ulasan</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm border-0">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="mb-0">Tempat Terdekat</h5>
                        </div>
                        <div class="card-body">
                            <div class="nearby-places">
                                @forelse ($nearbyPlaces as $place)
                                    <a href="{{ route('deskripsiwisata', $place) }}" class="text-decoration-none">
                                        <div class="nearby-place-item mb-3">
                                            <img src="{{ $place->fotoWisata() }}" class="img-fluid rounded mb-2"
                                                alt="{{ $place->nama_wisata }}"
                                                style="width: 100%; height: auto; object-fit: cover;">
                                            <h6 class="card-title mb-1">{{ $place->nama_wisata }}</h6>
                                            <p class="text-muted mb-0">{{ $place->alamat_wisata }}</p>
                                            <p class="text-muted mb-0" style="font-size: 0.9rem;">
                                                {{ round($place->distance, 1) }} km dari lokasi</p>
                                        </div>
                                    </a>
                                @empty
                                    <p class="text-muted">Tidak ada tempat wisata terdekat.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card mb-4 shadow-sm border-0" style="height: 400px; overflow-y: auto;">
                        <div class="card-header bg-secondary text-white d-flex align-items-center">
                            <i class="fas fa-comments me-2"></i>
                            <h5 class="mb-0">Ulasan</h5>
                        </div>
                        <div class="card-body">
                            <div class="ulasan">
                                <div class="row">
                                    @forelse ($wisata->ulasans as $ulasan)
                                        <div class="d-flex mb-3 align-items-start">
                                            <img src="{{ 'https://eu.ui-avatars.com/api/?name=' . $ulasan->user->name . '&size=40' }}"
                                                class="img-fluid rounded-circle me-3" alt="{{ $ulasan->user->name }}">
                                            <div class="flex-grow-1">
                                                <h6 class="card-text mb-1">{{ $ulasan->user->name }}</h6>
                                                <p class="card-text mb-2">{{ $ulasan->komentar }}</p>
                                                <small
                                                    class="text-muted">{{ $ulasan->created_at->format('d M Y') }}</small>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12">
                                            <h3 class="text-center">Tidak ada ulasan</h3>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
