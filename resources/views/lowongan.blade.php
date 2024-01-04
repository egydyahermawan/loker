@extends('layouts/blankLayout')

@section('title', $role == 'superadmin' ? 'Dashboard - SuperAdmin' : 'Dashboard - Admin Perusahaan')
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
@endsection

@section('content')

    <body>
        @if (session('success'))
            <div class="bs-toast toast toast-placement-ex m-2 fade bg-success top-0 end-0 show" role="alert"
                aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
                <div class="toast-header">
                    <i class="bx bx-bell me-2"></i>
                    <div class="me-auto fw-medium">Berhasil</div>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>
        @endif
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->
                @include('layouts.sections.menu.verticalMenu')
                <!-- / Menu -->

                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Navbar -->
                    @include('layouts.sections.navbar.navbar')
                    <!-- / Navbar -->

                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Content -->
                        <div class="container-xxl flex-grow-1 container-p-y">
                            @if ($role == 'admin_perusahaan')
                                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Lowongan / </span>Lowongan
                                    Perusahaan
                                    Mu</h4>
                                <!-- Button trigger modal -->
                                <button onclick="window.location.href = '{{ route('buka_lowongan_page') }}'"
                                    class="btn btn-primary">Buka Lowongan</button>
                                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalCenter">
                                    Buka Lowongan
                                </button> --}}
                            @else
                                <h4 class="py-3 mb-4"><span class="text-muted fw-light">Lowongan / </span>Daftar Lowongan
                                </h4>
                            @endif

                            <div class="row mt-4">
                                @foreach ($lowongan as $item)
                                    <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $item->title }}</h5>
                                                @if ($item->status == 'available')
                                                    <h6 class="card-subtitle text-success">{{ $item->status }}</h6>
                                                @elseif ($item->status == 'upcoming')
                                                    <h6 class="card-subtitle text-muted">{{ $item->status }}</h6>
                                                @else
                                                    <h6 class="card-subtitle text-danger">{{ $item->status }}</h6>
                                                @endif

                                                {{-- <img class="d-flex mx-auto my-4 rounded" src="/storage/{{ $item->image }}"
                                                    alt="Card image cap"> --}}
                                                <div class="my-3 rounded"
                                                    style="background-image: url('/storage/{{ $item->image }}'); background-size: cover; height: 250px; background-position: center;">
                                                </div>
                                                <p class="card-text"
                                                    style="display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                                    {{ strip_tags($item->description) }}</p>
                                                <div class="d-flex flex-row gap-2 mb-3">
                                                    <div class="d-flex flex-row align-items-center">
                                                        <span class="badge bg-label-info me-2">Open</span>
                                                        {{ $item->open }}
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center">
                                                        <span class="badge bg-label-warning me-2">Closed</span>
                                                        {{ $item->closed }}
                                                    </div>
                                                </div>
                                                @if (session('user')->role != 'superadmin')
                                                    <div class="d-flex flex-row gap-2">
                                                        <form action="/lowongan/edit/{{ $item->id }}" method="GET">
                                                            <button type="submit" class="btn btn-warning">Edit</button>
                                                        </form>
                                                        <form action="/lowongan/hapus/{{ $item->id }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- / Content -->
                    </div>

                    <!-- Footer -->
                    @include('layouts.sections.footer.footer')

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
        </div>

        <!-- Vendors JS -->
        <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

        <!-- Page JS -->
        <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>

        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
    </body>
@endsection
