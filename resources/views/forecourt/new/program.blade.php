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
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('information')}}"><i class="fa fa-info"></i> {{__('navbar.informasi')}}</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('program')}}"><i class="fa fa-chalkboard-user"></i> {{__('navbar.program')}}</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('team')}}"><i class="fa fa-people-group"></i> {{__('navbar.tim')}}</a>
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
        <section class="program section top__section">
            <div class="container">
            <div class="carousel slide" id="programCarousel" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active mh-100">
                            <div class="row mx-0">
                                <h2 class="section__title mx-auto px-2 text-capitalize my-3">
                                    Program 1
                                </h2>
                            </div>
                            <div class="row mx-0">
                                <img class="rounded col-lg-6 pb-3 pb-lg-0 mh-100" src="{{asset('image/program_a.jpg')}}" alt="First slide">
                                <div class="program__carousel-data-container col-lg-6 bg-red-third rounded py-3 text-justify">
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. In consequatur eius nemo dolore officiis accusantium delectus obcaecati dolor tenetur porro perferendis voluptatibus tempore repellat, hic modi dolorum blanditiis iusto placeat.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum asperiores itaque quo ab officia facere ratione cumque sequi error esse animi tempore perspiciatis suscipit dicta quisquam, molestias magnam quia corrupti.</p>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero consectetur harum similique et ad voluptatem repudiandae dolorem odit numquam iste sequi ipsum perferendis amet cumque, rerum mollitia nam necessitatibus illum?</p>
                                    <div class="container">
                                        <div class="row justify-content-around">
                                            <a href="#" target="_blank" class="btn btn-light col-3">
                                                <i class="fa fa-book program__card-content-icon"></i> Contoh Materi
                                            </a>
                                            <a href="#" target="_blank" class="btn btn-light col-3">
                                                <i class="fa-solid fa-calendar-days program__card-content-icon"></i> Jadwal
                                            </a>
                                            <a href="#" target="_blank" class="btn btn-light col-3">
                                                <i class="fa-solid fa-people-group program__card-content-icon"></i> Tim Pengajar
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item mh-100">
                            <div class="row mx-0">
                                <h2 class="section__title mx-auto px-2 text-capitalize my-3">
                                    Program 2
                                </h2>
                            </div>
                            <div class="row mx-0">
                                <img class="rounded col-lg-6 pb-3 pb-lg-0 mh-100" src="{{asset('image/program_b.jpg')}}" alt="First slide">
                                <div class="program__carousel-data-container col-lg-6 bg-red-third rounded py-3 text-justify">
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. In consequatur eius nemo dolore officiis accusantium delectus obcaecati dolor tenetur porro perferendis voluptatibus tempore repellat, hic modi dolorum blanditiis iusto placeat.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum asperiores itaque quo ab officia facere ratione cumque sequi error esse animi tempore perspiciatis suscipit dicta quisquam, molestias magnam quia corrupti.</p>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero consectetur harum similique et ad voluptatem repudiandae dolorem odit numquam iste sequi ipsum perferendis amet cumque, rerum mollitia nam necessitatibus illum?</p>
                                    <div class="container">
                                        <div class="row justify-content-around">
                                            <a href="#" target="_blank" class="btn btn-light col-3">
                                                <i class="fa fa-book program__card-content-icon"></i> Contoh Materi
                                            </a>
                                            <a href="#" target="_blank" class="btn btn-light col-3">
                                                <i class="fa-solid fa-calendar-days program__card-content-icon"></i> Jadwal
                                            </a>
                                            <a href="#" target="_blank" class="btn btn-light col-3">
                                                <i class="fa-solid fa-people-group program__card-content-icon"></i> Tim Pengajar
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item mh-100">
                            <div class="row mx-0">
                                <h2 class="section__title mx-auto px-2 text-capitalize my-3">
                                    Program 3
                                </h2>
                            </div>
                            <div class="row mx-0">
                                <img class="rounded col-lg-6 pb-3 pb-lg-0 mh-100" src="{{asset('image/program_c.jpg')}}" alt="First slide">
                                <div class="program__carousel-data-container col-lg-6 bg-red-third rounded py-3 text-justify">
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. In consequatur eius nemo dolore officiis accusantium delectus obcaecati dolor tenetur porro perferendis voluptatibus tempore repellat, hic modi dolorum blanditiis iusto placeat.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum asperiores itaque quo ab officia facere ratione cumque sequi error esse animi tempore perspiciatis suscipit dicta quisquam, molestias magnam quia corrupti.</p>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero consectetur harum similique et ad voluptatem repudiandae dolorem odit numquam iste sequi ipsum perferendis amet cumque, rerum mollitia nam necessitatibus illum?</p>
                                    <div class="container">
                                        <div class="row justify-content-around">
                                            <a href="#" target="_blank" class="btn btn-light col-3">
                                                <i class="fa fa-book program__card-content-icon"></i> Contoh Materi
                                            </a>
                                            <a href="#" target="_blank" class="btn btn-light col-3">
                                                <i class="fa-solid fa-calendar-days program__card-content-icon"></i> Jadwal
                                            </a>
                                            <a href="#" target="_blank" class="btn btn-light col-3">
                                                <i class="fa-solid fa-people-group program__card-content-icon"></i> Tim Pengajar
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#programCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#programCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
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