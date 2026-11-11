// Gallery sub-menu toggle

const subMenu = document.querySelector('.sub-menu');
const galleryBtn = document.querySelector('.gallery-btn');

galleryBtn.addEventListener('click', function() {
    subMenu.classList.toggle('sub-menu-open')
});

//Toggle Menu function

const header = document.querySelector('header');
const toggleMenu = document.querySelector('.toggle-menu');
const menuLink = document.querySelector('.menu-link');

toggleMenu.addEventListener('click', function () {
    header.classList.toggle('open');
});

menuLink.addEventListener('click', function () {
    header.classList.toggle('open');
});

// Header in Scroll

// window.addEventListener('scroll', function () {
//     let header = document.querySelector('header');
    
//     header.classList.toggle('scrolling-active', window.scrollY > 0);
// });

