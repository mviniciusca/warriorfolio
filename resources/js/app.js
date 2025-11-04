import './bootstrap';
import 'flowbite';
import Swiper from 'swiper/bundle';
import chatbox from './components/chatbox';

// Make Swiper globally available
window.Swiper = Swiper;

// Register Alpine.js components
window.setupChatbox = chatbox;

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
 * Hero Logos Marquee Configuration
 * Creates a continuous marquee effect for hero logos using CSS animations
 */
document.addEventListener('DOMContentLoaded', function () {
    const heroLogosContainer = document.querySelector('.hero-logos-swiper');

    if (heroLogosContainer) {
        const speed = parseInt(heroLogosContainer.getAttribute('data-speed')) || 2;
        const direction = heroLogosContainer.getAttribute('data-direction') || 'left';

        // Speed mapping: slow=25s, normal=15s, fast=8s
        const speedMap = {
            1: '25s', // slow
            2: '15s', // normal
            3: '8s'   // fast
        };

        const animationDuration = speedMap[speed] || '15s';
        const animationDirection = direction === 'right' ? 'reverse' : 'normal';

        // Apply CSS animation to wrapper
        const wrapper = heroLogosContainer.querySelector('.swiper-wrapper');
        if (wrapper) {
            // Calculate the total width needed for smooth scrolling
            const totalWidth = wrapper.scrollWidth;
            const containerWidth = heroLogosContainer.offsetWidth;

            // Set the wrapper width to ensure smooth animation
            wrapper.style.width = `${totalWidth * 2}px`;
            wrapper.style.animation = `marquee-scroll ${animationDuration} linear infinite ${animationDirection}`;

            // Add hover pause functionality
            heroLogosContainer.addEventListener('mouseenter', () => {
                wrapper.style.animationPlayState = 'paused';
            });

            heroLogosContainer.addEventListener('mouseleave', () => {
                wrapper.style.animationPlayState = 'running';
            });
        }
    }
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


document.addEventListener('DOMContentLoaded', () => {
    // Link LinkedIn nos badges Open to Work
    function updateOpenToWorkBadges() {
        const socialNetworks = document.querySelectorAll('[data-linkedin]');
        let linkedinUrl = null;

        // Procura em todos os componentes de redes sociais pelo LinkedIn
        socialNetworks.forEach(social => {
            const url = social.getAttribute('data-linkedin');
            if (url && url !== 'null' && url !== '') {
                linkedinUrl = url;
            }
        });

        // Se encontrou um LinkedIn, atualiza os badges
        if (linkedinUrl) {
            const badges = [
                document.getElementById('open-to-work-expanded'),
                document.getElementById('open-to-work-compact'),
                document.getElementById('open-to-work-ultra-compact'),
            ];

            badges.forEach(badge => {
                if (badge && badge.textContent.includes('Open to Work')) {
                    const a = document.createElement('a');
                    a.href = linkedinUrl;
                    a.target = '_blank';
                    a.rel = 'noopener noreferrer';
                    a.className = badge.className + ' hover:underline';
                    a.textContent = badge.textContent;
                    badge.replaceWith(a);
                }
            });
        }
    }

    setTimeout(updateOpenToWorkBadges, 100);
});
