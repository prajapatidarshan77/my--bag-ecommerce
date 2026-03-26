<?php
session_start();
include 'connection.php';
 include 'header2.php';

if (!isset($_SESSION['admin'])) {
    header("Location: A_login.php");
    exit();
}

// Handle delete order
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_order'])) {
    $id = $_POST['id'];
    $stmt = $pdo->prepare("DELETE FROM orders WHERE id=?");
    $stmt->execute([$id]);
}

// Fetch orders
$stmt = $pdo->prepare("SELECT * from orders ");/*("SELECT orders.*, users.username, products.name AS product_name FROM orders JOIN users ON orders.user_id = users.id JOIN products ON orders.product_id = products.id");*/
$stmt->execute();
$orders = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Orders</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Manage Orders</h1>
    <nav>
    </nav>
</header>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
			<th>Number</th>
			<th>E-mail</th>
			<th>Method</th>
			<th>Flat</th>
			<th>Street</th>
			<th>City</th>
			<th>State</th>
			<th>Country</th>
			<th>Pincode</th>
            <th>Product</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td><?php echo $order['id']; ?></td>
                <td><?php echo htmlspecialchars($order['name']); ?></td>
                <td><?php echo htmlspecialchars($order['number']); ?></td>
				<td><?php echo htmlspecialchars($order['email']); ?></td>
				<td><?php echo htmlspecialchars($order['method']); ?></td>
				<td><?php echo htmlspecialchars($order['flat']); ?></td>
				<td><?php echo htmlspecialchars($order['street']); ?></td>
				<td><?php echo htmlspecialchars($order['city']); ?></td>
				<td><?php echo htmlspecialchars($order['state']); ?></td>
				<td><?php echo htmlspecialchars($order['country']); ?></td>
				<td><?php echo htmlspecialchars($order['pin_code']); ?></td>
				<td><?php echo htmlspecialchars($order['total_products']); ?></td>
				<td><?php echo htmlspecialchars($order['total_price']); ?></td>
                <td>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $order['id']; ?>">
                        <input type="submit" name="delete_order" value="Delete" onclick="return confirm('Are you sure you want to delete this order?');">
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