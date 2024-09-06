@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Dasbor</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dasbor</a></li>
                        <li class="breadcrumb-item active">Utama</li>
                    </ol>
                </div>
            </div>
            @if (!auth()->user()->is_admin)
                <div class="row">
                    <div class="col-md-3">
                        <div class="card border border-primary">
                            <div class="card-header bg-transparent border-primary">
                                <h5 class="my-0 text-primary"></i>Data Ulasan</h5>
                            </div>
                            <div class="card-body">
                                <h1 class="">{{ $ulasanCount }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
