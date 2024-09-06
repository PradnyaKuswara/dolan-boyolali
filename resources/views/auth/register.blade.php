@extends('layouts.auth')

@section('title', 'Daftar')

@section('content')
<section class="auth vh-100 d-flex align-items-center justify-content-center" style="background-image: url('assets/images/PatungKuda.jpg'); background-size: cover; background-position: center; opacity: 0.9;">
    <div class="col-lg-4 col-md-6 col-sm-8">
        <div class="card shadow-lg rounded-3" style="background-color: white; color: #333;">
            <div class="card-body p-4">
                <h2 class="text-center mb-4" style="color: #EE4E4E;">Daftar</h2>
                <x-message></x-message>
                <form action="{{ route('register.process') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label" style="color: #333;">Nama</label>
                        <div class="input-group border rounded">
                            <span class="input-group-text bg-transparent border-0 text-dark">
                                <i class="bi bi-person"></i>
                            </span>
                            <input type="text" class="form-control bg-transparent border-0 text-dark" id="name" name="name" value="{{ old('name') }}">
                        </div>
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label" style="color: #333;">Nama Pengguna</label>
                        <div class="input-group border rounded">
                            <span class="input-group-text bg-transparent border-0 text-dark">
                                <i class="bi bi-person-circle"></i>
                            </span>
                            <input type="text" class="form-control bg-transparent border-0 text-dark" id="username" name="username" value="{{ old('username') }}">
                        </div>
                        @error('username')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label" style="color: #333;">Email</label>
                        <div class="input-group border rounded">
                            <span class="input-group-text bg-transparent border-0 text-dark">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input type="email" class="form-control bg-transparent border-0 text-dark" id="email" name="email" value="{{ old('email') }}">
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
                    <button type="submit" class="btn w-100 mt-3" style="background-color: #EE4E4E; color: white;">Daftar</button>
                </form>
                <p class="text-center mt-4" style="color: #333;">Sudah punya akun? <a href="{{ route('login.index') }}" style="color: #EE4E4E;">Masuk</a></p>
            </div>
        </div>
    </div>
</section>
@endsection
