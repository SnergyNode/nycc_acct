<header class="header-area">
    <!-- Menu Area
        ============================================ -->
    <div id="main-menu" class="sticker">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="logo float-left navbar-header">
                        <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ url('img/logo/logo.png') }}" alt=""></a>
                        <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu-2">
                            <i class="fa fa-bars menu-open"></i>
                            <i class="fa fa-times menu-close"></i>
                        </button>
                    </div>
                    <div class="main-menu float-right collapse navbar-collapse" id="main-menu-2">
                        <nav>
                            <ul class="menu one-page">
                                <li class="{{ @$isactive['home'] }}"><a href="{{ !empty($isactive['home'])?route('home').'/#home-area':route('home') }}">HOME</a></li>
                                <li><a href="{{ route('home') }}#about-area">About </a></li>
                                <li><a href="{{ route('home') }}#features-area">FEATURES</a></li>
                                {{--<li><a href="#screenshort-area">screenshots </a></li>--}}
                                {{--<li><a href="#pricing-area">pricing </a></li>--}}
                                {{--<li><a href="#review-area">reviews</a></li>--}}
                                <li><a href="{{ route('home') }}#support-area">support</a></li>
                                <li class="{{ @$isactive['login'] }}"><a href="{{ route('login') }}">Login</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>