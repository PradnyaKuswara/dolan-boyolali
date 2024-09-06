@extends('layouts.dashboard')

@section('title', 'Tambah Galeri')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Tambah Galeri</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.galeris.index') }}">Galeri</a></li>
                        <li class="breadcrumb-item active">Tambah Galeri</li>
                    </ol>
                </div>

            </div>

            <form action="{{ route('admin.dashboard.galeris.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Tambah Data Galeri</button>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-6">
                                <div>
                                    <div class="mb-3">
                                        <label for="nama_galeri" class="form-label">Nama Galeri</label>
                                        <input class="form-control" type="text" id="nama_galeri" name="nama_galeri"
                                            placeholder="Nama Galeri" value="{{ old('nama_galeri') }}">
                                        @error('nama_galeri')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="wisata" class="form-label">Nama Wisata</label>
                                        <input class="form-control" list="datalistWisatas" id="wisata" name="nama_wisata"
                                            autocomplete="off" value="{{ old('nama_wisata') }}"
                                            placeholder="Ketik untuk mencari wisata">
                                        <input type="text" id="wisata_id" name="wisata_id" value="{{ old('wisata_id') }}"
                                            style="display: none;">
                                        <datalist id="datalistWisatas">
                                            @foreach ($wisatas as $wisata)
                                                <option value="{{ $wisata->nama_wisata }}" data-id="{{ $wisata->id }}">
                                            @endforeach
                                        </datalist>
                                        @error('wisata_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="deskripsi_galeri" class="form-label">Deskripsi Galeri</label>
                                        <textarea class="form-control" id="deskripsi_galeri" rows="3" name="deskripsi_galeri"
                                            placeholder="Deskripsi Galeri">{{ old('deskripsi_galeri') }}</textarea>
                                        @error('deskripsi_galeri')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mt-3 mt-lg-0">
                                    <div class="mb-3">
                                        <label for="lokasi_galeri" class="form-label">Lokasi Galeri</label>
                                        <input class="form-control" type="text" id="lokasi_galeri" name="lokasi_galeri"
                                            placeholder="Lokasi Galeri" value="{{ old('lokasi_galeri') }}">
                                        @error('lokasi_galeri')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="event" class="form-label">Nama Acara</label>
                                        <input class="form-control" list="datalistEvents" id="event"
                                            value="{{ old('nama_event') }}" name="nama_event" autocomplete="off"
                                            placeholder="Ketik untuk mencari acara">
                                        <input type="text" id="event_id" name="event_id" value="{{ old('event_id') }}"
                                            style="display: none;">
                                        <datalist id="datalistEvents">
                                            @foreach ($events as $event)
                                                <option value="{{ $event->nama_event }}" data-id="{{ $event->id }}">
                                            @endforeach
                                        </datalist>
                                        @error('event_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="foto_galeri" class="form-label">Foto Galeri</label>
                                        <input class="form-control" type="file" id="foto_galeri" name="foto_galeri">
                                        @error('foto_galeri')
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

@push('scripts')
    <script>
        $('#wisata').on('input', function() {
            let wisata = $(this).val();

            let wisata_id = $('#datalistWisatas option').filter(function() {
                return this.value == wisata;
            }).data('id');

            $('#wisata_id').val(wisata_id);
        });

        $('#event').on('input', function() {
            let event = $(this).val();

            let event_id = $('#datalistEvents option').filter(function() {
                return this.value == event;
            }).data('id');

            $('#event_id').val(event_id);
        });
    </script>
@endpush
