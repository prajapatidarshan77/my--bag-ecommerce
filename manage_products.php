<?php
session_start();
include 'connection.php';
 include 'header2.php';

if (!isset($_SESSION['admin'])) {
    header("Location: A_login.php");
    exit();
}

// Handle product operations (add/update/delete)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_product'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $image = $_POST['image'];

        $stmt = $pdo->prepare("INSERT INTO products (name, price, image) VALUES (?, ?, ?)");
        $stmt->execute([$name, $price, $image]);
    } elseif (isset($_POST['update_product'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $image = $_POST['image'];

        $stmt = $pdo->prepare("UPDATE products SET name=?, price=?, image=? WHERE id=?");
        $stmt->execute([$name, $price, $image, $id]);
    } elseif (isset($_POST['delete_product'])) {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM products WHERE id=?");
        $stmt->execute([$id]);
    }
}

// Fetch products
$stmt = $pdo->prepare("SELECT * FROM products");
$stmt->execute();
$products = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Products</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Manage Products</h1>
    <nav>

       
    </nav>
</header>

<form method="POST" align="center">
    Product Name :- <input type="text" name="name" placeholder="Product Name" required>
	<br><br>
    Price :- <input type="number" name="price" placeholder="Price" step="0.01" required>
	<br><br>
    Image :- <input type="text" name="image" placeholder="Image URL">
	<br><br>
    <input type="submit" name="add_product" value="Add Product">
</form>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
		<?php 
			/*while ($row = $products->fetch_assoc()) {
    // Process each row
    echo $row['id'];	// Replace with your actual column names
	echo $row['name'];
	echo $row['price'];
	echo $row['image'];
}*/
?>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['id']; ?></td>
                <td><?php echo htmlspecialchars($product['name']); ?></td>
                <td><?php echo htmlspecialchars($product['price']); ?></td>
                <td><img src="img/<?php echo htmlspecialchars($product['image']); ?>" alt="Product Image" width="50"></td><br><br>
                <td>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                        <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>
                        <input type="number" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" step="0.01" required>
                        <input type="text" name="image" value="<?php echo htmlspecialchars($product['image']); ?>">
                        <input type="submit" name="update_product" value="Update">
                    </form>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                        <input type="submit" name="delete_product" value="Delete" onclick="return confirm('Are you sure you want to delete this product?');">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
<?php
    include 'footer.php';
?>