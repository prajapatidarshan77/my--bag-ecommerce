<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM product WHERE id = $id");
    $product = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['product-name'];
    $price = $_POST['product-price'];
    $image = $_POST['product-image'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'uploaded_img/'.$image;

    $stmt =mysqli_query($conn, "UPDATE product SET name='$name',price='$price',image='$image' WHERE id='$id' ");
    if ($stmt) {
        header("Location: manage-products.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product - Handbag Shop</title>
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
                <h1>Edit Product</h1>
            </header>
            <section class="product-form">
                <h2>Edit Product</h2>
                <form action="edit-product.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                    
                    <label for="product-name">Product Name:</label>
                    <input type="text" id="product-name" name="product-name" value="<?php echo $product['name']; ?>" required>
                    
                    
                    <label for="product-price">Price:</label>
                    <input type="number" id="product-price" name="product-price" value="<?php echo $product['price']; ?>" step="0.01" required>
                    
                    <label for="product-image">Image :</label>
                    <input type="file" name="product_image" accept="img/jpg img/png img/jpeg"  required>

                    <button type="submit">Update Product</button>
                </form>
            </section>
        </main>
    </div>
</body>
</html>
