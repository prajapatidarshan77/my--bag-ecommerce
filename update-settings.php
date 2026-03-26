<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $siteName = $_POST['site-name'];
    $siteEmail = $_POST['site-email'];
    $sitePhone = $_POST['site-phone'];
    $siteAddress = $_POST['site-address'];

    // Assuming a settings table with a single row
    $stmt = $conn->prepare("UPDATE settings SET site_name = ?, site_email = ?, site_phone = ?, site_address = ?");
    $stmt->bind_param("ssss", $siteName, $siteEmail, $sitePhone, $siteAddress);

    if ($stmt->execute()) {
        header("Location: settings.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
