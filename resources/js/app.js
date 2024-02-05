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


const modalEl = document.getElementById('info-popup');
const modalId = modalEl.getAttribute('data-modal-id');
const privacyModal = new Modal(modalEl, {
    placement: 'center'
});


function showModalAfter(delay) {
    setTimeout(function() {
        privacyModal.show();
    }, delay);
}


showModalAfter(100);

const closeModalEl = document.getElementById('close-modal');
closeModalEl.addEventListener('click', function() {
    privacyModal.hide();
});

const acceptPrivacyEl = document.getElementById('confirm-button');
acceptPrivacyEl.addEventListener('click', function() {
    alert('privacy accepted');
    privacyModal.hide();
});


function hideContent() {
        document.body.classList.add('hide-content');
    }
