<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar custom-navbar">
    <div class="container-fluid">
        <div class="d-flex justify-content-center mb-2">
            <img src="{{ asset('assets/img/logo/logo_uin.png') }}" alt="Logo UIN" style="width: 60px;">
        </div>
        <a class="navbar-brand" href="{{ route('landing') }}">UIN SUSKA</a>
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
                    <a class="nav-link"href="{{ route('daftar_lowongan') }}">LOWONGAN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('daftar_berita') }}">NEWS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">CONTACT</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
