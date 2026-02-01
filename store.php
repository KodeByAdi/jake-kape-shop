<?php include 'includes/header.php'; ?>

<section class="store-nav">
    <h2>Our Stores</h2>
    <input type="text" id="storeSearch" placeholder="Search Stores..." onkeyup="searchStores()">
</section>

<section class="store-wrapper" id="storeGrid">
    <div class="store-card">
        <h3>KAPE KURIPOT – MAIN BRANCH</h3>
        <span class="status open">Open • 24 hours</span>
        <p class="meta">Est. 0.5 km • Delivery 20 min</p>
        <p class="addr">Pureza, Sta. Mesa, Manila</p>
        <div class="store-actions">
            <button class="btn-outline">Directions</button>
            <a href="order.php" class="btn-primary">Order Now</a>
        </div>
    </div>

    <div class="store-card">
        <h3>KAPE KURIPOT – QC BRANCH</h3>
        <span class="status closed">Closed • Opens 8:00 AM</span>
        <p class="meta">Est. 1.2 km • Delivery 30 min</p>
        <p class="addr">Commonwealth Ave, Quezon City</p>
        <div class="store-actions">
            <button class="btn-outline">Directions</button>
            <a href="menu.php" class="btn-outline">View Menu</a>
        </div>
    </div>
    
    </section>

<section class="store-brand">
    <div class="brand-box"></div>
    <div class="brand-text">
        <h2>Kape Kuripot Stores Near You</h2>
        <p>
            Welcome to Kape Kuripot! We serve affordable yet high-quality coffee
            loved by students and professionals alike. With multiple branches
            across Metro Manila, your daily caffeine fix is always nearby.
        </p>
    </div>
</section>

<?php include 'includes/footer.php'; ?>