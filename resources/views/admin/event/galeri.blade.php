@extends('layouts.dashboard')

@section('title', 'Tambah Galeri Acara')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Tambah Galeri Acara {{ $event->nama_event }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dasbor</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.events.index') }}">Acara</a></li>
                        <li class="breadcrumb-item active">Tambah Galeri Acara {{ $event->nama_event }}</li>
                    </ol>
                </div>

            </div>

            <form action="{{ route('admin.dashboard.events.storeGallery', $event) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Galeri Acara</label>
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
                        @forelse ($event->galeris as $galeri)
                            <div class="col-lg-3">
                                <div class="card">
                                    <img src="{{ $galeri->fotoGaleri() }}" alt="Gambar Acara {{ $loop->iteration }}"
                                        class="ratio ratio-16x9" style="width: 100%; height: 100%;">
                                    <div class="card-footer">

                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modal-{{ $loop->iteration }}">Hapus Gambar</button>

                                        <x-admin.ui.modal-delete :route="route('admin.dashboard.events.destroyGallery', [
                                            'event' => $event,
                                            'galeri' => $galeri,
                                        ])"
                                            modal_id="modal-{{ $loop->iteration }}"></x-admin.ui.modal-delete>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-lg-12">
                                <div class="alert alert-warning" role="alert">
                                    Data galeri acara tidak ditemukan
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
