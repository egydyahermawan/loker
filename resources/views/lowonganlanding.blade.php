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
                            <a class="nav-link" href="#">NEWS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">CONTACT</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    <!-- section header -->
<div class="content">
<div class="d-flex justify-content-center">
    <h1>Lowongan</h1>
</div>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="row g-0">
                    <!-- Job Image on the left -->
                    <div class="d-flex justify-content-center col-md-4 py-3">
                        <img src="{{ asset('assets/img/logo/logo_uin.png') }}" style="width: 100px;" alt="Job Image">
                    </div>
                    <!-- Job Count and details on the right -->
                    <div class="col-md-8">
                        <div class="card-body d-flex align-items-center">
                            <div class="text-center">
                                <h5 class="card-title">Job Title</h5>
                                <p class="card-text">Job description goes here.</p>
                            </div>
                            <div class="ml-auto text-right">
                                <p class="card-title">Lowongan</p>
                                <div class="d-flex justify-content-center">
                                    <h1 class="job-count-box mb-0">9</h1>
                                </div>
                            </div>
                        </div>
                    </div>
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
