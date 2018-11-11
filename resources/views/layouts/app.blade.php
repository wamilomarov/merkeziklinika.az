<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mərkəzi Klinika') }}</title>

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('styles/vendor.css')}}">
    <link rel="stylesheet" href="{{asset('styles/extras.css')}}">
    <link rel="stylesheet" href="{{asset('styles/main.css')}}">
    <script src="{{asset('scripts/vendor/modernizr.js')}}"></script>

</head>
<body>
<!--[if IE]><p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a
        href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p><![endif]-->

@include('layouts.header')

@yield('content')

@include('layouts.contact_list')

@include('layouts.about_us')

@include('layouts.footer')

<script src="{{asset('scripts/vendor.js')}}"></script>
<script src="{{asset('scripts/main.js')}}"></script>
</body>
</html>
