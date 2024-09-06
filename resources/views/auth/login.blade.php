@extends('layouts.auth')

@section('title', 'Masuk')

@section('content')
<section class="auth vh-100 d-flex align-items-center justify-content-center" style="background-image: url('assets/images/budaya.jpg'); background-size: cover; background-position: center;">
    <div class="col-lg-4 col-md-6 col-sm-8">
        <div class="card shadow-lg rounded-3" style="background-color: white; color: #333;">
            <div class="card-body p-4">
                <h2 class="text-center mb-4" style="color: #EE4E4E;">Masuk</h2>
                @if (Session::get('success') || Session::get('error'))
                    <div class="mb-3">
                        <x-message></x-message>
                    </div>
                @endif
                <form action="{{ route('login.process') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label" style="color: #333;">Email</label>
                        <div class="input-group border rounded">
                            <span class="input-group-text bg-transparent border-0 text-dark">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input type="email" class="form-control bg-transparent border-0 text-dark" id="email" name="email" value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label" style="color: #333;">Kata Sandi</label>
                        <div class="input-group border rounded">
                            <span class="input-group-text bg-transparent border-0 text-dark">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input type="password" class="form-control bg-transparent border-0 text-dark" id="password" name="password">
                            <button class="btn btn-outline-secondary border-0" type="button" id="togglePassword">
                                <i class="bi bi-eye-slash" id="toggleIcon"></i>
                            </button>
                        </div>
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn w-100 mt-3" style="background-color: #EE4E4E; color: white;">Masuk</button>
                </form>
                <p class="text-center mt-4" style="color: #333;">Belum punya akun? <a href="{{ route('register.index') }}" style="color: #EE4E4E;">Daftar</a></p>
            </div>
        </div>
    </div>
</section>
@endsection
