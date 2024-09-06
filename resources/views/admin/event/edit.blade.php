@extends('layouts.dashboard')

@section('title', 'Ubah Acara')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ubah Acara</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.events.index') }}">Acara</a></li>
                        <li class="breadcrumb-item active">Ubah Acara</li>
                    </ol>
                </div>
            </div>

            <form action="{{ route('admin.dashboard.events.update', $event) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card">
                    <div class="card-header d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Ubah Data Acara</button>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-6">
                                <div>
                                    <div class="mb-3">
                                        <label for="nama_event" class="form-label">Nama Acara</label>
                                        <input class="form-control" type="text" id="nama_event" name="nama_event"
                                            placeholder="Nama Acara" value="{{ old('nama_event') ?? $event->nama_event }}">
                                        @error('nama_event')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="lokasi_event" class="form-label">Lokasi Acara</label>
                                        <input class="form-control" type="text" id="lokasi_event" name="lokasi_event"
                                            placeholder="Lokasi Acara"
                                            value="{{ old('lokasi_event') ?? $event->lokasi_event }}">
                                        @error('lokasi_event')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="deskripsi_event" class="form-label">Deskripsi Acara</label>
                                        <textarea class="form-control" id="deskripsi_event" rows="3" name="deskripsi_event" placeholder="Deskripsi Acara">{{ old('deskripsi_event') ?? $event->deskripsi_event }}</textarea>
                                        @error('deskripsi_event')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mt-3 mt-lg-0">
                                    <div class="mb-3">
                                        <label for="tanggal_event" class="form-label">Tanggal Acara</label>
                                        <input class="form-control" type="date" id="tanggal_event" name="tanggal_event"
                                            placeholder="Tanggal Acara"
                                            value="{{ old('tanggal_event') ?? $event->tanggal_event }}">
                                        @error('tanggal_event')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="foto_event" class="form-label">Foto Acara</label>
                                        <input class="form-control" type="file" id="foto_event" name="foto_event">

                                        <img src="{{ $event->fotoEvent() }}" alt="Gambar Acara" class="img-fluid mt-2"
                                            style="width: 100px">
                                        @error('foto_event')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
