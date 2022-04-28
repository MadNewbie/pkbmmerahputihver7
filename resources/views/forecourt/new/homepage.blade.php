@extends('template.forecourt-new')

@section('content')
<main class="main">
    <section id="home" class="home top__section d-grid row m-0">
        <img class="home__image col-lg-6 p-lg-0 py-3" src="{{asset('image/home_image.jpg')}}" alt="home-image">
        <div class="home__slogan col-lg-6 d-lg-inline-flex bg-red-base">
            <div class="home__slogan-container d-xs-grid">
                <h1 class="home__slogan-content text-bolder">
                    {!!__('homepage.tagline')!!}
                </h1>
                <div class="home__button-container" >
                    <a href="{{route('information')}}" class="btn btn-light home__button buton--flex">
                        {!!__('homepage.button.info')!!}
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="section program">
        <div class="row mx-0 my-3">
            <h2 class="section__title mx-auto px-2">
                {!!__('homepage.title.program')!!}
            </h2>
        </div>
        <div class="row mx-0">
            <div class="container">
                <div class="carousel slide mh-100" id="programCarousel" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row mx-0">
                                <img class="rounded col-lg-6 pb-3 pb-lg-0" src="{{asset('image/program_a.jpg')}}" alt="First slide">
                                <div class="program__carousel-data-container col-lg-6 bg-red-third rounded py-3">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. In consequatur eius nemo dolore officiis accusantium delectus obcaecati dolor tenetur porro perferendis voluptatibus tempore repellat, hic modi dolorum blanditiis iusto placeat.
                                    <a href="{{route('program')}}" class="btn btn-sm btn-light button--flex mt-3">
                                        {!!__('homepage.button.detil_program')!!}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row mx-0">
                                <img class="rounded col-lg-6 pb-3 pb-lg-0" src="{{asset('image/program_b.jpg')}}" alt="Second slide">
                                <div class="program__carousel-data-container col-lg-6 bg-red-third rounded py-3">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. In consequatur eius nemo dolore officiis accusantium delectus obcaecati dolor tenetur porro perferendis voluptatibus tempore repellat, hic modi dolorum blanditiis iusto placeat.
                                    <a href="{{route('program')}}" class="btn btn-sm btn-light button--flex mt-3">
                                        {!!__('homepage.button.detil_program')!!}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row mx-0">
                                <img class="rounded col-lg-6 pb-3 pb-lg-0" src="{{asset('image/program_c.jpg')}}" alt="Third slide">
                                <div class="program__carousel-data-container col-lg-6 bg-red-third rounded py-3">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. In consequatur eius nemo dolore officiis accusantium delectus obcaecati dolor tenetur porro perferendis voluptatibus tempore repellat, hic modi dolorum blanditiis iusto placeat.
                                    <a href="{{route('program')}}" class="btn btn-sm btn-light button--flex mt-3">
                                        {!!__('homepage.button.detil_program')!!}
                                    </a>
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
        </div>
    </section>
    <section class="kegiatan">
        <div class="row d-inline">
            <div class="container">
                <div class="row my-3">
                    <h2 class="mx-auto px-2 bg-red-base text-bolder">
                        {!!__('homepage.title.event')!!}
                    </h2>
                </div>
                <div class="row">
                @if(count($recentEvents)!=0)
                    @foreach($recentEvents as $event)
                    <div class="col-lg-4">
                        <div class="row py-3">
                            <img src="<?= asset($event->thumb_img) ?>" alt="kegiatan__thumbs" class="col-lg-6">
                            <div class="kegiatan__data col-lg-6">
                                <h3 class="kegiatan__title text-bold">{{$event->title}}</h3>
                                <?=strip_tags(str_replace("</p>","&nbsp;",$event->content))?>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <h3 class="mx-auto">Belum ada informasi kegiatan terbaru</h3>
                @endif
                </div>
            </div>
        </div>
    </section>
    <section class="section berita">
        <div class="row mx-0 my-3">
            <h2 class="section__title mx-auto px-2">
                {!!__('homepage.title.berita')!!}
            </h2>
        </div>
        <div class="row mx-0">
            <div class="container">
                @if(count($recentNews)!=0)
                <div class="carousel slide mh-100" id="beritaCarousel" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($recentNews as $i=>$news)
                        <div class="carousel-item <?= $i==0 ? "active" : "" ?>">
                            <div class="row mx-0">
                                <img class="rounded col-lg-6 pb-3 pb-lg-0" src="{{$news->thumb_img}}" alt="Berita slide" style="max-height:400px">
                                <div class="berita__carousel-data-container col-lg-6 bg-red-third rounded py-3">
                                    <?=strip_tags(str_replace("</p>","&nbsp;",$news->content))?>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#beritaCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#beritaCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                @else
                <h3 class="mx-auto">Belum ada informasi berita terbaru</h3>
                @endif
            </div>
        </div>
    </section>
    <section class="section testimoni">
        <div class="row mx-0 my-3">
            <h2 class="section__title mx-auto px-2">
                {!!__('homepage.title.testimoni')!!}
            </h2>
        </div>
        <div class="row mx-0">
            <div class="container">
                <div class="row justify-content-around">
                    <div class="card col-lg-5 p-3 m-3">
                        <div class="row no-gutter">
                            <div class="col-4">
                                <img src="{{asset('image/testimoni_a.jpg')}}" alt="testimoni-card-photo" width="100%">
                            </div>
                            <div class="col-8">
                                <h3 class="testimoni__card-title text-bolder">Ahmad</h3>
                                <p class="testimoni__card-description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum voluptates saepe vitae hic consequatur pariatur distinctio. Assumenda quo illo excepturi nesciunt dolor a nemo, fugiat impedit cum ipsa architecto deleniti?</p>
                            </div>
                        </div>
                    </div>
                    <div class="card col-lg-5 p-3 m-3">
                        <div class="row no-gutter">
                            <div class="col-8">
                                <h3 class="testimoni__card-title text-bolder">Brisia</h3>
                                <p class="testimoni__card-description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum voluptates saepe vitae hic consequatur pariatur distinctio. Assumenda quo illo excepturi nesciunt dolor a nemo, fugiat impedit cum ipsa architecto deleniti?</p>
                            </div>
                            <div class="col-4">
                                <img src="{{asset('image/testimoni_b.jpg')}}" alt="testimoni-card-photo" width="100%">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-around">
                    <div class="card col-lg-5 p-3 m-3">
                        <div class="row no-gutter">
                            <div class="col-4">
                                <img src="{{asset('image/testimoni_c.jpg')}}" alt="testimoni-card-photo" width="100%">
                            </div>
                            <div class="col-8">
                                <h3 class="testimoni__card-title text-bolder">Chandra</h3>
                                <p class="testimoni__card-description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum voluptates saepe vitae hic consequatur pariatur distinctio. Assumenda quo illo excepturi nesciunt dolor a nemo, fugiat impedit cum ipsa architecto deleniti?</p>
                            </div>
                        </div>
                    </div>
                    <div class="card col-lg-5 p-3 m-3">
                        <div class="row no-gutter">
                            <div class="col-8">
                                <h3 class="testimoni__card-title text-bolder">Dessy</h3>
                                <p class="testimoni__card-description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum voluptates saepe vitae hic consequatur pariatur distinctio. Assumenda quo illo excepturi nesciunt dolor a nemo, fugiat impedit cum ipsa architecto deleniti?</p>
                            </div>
                            <div class="col-4">
                                <img src="{{asset('image/testimoni_d.jpg')}}" alt="testimoni-card-photo" width="100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section kontak mb-0 pb-0">
        <div class="container kontak__container rounded">
            <div class="row">
                <div class="col-lg-6 p-3">
                    <div class="container">
                        <div class="row">
                            <h2 class="mx-auto">
                                {!!__('homepage.ajakan')!!}
                            </h2>
                        </div>

                        <div class="row">
                            <a href="#" target="_blank" class="mx-auto btn btn-light">
                                {!!__('homepage.button.form_pendaftaran')!!}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 p-3">
                    <div class="container">
                        <h2 class="text-center">{!!__('homepage.title.kontak')!!}</h2>
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-phone footer__data-contact-icon"></i>
                            </div>
                            <div class="col-8">
                                <h3 class="footer__data-contact-title">{!!__('homepage.subtitle.kontak.telepon')!!}</h3>
                                <span class="footer__data-contact-subtitle">08123-4567-8989</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <i class="fa-solid fa-envelope footer__data-contact-icon"></i>
                            </div>
                            <div class="col-8">
                                <h3 class="footer__data-contact-title">{!!__('homepage.subtitle.kontak.email')!!}</h3>
                                <span class="footer__data-contact-subtitle">merahputih@gmail.com</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <i class="fa-solid fa-map-location-dot footer__data-contact-icon"></i>
                            </div>
                            <div class="col-8">
                                <h3 class="footer__data-contact-title">{!!__('homepage.subtitle.kontak.alamat')!!}</h3>
                                <span class="footer__data-contact-subtitle">Karangploso, Kabupaten Malang</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection