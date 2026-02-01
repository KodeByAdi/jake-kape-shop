<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}
include 'includes/config.php';
$orders = $pdo->query("SELECT * FROM orders ORDER BY created_at DESC")->fetchAll();
?>

<h2>Admin Dashboard</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Customer</th>
        <th>Total</th>
        <th>Date</th>
    </tr>
    <?php foreach ($orders as $order): ?>
    <tr>
        <td><?= $order['id'] ?></td>
        <td><?= $order['customer_name'] ?></td>
        <td>$<?= $order['total_price'] ?></td>
        <td><?= $order['created_at'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>