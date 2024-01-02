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
                            <h4 class="py-3 mb-4"><span class="text-muted fw-light">Berita / </span>Daftar Berita</h4>
                            <!-- Button trigger modal -->
                            <button onclick="window.location.href = '{{ route('tambah_berita_page') }}'"
                                class="btn btn-primary">Tambah Berita</button>
                            <div class="row mt-4">
                                @foreach ($berita as $item)
                                    <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $item->title }}</h5>
                                                <h6 class="card-subtitle">
                                                    <span class="badge bg-label-info">Admin</span>
                                                    <span class="text-muted">
                                                        {{ date('d', strtotime($item->created_at)) . ' ' . date('F', strtotime($item->created_at)) . ' ' . date('Y', strtotime($item->created_at)) }}</span>
                                                </h6>
                                                <div class="my-3 rounded"
                                                    style="background-image: url('/storage/{{ $item->image }}'); background-size: cover; height: 250px; background-position: center;">
                                                </div>
                                                <p class="card-text"
                                                    style="display: -webkit-box; -webkit-line-clamp: 5; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                                    {{ strip_tags($item->content) }}</p>
                                                <div class="d-flex flex-row justify-content-between">
                                                    <div>
                                                        <button class="btn btn-outline-info" data-bs-toggle="modal"
                                                            data-bs-target="#modalCenter-{{ $loop->index }}">
                                                            See Detail
                                                        </button>
                                                        <div class="modal fade" id="modalCenter-{{ $loop->index }}"
                                                            tabindex="-1" aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modalCenterTitle">Detail
                                                                            Berita</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="d-flex flex-column gap-3">
                                                                            <div>
                                                                                <label for="nameWithTitle"
                                                                                    class="form-label">Gambar Berita</label>
                                                                                <div class="rounded"
                                                                                    style="width: 100%; height: 450px; background-image: url('/storage/{{ $item->image }}'); background-size: cover; background-position: center;">
                                                                                </div>
                                                                            </div>
                                                                            <div class="">
                                                                                <label for="nameWithTitle"
                                                                                    class="form-label">Judul Berita</label>
                                                                                <p class="fw-semibold fs-6 mb-0">
                                                                                    {{ $item->title }}</p>
                                                                            </div>
                                                                            <div class="">
                                                                                <label for="nameWithTitle"
                                                                                    class="form-label">Content
                                                                                    Berita</label>
                                                                                <p class="fw-light fs-6 mb-0">
                                                                                    {!! $item->content !!}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-row gap-2">
                                                        <form action="/berita/edit/{{ $item->id }}" method="GET">
                                                            <button type="submit" class="btn btn-warning">Edit</button>
                                                        </form>
                                                        <form action="/berita/delete/{{ $item->id }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
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
