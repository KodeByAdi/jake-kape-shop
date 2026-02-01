<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kape Kuripot | Quality Coffee</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header class="site-header">
        <div class="top-bar">
            <div class="logo-area">
                <a href="index.php" class="logo-link">
                    <span class="logo-text">Kape Kuripot</span>
                </a>
            </div>
            <div class="top-links">
                <?php
                // Logic to change links if user is logged in
                session_start();
                if (isset($_SESSION['admin_id'])) {
                    echo '<a href="admin/dashboard.php">Dashboard</a>';
                    echo '<a href="admin/logout.php">Logout</a>';
                } else {
                    echo '<a href="login.php">Login / Signup</a>';
                }
                ?>
                <a href="help.php">Help</a>
                <a href="order.php" class="btn-order-now">Order Now</a>
            </div>
        </div>

        <nav class="main-nav">
            <ul>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="store.php">Store</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="about.php">About Us</a></li>
            </ul>
        </nav>
    </header>