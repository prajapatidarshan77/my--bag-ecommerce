<?php
    include 'header1.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>form contact us</title>
        <link rel="stylesheet" href="contact.1.css">
    </head>
    <body>
        <div class="container">
            <form>
                <h1><b>Contact Us</b></h1>
                <input type="text" id="firstname" placeholder="First name" required>
                <input type="text" id="lastname" placeholder="Last name" required>
                <input type="text" id="email" placeholder="Email" required>
                <input type="text" id="mobile" placeholder="Mobile" required>
                <h4>Type Your Message Here.....</h4>
                <textarea required></textarea>
                <input type="submit" value="Send" id="button">
            </form>
        </div>
    </body>
</html>
<?php
    include 'footer.php';
?>