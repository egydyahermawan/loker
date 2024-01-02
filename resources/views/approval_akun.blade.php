@extends('layouts/blankLayout')

@section('title', 'Approval Akun - SuperAdmin')
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
                        @if (session('success'))
                            <div class="bs-toast toast toast-placement-ex m-2 fade bg-success top-0 end-0 show" role="alert"
                                aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
                                <div class="toast-header">
                                    <i class="bx bx-bell me-2"></i>
                                    <div class="me-auto fw-medium">Berhasil</div>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast"
                                        aria-label="Close"></button>
                                </div>
                                <div class="toast-body">
                                    {{ session('success') }}
                                </div>
                            </div>
                        @endif
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <h4 class="py-3 mb-4"><span class="text-muted fw-light">Akun /</span> Approval akun</h4>
                            <!-- card -->
                            @if (count($perusahaan) < 1)
                                <p>No Data</p>
                            @else
                                @foreach ($perusahaan as $p)
                                    <div class="col-12 col-sm-6 col-lg-3 mb-4">
                                        <div class="card">
                                            <div class="badge bg-danger rounded-pill ms-auto">{{ $loop->index + 1 }}</div>
                                            <div class="card-body text-center">
                                                <i class="mb-3 bx bx-md bx-user"></i>
                                                <h5>{{ $p->info->nama_perusahaan }}</h5>
                                                <p>{{ $p->info->email_perusahaan }}</p>
                                                <div class="">
                                                    <div class="mt-6 ">
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalCenter-{{ $loop->index + 1 }}">
                                                            Approve account
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modalCenter-{{ $loop->index + 1 }}"
                                                            tabindex="-1" style="display: none;" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modalCenterTitle">
                                                                            Approve Data</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="col mb-3">
                                                                            <label for="nameWithTitle"
                                                                                class="form-label">Nama Perusahaan</label>
                                                                            <input type="text" id="nameWithTitle"
                                                                                class="form-control" disabled
                                                                                value="{{ $p->info->nama_perusahaan }}">
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <label for="nameWithTitle"
                                                                                class="form-label">Alamat Perusahaan</label>
                                                                            <input type="text" id="nameWithTitle"
                                                                                class="form-control" disabled
                                                                                value="{{ $p->info->alamat_perusahaan }}">
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <label for="nameWithTitle"
                                                                                class="form-label">Email Perusahaan</label>
                                                                            <input type="text" id="nameWithTitle"
                                                                                class="form-control" disabled
                                                                                value="{{ $p->info->email_perusahaan }}">
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <label for="nameWithTitle"
                                                                                class="form-label">Telp. Perusahaan </label>
                                                                            <input type="text" id="nameWithTitle"
                                                                                class="form-control" disabled
                                                                                value="{{ $p->info->telp_perusahaan }}">
                                                                        </div>
                                                                        <div class="col mb-3">
                                                                            <label for="nameWithTitle"
                                                                                class="form-label">Jenis perusahaan</label>
                                                                            <input type="text" id="nameWithTitle"
                                                                                class="form-control" disabled
                                                                                value="{{ $p->info->jenis_perusahaan }}">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <form action="/akun/reject" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="id"
                                                                                    value="{{ $p->id }}">
                                                                                <button type="submit"
                                                                                    class="btn rounded-pill btn-danger"
                                                                                    onclick="setLoading(this, 'left')">Reject</button>
                                                                            </form>
                                                                            <form action="/akun/approve" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="id"
                                                                                    value="{{ $p->id }}">
                                                                                <button type="submit"
                                                                                    onclick="setLoading(this, 'right')"
                                                                                    class="btn rounded-pill btn-success">Approve</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <!-- / Content -->

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

        <script>
            function setLoading(evt, position) {
                evt.innerText = 'Loading...'
                evt.disabled = true

                if (position == 'left') {
                    evt.parentNode.nextElementSibling.classList.toggle('d-none')
                } else {
                    evt.parentNode.previousElementSibling.classList.toggle('d-none')
                }

                evt.parentNode.submit()
            }
        </script>
    </body>
@endsection
