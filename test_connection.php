<?php
$conn = new mysqli('localhost', 'your_username', 'your_password', 'books_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
