@extends('layouts/blankLayout')

@section('title', 'Daftar Akun - SuperAdmin')
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
                            <h4 class="py-3 mb-4"><span class="text-muted fw-light">Akun /</span> Daftar akun</h4>
                            <!-- Striped Rows -->
                            <div class="card">
                                <h5 class="card-header">Daftar akun</h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nama Perusahaan</th>
                                                <th>Alamat Perusahaan</th>
                                                <th>Email Perusahaan</th>
                                                <th class="text-center">Telp. Perusahaan</th>
                                                <th class="text-center">Jenis Perusahaan</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @foreach ($perusahaan as $p)
                                                <tr>
                                                    <td>
                                                        {{-- <i class="bx bxl-angular bx-sm text-danger me-3"></i> --}}
                                                        <span class="fw-medium">{{ $p->info->nama_perusahaan }}</span>
                                                    </td>
                                                    <td>{{ $p->info->alamat_perusahaan }}</td>
                                                    <td>{{ $p->info->email_perusahaan }}</td>
                                                    <td align="center"><span
                                                            class="">{{ $p->info->telp_perusahaan }}</span></td>
                                                    <td align="center"><span
                                                            class="">{{ $p->info->jenis_perusahaan }}</span></td>
                                                    <td align="center">
                                                        <span
                                                            class="{{ $p->status == 'active' ? 'text-success' : 'text-danger' }}">
                                                            {{ strtoupper($p->status[0]) . substr($p->status, 1) }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            @if ($p->status != 'non-active')
                                                                <div class="col-6 px-1">
                                                                    <form action="/akun/deactivate" method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="id" id="id"
                                                                            value="{{ $p->id }}">
                                                                        <button type="submit"
                                                                            class="btn btn-sm btn-outline-danger form-control">Non-Aktifkan</button>
                                                                    </form>
                                                                </div>
                                                            @elseif($p->status == 'non-active')
                                                                <div class="col-6 px-1">
                                                                    <form action="/akun/activate" method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="id" id="id"
                                                                            value="{{ $p->id }}">
                                                                        <button
                                                                            class="btn btn-sm btn-outline-primary form-control">Aktifkan</button>
                                                                    </form>
                                                                </div>
                                                            @endif
                                                            <div class="col-6 px-1">
                                                                <form action="/akun/delete" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="id" id="id"
                                                                        value="{{ $p->id }}">
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-danger form-control">Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
    </body>
@endsection
