@extends('layouts/blankLayout')

@section('title', 'Register - Pages')

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
@endsection

@section('content')

    <body>
        <!-- Content -->

        <div class="container-xxl">
            @if (session('success'))
                <div class="bs-toast toast fade show bg-success" id="toast-alert" role="alert" aria-live="assertive"
                    aria-atomic="true">
                    <div class="toast-header">
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        {{ session('success') }} <br>
                        Redirecting dalam 5 detik...
                    </div>
                </div>
            @endif
            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner">
                    <!-- Register Card -->
                    <div class="card">
                        <div class="card-body">
                            <!-- Logo -->
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('assets/img/logo/logo_uin.png') }}" alt="Logo UIN" style="width: 100px;">
                            </div>
                            <!-- /Logo -->

                            <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
                                @csrf
                                <div id="step-one">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama Perusahaan</label>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            value="{{ old('nama') }}" placeholder="Masukan nama perusahan anda"
                                            autofocus />
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat Perusahaan</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat"
                                            placeholder="Masukan alamat perusahaan anda" value="{{ old('alamat') }}" />
                                        @error('alamat')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email Perusahaan</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Masukan email perusahaan anda" value="{{ old('email') }}" />
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="telp" class="form-label">Nomor Telp. Perusahaan</label>
                                        <input type="text" class="form-control" id="telp" name="telp"
                                            placeholder="Masukan nomor telephone perusahaan" value="{{ old('telp') }}" />
                                        @error('telp')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="jenis" class="form-label">Jenis Perusahaan</label>
                                        <select id="jenis" class="form-select" name="jenis">
                                            <option value="">Pilih jenis perusahaan anda</option>
                                            <option value="Manufaktur"
                                                {{ old('jenis') == 'Manufaktur' ? 'selected' : '' }}>Manufaktur</option>
                                            <option value="Jasa" {{ old('jenis') == 'Jasa' ? 'selected' : '' }}>Jasa
                                            </option>
                                            <option value="Teknologi" {{ old('jenis') == 'Teknologi' ? 'selected' : '' }}>
                                                Teknologi</option>
                                            <option value="Pertanian" {{ old('jenis') == 'Pertanian' ? 'selected' : '' }}>
                                                Pertanian</option>
                                            <option value="Keuangan" {{ old('jenis') == 'Keuangan' ? 'selected' : '' }}>
                                                Keuangan</option>
                                            <option value="Retail" {{ old('jenis') == 'Retail' ? 'selected' : '' }}>Retail
                                            </option>
                                        </select>
                                        @error('jenis')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="button" class="btn btn-primary d-grid w-100"
                                        onclick="changeCard()">Next</button>
                                </div>
                                <div id="step-two" class="d-none">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            placeholder="Enter your username" value="{{ old('username') }}" autofocus />
                                        @error('username')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 form-password-toggle">
                                        <label class="form-label" for="password">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control" name="password"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                value="{{ old('password') }}" aria-describedby="password" />
                                            <span class="input-group-text cursor-pointer"><i
                                                    class="bx bx-hide"></i></span>
                                        </div>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 form-password-toggle">
                                        <label class="form-label" for="password_confirmation">Password
                                            Confirmation</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password_confirmation" class="form-control"
                                                name="password_confirmation"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                value="{{ old('password_confirmation') }}" aria-describedby="password" />
                                            <span class="input-group-text cursor-pointer"><i
                                                    class="bx bx-hide"></i></span>
                                        </div>
                                        @error('password_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary d-grid w-100 mb-2">Sign up</button>
                                    <button type="button" class="btn btn-outline-primary d-grid w-100"
                                        onclick="changeCard()">Back</button>
                                </div>
                            </form>

                            <p class="text-center">
                                <span>Already have an account?</span>
                                <a href="auth-login-basic.html">
                                    <span>Sign in instead</span>
                                </a>
                            </p>
                        </div>
                    </div>
                    <!-- Register Card -->
                </div>
            </div>
        </div>

        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->

        <script src="../assets/vendor/libs/jquery/jquery.js"></script>
        <script src="../assets/vendor/libs/popper/popper.js"></script>
        <script src="../assets/vendor/js/bootstrap.js"></script>
        <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="../assets/vendor/js/menu.js"></script>

        <!-- endbuild -->

        <!-- Vendors JS -->

        <!-- Main JS -->
        <script src="../assets/js/main.js"></script>

        <!-- Page JS -->

        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>

        <script>
            let changeCard = () => {
                $('#step-two').toggleClass('d-none')
                $('#step-one').toggleClass('d-none')
            }

            $(document).ready(() => {
                if ($('#toast-alert').length) {
                    setTimeout(() => {
                        window.location.href = '{{ route('login_perusahaan_page') }}'
                    }, 5000);
                }
            })
        </script>
    </body>

@endsection
