@extends('layouts.blankLayout')

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection

@section('content')
    <style>
        /* CSS styles */
        .custom-navbar {
            transition: background-color 0.3s, box-shadow 0.3s;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .custom-navbar.scrolled {
            background-color: #FFFF;
            color: green;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        body {
            margin-top: 56px;
            /* Height of the navbar */
        }

        .custom-navbar a.navbar-brand,
        .custom-navbar .navbar-nav .nav-link {
            color: green !important;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
        }

        .custom-navbar.scrolled a.navbar-brand,
        .custom-navbar.scrolled .navbar-nav .nav-link {
            color: #62ac61 !important;
        }

        .content {
            margin-top: 100px;
        }

        .card-img {
            height: 250px;
            object-fit: cover;
        }

        /* Additional styles for announcement cards */
        .announcement-card {
            color: #3FDFED;
        }

        .announcement-card .card-text {
            color: #5F5FD1 !important;
            font-size: 10px;
        }

        .announcement-card .btn-primary {
            color: #5F5FD1;
        }

        .announcement-card .btn-primary:hover {
            color: #FFFFFF;
            background-color: #5F5FD1;
            border-color: #5F5FD1;
        }
    </style>

    <body>
        @include('layouts.sections.navbar.navbar_before_login')
        <div class="content">
            <!-- Content -->
            <div class="content-wrapper">
                <div class="ex-basic-2x">
                    <div class="container">
                        <div class="text-container">
                            <h3>{{ $lowongan->title }}</h3>
                            <!-- Image Section -->
                            <div class="row">
                                <div class="col-12">
                                    <img src="/storage/{{ $lowongan->image }}" alt="foto" style="max-width: 100%">
                                </div>
                            </div>
                            <br>
                            <!-- Date Section -->
                            <div class="d-flex flex-column">
                                <p class="mb-0">Update: {{ date('j F Y', strtotime($lowongan['updated_at'])) }}</p>
                            </div>
                            <hr>
                            <!-- Description Section -->
                            <h5>Description</h5>
                            <p>{!! $lowongan->description !!}</p>
                            <hr>
                            <div class="d-flex flex-column">
                                <p class="mb-0">Perusahaan:
                                    {{ json_decode($lowongan->perusahaan->info)->nama_perusahaan }}</p>
                                <p class="mb-0">Jenis Perusahaan:
                                    {{ json_decode($lowongan->perusahaan->info)->jenis_perusahaan }}</p>
                                <p class="mb-0">Email:
                                    {{ json_decode($lowongan->perusahaan->info)->email_perusahaan }}</p>
                                <p class="mb-0">Telp:
                                    {{ json_decode($lowongan->perusahaan->info)->telp_perusahaan }}</p>
                            </div>
                        </div>
                    </div> <!-- end of container -->
                </div>
            </div>
        </div>
    </body>
@endsection
