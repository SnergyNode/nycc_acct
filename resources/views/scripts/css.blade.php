<!-- Bootstrap CSS
		============================================ -->
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<!-- font-awesome CSS
    ============================================ -->
<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
<!-- et-line-fonts CSS
    ============================================ -->
<link rel="stylesheet" href="{{ asset('css/et-line-fonts.css') }}">
<!-- ionicons CSS
    ============================================ -->
<link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
<!-- magnific-popup CSS
    ============================================ -->
<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
<!-- animate-headline css
    ============================================ -->
<link rel="stylesheet" href="{{ asset('css/animate-headline.css') }}">
<!-- venobox CSS
    ============================================ -->
<link rel="stylesheet" href="{{ asset('css/venobox.css') }}">
<!-- slick CSS
    ============================================ -->
<link rel="stylesheet" href="{{ asset('css/slick.css') }}">
<!-- owl.carousel CSS
    ============================================ -->
<link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.theme.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.transitions.css') }}">
<!-- animate CSS
    ============================================ -->
<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
<!-- normalize CSS
    ============================================ -->
<link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
<!-- main CSS
    ============================================ -->
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<!-- style CSS
    ============================================ -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<!-- responsive CSS
    ============================================ -->
<link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
<link rel="stylesheet" href="{{ asset('css/shared.css') }}">



<!-- modernizr JS
    ============================================ -->

<script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>

@if(!empty($styles))
    @foreach($styles as $style)
        <link rel="stylesheet" href="{{ asset($style) }}">
    @endforeach
@endif

