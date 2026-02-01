<?php 
include 'includes/config.php'; 
include 'includes/header.php'; 

// Fetch categories for the sidebar
$cat_stmt = $pdo->query("SELECT DISTINCT category FROM menu_items ORDER BY category ASC");
$categories = $cat_stmt->fetchAll(PDO::FETCH_COLUMN);

// Fetch all menu items
$stmt = $pdo->query("SELECT * FROM menu_items");
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<main class="menu-layout">

    <aside class="menu-categories">
        <h3>Categories</h3>
        <ul>
            <li class="active" onclick="filterCategory('All')">All</li>
            <?php foreach ($categories as $cat): ?>
                <li onclick="filterCategory('<?php echo $cat; ?>')"><?php echo $cat; ?></li>
            <?php endforeach; ?>
        </ul>
    </aside>

    <section class="menu-content">
        <div class="menu-grid" id="menu-grid">
            <?php foreach ($items as $item): ?>
                <div class="menu-card" data-category="<?php echo $item['category']; ?>">
                    <img src="images/<?php echo $item['image_path']; ?>" alt="<?php echo $item['name']; ?>">
                    <h4><?php echo $item['name']; ?></h4>
                    <p><?php echo $item['description']; ?></p>
                    <span class="price">₱<?php echo number_format($item['price'], 2); ?></span>
                    <button class="add-btn" onclick="addToCart(<?php echo $item['id']; ?>, '<?php echo addslashes($item['name']); ?>', <?php echo $item['price']; ?>)">+</button>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

</main>

<?php include 'includes/footer.php'; ?>