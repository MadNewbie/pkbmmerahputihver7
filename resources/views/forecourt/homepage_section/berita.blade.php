<section class="section container berita">
    <h2 class="section__title-center berita__title">
    {!!__('homepage.title.berita')!!}
    </h2>
    <div class="container berita__container swiper">
        @if(count($recentNews)!=0)
            <div class="swiper-wrapper">
                @foreach($recentNews as $news)
                <div class="berita__content grid swiper-slide">
                    <img src="<?= asset($news->thumb_img) ?>" alt="berita__thumbs" class="berita__thumbs">
                    <div class="berita__data">
                        <h3 class="berita__title">{{$news->title}}</h3>
                        <?=strip_tags(str_replace("</p>","&nbsp;",$news->content))?>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <h3>Belum ada informasi berita terbaru</h3>
        @endif
    </div>
</section>
@push('js-page-before')
<script src="{{asset('js/section/berita.js')}}"></script>
@endpush