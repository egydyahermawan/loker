@extends('layouts/blankLayout')
@section('title', $title)

@section('content')

    <body>
        <div style="width: 100%; margin-left: auto; margin-right: auto; padding-left: 32px; padding-right: 32px;">
            <p
                style="font-weight: bold; font-size: 18px; color: {{ $title == 'Aktifasi Diterima!' ? '#198754' : '#dc3545' }};">
                {{ $title }}</p>
            <p style="font-weight: normal; font-size: 12px; color: #212529;"">{{ $content }}</p>
        </div>
    </body>
@endsection
