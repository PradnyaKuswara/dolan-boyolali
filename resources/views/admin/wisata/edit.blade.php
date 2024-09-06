@extends('layouts.dashboard')

@section('title', 'Tambah Wisata')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ubah Wisata</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dasbor</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.wisatas.index') }}">Wisata</a></li>
                        <li class="breadcrumb-item active">Ubah Wisata</li>
                    </ol>
                </div>

            </div>

            <form action="{{ route('admin.dashboard.wisatas.update', $wisata) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card">
                    <div class="card-header d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Ubah Data Wisata</button>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-6">
                                <div>
                                    <div class="mb-3">
                                        <label for="nama_wisata" class="form-label">Nama Wisata</label>
                                        <input class="form-control" type="text" id="nama_wisata" name="nama_wisata" placeholder="Nama Wisata"
                                            value="{{ old('nama_wisata') ?? $wisata->nama_wisata }}">
                                        @error('nama_wisata')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="latitude" class="form-label">Latitude</label>
                                        <input class="form-control" type="text" id="latitude" name="latitude" placeholder="Latitude"
                                            value="{{ old('latitude') ?? $wisata->latitude }}">
                                        @error('latitude')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="foto_wisata" class="form-label">Foto Wisata</label>
                                        <input class="form-control" type="file" id="foto_wisata" name="foto_wisata">

                                        <img src="{{ $wisata->fotoWisata() }}" alt="Gambar Wisata" class="img-fluid mt-2"
                                            style="width: 100px">
                                        @error('foto_wisata')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="deskripsi_wisata" class="form-label">Deskripsi Wisata</label>
                                        <textarea class="form-control" id="deskripsi_wisata" rows="3" name="deskripsi_wisata" placeholder="Deskripsi Wisata">{{ old('deskripsi_wisata') ?? $wisata->deskripsi_wisata }}</textarea>
                                        @error('deskripsi_wisata')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mt-3 mt-lg-0">
                                    <div class="mb-3">
                                        <label for="lokasi_wisata" class="form-label">Lokasi Wisata</label>
                                        <input class="form-control" type="text" id="lokasi_wisata" name="lokasi_wisata" placeholder="Lokasi Wisata"
                                            value="{{ old('lokasi_wisata') ?? $wisata->lokasi_wisata }}">
                                        @error('lokasi_wisata')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="longitude" class="form-label">Longitude</label>
                                        <input class="form-control" type="text" id="longitude" name="longitude" placeholder="Longitude"
                                            value="{{ old('longitude') ?? $wisata->longitude }}">
                                        @error('longitude')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="kategori_wisata" class="form-label">Kategori Wisata</label>
                                        <select class="form-select" id="kategori_wisata" name="kategori_wisata">
                                            <option value="" disabled selected>Pilih Kategori Wisata</option>
                                            <option value="alam"
                                                {{ $wisata->kategori_wisata == 'alam' ? 'selected' : '' }}>Wisata Alam
                                            </option>
                                            <option value="buatan"
                                                {{ $wisata->kategori_wisata == 'buatan' ? 'selected' : '' }}>Wisata Buatan
                                            </option>
                                            <option value="sejarah"
                                                {{ $wisata->kategori_wisata == 'sejarah' ? 'selected' : '' }}>Wisata
                                                Sejarah
                                            </option>


                                        </select>
                                        @error('kategori_wisata')
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
