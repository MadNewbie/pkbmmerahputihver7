<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('image/favicon.png')}}" type="image/x-icon">
    <title>{{env('APP_NAME')}}</title>
    @stack('css-page-before')
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @stack('css-page-after')
    <!-- Font-Awesome -->
    <script src="https://kit.fontawesome.com/211179257a.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Header -->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="/" class="nav__logo">
                <div class="nav__logo-icon">
                    <img class="nav__logo-img" src="{{asset('image/logo.png')}}" alt="log-merah-putih">
                </div>
                <span>
                    PKBM Merah Putih <br> Kab. Malang
                </span>
            </a>
    
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item <?php echo strcmp($active,'information')=== 0 ? 'nav__active' : '' ?>">
                        <a class="nav__link" href="{{route('information')}}"><i class="fa fa-info"></i> {{__('navbar.informasi')}}</a>
                    </li>
                    <li class="nav__item <?php echo strcmp($active,'program') === 0 ? 'nav__active' : '' ?>">
                        <a class="nav__link" href="{{route('program')}}"><i class="fa fa-chalkboard-user"></i> {{__('navbar.program')}}</a>
                    </li>
                    <li class="nav__item <?php echo strcmp($active,'team') === 0 ? 'nav__active' : '' ?>">
                        <a class="nav__link" href="{{route('team')}}"><i class="fa fa-people-group"></i> {{__('navbar.tim')}}</a>
                    </li>
                </ul>
                <div class="nav__close" id="nav-close">
                    <i class="fa fa-xmark"></i>
                </div>
            </div>
    
            <div class="nav__btns">
                <div class="nav__locale">
                    <span class="nav__locale-quote">{{__('navbar.quote')}} </span>
                    <?php if ((Session::has('locale')) && strcmp(Session::get('locale'),'en')!=0): ?>
                            <a href="{{route('language.change', 'en')}}" class="nav__locale-link"><img src="{{asset('image/uk.png')}}" alt="" class="nav__locale-flag"></a>
                        <?php else :?>
                            <a href="{{route('language.change', 'id')}}" class="nav__locale-link"><img src="{{asset('image/indonesia.png')}}" alt="" class="nav__locale-flag"></a>
                    <?php endif ?>
                </div>
                <div class="nav__toggle" id="nav-toggle">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
        </nav>
        @if($submenus)
        <div class="nav__submenu container">
            <ul class="nav__submenu-list nav__list">
                <?php foreach($submenus as $submenu):?>
                    <li class="nav__item">
                        <a class="nav__link" href="#{{$submenu['link']}}">{{$submenu['title']}}</a>
                    </li>
                <?php endforeach?>
            </ul>
        </div>
        @endif
    </header>
    @yield('content')
    <footer class="footer section">
        @yield('footer-content')
        <p class="footer__copy">PKBM Merah Putih Kabupaten Malang &#169; All rights Reserved. 2022. Powered By <a class="footer__copyright-link" href="http://madnewbie.xyz">MadNewbie</a>. Inspiration by Bedimcode.</p>
    </footer>
    @stack('js-page-before')
    <script src="{{asset('js/app.js')}}"></script>
    @stack('js-page-after')
</body>
</html>