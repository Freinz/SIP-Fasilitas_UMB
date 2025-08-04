<!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header d-flex align-items-center justify-content-center" style="gap:10px;">
            <a href="/dashboard" class="b-brand text-primary d-flex align-items-center">
                <!-- ========   Change your logo from here   ============ -->
                <img src="{{ URL::asset('image/umb-logo.png') }}" style="max-width:60px; height:auto;" alt="logo Universitas Muhammadiyah Banjarmasin">
                <span class="badge bg-brand-color-2 rounded-pill ms-2 theme-version" style="vertical-align:middle;">SIP Fasilitas UM Banjarmasin</span>
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                @include('layouts.menu-list')
            </ul>

        </div>
        <div class="card pc-user-card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <img src="{{ URL::asset('build/images/user/avatar-1.jpg') }}" alt="user-image"
                            class="user-avtar wid-45 rounded-circle">
                    </div>
                    <div class="flex-grow-1 ms-3 me-2">
                        <h6 class="mb-0">Jonh Smith</h6>
                        <small>Administrator</small>
                    </div>
                    <div class="dropdown">
                        <a href="#" class="btn btn-icon btn-link-secondary avtar arrow-none dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="0,20">
                            <i class="ph-duotone ph-windows-logo"></i>
                        </a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a class="pc-user-links">
                                        <i class="ph-duotone ph-user"></i>
                                        <span>My Account</span>
                                    </a></li>
                                <li><a class="pc-user-links">
                                        <i class="ph-duotone ph-gear"></i>
                                        <span>Settings</span>
                                    </a></li>
                                <li><a class="pc-user-links">
                                        <i class="ph-duotone ph-lock-key"></i>
                                        <span>Lock Screen</span>
                                    </a></li>
                                <li><a class="pc-user-links" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                        <i class="ph-duotone ph-power"></i>
                                        <span>Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- [ Sidebar Menu ] end -->