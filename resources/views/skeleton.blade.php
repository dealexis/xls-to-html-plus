<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'XLS Conversion App')</title>
    <link rel="icon" href="{{Vite::asset('resources/images/logo.png')}}">
    <meta name="description" content="@yield('description', 'XLS Conversions to HTML, CSV, JSON')">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    @yield('styles')
</head>
<body>
@yield('header')
<div class="content-wrapper">
    @yield('content')
</div>
@yield('footer')
@yield('scripts')
<script>
    var APP_URL = '{{env('APP_URL')}}';
    var routes = @json([
    'upload' => route('convert-xls')
])
</script>
</body>
</html>
