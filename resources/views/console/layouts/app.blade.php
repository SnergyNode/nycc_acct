<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ !empty($person)?$person->first_name:'Client' }}  | Dashboard | Acct</title>
    <meta name="description" content="">

    <!-- Scripts -->
    @include('console.scripts.css')


</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        @include('console.layouts.navbar')

        @include('console.layouts.sidebar')

        <div class="content-wrapper">
            @include('console.layouts.breadcrumb')

            @yield('content')

            @include('console.layouts.modals')
        </div>



        @include('console.layouts.footer')
    </div>


    @include('console.scripts.js')
</body>
</html>
