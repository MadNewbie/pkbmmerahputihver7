document.addEventListener('DOMContentLoaded', (event) => {
    methods.initBeritaSwiper();
});

const methods = {
    initBeritaSwiper() {
        /* ---Berita Swiper--- */
        let swiperBerita = new Swiper('.berita__container', {
            direction: 'horizontal',
            cssMode:true,
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        })
    }
}