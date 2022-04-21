<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('image/favicon.png')}}" type="image/x-icon">
    <title>{{env('APP_NAME')}}</title>
    @yield('css-page-before')
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @yield('css-page-after')
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
        </nav>
    </header>
    @yield('content')
    <footer class="footer section">
        @yield('footer-content')
        <p class="footer__copy"><a class="footer__copyright-link" href="http://madnewbie.xyz">&#169; MadNewbie</a> 2022. All rights Reserved. Inspiration by Bedimcode.</p>
    </footer>
    @yield('js-page-before')
    <script src="{{asset('js/app.js')}}"></script>
    @yield('js-page-after')
</body>
</html>