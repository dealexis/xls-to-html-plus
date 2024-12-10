@extends('skeleton')

@section('styles')
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/css/design.css'])
    @endif
@endsection

@section('header')
    @include('header')
@endsection

@section('content')
    @yield('content')
@endsection

@section('footer')
    @include('footer')
@endsection

@vite('resources/js/app.js')
