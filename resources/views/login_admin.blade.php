@extends('layouts/blankLayout')

@section('title', 'Login - SuperAdmin')

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
@endsection

@section('content')

    <body>
        <!-- Content -->
        <div class="container-xxl p-0">
            <div class="row">
                <div class="authentication-wrapper authentication-basic container-p-y" class="">
                    <div class="authentication-inner">
                        <!-- Register -->
                        <div class="card">
                            <div class="card-body">
                                <g id="Path-4" mask="url(#mask-2)">
                                    <use fill="#696cff" xlink:href="#path-4"></use>
                                    <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                                </g>
                                <!-- LOGO -->
                                <div class="d-flex justify-content-center mb-4">
                                    <img src="{{ asset('assets/img/logo/logo_uin.png') }}" alt="Logo UIN"
                                        style="width: 100px;">
                                </div>
                                <!-- /Logo -->
                                @if (session('not_login'))
                                    <div class="alert alert-danger mb-3" role="alert">
                                        {{ session('not_login') }}
                                    </div>
                                @endif

                                <h4 class="mb-2">Hi Admin, Welcome! 👋</h4>
                                @if (session('error'))
                                    <div class="alert alert-danger mb-3" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            value="{{ old('username') }}" placeholder="Enter your username" autofocus />
                                        @error('username')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 form-password-toggle">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="password">Password</label>
                                        </div>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control" name="password"
                                                value="{{ old('password') }}"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="password" />
                                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                        </div>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /Register -->
                    </div>
                </div>
            </div>
        </div>

        </div>

        <script src="../assets/vendor/libs/jquery/jquery.js"></script>
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
    </body>
@endsection
