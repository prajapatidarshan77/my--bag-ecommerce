<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['product-name'];
    $price = $_POST['product-price'];
    $image = $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'uploaded_img/'.$product_image;


    $stmt= mysqli_query($conn, "INSERT INTO `product` (id,name,price,image) 
    VALUES ('$id','$name','$price','$image')") or die('query failed');

    if ($stmt) {
        move_uploaded_file($image_tmp_name,$product_image_folder);

        header("Location: manage-products.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
