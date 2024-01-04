@extends('layouts.blankLayout')

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
    <!-- Bootstrap CSS (Tambahkan Bootstrap CSS jika belum) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Bootstrap JavaScript (Tambahkan Bootstrap JS jika belum) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection

@section('content')
    <style>
        .custom-navbar {
            transition: background-color 0.3s, box-shadow 0.3s;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .custom-navbar.scrolled {
            background-color: #FFFF;
            color: GREEN;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .your-text-class {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
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

        .limit-text {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 5;
        }
    </style>
    </head>

    <body>
        @include('layouts.sections.navbar.navbar_before_login')

        <!-- section header -->
        <div class="container my-5 py-2">
            <div class="row py-5">
                <div class="col-md-8">
                    <div class="position-relative rounded"
                        style="height: 450px; background-image: url(/storage/{{ $berita_utama['image'] }}); background-size: cover; background-position: center;">
                        <div class="rounded position-absolute bottom-0 p-3 w-100"
                            style="background-color: rgba(0, 0, 0, 0.5);">
                            <h2><a href="/berita/detail/{{ $berita_utama['id'] }}">{{ $berita_utama['title'] }}</a>
                            </h2>
                            <p class="text-light mb-0">Dipublikasikan pada tanggal
                                {{ date('j F Y', strtotime($berita_utama['created_at'])) }}</p>
                        </div>
                    </div>
                    <p class="limit-text">{{ preg_replace('/&nbsp;/', ' ', strip_tags($berita_utama['content'])) }}</p>
                    <a href="/berita/detail/{{ $berita_utama['id'] }}" class="btn btn-primary">Baca Selengkapnya</a>
                </div>
                <div class="col-md-4">
                    <h4>Berita Terkini</h4>
                    <div class="card w-100">
                        <div class="card-body">
                            @foreach (array_slice($berita, 0, 5) as $item)
                                <div
                                    class="d-flex flex-column {{ $loop->index == count(array_slice($berita, 0, 5)) - 1 ? '' : 'mb-3' }}">
                                    <a href="/berita/detail/{{ $item['id'] }}"
                                        class="fs-5 fw-medium">{{ $item['title'] }}</a>
                                    <p class="mb-0 fw-light">Update:
                                        {{ date('j F Y', strtotime($item['updated_at'])) }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($berita as $item)
                    <div class="col-lg-3">
                        <div class="card">
                            <img src="/storage/{{ $item['image'] }}" class="card-img-top" alt="Gambar Berita 1">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item['title'] }}</h5>
                                <p class="card-text limit-text">{{ strip_tags($item['content']) }}</p>
                                <a href="/berita/detail/{{ $item['id'] }}" class="btn btn-primary">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
@endsection
