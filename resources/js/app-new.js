/* ---Show Menu--- */
const navMenu = document.getElementById('nav-menu'),
      navToggle = document.getElementById('nav-toggle'),
      navClose = document.getElementById('nav-close')

/* ---Menu Show--- */
if(navToggle){
    navToggle.addEventListener('click', () => {
        navMenu.classList.add('show-menu')
    })
}

/* ---Menu Hidden--- */
if(navClose){
    navClose.addEventListener('click', () => {
        navMenu.classList.remove('show-menu')
    })
}

/* ---Change Background Header--- */
function scrollHeader(){
    const header = document.getElementById('header')
    if(this.scrollY >= 80) {
        header.classList.add('scroll-header'); 
        header.classList.add('bg-red-second');
        header.classList.remove('bg-red-base');
    } else { 
        header.classList.remove('scroll-header');
        header.classList.add('bg-red-base');
        header.classList.remove('bg-red-second');
    }
}
window.addEventListener('scroll', scrollHeader)