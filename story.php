<?php 
$books = array(
  array("title" => "The Last Leaf", "author" => "O. Henry", "price" => 250, "genre" => "Short Story", "rating" => 4, "image" => "image/story1.jpg"),
  array("title" => "The Lottery", "author" => "Shirley Jackson", "price" => 300, "genre" => "Horror", "rating" => 5, "image" => "image/story2.jpg"),
  array("title" => "A Good Man is Hard to Find", "author" => "Flannery O'Connor", "price" => 270, "genre" => "Drama", "rating" => 4, "image" => "image/story3.jpg"),
  array("title" => "The Tell-Tale Heart", "author" => "Edgar Allan Poe", "price" => 320, "genre" => "Gothic", "rating" => 5, "image" => "image/story4.jpg"),
  array("title" => "The Necklace", "author" => "Guy de Maupassant", "price" => 260, "genre" => "Classic", "rating" => 4, "image" => "image/story5.jpg"),
  array("title" => "The Gift of the Magi", "author" => "O. Henry", "price" => 280, "genre" => "Romance", "rating" => 5, "image" => "image/story6.jpg"),
  array("title" => "The Open Window", "author" => "Saki", "price" => 240, "genre" => "Humor", "rating" => 4, "image" => "image/story7.jpg"),
  array("title" => "An Occurrence at Owl Creek Bridge", "author" => "Ambrose Bierce", "price" => 310, "genre" => "War", "rating" => 5, "image" => "image/story8.jpg"),
  array("title" => "The Monkey's Paw", "author" => "W. W. Jacobs", "price" => 290, "genre" => "Horror", "rating" => 4, "image" => "image/story9.jpg"),
  array("title" => "The Bet", "author" => "Anton Chekhov", "price" => 300, "genre" => "Philosophical", "rating" => 5, "image" => "image/story10.jpg")
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
<h2>Top 10  Books</h2>

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
