<?php
$books = array(
  array("title" => "Pride and Prejudice", "author" => "Jane Austen", "price" => 350, "genre" => "Romance", "rating" => 5, "image" => "image/novel1.jpg"),
  array("title" => "To Kill a Mockingbird", "author" => "Harper Lee", "price" => 450, "genre" => "Classic", "rating" => 5, "image" => "image/novel2.jpg"),
  array("title" => "The Great Gatsby", "author" => "F. Scott Fitzgerald", "price" => 400, "genre" => "Drama", "rating" => 4, "image" => "image/novel3.jpg"),
  array("title" => "1984", "author" => "George Orwell", "price" => 300, "genre" => "Dystopian", "rating" => 5, "image" => "image/novel4.jpg"),
  array("title" => "Wuthering Heights", "author" => "Emily Brontë", "price" => 380, "genre" => "Tragedy", "rating" => 4, "image" => "image/novel5.jpg"),
  array("title" => "Jane Eyre", "author" => "Charlotte Brontë", "price" => 420, "genre" => "Romance", "rating" => 5, "image" => "image/novel6.jpg"),
  array("title" => "Moby-Dick", "author" => "Herman Melville", "price" => 390, "genre" => "Adventure", "rating" => 4, "image" => "image/novel7.jpg"),
  array("title" => "Crime and Punishment", "author" => "Fyodor Dostoevsky", "price" => 450, "genre" => "Psychological", "rating" => 5, "image" => "image/novel8.jpg"),
  array("title" => "War and Peace", "author" => "Leo Tolstoy", "price" => 500, "genre" => "Historical", "rating" => 4, "image" => "image/novel9.jpg"),
  array("title" => "Les Misérables", "author" => "Victor Hugo", "price" => 480, "genre" => "Drama", "rating" => 5, "image" => "image/novel10.jpg")
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Novel Collection</title>
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
<h2>Top 10 Novel Books</h2>

<!-- First Row -->
<div class="book-row">
  <?php for ($i = 0; $i < 5; $i++): ?>
    <div class="book">
      <img src="<?php echo $books[$i]['image']; ?>" alt="<?php echo htmlspecialchars($books[$i]['title']); ?>">
      <h3><?php echo htmlspecialchars($books[$i]['title']); ?></h3>
      <p>By <?php echo htmlspecialchars($books[$i]['author']); ?></p>
      <p>Price: ₹<?php echo $books[$i]['price']; ?></p>
      <p><?php echo htmlspecialchars($books[$i]['genre']); ?></p>
      <p class="rating"><?php echo str_repeat("⭐", $books[$i]['rating']); ?></p>
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
      <p class="rating"><?php echo str_repeat("⭐", $books[$i]['rating']); ?></p>
    </div>
  <?php endfor; ?>
</div>

</body>
</html>
