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
            margin-top: 56px; /* Height of the navbar */
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
    </style>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white custom-navbar">
            <div class="container-fluid">
                <div class="d-flex justify-content-center mb-2">
                    <img src="{{ asset('assets/img/logo/logo_uin.png') }}" alt="Logo UIN" style="width: 60px;">
                </div>
                <a class="navbar-brand" href="#">UIN SUSKA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('landing') }}">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"href="{{ route('lowonganlanding') }}">LOWONGAN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('newslanding') }}">NEWS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">CONTACT</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    <!-- section header -->
    <div class="container mt-4">
            <div class="row">
                <div class="col-md-8">
                    <h2>{{ $data['berita_utama']['title'] }}</h2>
                    <p class="text-muted">Dipublikasikan pada tanggal
                        {{ date('j F Y', strtotime($data['berita_utama']['created_at'])) }}</p>
                    <img src="/storage/{{ $data['berita_utama']['image'] }}" alt="Gambar Artikel" class="img-fluid mb-4">
                    <p>{!! $data['berita_utama']['content'] !!}</p>
                </div>
                <div class="col-md-4">
                    <h4>Berita Terkini</h4>
                    <ul class="list-group">
                        @foreach (array_slice($data['berita'], 0, 5) as $item)
                            <li class="list-group-item">{{ $item['title'] }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="row">
                    @foreach (array_slice($data['berita'], 0, 5) as $item)
                        <div class="col-lg-3">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Gambar Berita 1">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item['title'] }}</h5>
                                <p class="card-text limit-text">{{ strip_tags($item['content']) }}</p>
                                <a href="#" class="btn btn-primary">Baca Selengkapnya</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
        <!-- Berita Terkini section with corrected class -->
        <div class="col-md-4 ml-auto mr-3">
            <h4 class="">Berita Terkini</h4>
            <!-- Display recent news as cards -->
            <div class="list-group">
                <!-- Sample news item (replace with dynamic content) -->
                <a href="#" class="list-group-item list-group-item-action">News Title 1</a>
                <!-- Repeat the above structure for each news item -->
            </div>
        </div>
        <!-- End of Berita Terkini section -->
    </div>
</div>

        <!-- jsnavbar -->
        <script>
            //  <!-- Initialize the carousel -->

            $(document).ready(function() {
                $('#lowongan-carousel')a.carousel();
            });

            // Add scroll event listener to the window
            window.addEventListener('scroll', function() {
                // Get the navbar element
                const navbar = document.querySelector('.custom-navbar');

                // Add or remove the 'scrolled' class based on the scroll position
                if (window.scrollY > 0) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });
        </script>
    </body>
@endsection
