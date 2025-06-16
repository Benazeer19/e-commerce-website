<?php
$books = array(
    array("image" => "cs1.jpg", "title" => "Introduction to Algorithms", "author" => "Cormen", "price" => 850, "genre" => "Algorithms", "rating" => 5),
    array("image" => "cs2.jpg", "title" => "Computer Networking: A Top-Down Approach", "author" => "Kurose", "price" => 700, "genre" => "Networking", "rating" => 4),
    array("image" => "cs3.jpg", "title" => "Artificial Intelligence: A Modern Approach", "author" => "Stuart Russell", "price" => 950, "genre" => "AI & Machine Learning", "rating" => 5),
    array("image" => "cs4.jpg", "title" => "Operating System Concepts", "author" => "Silberschatz", "price" => 780, "genre" => "Operating Systems", "rating" => 4),
    array("image" => "cs5.jpg", "title" => "Computer Organization and Design", "author" => "Patterson & Hennessy", "price" => 720, "genre" => "Computer Architecture", "rating" => 5),
    array("image" => "cs6.jpg", "title" => "Clean Code", "author" => "Robert C. Martin", "price" => 600, "genre" => "Software Engineering", "rating" => 5),
    array("image" => "cs7.jpg", "title" => "Design Patterns", "author" => "Gamma et al.", "price" => 680, "genre" => "Software Architecture", "rating" => 4),
    array("image" => "cs8.jpg", "title" => "Computer Security Principles", "author" => "William Stallings", "price" => 750, "genre" => "Cyber Security", "rating" => 5),
    array("image" => "cs9.jpg", "title" => "The Pragmatic Programmer", "author" => "Hunt & Thomas", "price" => 620, "genre" => "Software Development", "rating" => 4),
    array("image" => "cs10.jpg", "title" => "SICP", "author" => "Abelson & Sussman", "price" => 780, "genre" => "Programming Principles", "rating" => 5)
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Computer Science Collection</title>
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

<!-- Page Title -->
<h2>Top 10 Computer Science Books</h2>

<!-- First Row -->
<div class="book-row">
  <?php for ($i = 0; $i < 5; $i++): ?>
    <div class="book">
      <img src="image/<?php echo htmlspecialchars($books[$i]['image']); ?>" alt="<?php echo htmlspecialchars($books[$i]['title']); ?>">
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
      <img src="image/<?php echo htmlspecialchars($books[$i]['image']); ?>" alt="<?php echo htmlspecialchars($books[$i]['title']); ?>">
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
