@extends('layouts.dashboard')

@section('title', 'Dasbor')

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

            @if (auth()->user()->is_admin)
            <div class="row">
                <div class="col-md-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <div class="d-flex align-items-center"> 
    
                                <div class="flex-grow-1">
                                    <h5 class="card-title">Data Wisata</h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <i class="mdi mdi-map-marker-radius fs-24"></i>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h1 class="display-5">{{ $wisataCount }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h5 class="card-title">Data Ulasan</h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <i class="mdi mdi-star fs-24"></i>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h1 class="display-5">{{ $ulasanCount }}</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <div class="d-flex align-items-center"> 
    
                                <div class="flex-grow-1">
                                    <h5 class="card-title">Data Pengguna</h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <i class="mdi mdi-account-multiple fs-24"></i>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h1 class="display-5">{{ $guestCount }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-info text-white">
                        <div class="card-body">
                            <div class="d-flex align-items-center"> 
    
                                <div class="flex-grow-1">
                                    <h5 class="card-title">Data Galeri</h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <i class="mdi mdi-image-multiple fs-24"></i>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h1 class="display-5">{{ $galeriCount }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
    

                <div class="col-md-3">
                    <div class="card bg-danger text-white">
                        <div class="card-body">
                            <div class="d-flex align-items-center">  
                                <div class="flex-grow-1">
                                    <h5 class="card-title">Data Acara</h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <i class="mdi mdi-calendar-check fs-24"></i>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h1 class="display-5" >{{ $eventCount }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
@endsection
