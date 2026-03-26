<?php

include"A_login.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - School bag Shop</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="admin-panel">
        <aside class="sidebar">
            <h2>Admin Panel</h2>
            <ul>
                <li><a href="index.php">Dashboard</a></li>
                <li><a href="manage-products.php">Manage Products</a></li>
                <li><a href="orders.php">Orders</a></li>
                <li><a href="settings.php">Settings</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </aside>
        <main class="main-content">
            <header>
                <h1>Dashboard</h1>
            </header>
            <section class="metrics">
                <!-- Example metrics with PHP -->
                <?php
                    include 'db.php';

                    $result = $conn->query("SELECT COUNT(*) as count FROM products");
                    $totalProducts = $result->fetch_assoc()['count'];

                    $result = $conn->query("SELECT COUNT(*) as count FROM `order`");
                    $totalOrders = $result->fetch_assoc()['count'];

                    // $result = $conn->query("SELECT COUNT(*) as count FROM signup");
                    // $totalUsers = $result->fetch_assoc()['count'];
                ?>
                <div class="metric">
                    <h3>Total Products</h3>
                    <p><?php echo $totalProducts; ?></p>
                </div>
                <div class="metric">
                    <h3>Total Orders</h3>
                    <p><?php echo $totalOrders; ?></p>
                </div>
                <!-- <div class="metric"> -->
                    <!-- <h3>Total Users</h3> -->
                    <!-- <p><?php echo $totalUsers; ?></p> -->
                <!-- </div> -->
            </section>
        </main>
    </div>
</body>
</html>