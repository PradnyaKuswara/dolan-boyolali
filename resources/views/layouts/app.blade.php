<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/DolanBoyolali.png') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rellax/1.12.1/rellax.min.js"></script>
    @stack('css')
    <style>
        .star-rating {
            font-size: 1.5rem;
            color: #ffd700;
            cursor: pointer;
        }
        .star-rating input[type="radio"] {
            display: none;
        }
        .star-rating label {
            margin: 0;
            padding: 0;
        }
        .star-rating .fa-star {
            transition: color 0.2s;
        }
        .star-rating .fa-star.checked {
            color: #ffd700;
        }
    </style>
    
</head>

<body>
    <x-header />
    <main>
        @yield('content')
    </main>
    <x-footer />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script>
        AOS.init();
    </script>
    <!-- Add Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Add AOS (Animate On Scroll) Library -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init();
</script>
<script>
    var rellax = new Rellax('.rellax');
</script>

    <script>
        const navbar = document.getElementById("nav-container");

        window.addEventListener("scroll", () => {
            const navbar = document.getElementById("nav-container");
            if (window.pageYOffset < 150 && window.matchMedia('(min-width: 992px)')) {
                if (
                    {{ request()->routeIs('deskripsiwisata') || request()->routeIs('deskripsievent') ? 'true' : 'false' }}
                ) {
                    navbar.style.backgroundColor = "#000";
                } else {
                    navbar.style.backgroundColor = "transparent";
                }
                navbar.style.transition = "0.5s";
            } else if (window.pageYOffset > 150) {
                navbar.style.backgroundColor = "#000";
                navbar.style.transition = "0.5s";
                navbar.style.opacity = "0.85";
            }
        });
    </script>
    @stack('scripts')
</body>

</html>
