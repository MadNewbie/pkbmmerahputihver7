<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('image/favicon.png')}}" type="image/x-icon">
    <title>{{env('APP_NAME')}}</title>
    @stack('css-page-before')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('css/new-app.css')}}">
    @stack('css-page-after')
    <!-- Font-Awesome -->
    <script src="https://kit.fontawesome.com/211179257a.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg bg-red-base" id="header">
        <div class="container">

            <a class="navbar-brand" href="{{asset('/')}}">
                <img class="align-baseline mr-2" src="{{asset('image/logo.png')}}" alt="Logo PKBM Merah Putih" width="50px">
                <span class="d-none d-lg-inline-block">PKBM Merah Putih </br> Kab. Malang</span>
            </a>
            
            <button class="navbar-toggler" id="nav-toggle" type="button" data-toggle="collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="fas fa-bars"></i>
                </span>
            </button>
    
            <div class="nav__menu" id="nav-menu">
                <ul class="navbar-nav ml-auto">
                    <?php if ((Session::has('locale')) && strcmp(Session::get('locale'),'en')!=0): ?>
                        <li class="nav-item">
                            <a href="{{route('language.change', 'en')}}" class="nav-link nav__locale-link"><img src="{{asset('image/uk.png')}}" alt="" class="nav__locale-flag"></a>
                        </li>
                        <?php else :?>
                        <li class="nav-item">
                            <a href="{{route('language.change', 'id')}}" class="nav-link nav__locale-link"><img src="{{asset('image/indonesia.png')}}" alt="" class="nav__locale-flag"></a>
                        </li>
                    <?php endif ?>
                </ul>
                <div class="nav__close" id="nav-close">
                    <i class="fa fa-xmark"></i>
                </div>
        </div>
    </nav>
    <main class="main">
        <section class="news section top__section">
            <div class="container">
                <div class="row mx-0 my-3">
                    <h2 class="section__title mx-auto px-2">
                        {!!__('homepage.title.berita')!!}
                    </h2>
                </div>
                <div id="data-container"></div>
                <div id="pagination-control"></div>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <footer class="footer bg-red-second">
        <div class="text-center">
            <p class="footer__copy m-0">All rights Reserved PKBM Merah Putih Kabupaten Malang &#169;. 2022. Powered By <a class="footer__copyright-link" href="http://madnewbie.xyz">MadNewbie</a>. Inspiration by Bedimcode.</p>
        </div>
    </footer>
    @stack('js-page-before')
    <script>
        window['_newsIndexData'] = <?= json_encode([
            'routeIndexData' => route('news.index.data'),
            'routeNewsShow' => route('news.show',999),
        ]);
        ?>
    </script>
    <!-- JQuery -->
    <script src="{{asset('vendor/jquery/js/jquery.min.js')}}"></script>
    <!-- Popper -->
    <script src="{{asset('vendor/umd/popper.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Main JS -->
    <script src="{{asset('js/app-new.js')}}"></script>
    <script src="{{asset('js/news.js')}}"></script>
    @stack('js-page-after')
</body>
</html>