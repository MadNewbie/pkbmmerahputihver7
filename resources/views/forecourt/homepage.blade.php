@extends('template.forecourt')

@section('content')
<main class="main">
    <section class="home top__section" id="home">
        <div class="container home__container grid">
            <img src="{{asset('image/home_image.jpg')}}" alt="home-image-merah-putih" class="home__img">
            <div class="home__data">
                <h1 class="home__title">
                    Menjangkau yang tak terjangkau, <br>
                    Melayani yang tak terlayani
                </h1>
                <div class="home__button-container" >
                    <a href="{{route('information')}}" class="button button--flex home__button">
                        Informasi Selengkapnya
                    </a>
                </div>
            </div>
        </div>
    </section>
    @include('forecourt.homepage_section.program')
    @include('forecourt.homepage_section.testimoni')
</main>
@endsection

@section('footer-content')
<div class="footer__container container grid">
    <div class="footer__content footer__registration">
        <h2 class="footer__title">
            Tertarik untuk menjadi bagian dari kami? <br>
            Daftarkan dirimu segera
        </h2>

        <a href="#" target="_blank" class="button button--flex footer__button">
            Formulir Pendaftaran
        </a>
    </div>
    <div class="footer__content footer__contact">
        <h2 class="footer__title">Kontak</h2>
        <div>
            <div class="footer__data-contact">
                <i class="fa fa-phone footer__data-contact-icon"></i>

                <div>
                    <h3 class="footer__data-contact-title">Telepon</h3>
                    <span class="footer__data-contact-subtitle">08123-4567-8989</span>
                </div>
            </div>
            <div class="footer__data-contact">
                <i class="fa-solid fa-envelope footer__data-contact-icon"></i>

                <div>
                    <h3 class="footer__data-contact-title">Email</h3>
                    <span class="footer__data-contact-subtitle">merahputih@gmail.com</span>
                </div>
            </div>
            <div class="footer__data-contact">
                <i class="fa-solid fa-map-location-dot footer__data-contact-icon"></i>

                <div>
                    <h3 class="footer__data-contact-title">Alamat</h3>
                    <span class="footer__data-contact-subtitle">Karangploso, Kabupaten Malang</span>
                </div>
            </div>
            <div class="footer__data-contact">
                <div>
                    <a href="http://www.facebook.com" class="footer__data-socmed-link">
                        <i class="fa-brands fa-facebook-square footer__data-socmed-icon"></i>
                    </a>
                    <a href="http://www.twitter.com" class="footer__data-socmed-link">
                        <i class="fa-brands fa-twitter footer__data-socmed-icon"></i>
                    </a>
                    <a href="http://www.instagram.com" class="footer__data-socmed-link">
                        <i class="fa-brands fa-instagram-square footer__data-socmed-icon"></i>
                    </a>
                    <a href="http://www.linkedin.com" class="footer__data-socmed-link">
                        <i class="fa-brands fa-linkedin footer__data-socmed-icon"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection