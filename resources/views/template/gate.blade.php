<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('image/favicon.png')}}" type="image/x-icon">
    <title>{{env('APP_NAME')}}</title>
    @yield('css-page-before')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('css/new-app.css')}}">
    @yield('css-page-after')
    <!-- Font-Awesome -->
    <script src="https://kit.fontawesome.com/211179257a.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Header -->
    <header class="header" id="header">
        <nav class="navbar fixed-top navbar-expand-lg bg-main" id="header">
            <div class="container">

                <a class="navbar-brand" href="{{asset('/')}}">
                    <img class="align-baseline mr-2" src="{{asset('image/logo.png')}}" alt="Logo PKBM Merah Putih" width="50px">
                    <span class="d-none d-lg-inline-block">PKBM Merah Putih </br> Kab. Malang</span>
                </a>
                <button class="navbar-toggler" id="nav-toggle" type="button" data-toggle="collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon text-light">
                        <i class="fas fa-bars"></i>
                    </span>
                </button>
            </div>
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