@extends('layouts.dashboard')

@section('title', 'Wisata')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Wisata</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dasbor</a></li>
                        <li class="breadcrumb-item active">Wisata</li>
                    </ol>
                </div>

            </div>

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <a href="{{ route('admin.dashboard.wisatas.create') }}" class="btn btn-primary">Tambah Data</a>
                    <div class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" id="search"
                                @if (session('keyword')) value="{{ session('keyword') }}" @endif
                                placeholder="Search...">
                            <button class="btn btn-primary" type="button"><i
                                    class="bx bx-search-alt align-middle"></i></button>
                        </div>
                    </div>
                </div>

                <div class="card-body" id="table">
                    @include('admin.wisata.table')
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/search.js') }}"></script>
    <script>
        search("search", "table", "{{ url('admin/dashboard/wisatas/search?') }}")
    </script>
@endpush
