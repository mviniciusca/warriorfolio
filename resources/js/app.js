import './bootstrap';
import 'flowbite';
import Swiper from 'swiper/bundle';

// Mapeamento de linguagens para cores
const languageColors = {
    JavaScript: '#f7df1e',   // amarelo
    TypeScript: '#007acc',   // azul
    PHP: '#777BB3',         // roxo
    Python: '#3776AB',      // azul escuro
    Java: '#f89820',       // laranja
    Ruby: '#CC342D',       // vermelho
    Go: '#00ADD8',         // azul claro
    Rust: '#DEA584',       // marrom claro
    HTML: '#e34c26',       // laranja avermelhado (cor oficial do HTML5)
    CSS: '#264de4',        // azul (cor oficial do CSS3)
};

// Função para aplicar o gradiente baseado na linguagem
function applyLanguageGradient(element, language) {
    const color = languageColors[language] || '#ffffff20'; // cor padrão se a linguagem não estiver mapeada
    const gradientElement = element.querySelector('.language-gradient');
    if (gradientElement) {
        gradientElement.style.background = `linear-gradient(to top right, ${color}20, transparent)`;
    }
}

// Aplicar os gradientes quando o DOM estiver pronto
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
