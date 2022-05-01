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
        <section class="tim section top__section">
            <div class="container">
                <div class="row justify-content-around">
                    <div class="col-12 col-lg-4 p-2 m-2 card team__card">
                        <h4 class="text-bold mx-auto">Rifa'atul Machmudah</h4>
                        <div class="row justify-content-around">
                            <div class="col-4">
                                <img src="{{asset('image/guru_rifa.jpeg')}}" alt="guru" width="150px" class="align-middle">
                            </div>
                            <div class="col-6 text-justify">
                                <div class="row">
                                    <div class="container">
                                        <a class="text-dark" href="https://www.facebook.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.instagram.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.twitter.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-twitter team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.linkedin.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-linkedin team__card-socmed-icon"></i></a>
                                    </div>
                                </div>
                                <p>Seorang Magister Pendidikan Luar Sekolah Universitas Malang yang pernah mengikuti beberapa pelatihan tutor yang diselenggarakan oleh Universitas Jember, DPP FTPKN Provinsi Jawa Timur dan Universitas Terbuka dan sekarang masih menjadi Dosen tetap FKIP Universitas Moch. Sroedji Jember dan Tutor PGPAUD Universitas Terbuka. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 p-2 m-2 card team__card">
                        <h4 class="text-bold mx-auto">Wulan Pudjiastuti</h4>
                        <div class="row justify-content-around">
                            <div class="col-4">
                                <img src="{{asset('image/guru_1.jpg')}}" alt="guru" width="150px" class="align-middle">
                            </div>
                            <div class="col-6 text-justify">
                                <div class="row">
                                    <div class="container">
                                        <a class="text-dark" href="https://www.facebook.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.instagram.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.twitter.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-twitter team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.linkedin.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-linkedin team__card-socmed-icon"></i></a>
                                    </div>
                                </div>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae quidem vero mollitia, facere placeat alias. Deleniti veritatis corrupti sint amet a adipisci velit omnis mollitia, alias dolorem molestiae porro est. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 p-2 m-2 card team__card">
                        <h4 class="text-bold mx-auto">Prakoso Hidayanto</h4>
                        <div class="row justify-content-around">
                            <div class="col-4">
                                <img src="{{asset('image/guru_2.jpg')}}" alt="guru" width="150px" class="align-middle">
                            </div>
                            <div class="col-6 text-justify">
                                <div class="row">
                                    <div class="container">
                                        <a class="text-dark" href="https://www.facebook.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.instagram.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.twitter.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-twitter team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.linkedin.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-linkedin team__card-socmed-icon"></i></a>
                                    </div>
                                </div>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae quidem vero mollitia, facere placeat alias. Deleniti veritatis corrupti sint amet a adipisci velit omnis mollitia, alias dolorem molestiae porro est. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 p-2 m-2 card team__card">
                        <h4 class="text-bold mx-auto">Natalia Hartati</h4>
                        <div class="row justify-content-around">
                            <div class="col-4">
                                <img src="{{asset('image/guru_3.jpg')}}" alt="guru" width="150px" class="align-middle">
                            </div>
                            <div class="col-6 text-justify">
                                <div class="row">
                                    <div class="container">
                                        <a class="text-dark" href="https://www.facebook.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.instagram.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.twitter.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-twitter team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.linkedin.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-linkedin team__card-socmed-icon"></i></a>
                                    </div>
                                </div>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae quidem vero mollitia, facere placeat alias. Deleniti veritatis corrupti sint amet a adipisci velit omnis mollitia, alias dolorem molestiae porro est. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 p-2 m-2 card team__card">
                        <h4 class="text-bold mx-auto">Zahra Yuliarti</h4>
                        <div class="row justify-content-around">
                            <div class="col-4">
                                <img src="{{asset('image/guru_4.jpg')}}" alt="guru" width="150px" class="align-middle">
                            </div>
                            <div class="col-6 text-justify">
                                <div class="row">
                                    <div class="container">
                                        <a class="text-dark" href="https://www.facebook.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.instagram.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.twitter.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-twitter team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.linkedin.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-linkedin team__card-socmed-icon"></i></a>
                                    </div>
                                </div>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae quidem vero mollitia, facere placeat alias. Deleniti veritatis corrupti sint amet a adipisci velit omnis mollitia, alias dolorem molestiae porro est. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 p-2 m-2 card team__card">
                        <h4 class="text-bold mx-auto">Wiku Wicaksono</h4>
                        <div class="row justify-content-around">
                            <div class="col-4">
                                <img src="{{asset('image/guru_5.jpg')}}" alt="guru" width="150px" class="align-middle">
                            </div>
                            <div class="col-6 text-justify">
                                <div class="row">
                                    <div class="container">
                                        <a class="text-dark" href="https://www.facebook.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.instagram.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.twitter.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-twitter team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.linkedin.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-linkedin team__card-socmed-icon"></i></a>
                                    </div>
                                </div>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae quidem vero mollitia, facere placeat alias. Deleniti veritatis corrupti sint amet a adipisci velit omnis mollitia, alias dolorem molestiae porro est. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 p-2 m-2 card team__card">
                        <h4 class="text-bold mx-auto">Elang Marpaung</h4>
                        <div class="row justify-content-around">
                            <div class="col-4">
                                <img src="{{asset('image/guru_6.jpg')}}" alt="guru" width="150px" class="align-middle">
                            </div>
                            <div class="col-6 text-justify">
                                <div class="row">
                                    <div class="container">
                                        <a class="text-dark" href="https://www.facebook.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.instagram.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.twitter.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-twitter team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.linkedin.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-linkedin team__card-socmed-icon"></i></a>
                                    </div>
                                </div>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae quidem vero mollitia, facere placeat alias. Deleniti veritatis corrupti sint amet a adipisci velit omnis mollitia, alias dolorem molestiae porro est. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 p-2 m-2 card team__card">
                        <h4 class="text-bold mx-auto">Cici Maryati</h4>
                        <div class="row justify-content-around">
                            <div class="col-4">
                                <img src="{{asset('image/guru_7.jpg')}}" alt="guru" width="150px" class="align-middle">
                            </div>
                            <div class="col-6 text-justify">
                                <div class="row">
                                    <div class="container">
                                        <a class="text-dark" href="https://www.facebook.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.instagram.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.twitter.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-twitter team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.linkedin.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-linkedin team__card-socmed-icon"></i></a>
                                    </div>
                                </div>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae quidem vero mollitia, facere placeat alias. Deleniti veritatis corrupti sint amet a adipisci velit omnis mollitia, alias dolorem molestiae porro est. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 p-2 m-2 card team__card">
                        <h4 class="text-bold mx-auto">Winda Suartini</h4>
                        <div class="row justify-content-around">
                            <div class="col-4">
                                <img src="{{asset('image/guru_8.jpg')}}" alt="guru" width="150px" class="align-middle">
                            </div>
                            <div class="col-6 text-justify">
                                <div class="row">
                                    <div class="container">
                                        <a class="text-dark" href="https://www.facebook.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.instagram.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.twitter.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-twitter team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.linkedin.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-linkedin team__card-socmed-icon"></i></a>
                                    </div>
                                </div>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae quidem vero mollitia, facere placeat alias. Deleniti veritatis corrupti sint amet a adipisci velit omnis mollitia, alias dolorem molestiae porro est. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 p-2 m-2 card team__card">
                        <h4 class="text-bold mx-auto">Ira Wulandari</h4>
                        <div class="row justify-content-around">
                            <div class="col-4">
                                <img src="{{asset('image/guru_9.jpg')}}" alt="guru" width="150px" class="align-middle">
                            </div>
                            <div class="col-6 text-justify">
                                <div class="row">
                                    <div class="container">
                                        <a class="text-dark" href="https://www.facebook.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.instagram.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.twitter.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-twitter team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.linkedin.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-linkedin team__card-socmed-icon"></i></a>
                                    </div>
                                </div>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae quidem vero mollitia, facere placeat alias. Deleniti veritatis corrupti sint amet a adipisci velit omnis mollitia, alias dolorem molestiae porro est. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 p-2 m-2 card team__card">
                        <h4 class="text-bold mx-auto">Umar Zulkarnaen</h4>
                        <div class="row justify-content-around">
                            <div class="col-4">
                                <img src="{{asset('image/guru_10.jpg')}}" alt="guru" width="150px" class="align-middle">
                            </div>
                            <div class="col-6 text-justify">
                                <div class="row">
                                    <div class="container">
                                        <a class="text-dark" href="https://www.facebook.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.instagram.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.twitter.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-twitter team__card-socmed-icon"></i></a>
                                        <a class="text-dark" href="https://www.linkedin.com" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-linkedin team__card-socmed-icon"></i></a>
                                    </div>
                                </div>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae quidem vero mollitia, facere placeat alias. Deleniti veritatis corrupti sint amet a adipisci velit omnis mollitia, alias dolorem molestiae porro est. </p>
                            </div>
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