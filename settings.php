<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - Handbag Shop</title>
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
                <li><a href="#">Logout</a></li>
            </ul>
        </aside>
        <main class="main-content">
            <header>
                <h1>Settings</h1>
            </header>
            <section class="settings-form">
                <h2>Site Settings</h2>
                <form action="update-settings.php" method="post">
                    <label for="site-name">Site Name:</label>
                    <input type="text" id="site-name" name="site-name" required>
                    
                    <label for="site-email">Contact Email:</label>
                    <input type="email" id="site-email" name="site-email" required>
                    
                    <label for="site-phone">Contact Phone:</label>
                    <input type="tel" id="site-phone" name="site-phone">
                    
                    <label for="site-address">Address:</label>
                    <textarea id="site-address" name="site-address"></textarea>
                    
                    <button type="submit">Save Settings</button>
                </form>
            </section>
        </main>
    </div>
</body>
</html>
