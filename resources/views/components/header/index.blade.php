<header>
    <nav class="navbar navbar-expand-lg fixed-top" id="nav-container" style="padding: 0.5rem 0;">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}" style="font-size: 1rem;">
                <img src="{{ asset('assets/images/DolanBoyolali.png') }}" alt="DolanBoyolali Logo" style="height: 50px;">
                Dolan<span style="color: #EE4E4E">Boyolali</span>
            </a>
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('index') }}" style="font-size: 0.9rem;">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tentang-kami') }}" style="font-size: 0.9rem;">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('destinasiwisata') }}" style="font-size: 0.9rem;">Destinasi Wisata</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('events') }}" style="font-size: 0.9rem;">Acara</a>
                    </li>
                </ul>
                <div class="d-flex gap-2">
                    @if (auth()->check())
                        @if (auth()->user()->is_admin)
                            <a class="btn text-white" style="border: 2px solid #EE4E4E; font-size: 0.9rem;"
                                href="{{ route('admin.dashboard.index') }}" role="button">Dasbor</a>
                        @else
                            <a class="btn text-white" style="border: 2px solid #EE4E4E; font-size: 0.9rem;"
                                href="{{ route('user.dashboard.index') }}" role="button">Dasbor</a>
                            <form action="{{ route('user.dashboard.destroy') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn text-white" style="border: 2px solid #EE4E4E; font-size: 0.9rem;">
                                    Logout
                                </button>
                            </form>
                        @endif
                    @else
                        <a class="btn text-white" style="border: 2px solid #EE4E4E; font-size: 0.9rem;" href="{{ route('login.index') }}"
                            role="button">Masuk</a>
                        <a class="btn text-white" style="background-color: #EE4E4E; font-size: 0.9rem;" href="{{ route('register.index') }}"
                            role="button">Daftar</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</header>
