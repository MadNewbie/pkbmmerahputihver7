<section class="section container program" id="program">
    <h2 class="section__title-center program__title">
        {!!__('homepage.title.program')!!}
    </h2>

    <div class="program__container container swiper">
        <div class="swiper-wrapper">
            <div class="program__content grid swiper-slide">
                <img src="{{asset('image/program_a.jpg')}}" alt="program-image-a" class="program__img">
                <div class="program__data">
                    <h3 class="program__title">Program A</h3>
                    <p class="program__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime ea laborum molestias distinctio dignissimos? Fuga, voluptatem amet! Eaque, vel itaque porro eveniet repellendus doloremque culpa? Mollitia, est soluta. Beatae, sit.</p>
                    
                    <a href="{{route('program')}}" class="button button--flex button--small program__button">
                        {!!__('homepage.button.detil_program')!!}
                    </a>
                </div>
            </div>
            <div class="program__content grid swiper-slide">
                <img src="{{asset('image/program_b.jpg')}}" alt="program-image-b" class="program__img">
                <div class="program__data">
                    <h3 class="program__title">Program B</h3>
                    <p class="program__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime ea laborum molestias distinctio dignissimos? Fuga, voluptatem amet! Eaque, vel itaque porro eveniet repellendus doloremque culpa? Mollitia, est soluta. Beatae, sit.</p>
                    
                    <a href="{{route('program')}}" class="button button--flex button--small program__button">
                        Detil Program >>>
                    </a>
                </div>
            </div>
            <div class="program__content grid swiper-slide">
                <img src="{{asset('image/program_c.jpg')}}" alt="program-image-c" class="program__img">
                <div class="program__data">
                    <h3 class="program__title">Program C</h3>
                    <p class="program__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime ea laborum molestias distinctio dignissimos? Fuga, voluptatem amet! Eaque, vel itaque porro eveniet repellendus doloremque culpa? Mollitia, est soluta. Beatae, sit.</p>
                    
                    <a href="{{route('program')}}" class="button button--flex button--small program__button">
                        Detil Program >>>
                    </a>
                </div>
            </div>
        </div>

        <!-- Swiper arrow -->
        <div class="swiper-button-next">
            <div class="fa-solid fa-angle-right swiper-program-icon"></div>
        </div>
        <div class="swiper-button-prev">
            <div class="fa-solid fa-angle-left swiper-program-icon"></div>
        </div>

        <!-- Swiper Pagination -->
        <div class="swiper-pagination swiper-pagination-program"></div>
    </div>
</section>

@push('css-page-before')
<link rel="stylesheet" href="{{asset('css/swiper/swiper-bundle.min.css')}}">
@endpush
@push('js-page-before')
<script src="{{asset('js/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('js/section/program.js')}}"></script>
@endpush