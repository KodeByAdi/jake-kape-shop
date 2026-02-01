<?php 
// No database connection is strictly needed here unless you want to 
// fetch dynamic "About" content later, but we'll include it for consistency.
include 'includes/config.php'; 
include 'includes/header.php'; 
?>

<section class="about-page">
    <div class="about-container">
        <div class="about-hero-img"></div>
        
        <div class="about-text">
            <h2>Our Story</h2>
            <p>
                Kape Kuripot was created with one mission: to serve affordable,
                high-quality coffee for students, workers, and dreamers.
                What started as a small neighborhood café has grown into
                a loved local brand.
            </p>

            <p>
                We believe great coffee should be accessible to everyone —
                without breaking your budget.
            </p>

            <div class="mission-vision-grid">
                <div class="mission-box">
                    <h3>Our Mission</h3>
                    <p>
                        To serve quality coffee at budget-friendly prices while
                        building a warm and inclusive community.
                    </p>
                </div>

                <div class="vision-box">
                    <h3>Our Vision</h3>
                    <p>
                        To become the most trusted affordable coffee brand in the Philippines.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>