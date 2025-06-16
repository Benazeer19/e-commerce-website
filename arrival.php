<?php
$books = array(
    array("img" => "image/st.jpg", "title" => "The Alchemist", "author" => "Paulo Coelho", "price" => 400, "category" => "Adventure", "stars" => 5),
    array("img" => "image/atomic.png", "title" => "Atomic Habits", "author" => "James Clear", "price" => 450, "category" => "Self-Help", "stars" => 5),
    array("img" => "image/trending4.jpg", "title" => "Ikigai", "author" => "Hector Garcia", "price" => 380, "category" => "Philosophy", "stars" => 4),
    array("img" => "image/trending3.jpg", "title" => "Rich Dad Poor Dad", "author" => "Robert Kiyosaki", "price" => 500, "category" => "Finance", "stars" => 5),
    array("img" => "image/money.jpg", "title" => "The Psychology of Money", "author" => "Morgan Housel", "price" => 420, "category" => "Finance", "stars" => 4),
    array("img" => "image/1984.jpg", "title" => "1984", "author" => "George Orwell", "price" => 350, "category" => "Dystopian", "stars" => 5),
    array("img" => "image/trending7.jpg", "title" => "Sapiens", "author" => "Yuval Noah Harari", "price" => 480, "category" => "History", "stars" => 5),
    array("img" => "image/trending8.jpg", "title" => "Think and Grow Rich", "author" => "Napoleon Hill", "price" => 390, "category" => "Finance", "stars" => 4),
    array("img" => "image/believe.jpg", "title" => "Believe in Yourself", "author" => "Joseph Murphy", "price" => 115, "category" => "Self-Help", "stars" => 4),
    array("img" => "image/trending10.jpg", "title" => "The Midnight Library", "author" => "Matt Haig", "price" => 430, "category" => "Fiction", "stars" => 5)
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Arrival Collection</title>
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
      flex-wrap: wrap;
      gap: 20px;
      padding: 20px;
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

<h2>New Arrival Books</h2>

<!-- First Row -->
<div class="book-row">
  <?php for ($i = 0; $i < 5; $i++): ?>
    <div class="book">
      <img src="<?php echo $books[$i]['img']; ?>" alt="<?php echo htmlspecialchars($books[$i]['title']); ?>">
      <h3><?php echo htmlspecialchars($books[$i]['title']); ?></h3>
      <p>By <?php echo htmlspecialchars($books[$i]['author']); ?></p>
      <p>Price: ₹<?php echo $books[$i]['price']; ?></p>
      <p><?php echo htmlspecialchars($books[$i]['category']); ?></p>
      <p class="rating"><?php echo str_repeat("⭐", $books[$i]['stars']); ?></p>
    </div>
  <?php endfor; ?>
</div>

<!-- Second Row -->
<div class="book-row">
  <?php for ($i = 5; $i < 10; $i++): ?>
    <div class="book">
      <img src="<?php echo $books[$i]['img']; ?>" alt="<?php echo htmlspecialchars($books[$i]['title']); ?>">
      <h3><?php echo htmlspecialchars($books[$i]['title']); ?></h3>
      <p>By <?php echo htmlspecialchars($books[$i]['author']); ?></p>
      <p>Price: ₹<?php echo $books[$i]['price']; ?></p>
      <p><?php echo htmlspecialchars($books[$i]['category']); ?></p>
      <p class="rating"><?php echo str_repeat("⭐", $books[$i]['stars']); ?></p>
    </div>
  <?php endfor; ?>
</div>

</body>
</html>
