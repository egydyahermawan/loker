@extends('layouts/blankLayout')
@section('title', $title)

@section('content')
<body>
    <p class="fs-4 fw-semibold">{{ $title }}</p>
    <p class="fw-light">{{ $content }}</p>
</body>
@endsection