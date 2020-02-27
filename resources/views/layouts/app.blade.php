<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Acct | {{ !empty($title)?$title:'Home' }}</title>
    <meta name="description" content="">

    <!-- Scripts -->
    @include('scripts.css')


</head>
<body>
    <div class="wrapper">
        @include('layouts.header')

        @yield('content')

        @include('layouts.footer')
    </div>


    @include('scripts.js')
</body>
</html>
