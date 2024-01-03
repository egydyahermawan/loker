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
<div class="content">
    <!-- Content -->
    <div class="content-wrapper">
        <div class="ex-basic-2x">
            <div class="container">
                <div class="row">
                    <!-- Latest Announcements Column -->
                    <div class="col-lg-3">
                        <div class="card announcement-card">
                            <div class="card-body">
                                <!-- Latest Announcements -->
                                <p class="card-text">
                                    <a href="https://cdc.radenfatah.ac.id/front/detail_announcement/147"
                                       rel="noopener noreferrer">Lowongan Kerja Business Support Assistant (BSA)</a>
                                    <br>
                                    <span>2023-12-11 10:52:28</span>
                                </p>
                                <!-- Add other announcements as needed -->
                                <a href="https://cdc.radenfatah.ac.id/front/announcement"
                                   class="btn btn-primary btn-sm" rel="noopener noreferrer">See all..</a>
                            </div>
                        </div>
                    </div>
                    <!-- Main Content Column -->
                    <div class="col-lg-9">
                        <div class="text-container">
                            <h3>Lowongan Kerja PKSS</h3>
                            <!-- Image Section -->
                            <div class="row">
                                <div class="col-12">
                                    <img src="https://cdc.radenfatah.ac.id/assets/img/announcement/1697014611452.jpg"
                                         alt="foto" style="max-width: 100%">
                                </div>
                            </div>
                            <br>
                            <!-- Date Section -->
                            <span>update: 2023-10-11 16:01:14</span>
                            <hr>
                            <!-- Description Section -->
                            <h5>Description</h5>
                            <p>
                                Assalamualaikum wr wb<br>
                                Mahasiswa dan Alumni UIN Raden Fatah Palembang,<br>
                                #InfoLowongankerja<br>
                                We are Hiring ! PKSS membuka kesempatan untuk para talenta<br>
                                terbaik<br>
                                Info lebih lanjut silahkan kunjungi :<br>
                                Instagram : pkss.id / pkss.palembang<br>
                                Semoga bermanfaat <img alt="????" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t80/1/16/1f64f.png"><br>
                                _____________________<br>
                                CDC UIN Raden Fatah Palembang<br>
                                Buka Layanan<br>
                                <img alt="?" src="https://static.xx.fbcdn.net/images/emoji.php/v9/t34/1/16/23f0.png"> Pukul : 08:00 s/d 16.00 WIB<br>
                                <img alt="????" src="https://static.xx.fbcdn.net/images/emoji.php/v9/tfc/1/16/1f3e6.png"> Jl. Pangeran Ratu, 5 Ulu, Kecamatan Seberang Ulu I, Kota Palembang, Sumatera Selatan 30267 (Kampus B)<br>
                                Wassalamualaikum wr wb<br>
                                _____________________<br>
                                CDC UIN Raden Fatah Palembang<br>
                                Let's Join With Us, akan ada banyak informasi webinar, Beasiswa dan lowongan kerja di akun kita :<br>
                                Web : <a href="https://cdc.radenfatah.ac.id/?fbclid=IwAR1M8QfU5fM_l811UkBT7zMKExqEQlGEukN8bKseHYceujY-et85q1YjV_I" rel="nofollow noreferrer" tabindex="0" target="_blank">http://cdc.radenfatah.ac.id/</a><br>
                                Fb : <a href="https://www.facebook.com/cdcuinradenfatah?__cft__[0]=AZVnRrY6qR-J77AnsFZicSDQDocDzdHDajY8d8S_rzvbDWrRa_M8OzQSa7TncsLX8ohC3W7NSELwiWT1fuECWTS1clYZvVVcAHRLxRYZ1w7JqDoYHh-RTCR47jpdKNVWALa3yPOiJFtdNMEDoSyIqdqNOAERu_2bgwrZcoXr2wevhROG9XUl7Ogos9RtMzvFvrg&__tn__=-]K-R" tabindex="0">https://www.facebook.com/cdcuinradenfatah</a><br>
                                IG : <a href="https://www.instagram.com/cdcuinrafah/?fbclid=IwAR28NW7h7buxxeA_jocldaTBzF1hLkrGTawvijEzDmKiSGmx52a_NsxSAJY" rel="nofollow noreferrer" tabindex="0" target="_blank">https://www.instagram.com/cdcuinrafah/</a><br>
                                WA : <a href="https://bit.ly/3tYsn7a?fbclid=IwAR3BOQe7_vI1aijIQXejnwIq-lfUHENm4mxLqmWye9yhwAObSGN2xNyp4dc" rel="nofollow noreferrer" tabindex="0" target="_blank">https://bit.ly/3tYsn7a</a><br>
                                Email : cdc_uin@radenfatah.ac.id<br>
                                <img alt="" src="https://cdc.radenfatah.ac.id/assets/upload/WhatsApp%20Image%202023-10-11%20at%2015.25.26.jpeg" style="height:778px; width:600px">
                            </p>
                            <hr>
                        </div> <!-- end of text-container -->
                    </div>
                </div> <!-- end of row -->
            </div> <!-- end of container -->
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
