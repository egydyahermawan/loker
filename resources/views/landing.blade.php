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
        /* Custom styles for the navbar */
        .custom-navbar {
            transition: background-color 0.3s, box-shadow 0.3s;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            /* Mengatur z-index agar navbar tetap di atas konten */
        }

        .custom-navbar.scrolled {
            background-color: #FFFF;
            /* Ubah warna sesuai kebutuhan Anda */
            color: GREEN;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Tambahkan efek shadow sesuai kebutuhan Anda */
        }

        .your-text-class {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        body {
            margin-top: 0;
            /* Hilangkan margin atas */
        }

        .custom-navbar a.navbar-brand,
        .custom-navbar .navbar-nav .nav-link {
            color: #FFFF !important;
            /* Set font color to white */
            font-family: 'Montserrat', sans-serif;
            /* Use Montserrat font */
            font-weight: 700;
            /* Set font weight to bold */
        }

        .custom-navbar.scrolled a.navbar-brand,
        .custom-navbar.scrolled .navbar-nav .nav-link {
            color: #62ac61 !important;
            /* Set font color when scrolled */
        }

        /* Carousel and Card Styles */
        #carouselExample {
            max-width: 800px;
            /* Sesuaikan lebar maksimum carousel */
            margin: auto;
            /* Center carousel */
        }

        .carousel-item {
            text-align: center;
        }

        .card {
            width: 18rem;
            /* Sesuaikan lebar card sesuai kebutuhan Anda */
            margin: 20px;
            /* Sesuaikan margin antar card */
        }

        .konten {
            margin-top: 100px;
            /* Sesuaikan margin bawah sesuai kebutuhan Anda */
        }

        .hero-section {
            margin-top: -180px;
            position: relative;
            z-index: 99;
            /* Adjust this value to align the hero with the SVG border */
        }

        .pb-5,
        .py-5 {
            padding-top: 10rem !important;
        }

        .limit-text {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
        }
    </style>

    <body>
        @include('layouts.sections.navbar.navbar_before_login')

        <!-- section header -->
        <section>
            <header class="page-header-ui page-header-ui-dark bg-img-cover overlay overlay-primary overlay-90"
                style="background-image: url('{{ asset('assets/img/logo/uin.jpg') }}');width:100%; background-repeat: no-repeat;background-size: cover;">
                <div class="page-header-ui-content py-5 position-relative">
                    <div class="container px-5">
                        <div class="row gx-5 d- justify-content-center">
                            <div class="col-xl-8 col-lg-10 text-center">
                                <h1 class="text-white your-text-class">UIN SUSKA RIAU</h1>
                                <p class="text-white your-text-class mb-5">It's time to find the home of your dreams, and
                                    you search begins here. We make it easy to find the property that fits your needs and
                                    budget.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="svg-border-rounded text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144.54 18" preserveAspectRatio="none"
                        fill="currentColor">
                        <path d="M144.54,18H0V0H144.54ZM0,0S32.36,18,72.27,18,144.54,0,144.54,0"></path>
                    </svg>
                </div>
            </header>

            <div class="container hero-section">
                <div class="rounded shadow p-5 bg-white">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mt-5 mt-md-0 text-center">
                            <i class="ti-layers-alt text-primary h1"></i>
                            <h3 class="mt-4 text-capitalize h5 "><a href="">
                                    Job Opportunity</a></h3>
                            <p class="regular text-muted">Collaborate with several leading company, government institutions
                                and state-owned enterprises, CDC opens access for you to get the job you dream of.</p>
                        </div>
                        <div class="col-lg-4 col-md-12 mt-5 mt-lg-0 text-center">
                            <i class="ti-book text-primary h1"></i>
                            <h3 class="mt-4 text-capitalize h5 "><a href="">Scholarship </a></h3>

                            <p class="regular text-muted">Fulfill the requirements and get the scholar ship you need.</p>

                            <p></p>
                        </div>
                        <div class="col-lg-4 col-md-12 mt-5 mt-lg-0 text-center">
                            <i class="ti-announcement text-primary h1"></i>
                            <h3 class="mt-4 text-capitalize h5 "><a href="  ">Latest
                                    News</a></h3>
                            <p class="regular text-muted">Be the first to Know the latest news from CDC.</p>

                            <p></p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="lowongan-carousel" class="container carousel slide" data-ride="carousel">
                <div class="d-flex justify-content-center">
                    <h1 class=" py-4">LOWONGAN</h1>
                </div>
                <div class="carousel-inner">
                    @if (count($data['lowongan']) == 0)
                        <p class="text-center fs-4 fw-medium">No Lowongan Data!</p>
                    @else
                        @foreach ($data['lowongan'] as $chunk)
                            <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                                <div class="d-flex justify-content-center gap-5">
                                    @foreach ($chunk as $item)
                                        <div class="card">
                                            <img src="/storage/{{ $item['image'] }}" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h4 class="card-title text-black"><a
                                                        href="/lowongan/detail/{{ $item['id'] }}">{{ $item['title'] }}</a>
                                                </h4>
                                                <p class="card-text limit-text">{{ strip_tags($item['description']) }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <a class="carousel-control-prev" href="#lowongan-carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#lowongan-carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

                <!-- Indicators (dots) -->
                <ol class="carousel-indicators">
                    <li data-target="#lowongan-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#lowongan-carousel" data-slide-to="1"></li>
                    <li data-target="#lowongan-carousel" data-slide-to="2"></li>
                </ol>
            </div>
        </section>

        @if (count($data['berita_utama']) != 0)
            <div class="container mt-4 mb-5">
                <div class="row mb-5">
                    <div class="col-md-8">
                        <div class="position-relative rounded"
                            style="height: 450px; background-image: url(/storage/{{ $data['berita_utama']['image'] }}); background-size: cover; background-position: center;">
                            <div class="rounded position-absolute bottom-0 p-3 w-100"
                                style="background-color: rgba(0, 0, 0, 0.5);">
                                <h2><a
                                        href="/berita/detail/{{ $data['berita_utama']['id'] }}">{{ $data['berita_utama']['title'] }}</a>
                                </h2>
                                <p class="text-light mb-0">Dipublikasikan pada tanggal
                                    {{ date('j F Y', strtotime($data['berita_utama']['created_at'])) }}</p>
                            </div>
                        </div>
                        {{-- <img src="/storage/{{ $data['berita_utama']['image'] }}" alt="Gambar Artikel" class="img-fluid mb-4"> --}}
                        <p class="limit-text">{{ strip_tags($data['berita_utama']['content']) }}</p>
                        <a href="/berita/detail/{{ $data['berita_utama']['id'] }}" class="btn btn-primary">Lihat
                            Selengkapnya</a>
                    </div>
                    <div class="col-md-4">
                        <h4>Berita Terkini</h4>
                        <div class="card w-100">
                            <div class="card-body">
                                @foreach (array_slice($data['berita'], 0, 5) as $item)
                                    <div class="d-flex flex-column mb-3">
                                        <a href="/berita/detail/{{ $item['id'] }}"
                                            class="fs-5 fw-medium">{{ $item['title'] }}</a>
                                        <p class="mb-0 fw-light">Update:
                                            {{ date('j F Y', strtotime($item['updated_at'])) }}</p>
                                    </div>
                                @endforeach
                                <a href="/daftar-berita" class="btn btn-primary mt-2">See All</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach (array_slice($data['berita'], 0, 5) as $item)
                        <div class="col-lg-3">
                            <div class="card m-0" style="width: auto;">
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
        @endif

        <script>
            $(document).ready(function() {
                $('#lowongan-carousel').carousel()
            })

            window.addEventListener('scroll', function() {
                const navbar = document.querySelector('.custom-navbar')

                if (window.scrollY > 0) {
                    navbar.classList.add('scrolled')
                } else {
                    navbar.classList.remove('scrolled')
                }
            })
        </script>
    </body>
@endsection
