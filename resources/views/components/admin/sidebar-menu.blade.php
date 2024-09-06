<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                    @if (auth()->user()->is_admin)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="{{ route('admin.dashboard.index') }}"
                                id="topnav-dashboard" role="button">
                                <i data-feather="home"></i><span data-key="t-dashboards">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none"
                                href="{{ route('admin.dashboard.wisatas.index') }}" id="topnav-dashboard"
                                role="button">
                                <i data-feather="compass"></i><span data-key="t-dashboards">Wisata</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none"
                                href="{{ route('admin.dashboard.events.index') }}" id="topnav-dashboard" role="button">
                                <i data-feather="slack"></i><span data-key="t-dashboards">Acara</span>
                            </a>
                        </li>
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none"
                                href="{{ route('admin.dashboard.galeris.index') }}" id="topnav-dashboard"
                                role="button">
                                <i data-feather="grid"></i><span data-key="t-dashboards">Galeri</span>
                            </a>
                        </li> --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none"
                                href="{{ route('admin.dashboard.ulasans.index') }}" id="topnav-dashboard"
                                role="button">
                                <i data-feather="grid"></i><span data-key="t-dashboards">Ulasan</span>
                            </a>
                        </li>
                    @endif

                    @if (!auth()->user()->is_admin)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="{{ route('user.dashboard.index') }}"
                                id="topnav-dashboard" role="button">
                                <i data-feather="home"></i><span data-key="t-dashboards">Dasbor</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none"
                                href="{{ route('user.dashboard.ulasans.indexUlasan') }}" id="topnav-dashboard"
                                role="button">
                                <i data-feather="grid"></i><span data-key="t-dashboards">Ulasan</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</div>
