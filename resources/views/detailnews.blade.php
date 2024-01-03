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
            color: black;
            /* Added text color for better readability */
        }

        .card-img {
            height: 250px;
            object-fit: cover;
        }

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

        .limit-text {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 5;
        }
    </style>

    <body>
        @include('layouts.sections.navbar.navbar_before_login')

        <!-- Content -->
        <div class="content">
            <div class="ex-basic-2x">
                <div class="container mb-5 pb-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-container">
                                <h3>{{ $berita->title }}</h3>
                                <div class="row">
                                    <div class="col-12">
                                        <img src="/storage/{{ $berita->image }}" alt="foto" style="max-width: 100%;">
                                    </div>
                                </div>
                                <br>
                                <span style="font-size: 12px;">Update:
                                    {{ date('j F Y', strtotime($berita['updated_at'])) }}</span>
                                <hr>
                                <h5>Description</h5>
                                {!! $berita->content !!}
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-2">
                        <div class="fs-4 fw-medium">Berita Lainnya</div>
                        <div class="row">
                            @foreach ($others as $item)
                                <div class="col-lg-3">
                                    <div class="card">
                                        <img src="/storage/{{ $item['image'] }}" class="card-img-top" alt="Gambar Berita 1">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item['title'] }}</h5>
                                            <p class="card-text limit-text">{{ strip_tags($item['content']) }}</p>
                                            <a href="/berita/detail/{{ $item['id'] }}" class="btn btn-primary">Baca
                                                Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
