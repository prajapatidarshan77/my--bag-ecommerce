<?php
session_start();
include 'connection.php';
include 'header2.php';

if (!isset($_SESSION['admin'])) {
    header("Location: A_login.php");
    exit();
}

// Handle user operations (delete)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_user'])) {
    $id = $_POST['id'];
    $stmt = $pdo->prepare("DELETE FROM signup WHERE id=?");
    $stmt->execute([$id]);
}

// Fetch users
$stmt = $pdo->prepare("SELECT * FROM signup");
$stmt->execute();
$users = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Users</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Manage Users</h1>
    <nav>
    </nav>
</header>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
			<th>Last Name</th>
			<th>User Name</th>
			<th>Gender</th>
			<th>Password</th>
			<th>Confirm Password</th>
            <th>Email</th>
			<th>Phone</th>
			<th>Address</th>
			<th>District</th>
			<th>State</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo htmlspecialchars($user['fname']); ?></td>
                <td><?php echo htmlspecialchars($user['lname']); ?></td>
				 <td><?php echo htmlspecialchars($user['uname']); ?></td>
				  <td><?php echo htmlspecialchars($user['gender']); ?></td>
				  <td><?php echo htmlspecialchars($user['pswd']); ?></td>
				   <td><?php echo htmlspecialchars($user['conpswd']); ?></td>
				    <td><?php echo htmlspecialchars($user['email']); ?></td>
					 <td><?php echo htmlspecialchars($user['phone']); ?></td>
					  <td><?php echo htmlspecialchars($user['add']); ?></td>
					   <td><?php echo htmlspecialchars($user['dist']); ?></td>
					    <td><?php echo htmlspecialchars($user['state']); ?></td>
                <td>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                        <input type="submit" name="delete_user" value="Delete" onclick="return confirm('Are you sure you want to delete this user?');">
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