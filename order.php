<?php 
include 'includes/config.php'; 
include 'includes/header.php'; 

// Initialize cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$statusMsg = "";

// Handle Order Submission to Database
if (isset($_POST['place_order'])) {
    $customer_name = htmlspecialchars($_POST['customer_name']);
    $customer_email = htmlspecialchars($_POST['customer_email']);
    $order_items = json_encode($_SESSION['cart']); // Convert cart array to JSON for MySQL
    $total_price = $_POST['total_price'];

    if (!empty($_SESSION['cart'])) {
        try {
            $stmt = $pdo->prepare("INSERT INTO orders (customer_name, customer_email, order_items, total_price) VALUES (?, ?, ?, ?)");
            if ($stmt->execute([$customer_name, $customer_email, $order_items, $total_price])) {
                $_SESSION['cart'] = []; // Clear cart after success
                $statusMsg = "<p class='status-success'>Order placed! Thank you for choosing Kape Kuripot.</p>";
            }
        } catch (PDOException $e) {
            $statusMsg = "<p class='status-error'>Order failed: " . $e->getMessage() . "</p>";
        }
    } else {
        $statusMsg = "<p class='status-error'>Your cart is empty!</p>";
    }
}
?>

<section class="container">
    <h2>Your Order</h2>
    <?php echo $statusMsg; ?>

    <div class="order-layout">
        <div class="cart-summary card">
            <h3>Items Selected</h3>
            <?php if (empty($_SESSION['cart'])): ?>
                <p>Your cart is empty. <a href="menu.php">Go to Menu</a></p>
            <?php else: ?>
                <table class="order-table">
                    <tr><th>Item</th><th>Price</th></tr>
                    <?php 
                    $total = 0;
                    foreach ($_SESSION['cart'] as $item): 
                        $total += $item['price'];
                    ?>
                    <tr>
                        <td><?php echo $item['name']; ?></td>
                        <td>₱<?php echo number_format($item['price'], 2); ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <tr class="total-row">
                        <td><strong>Total</strong></td>
                        <td><strong>₱<?php echo number_format($total, 2); ?></strong></td>
                    </tr>
                </table>
            <?php endif; ?>
        </div>

        <div class="checkout-form card">
            <h3>Customer Details</h3>
            <form method="POST" action="order.php">
                <input type="hidden" name="total_price" value="<?php echo $total ?? 0; ?>">
                <input type="text" name="customer_name" placeholder="Full Name" required>
                <input type="email" name="customer_email" placeholder="Email Address" required>
                <button type="submit" name="place_order" class="auth-btn">Confirm Order</button>
            </form>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>