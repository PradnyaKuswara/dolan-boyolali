@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')

<div class="tentang-kami d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4 fw-bold">Tentang Kami</h1>
            </div>
        </div>
    </div>
</div>

<div class="content-tentang-kami">
    <div class="container">
        <div class="row py-5 align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <!-- Isi Tentang kami -->
                <h2 class="fw-bold">Tentang Kami</h2>
                <p class="lead">Selamat datang di DolanBoyolali, portal e-tourism yang didirikan untuk mempromosikan dan mengembangkan potensi wisata di daerah yang indah ini. 
                    Dengan perpaduan antara keindahan alam, 
                    budaya yang kaya, serta keramahan masyarakat lokal, 
                    Boyolali memiliki segala sesuatu yang dibutuhkan untuk menjadi destinasi wisata favorit.
                    Melalui platform ini, kami menyediakan informasi lengkap tentang destinasi wisata, acara budaya yang ada di Boyolali. 
                    Kami percaya bahwa dengan memanfaatkan teknologi digital, kami dapat menjembatani jarak dan memperkenalkan pesona Boyolali kepada wisatawan domestik maupun mancanegara. 
                    Terima kasih telah mengunjungi DolanBoyolali, dan kami berharap Anda menikmati pengalaman eksplorasi virtual ini serta terinspirasi untuk datang dan merasakan langsung keindahan Boyolali.</p>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                <img src="{{ asset('assets/images/DolanBoyolali.png') }}" alt="Boyolali" class="img-fluid rounded-3 shadow-lg">
            </div>
        </div>
    </div>
</div>

@endsection

<style>
    .tentang-kami {
        background-image: url('assets/images/IMG_1802.jpg');
        background-size: cover;
        background-position: center;
        padding-top: 5rem;
        padding-bottom: 5rem;
        color: white;
        text-align: center;
    }

    .content-tentang-kami {
        background-color: #f9f9f9;
        padding-top: 5rem;
        padding-bottom: 5rem;
    }

    .content-tentang-kami h2 {
        color: #EE4E4E;
    }

    .content-tentang-kami p {
        text-align: justify;
        color: #333;
    }

    .rounded-3 {
        border-radius: 1.5rem !important;
    }
</style>
