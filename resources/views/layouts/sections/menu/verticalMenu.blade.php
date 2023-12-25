<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo mb-4">
        <a href="index.html" class="app-brand-link">
            <span class="d-flex justify-content-center">
                <img src="{{ asset('assets/img/logo/logo_uin.png') }}" style="width: 70px;" alt="">
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">ADMIN</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-6">
        <!-- Dashboards -->
        <li class="menu-item {{ request()->is('admin/dashboard') ? 'active open' : '' }}">
            <a href="{{ route('admin_dashboard') }}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboards">Dashboards</div>
            </a>
        <li
            class="menu-item {{ request()->is('admin/akun/daftar') || request()->is('admin/akun/approval') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon bx bxs-user'></i>
                <div data-i18n="Form Elements">Akun</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('admin/akun/daftar') ? 'active open' : '' }}">
                    <a href="{{ route('daftar_akun_page') }}" class="menu-link">
                        <div data-i18n="Basic Inputs">Daftar Akun</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('admin/akun/approval') ? 'active open' : '' }}">
                    <a href="{{ route('approval_akun_page') }}" class="menu-link">
                        <div data-i18n="Input groups">Approval akun</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item ">
            <a href="lowongan-kerja.html" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="lowongan kerja">Lowongan Kerja</div>
                <!-- <div class="badge bg-danger rounded-pill ms-auto">5</div> -->
            </a>


            <!-- Tables -->
        <li class="menu-item">
            <a href="berita.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Tables">Berita</div>
            </a>
        </li>

        <!-- Misc -->

    </ul>
</aside>
