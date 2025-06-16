<?php
 include('config.php');
 session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Four Roses Online Shop</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <header>
        <nav class="navbar">
            <div class="logo">
                <h2>Four Roses Online Book Store</h2>
            </div>

            <div class="navmenu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="product.php">Product</a></li>
                    <li><a href="categories.php">Categories</a></li>
                    <li><a href="arrival.php">Arrivals</a></li>
                    <li><a href="contact.php">Feedback us</a></li>
                    <li><a href="admin login.php">Admin</a></li>
                </ul>
            </div>
        </nav>

        <div class="main-header">
            <div class="header">
                <h5>Four Roses Online Book Store</h5>
                <h2>For All Your Reading Needs</h2>
                <a href="product.php" class="btn">Shop</a>
            </div>

            <img src="image/bg.png" alt="Banner Image">
        </div>
    </header>

</body>
</html>
