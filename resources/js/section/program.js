/* ---Program Swiper--- */
let swiperProgram = new Swiper('.program__container', {
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