<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo mb-4">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="d-flex justify-content-center">
                <img src="{{ asset('assets/img/logo/logo_uin.png') }}" style="width: 70px;" alt="">
            </span>
            <span class="menu-text fw-bold ms-2">
                @if (session('user')->role == 'superadmin')
                    SuperAdmin
                @else
                    Admin Perusahaan
                @endif
            </span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-6">
        <!-- Dashboards -->
        <li class="menu-item {{ request()->is('dashboard') ? 'open' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboards">Dashboards</div>
            </a>
        </li>
        @if (session('user')->role == 'superadmin')
            <li class="menu-item {{ request()->is('akun/daftar') || request()->is('akun/approval') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class='menu-icon bx bxs-user'></i>
                    <div data-i18n="Form Elements">Akun</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->is('akun/daftar') ? 'active open' : '' }}">
                        <a href="{{ route('daftar_akun_page') }}" class="menu-link">
                            <div data-i18n="Basic Inputs">Daftar Akun</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->is('akun/approval') ? 'active open' : '' }}">
                        <a href="{{ route('approval_akun_page') }}" class="menu-link">
                            <div data-i18n="Input groups">Approval akun</div>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        <li class="menu-item {{ request()->is('lowongan') ? 'open' : '' }}">
            <a href="{{ route('lowongan_page') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="lowongan kerja">Lowongan Kerja</div>
            </a>
        </li>
        @if (session('user')->role == 'superadmin')
            <li class="menu-item {{ request()->is('berita') ? 'open' : '' }}">
                <a href="{{ route('berita_page') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-table"></i>
                    <div data-i18n="Tables">Berita</div>
                </a>
            </li>
        @endif
    </ul>
</aside>
