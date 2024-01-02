@extends('layouts/blankLayout')

@section('title', $role == 'superadmin' ? 'Dashboard - SuperAdmin' : 'Dashboard - Admin Perusahaan')
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
@endsection

@section('content')

    <body>
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->
                @include('layouts.sections.menu.verticalMenu')
                <!-- / Menu -->

                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Navbar -->
                    @include('layouts.sections.navbar.navbar')
                    <!-- / Navbar -->

                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Content -->
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <h4 class="py-3 mb-4"><span class="text-muted fw-light">Berita / </span>Edit Berita</h4>
                            <button class="btn btn-outline-secondary mb-3"
                                onclick="window.location.href = '{{ route('berita_page') }}'">Kembali</button>
                            <!-- Modal -->
                            <div class="row">
                                <div class="col-8">
                                    <div class="card">
                                        <div class="card-header">
                                            Form Berita
                                        </div>
                                        <div class="card-body">
                                            <form action="/berita/update" method="POST" enctype="multipart/form-data"
                                                id="blog-form">
                                                @csrf
                                                <input type="hidden" name="id" id="id"
                                                    value="{{ $berita->id }}">
                                                <div class="col mb-3">
                                                    <label for="title" class="form-label">Judul Berita</label>
                                                    <input type="text" id="title" class="form-control" name="title"
                                                        value="{{ old('title', $berita->title) }}">
                                                    @error('title')
                                                        <span class="text-danger mt-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col mb-3">
                                                    <label for="content" class="form-label">Content Berita</label>
                                                    <textarea id="myeditorinstance" name="content">{{ old('content', $berita->content) }}</textarea>
                                                    {{-- <textarea class="form-control" id="content" rows="10" name="content">{{ old('content', $berita->content) }}</textarea> --}}
                                                    @error('content')
                                                        <span class="text-danger mt-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" id="image_file"
                                                            name="image_file" value="{{ old('image_file') }}">
                                                        <label class="input-group-text" for="image_file">Upload
                                                            Gambar</label>
                                                    </div>
                                                    @error('image_file')
                                                        <span class="text-danger mt-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="d-flex justify-content-end gap-2">
                                                    <button type="reset"
                                                        class="btn rounded-pill btn-outline-primary">Cancel</button>
                                                    <button type="submit"
                                                        class="btn rounded-pill btn-success">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- / Content -->
                    </div>

                    <!-- Footer -->
                    @include('layouts.sections.footer.footer')

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
        </div>

        <!-- Vendors JS -->
        <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

        <!-- Page JS -->
        <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>

        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
        <script>
            document.getElementById('blog-form').addEventListener('submit', function(evt) {
                let content = tinymce.get('myeditorinstance').getContent()
                document.getElementById('myeditorinstance').value = content
            })

            tinymce.init({
                selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
                plugins: 'code table lists image',
                toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | image',
                images_file_types: 'jpg,png',
                automatic_uploads: true,
                image_title: true,
                file_picker_types: 'image',
                file_picker_callback: (cb, value, meta) => {
                    const input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');

                    input.addEventListener('change', (e) => {
                        const file = e.target.files[0];

                        const reader = new FileReader();
                        reader.addEventListener('load', () => {
                            /*
                              Note: Now we need to register the blob in TinyMCEs image blob
                              registry. In the next release this part hopefully won't be
                              necessary, as we are looking to handle it internally.
                            */
                            const id = 'blobid' + (new Date()).getTime();
                            const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                            const base64 = reader.result.split(',')[1];
                            const blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);

                            /* call the callback and populate the Title field with the file name */
                            cb(blobInfo.blobUri(), {
                                title: file.name
                            });
                        });
                        reader.readAsDataURL(file);
                    });

                    input.click();
                }
            });
        </script>
    </body>
@endsection
