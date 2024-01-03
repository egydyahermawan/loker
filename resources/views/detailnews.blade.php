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
            color: black; /* Added text color for better readability */
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
    </style>

    <!-- Navbar -->
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
                        <a class="nav-link" href="{{ route('lowonganlanding') }}">LOWONGAN</a>
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

    <!-- Content -->
    <div class="content">
        <div class="ex-basic-2x">
            <div class="container">
                <div class="row">
                   
                    <div class="col-lg-9">
                        <div class="text-container">
                            <h3>Kepala CDC UIN Raden Fatah Palembang Berbagi Pengalaman dan Informasi Aplikasi Tracer Study</h3>
                            <div class="row">
                                <div class="col-12">
                                    <img src="https://cdc.radenfatah.ac.id/assets/img/news/1700543127262.jpeg" alt="foto" style="max-width: 100%;">
                                </div>
                            </div>
                            <br>
                            <span style="font-size: 12px;">update: 2023-11-21 12:11:42</span>
                            <hr>
                            <h5>Description</h5>
                            <p>
                                <!-- Your content here -->
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <!-- Latest announcement -->
                        <div class="card announcement-card" style="color: #3FDFED;">
                            <div class="card-body">
                                <p class="card-text">
                                    <a href="https://cdc.radenfatah.ac.id/front/detail_news/63" rel="noopener noreferrer" style="color: #5F5FD1 !important;">
                                        <h5>Kepala CDC UIN Raden Fatah Palembang Berbagi Pengalaman dan Informasi Aplikasi Tracer Study</h5>
                                    </a>
                                    <br>
                                    <span style="color: gray; font-size: 10px;">2023-11-21 12:11:42</span>
                                </p>
                                <!-- Add other announcements as needed -->
                                <a href="https://cdc.radenfatah.ac.id/front/news" class="btn btn-primary btn-sm" rel="noopener noreferrer">See all..</a>
                            </div>
                        </div>
                    </div>x
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Section -->
    <script>
        // Initialize the carousel
        $(document).ready(function () {
            $('#lowongan-carousel').carousel();
        });

        // Add scroll event listener to the window
        window.addEventListener('scroll', function () {
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
@endsection
