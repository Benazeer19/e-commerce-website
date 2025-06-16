<?php
$books = array(
    array("title" => "Dune", "author" => "Frank Herbert", "price" => 550, "genre" => "Science Fiction", "rating" => 5, "image" => "image/scifi1.jpg"),
    array("title" => "Neuromancer", "author" => "William Gibson", "price" => 420, "genre" => "Cyberpunk", "rating" => 4, "image" => "image/scifi2.jpg"),
    array("title" => "Foundation", "author" => "Isaac Asimov", "price" => 480, "genre" => "Space Opera", "rating" => 5, "image" => "image/scifi3.jpg"),
    array("title" => "The Martian", "author" => "Andy Weir", "price" => 390, "genre" => "Hard Sci-Fi", "rating" => 4, "image" => "image/scifi4.jpg"),
    array("title" => "Snow Crash", "author" => "Neal Stephenson", "price" => 430, "genre" => "Cyberpunk", "rating" => 5, "image" => "image/scifi5.jpg"),
    array("title" => "Brave New World", "author" => "Aldous Huxley", "price" => 360, "genre" => "Dystopian", "rating" => 4, "image" => "image/scifi6.jpg"),
    array("title" => "The Left Hand of Darkness", "author" => "Ursula K. Le Guin", "price" => 400, "genre" => "Soft Sci-Fi", "rating" => 5, "image" => "image/scifi7.jpg"),
    array("title" => "Hyperion", "author" => "Dan Simmons", "price" => 490, "genre" => "Space Opera", "rating" => 4, "image" => "image/scifi8.jpg"),
    array("title" => "2001: A Space Odyssey", "author" => "Arthur C. Clarke", "price" => 410, "genre" => "Hard Sci-Fi", "rating" => 5, "image" => "image/scifi9.jpg"),
    array("title" => "The War of the Worlds", "author" => "H.G. Wells", "price" => 350, "genre" => "Alien Invasion", "rating" => 4, "image" => "image/scifi10.jpg")
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Science Fiction Collection</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background-color: #f8f8f8; }

        .navbar {
            background-color: #333;
            display: flex;
            justify-content: center;
            padding: 15px;
        }

        .navbar a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            font-size: 18px;
        }

        .navbar a:hover {
            background-color: #575757;
            border-radius: 5px;
        }

        h2 {
            text-align: center;
            margin: 20px 0;
            font-size: 28px;
            color: #222;
        }

        .book-row {
            display: flex;
            justify-content: center;
            flex-wrap: nowrap;
            gap: 20px;
            padding: 20px;
            flex-wrap: wrap;
        }

        .book {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            width: 180px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .book:hover {
            transform: scale(1.05);
        }

        .book img {
            width: 100%;
            height: auto;
            border-radius: 5px;
            transition: transform 0.3s ease-in-out;
        }

        .book img:hover {
            transform: scale(1.1);
        }

        .book h3 {
            font-size: 16px;
            margin: 10px 0;
        }

        .book p {
            font-size: 14px;
            color: #444;
            margin: 5px 0;
        }

        .rating {
            color: gold;
            font-size: 18px;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<!-- Navigation Bar -->
<div class="navbar">
    <a href="index.php">Home</a>
    <a href="categories.php">Categories</a>
    <a href="product.php">Product</a>
</div>

<!-- Page Title -->
<h2>Top 10 Science Fiction Books</h2>

<!-- First Row -->
<div class="book-row">
    <?php for ($i = 0; $i < 5; $i++): ?>
        <div class="book">
            <img src="<?php echo $books[$i]['image']; ?>" alt="<?php echo htmlspecialchars($books[$i]['title']); ?>">
            <h3><?php echo htmlspecialchars($books[$i]['title']); ?></h3>
            <p>By <?php echo htmlspecialchars($books[$i]['author']); ?></p>
            <p>Price: ₹<?php echo $books[$i]['price']; ?></p>
            <p><?php echo htmlspecialchars($books[$i]['genre']); ?></p>
            <p class="rating"><?php echo str_repeat('⭐', $books[$i]['rating']); ?></p>
        </div>
    <?php endfor; ?>
</div>

<!-- Second Row -->
<div class="book-row">
    <?php for ($i = 5; $i < 10; $i++): ?>
        <div class="book">
            <img src="<?php echo $books[$i]['image']; ?>" alt="<?php echo htmlspecialchars($books[$i]['title']); ?>">
            <h3><?php echo htmlspecialchars($books[$i]['title']); ?></h3>
            <p>By <?php echo htmlspecialchars($books[$i]['author']); ?></p>
            <p>Price: ₹<?php echo $books[$i]['price']; ?></p>
            <p><?php echo htmlspecialchars($books[$i]['genre']); ?></p>
            <p class="rating"><?php echo str_repeat('⭐', $books[$i]['rating']); ?></p>
        </div>
    <?php endfor; ?>
</div>

</body>
</html>
