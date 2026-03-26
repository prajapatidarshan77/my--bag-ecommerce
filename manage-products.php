<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products - Handbag Shop</title>
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
                <h1>Manage Products</h1>
            </header>
            <section class="product-form">
                <h2>Add New Product</h2>
                <form action="add-product.php" method="post">
                    <label for="product-name">Product Name:</label>
                    <input type="text" id="product-name" name="product-name" required>
                                        
                    <label for="product-price">Price:</label>
                    <input type="number" id="product-price" name="product-price" step="0.01" required>
                    
                    <label for="product-image">Image :</label>
                    <input type="file" name="product_image" accept="img/jpg img/png img/jpeg"  required>

                    <button type="submit">Add Product</button>
                </form>
            </section>
            <section class="product-list">
                <h2>Product List</h2>
                <?php
                include 'db.php';
                $result = $conn->query("SELECT * FROM products");
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                
                                <td>$<?php echo number_format($row['price'], 2); ?></td>
                                <td>
                                    <a href="edit-product.php?id=<?php echo $row['id']; ?>">Edit</a> | 
                                    <a href="delete-product.php?id=<?php echo $row['id']; ?>">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>
