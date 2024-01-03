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
        <div class="content">
            <div class="d-flex justify-content-center">
                <h1>Lowongan</h1>
            </div>
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-8 mb-4">
                        @foreach ($lowongan as $item)
                            <div class="card mb-3" style="overflow: hidden;">
                                <div class="row g-0 mx-0">
                                    <!-- Job Image on the left -->
                                    <div class="col-md-4"
                                        style="background-image: url('/storage/{{ $item->image }}'); background-size: cover; background-position: center;">
                                        {{-- <img src="/storage/{{ $item->image }}" style="width: 100px;" alt="Job Image"> --}}
                                    </div>
                                    <!-- Job Count and details on the right -->
                                    <div class="col-md-8">
                                        <div class="card-body p-0">
                                            <div class="row">
                                                <div class="col-8 p-3">
                                                    <a href="/lowongan/detail/{{ $item->id }}"
                                                        class="card-title fw-medium fs-5">{{ $item->title }}</a>
                                                    <p class="card-text limit-text">{{ strip_tags($item->description) }}</p>
                                                </div>
                                                <div class="col-4 px-0 d-flex flex-column justify-content-center align-items-center"
                                                    style="background-color: rgba(177, 215, 180, 0.5);">
                                                    <h1 class="job-count-box mb-0">{{ $item->slot }}</h1>
                                                    <p class="card-title">Lowongan</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Berita Terkini section with corrected class -->
                    <div class="col-md-4">
                        <h4 class="">Berita Terkini</h4>
                        <!-- Display recent news as cards -->
                        <div class="list-group">
                            @foreach ($berita as $item)
                                <a href="/berita/detail/{{ $item->id }}"
                                    class="list-group-item list-group-item-action">{{ $item->title }}</a>
                            @endforeach
                        </div>
                    </div>
                    <!-- End of Berita Terkini section -->
                </div>
            </div>

            <!-- jsnavbar -->
            <script>
                //  <!-- Initialize the carousel -->

                $(document).ready(function() {
                    $('#lowongan-carousel') a.carousel();
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
