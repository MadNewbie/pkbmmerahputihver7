@extends('template.forecourt')

@section('css-page-before')
<link rel="stylesheet" href="{{asset('css/information.css')}}">
@endsection

@section('content')
<main class="main">
    <section class="sejarah" id="sejarah">
        <div class="container sejarah__container">
            <h2 class="sejarah__title section__title-center"><?php printf('%s',ucwords(trans('submenu.information.sejarah')))?></h2>
            <div class="grid sejarah__content">
                <img src="{{asset('image/sejarah.jpg')}}" alt="foto-sejarah" class="sejarah__img">
                <p class="sejarah__description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam cursus malesuada ligula in finibus. Quisque at libero ac massa consequat eleifend id a odio. In quis tortor dui. Duis vel ullamcorper lectus, a consequat libero. Nunc molestie sem eget diam dignissim consectetur. Aliquam sit amet nibh et velit ullamcorper tristique. Aliquam consectetur nibh sit amet ipsum faucibus cursus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris dignissim metus lorem, at congue magna varius at. Vestibulum et auctor velit. Etiam vehicula nisl lectus, ut vulputate nisi dictum vitae. Etiam at arcu egestas, iaculis libero sit amet, vehicula nisl. Fusce eu egestas libero.
                </p>
            </div>
        </div>
    </section>
    <section class="visi-misi" id="visi-misi">
        <div class="container visi-misi__container">
            <h2 class="sejarah__title section__title-center"><?php printf('%s',ucwords(trans('submenu.information.visi-misi')))?></h2>
            <div class="grid visi-misi__content">
                <img src="{{asset('image/visi-misi.jpg')}}" alt="foto-visi-misi" class="visi-misi__img">
                <p class="visi-misi__description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam cursus malesuada ligula in finibus. Quisque at libero ac massa consequat eleifend id a odio. In quis tortor dui. Duis vel ullamcorper lectus, a consequat libero. Nunc molestie sem eget diam dignissim consectetur. Aliquam sit amet nibh et velit ullamcorper tristique. Aliquam consectetur nibh sit amet ipsum faucibus cursus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris dignissim metus lorem, at congue magna varius at. Vestibulum et auctor velit. Etiam vehicula nisl lectus, ut vulputate nisi dictum vitae. Etiam at arcu egestas, iaculis libero sit amet, vehicula nisl. Fusce eu egestas libero.
                </p>
            </div>
        </div>
    </section>
    <section class="legalitas" id="legalitas">
        <div class="container legalitas__container">
            <h2 class="legalitas__title section__title-center"><?php printf('%s',ucwords(trans('submenu.information.legalitas')))?></h2>
            <div class="grid legalitas__content">
                <div class="legalitas__card grid">
                    <img src="{{asset('image/kemenkumham.jpg')}}" alt="foto-surat-legalitas-1" class="legalitas__img">
                    <p class="legalitas__title">Surat Legalitas 1</p>
                </div>
                <div class="legalitas__card grid">
                    <img src="{{asset('image/npsn.jpg')}}" alt="foto-surat-legalitas-2" class="legalitas__img">
                    <p class="legalitas__title">Surat Legalitas 2</p>
                </div>
                <div class="legalitas__card grid">
                    <img src="{{asset('image/akreditasi.jpg')}}" alt="foto-surat-legalitas-3" class="legalitas__img">
                    <p class="legalitas__title">Surat Legalitas 3</p>
                </div>
            </div>
        </div>
    </section>
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