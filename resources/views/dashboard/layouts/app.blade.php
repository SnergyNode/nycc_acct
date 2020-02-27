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
    @include('dashboard.scripts.css')


</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        @include('dashboard.layouts.navbar')

        @include('dashboard.layouts.sidebar')

        <div class="content-wrapper">
            @include('dashboard.layouts.breadcrumb')

            @yield('content')

            @include('dashboard.layouts.modals')
        </div>



        @include('dashboard.layouts.footer')
    </div>


    @include('dashboard.scripts.js')
</body>
</html>
