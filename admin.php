<?php

$conn = new mysqli("localhost", "root", "", "book_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle tab selection
$view = isset($_GET['view']) ? $_GET['view'] : 'register';

if ($view === 'register') {
    $sql = "SELECT id, username, email, password FROM register ORDER BY id ASC";
    $result = $conn->query($sql);
} elseif ($view === 'messages') {
    $sql = "SELECT id, name, email, message FROM messages ORDER BY id ASC";
    $result = $conn->query($sql);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #667eea, #764ba2);
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #fff;
            margin-top: 30px;
        }

        .tabs {
            text-align: center;
            margin: 20px;
        }

        .tabs a {
            display: inline-block;
            background: #fff;
            padding: 10px 20px;
            color: #5563c1;
            font-weight: bold;
            text-decoration: none;
            margin: 0 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .tabs a.active {
            background: #5563c1;
            color: white;
        }

        table {
            width: 90%;
            margin: 0 auto 50px;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #5563c1;
            color: white;
        }

        tr:hover { background-color: #f1f1f1; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        td { color: #333; }
        .no-data {
            text-align: center;
            font-size: 18px;
            color: white;
            margin-top: 50px;
        }
        .logout-btn {
           display: inline-block;
           background-color: red;
           color: white;
           font-weight: bold;
           padding: 10px 20px;
           text-decoration: none;
           border: none;
           border-radius: 5px;
           box-shadow: 0 2px 5px rgba(0,0,0,0.2);
           cursor: pointer;
           margin: 10px;
}
.logout-btn:hover {
    background-color: darkred;
}

        
    </style>
</head>
<body>

<h2>Admin Dashboard</h2>

<div class="tabs">
    <a href="?view=register" class="<?= $view === 'register' ? 'active' : '' ?>">View Registered Users</a>
    <a href="?view=messages" class="<?= $view === 'messages' ? 'active' : '' ?>">View Feedback</a>
</div>
<form method="POST" action="index.php" style="text-align: center;">
    <button type="submit" class="logout-btn">Logout</button>
</form>

<?php
if ($result && $result->num_rows > 0) {
    echo "<table>";
    if ($view === 'register') {
        echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Password</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['username']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['password']) . "</td>";
            echo "</tr>";
        }
    } elseif ($view === 'messages') {
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Message</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['message']) . "</td>";
            echo "</tr>";
        }
    }
    echo "</table>";
} else {
    echo "<p class='no-data'>❌ No data found in the " . htmlspecialchars($view) . " table!</p>";
}
$conn->close();
?>

</body>
</html>
