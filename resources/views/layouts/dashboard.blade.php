<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/DolanBoyolali.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('mini-assets/images/favicon.ico') }}">
    <!-- Include Head CSS -->
    @include('components.admin.head-css')
    @stack('css')
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .main-content {
            padding: 20px;
        }

        .page-content {
            margin-top: 20px;
        }

        .container-fluid {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .topbar-menu,
        .sidebar-menu,
        {
            background-color: #343a40;
            color: #ffffff;
        }

        .topbar-menu a,
        .sidebar-menu a,
         {
            color: #ffffff;
        }

        .topbar-menu a:hover,
        .sidebar-menu a:hover,
         {
            text-decoration: none;
            color: #ffc107;
        }

        /* .footer {
            padding: 20px;
            text-align: center;
        } */
    </style>
</head>

<body data-layout-size="boxed" data-layout="horizontal">
    <div id="layout-wrapper">
        <!-- Topbar Menu -->
        <x-admin.topbar-menu class="topbar-menu"></x-admin.topbar-menu>
        <!-- Sidebar Menu -->
        <x-admin.sidebar-menu class="sidebar-menu"></x-admin.sidebar-menu>
        <!-- Main Content -->
        <div class="main-content">
            <!-- Page Content -->
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <!-- Footer -->
            <x-admin.footer class="footer"></x-admin.footer>
        </div>
    </div>
    <!-- Include Body JavaScript -->
    @include('components.admin.body-javascript')
    @stack('scripts')
</body>

</html>
