const track = document.querySelector('.carousel-track');
const dots = document.querySelectorAll('.dot');
const slides = document.querySelectorAll('.promo-slide');

dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        // 1. Move the track
        const slideWidth = slides[0].getBoundingClientRect().width;
        track.style.transform = `translateX(-${slideWidth * index}px)`;

        // 2. Update active dot
        document.querySelector('.dot.active').classList.remove('active');
        dot.classList.add('active');

        // 3. Update active slide class
        document.querySelector('.promo-slide.active').classList.remove('active');
        slides[index].classList.add('active');
    });
});

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

document.addEventListener('DOMContentLoaded', () => {

    const addButtons = document.querySelectorAll('.add-btn');
    // 2. Add to Cart Logic
    addButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            const card = e.target.closest('.menu-card');
            const productName = card.querySelector('h4').innerText;
            const price = card.querySelector('.price').innerText;

            alert(`Added to cart: ${productName} for ${price}`);
            // In a real app, you'd update a cart object or localStorage here
        });
    });
});


document.addEventListener('DOMContentLoaded', () => {
    const categoryItems = document.querySelectorAll('.menu-categories li');
    const productCards = document.querySelectorAll('.menu-card');

    categoryItems.forEach(item => {
        item.addEventListener('click', () => {
            // Update active state
            document.querySelector('.menu-categories li.active').classList.remove('active');
            item.classList.add('active');

            const selectedCategory = item.textContent;

            // Filter products
            productCards.forEach(card => {
                // If "All" or match category
                if (selectedCategory === "All" || card.getAttribute('data-category') === selectedCategory) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        });
    });
});