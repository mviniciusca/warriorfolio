import './bootstrap';
import 'flowbite';
import Swiper from 'swiper/bundle';

// Scroll up

const scrollUpButton = document.getElementById('scrollUp');

window.onscroll = function () {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        scrollUpButton.style.display = "block";
    } else {
        scrollUpButton.style.display = "none";
    }
};

scrollUpButton.onclick = function () {
    window.scrollTo({ top: 0, behavior: 'smooth' });
};

// Language to color mapping
const languageColors = {
    JavaScript: '#f7df1e',   // yellow
    TypeScript: '#007acc',   // blue
    PHP: '#777BB3',         // purple
    Python: '#3776AB',      // dark blue
    Java: '#f89820',       // orange
    Ruby: '#CC342D',       // red
    Go: '#00ADD8',         // light blue
    Rust: '#DEA584',       // light brown
    HTML: '#e34c26',       // reddish orange (HTML5 official color)
    CSS: '#264de4',        // blue (CSS3 official color)
};

// Function to apply gradient based on language
function applyLanguageGradient(element, language) {
    const color = languageColors[language] || '#ffffff20'; // default color if language is not mapped
    const gradientElement = element.querySelector('.language-gradient');
    if (gradientElement) {
        gradientElement.style.background = `linear-gradient(to top right, ${color}20, transparent)`;
    }
}

// Apply gradients when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[data-repository-card]').forEach(card => {
        const language = card.getAttribute('data-language');
        if (language) {
            applyLanguageGradient(card, language);
        }
    });
});

/** Menu JS */
document.querySelectorAll('a').forEach(function (link) {
    link.addEventListener('click', function (e) {
        var href = this.getAttribute('href');
        if (href && href.includes('#')) {
            e.preventDefault();
            var urlParts = href.split('#');
            var baseUrl = urlParts[0];
            var targetId = urlParts[1];
            if (window.location.origin + window.location.pathname === baseUrl) {
                var targetSection = document.getElementById(targetId);
                if (targetSection) {
                    targetSection.scrollIntoView({ behavior: 'smooth' });
                }
            } else {
                window.location.href = href;
            }
        }
    });
});

/** Swipper JS */
const swiper = new Swiper(".swiper", {
    slidesPerView: 5,
    loop: true,
    centerInsufficientSlides: true,
    centeredSlidesBounds: true,
    peed: 500,
    autoplay: true,
    centeredSlides: true,
});


const modalEl = document.getElementById('info-popup');
const modalId = modalEl.getAttribute('data-modal-id');
const privacyModal = new Modal(modalEl, {
    placement: 'center'
});


function showModalAfter(delay) {
    setTimeout(function () {
        privacyModal.show();
    }, delay);
}


showModalAfter(100);

const closeModalEl = document.getElementById('close-modal');
closeModalEl.addEventListener('click', function () {
    privacyModal.hide();
});

const acceptPrivacyEl = document.getElementById('confirm-button');
acceptPrivacyEl.addEventListener('click', function () {
    alert('privacy accepted');
    privacyModal.hide();
});


function hideContent() {
    document.body.classList.add('hide-content');
}
