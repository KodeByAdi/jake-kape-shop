function filterCategory(category) {
    const cards = document.querySelectorAll('.menu-card');
    const listItems = document.querySelectorAll('.menu-categories li');

    // Update active class in sidebar
    listItems.forEach(li => {
        li.classList.remove('active');
        if (li.innerText === category) li.classList.add('active');
    });

    // Show/Hide cards
    cards.forEach(card => {
        if (category === 'All' || card.getAttribute('data-category') === category) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}

// Tab Switching
const loginTab = document.getElementById('loginTab');
const signupTab = document.getElementById('signupTab');
const loginForm = document.getElementById('loginForm');
const signupForm = document.getElementById('signupForm');

loginTab.addEventListener('click', () => {
    loginTab.classList.add('active');
    signupTab.classList.remove('active');
    loginForm.classList.remove('hidden');
    signupForm.classList.add('hidden');
});

signupTab.addEventListener('click', () => {
    signupTab.classList.add('active');
    loginTab.classList.remove('active');
    signupForm.classList.remove('hidden');
    loginForm.classList.add('hidden');
});

// Password Toggle
document.querySelectorAll('.toggle-pass').forEach(btn => {
    btn.addEventListener('click', function() {
        const targetId = this.getAttribute('data-target');
        const input = document.getElementById(targetId);
        if (input.type === "password") {
            input.type = "text";
            this.textContent = "visibility_off";
        } else {
            input.type = "password";
            this.textContent = "visibility";
        }
    });
});

function addToCart(itemId, itemName, itemPrice) {
    // Create form data to send to the PHP logic at the top of menu.php
    let formData = new FormData();
    formData.append('id', itemId);
    formData.append('name', itemName);
    formData.append('price', itemPrice);

    fetch('menu.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(cartCount => {
        // Update the cart count in the header (if you have a span with id="cart-count")
        const countBadge = document.getElementById('cart-count');
        if (countBadge) {
            countBadge.innerText = cartCount;
        }
        alert(itemName + " added to cart!");
    })
    .catch(error => console.error('Error:', error));
}