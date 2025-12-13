// Simple promo carousel
const slides = document.querySelectorAll('.promo-slide');
const dots = document.querySelectorAll('.carousel-dots .dot');

let currentIndex = 0;
let autoSlideInterval = null;

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.classList.toggle('active', i === index);
    });
    dots.forEach((dot, i) => {
        dot.classList.toggle('active', i === index);
    });
    currentIndex = index;
}

function nextSlide() {
    const newIndex = (currentIndex + 1) % slides.length;
    showSlide(newIndex);
}

function startAutoSlide() {
    stopAutoSlide();
    autoSlideInterval = setInterval(nextSlide, 3000); // 5 seconds
}

function stopAutoSlide() {
    if (autoSlideInterval) {
        clearInterval(autoSlideInterval);
        autoSlideInterval = null;
    }
}

// Dot click handlers
dots.forEach(dot => {
    dot.addEventListener('click', () => {
        const index = Number(dot.dataset.index);
        showSlide(index);
        startAutoSlide();
    });
});

// Initialize
showSlide(0);
startAutoSlide();

// SHOW / HIDE PASSWORD USING MATERIAL ICONS
document.addEventListener("DOMContentLoaded", function () {
    const toggles = document.querySelectorAll(".toggle-pass");

    toggles.forEach(toggle => {
        toggle.addEventListener("click", function () {

            const inputId = this.getAttribute("data-target");
            const input = document.getElementById(inputId);

            if (input.type === "password") {
                input.type = "text";
                this.textContent = "visibility_off";
            } else {
                input.type = "password";
                this.textContent = "visibility";
            }

        });
    });
});


function showLogin() {
    document.getElementById("loginForm").classList.remove("hidden");
    document.getElementById("signupForm").classList.add("hidden");
    document.querySelectorAll(".tab-btn")[0].classList.add("active");
    document.querySelectorAll(".tab-btn")[1].classList.remove("active");
}

function showSignup() {
    document.getElementById("signupForm").classList.remove("hidden");
    document.getElementById("loginForm").classList.add("hidden");
    document.querySelectorAll(".tab-btn")[1].classList.add("active");
    document.querySelectorAll(".tab-btn")[0].classList.remove("active");
}
