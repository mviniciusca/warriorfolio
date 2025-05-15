import './bootstrap';
import 'flowbite';
import Swiper from 'swiper/bundle';

/**
 * Scroll Up Button functionality
 * Shows/hides a button to scroll to the top of the page when scrolling
 */
const scrollUpButton = document.getElementById('scrollUp');

window.onscroll = function () {
    const scrollThreshold = 100;
    const shouldShow = document.body.scrollTop > scrollThreshold ||
        document.documentElement.scrollTop > scrollThreshold;
    scrollUpButton.style.display = shouldShow ? "block" : "none";
};

scrollUpButton.onclick = function () {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
};

/**
 * Repository Card Language Colors
 * Defines colors for different programming languages used in repository cards
 */
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

/**
 * Applies gradient background to repository cards based on their language
 * @param {HTMLElement} element - The card element to apply gradient to
 * @param {string} language - Programming language name
 */
function applyLanguageGradient(element, language) {
    const color = languageColors[language] || '#ffffff20';
    const gradientElement = element.querySelector('.language-gradient');
    if (gradientElement) {
        gradientElement.style.background = `linear-gradient(to top right, ${color}20, transparent)`;
    }
}

// Initialize language gradients when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[data-repository-card]').forEach(card => {
        const language = card.getAttribute('data-language');
        if (language) {
            applyLanguageGradient(card, language);
        }
    });
});

/**
 * Smooth Scroll Navigation
 * Handles smooth scrolling for anchor links within the same page
 */
document.querySelectorAll('a').forEach(function (link) {
    link.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (!href?.includes('#')) return;

        e.preventDefault();
        const [baseUrl, targetId] = href.split('#');

        if (window.location.origin + window.location.pathname === baseUrl) {
            const targetSection = document.getElementById(targetId);
            if (targetSection) {
                targetSection.scrollIntoView({ behavior: 'smooth' });
            }
        } else {
            window.location.href = href;
        }
    });
});

/**
 * Swiper Carousel Configuration
 * Initializes the Swiper carousel with specific settings
 */
const swiper = new Swiper(".swiper", {
    slidesPerView: 5,
    loop: true,
    centerInsufficientSlides: true,
    centeredSlidesBounds: true,
    speed: 500,
    autoplay: true,
    centeredSlides: true,
});

/**
 * Privacy Modal Management
 * Handles the display and interactions with the privacy policy modal
 */
const modalEl = document.getElementById('info-popup');
const modalId = modalEl.getAttribute('data-modal-id');
const privacyModal = new Modal(modalEl, {
    placement: 'center'
});

function showModalAfter(delay) {
    setTimeout(() => privacyModal.show(), delay);
}

// Initialize modal
showModalAfter(100);

// Modal event listeners
const closeModalEl = document.getElementById('close-modal');
closeModalEl.addEventListener('click', () => privacyModal.hide());

const acceptPrivacyEl = document.getElementById('confirm-button');
acceptPrivacyEl.addEventListener('click', () => {
    alert('privacy accepted');
    privacyModal.hide();
});

/**
 * Content visibility management
 */
function hideContent() {
    document.body.classList.add('hide-content');
}
