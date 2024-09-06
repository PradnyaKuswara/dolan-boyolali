@extends('layouts.dashboard')

@section('title', 'Ulasan')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Wisata</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dasbor</a></li>
                        <li class="breadcrumb-item active">Ulasan</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                @forelse ($wisatas as $wisata)
                    <div class="col-md-3">
                        <a href="{{ route('admin.dashboard.ulasans.detail', $wisata) }}">
                            <div class="card">
                                <img class="card-img-top img-fluid" src="{{ $wisata->fotoWisata() }}" alt="Card image cap">
                                <div class="card-body">
                                    <div class="d-flex justify-content-end mt-2">
                                        <a href="javascript:void(0)"
                                            class="btn  btn-outline-primary">{{ $wisata->kategori_wisata }}</a>
                                    </div>
                                    <h4 class="card-title mt-2">{{ $wisata->nama_wisata }}</h4>
                                    <p class="card-text">{{ Str::limit($wisata->deskripsi_wisata, 100) }}</p>
                                    <p class="card-text">
                                        <small class="text-muted">{{ $wisata->created_at->format('d F Y') }}</small>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                @empty
                    <div class="col-12">
                        <div class="alert alert-warning" role="alert">
                            Data tidak ditemukan
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="mt-2">
                {{ $wisatas->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
