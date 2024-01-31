import './bootstrap';
import 'flowbite';
import Swiper from 'swiper/bundle';

/** Menu JS */
document.querySelectorAll('#nav-menu a').forEach(function(link) {
link.addEventListener('click', function(e) {
e.preventDefault();
var targetId = this.getAttribute('href').substring(1);
var targetSection = document.getElementById(targetId);
if (targetSection) {
targetSection.scrollIntoView({ behavior: 'smooth' });
}
});
});

/** Swipper JS */
const swiper = new Swiper(".swiper", {
slidesPerView: 5,
loop: true,
centerInsufficientSlides: true,
centeredSlidesBounds: true,
peed:500,
autoplay:true,
centeredSlides: true,
});
