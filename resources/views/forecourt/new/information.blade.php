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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMainMenu" role="button" data-toggle="dropdown" aria-expanded="false">{{__('navbar.main_menu')}}</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMainMenu">
                            <a class="dropdown-item" href="/"><i class="fas fa-home"></i> Home</a>
                            <a class="dropdown-item" href="{{route('information')}}"><i class="fa fa-info"></i> {{__('navbar.informasi')}}</a>    
                            <a class="dropdown-item" href="{{route('program')}}"><i class="fa fa-chalkboard-user"></i> {{__('navbar.program')}}</a>
                            <a class="dropdown-item" href="{{route('team')}}"><i class="fa fa-people-group"></i> {{__('navbar.tim')}}</a>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#sejarah"><i class="fas fa-landmark"></i> {{__('submenu.information.sejarah')}}</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#visi-misi"><i class="fas fa-binoculars"></i> {{__('submenu.information.visi-misi')}}</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#legalitas"><i class="fas fa-gavel"></i> {{__('submenu.information.legalitas')}}</a>
                    </li>
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
        </div>
    </nav>
    <main class="main">
        <section class="sejarah section top__section" id="sejarah">
            <div class="container">
                <div class="row my-3">
                    <h2 class="section__title mx-auto px-2 text-capitalize">
                        {{__('submenu.information.sejarah')}}
                    </h2>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-lg-6 sejarah__img mb-3">
                        <img src="{{asset('image/sejarah.jpg')}}" alt="sejarah-image" class="w-100">
                    </div>
                    <div class="col-12 col-lg-6 sejarah__content bg-red-third rounded p-3 text-justify">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus consequatur veniam maxime odit modi unde nobis sit omnis? Voluptatibus incidunt mollitia laborum odio error quos consequatur pariatur, cumque rerum eligendi!</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius quaerat accusantium sunt debitis ipsum dolorem quis rerum, voluptas officia dolorum ab repudiandae quasi laborum rem at. Aut repellendus fuga exercitationem!</p>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum quos animi eius fuga voluptates quas repudiandae fugiat itaque placeat et a nemo sunt aliquid, veniam quibusdam nulla quia sapiente adipisci?</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="visi-misi section" id="visi-misi">
            <div class="container">
                <div class="row my-3">
                    <h2 class="section__title mx-auto px-2 text-capitalize">
                        {{__('submenu.information.visi-misi')}}
                    </h2>
                </div>
                <div class="row my-3">
                    <div class="col-12 col-lg-6 order-lg-6 visi-misi__img mb-3">
                        <video src="{{asset('video/visi-misi.mp4')}}" controls class="h-100"></video>
                    </div>
                    <div class="col-12 col-lg-6 visi-misi__content bg-red-third rounded p-3 text-justify">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus consequatur veniam maxime odit modi unde nobis sit omnis? Voluptatibus incidunt mollitia laborum odio error quos consequatur pariatur, cumque rerum eligendi!</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius quaerat accusantium sunt debitis ipsum dolorem quis rerum, voluptas officia dolorum ab repudiandae quasi laborum rem at. Aut repellendus fuga exercitationem!</p>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum quos animi eius fuga voluptates quas repudiandae fugiat itaque placeat et a nemo sunt aliquid, veniam quibusdam nulla quia sapiente adipisci?</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="legalitas section" id="legalitas">
            <div class="container">
                <div class="row my-3">
                    <h2 class="section__title mx-auto px-2 text-capitalize">
                        {{__('submenu.information.legalitas')}}
                    </h2>
                </div>
                <div class="row my-3">
                    <div class="col-12 col-lg-4">
                        <img src="{{asset('image/kemenkumham.jpg')}}" alt="akta-kemenkumham" class="h-75 w-100 mb-3">
                        <div class="row">
                            <h2 class="my-3 text-bold mx-auto bg-red-third p-2">Surat Legalitas 1</h2>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <img src="{{asset('image/akreditasi.jpg')}}" alt="akreditasi" class="h-50 w-100 mb-3">
                        <div class="row">
                            <h2 class="my-3 text-bold mx-auto bg-red-third p-2">Surat Legalitas 2</h2>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <img src="{{asset('image/npsn.jpg')}}" alt="npsn" class="h-75 w-100 mb-3">
                        <div class="row">
                            <h2 class="my-3 text-bold mx-auto bg-red-third p-2">Surat Legalitas 3</h2>
                        </div>
                    </div>
                </div>
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
    <!-- JQuery -->
    <script src="{{asset('vendor/jquery/js/jquery.min.js')}}"></script>
    <!-- Popper -->
    <script src="{{asset('vendor/umd/popper.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Main JS -->
    <script src="{{asset('js/app-new.js')}}"></script>
    @stack('js-page-after')
</body>
</html>