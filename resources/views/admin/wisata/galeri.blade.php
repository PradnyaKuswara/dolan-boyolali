@extends('layouts.dashboard')

@section('title', 'Tambah Galeri Wisata')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Tambah Galeri Wisata {{ $wisata->nama_wisata }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.wisatas.index') }}">Wisata</a></li>
                        <li class="breadcrumb-item active">Tambah Galeri Wisata {{ $wisata->nama_wisata }}</li>
                    </ol>
                </div>

            </div>

            <form action="{{ route('admin.dashboard.wisatas.storeGallery', $wisata) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Galeri Wisata</label>
                                        <input class="form-control" type="file" id="image" name="image">
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tambah Gambar</button>
                    </div>
                </div>
            </form>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @forelse ($wisata->galeris as $galeri)
                            <div class="col-lg-3">
                                <div class="card">
                                    <img src="{{ $galeri->fotoGaleri() }}" alt="Gambar Wisata {{ $loop->iteration }}"
                                        class="ratio ratio-16x9" style="width: 100%; height: 100%;">
                                    <div class="card-footer">

                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modal-{{ $loop->iteration }}">Hapus Gambar</button>

                                        <x-admin.ui.modal-delete :route="route('admin.dashboard.wisatas.destroyGallery', [
                                            'wisata' => $wisata,
                                            'galeri' => $galeri,
                                        ])"
                                            modal_id="modal-{{ $loop->iteration }}"></x-admin.ui.modal-delete>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-lg-12">
                                <div class="alert alert-warning" role="alert">
                                    Data galeri wisata tidak ditemukan
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
