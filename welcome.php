<?php
include 'config.php';
// Check if the user is logged in (for demonstration, we assume a simple session-based logic)
session_start();

echo "<div class='welcome'>Welcome to Four Roses Book Store</div>";


// You can also customize a greeting based on the time of the day
date_default_timezone_set("Asia/Kolkata"); // Set timezone
$hour = date("H");

if ($hour < 12) {
    echo "<div class='greeting'>Good Morning! Purchase your favourite books.</div>";
} elseif ($hour < 18) {
    echo "<div class='greeting'>Good Afternoon! Have fun with your books.</div>";
} else {
    echo "<div class='greeting'>Good Evening! Order your books.</div>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store - Welcome</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Bodoni', sans-serif;
            background-color:pink;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .menu {
            list-style: none;
            padding: 10px 20px;
            display: flex;
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(0, 0, 0, 0.6);
            border-radius: 8px;
        }

        .menu li {
            margin: 0 10px;
        }

        .menu li a {
            text-decoration: none;
            color: white;
            font-size: 16px;
            padding: 8px 12px;
            transition: background 0.3s;
            border-radius: 5px;
        }

        .menu li a:hover {
            background: rgba(255, 255, 255, 0.2);
        }
        .main-image {
    max-width: 80%;
    height: auto;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    margin-top: 20px;
}


        .welcome {
            font-size: 4em;
            font-weight: 600;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: black;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);

        }
    </style>
</head>
<body>
    <ul class="menu">
        <li><a href="login.php">Login</a></li>
    </ul>

    <!-- PHP output goes here -->
    <?php
    // your existing PHP code
    ?>

    <!-- Image added -->
    <img src="image/store.jpeg" alt="Four Roses Book Store" class="main-image">


    <ul class="menu">
           <li><a href="login.php">Login</a></li>

    </ul>
</body>
</html>
