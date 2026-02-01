<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>
    <header class="hero">
        <h1>Warmth in Every Sip</h1>
        <p>Experience the finest beans in Manila.</p>
        <a href="menu.php" class="btn">Explore Menu</a>
    </header>

    <section class="container">
        <h2>Featured Drinks</h2>
        <div class="grid">
            <?php
            $stmt = $pdo->query("SELECT * FROM menu_items LIMIT 3");
            while ($row = $stmt->fetch()) {
                echo "<div class='card'>";
                echo "<h3>{$row['name']}</h3>";
                echo "<p>{$row['description']}</p>";
                echo "<span>₱{$row['price']}</span>";
                echo "</div>";
            }
            ?>
        </div>
    </section>