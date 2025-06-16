<?php
include 'config.php';

// ======== password_hash compatibility for PHP < 5.5 ========
if (!function_exists('password_hash')) {
    define('PASSWORD_BCRYPT', 1);
    define('PASSWORD_DEFAULT', PASSWORD_BCRYPT);

    function password_hash($password, $algo, $options = array()) {
        if (!function_exists('crypt')) return null;
        if ($algo !== PASSWORD_BCRYPT) return null;

        $cost = isset($options['cost']) ? (int)$options['cost'] : 10;
        if ($cost < 4 || $cost > 31) return null;

        // Fallback salt generator (no openssl)
        $salt = '';
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789./';
        for ($i = 0; $i < 22; $i++) {
            $salt .= $chars[mt_rand(0, strlen($chars) - 1)];
        }

        $salt = sprintf('$2y$%02d$%s', $cost, $salt);
        return crypt($password, $salt);
    }

    function password_verify($password, $hash) {
        return crypt($password, $hash) === $hash;
    }
}
// ======== End compatibility patch ========

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $checkUser = $conn->prepare("SELECT id FROM register WHERE email=? OR username=?");
    if (!$checkUser) {
        die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
    }

    $checkUser->bind_param("ss", $email, $username);
    $checkUser->execute();
    $checkUser->store_result();

    if ($checkUser->num_rows > 0) {
        $error = "❌ Error: Username or Email already registered.";
    } else {
        $stmt = $conn->prepare("INSERT INTO register (username, email, password) VALUES (?, ?, ?)");
        if (!$stmt) {
            die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
        }

        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {
            $success = "✅ Registration successful! <a href='login.php'>Login here</a>";
        } else {
            $error = "❌ SQL Error: " . $stmt->error;
        }
        $stmt->close();
    }

    $checkUser->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: Arial, sans-serif; }

        body {
            background: linear-gradient(to right,rgb(54, 171, 192),rgb(30, 216, 207));
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
        }

        h2 { color: #333; margin-bottom: 20px; }

        .message { margin-bottom: 15px; }
        .error { color: red; }
        .success { color: green; }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background: #667eea;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background 0.3s;
        }

        button:hover { background: #5563c1; }

        p { margin-top: 15px; }

        a {
            color: #667eea;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="register-container">
    <h2>Register</h2>

    <?php 
        if (!empty($error)) echo "<p class='message error'>$error</p>"; 
        if (!empty($success)) echo "<p class='message success'>$success</p>";
    ?>

    <form method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="login.php">Login here</a></p>
</div>

</body>
</html>
