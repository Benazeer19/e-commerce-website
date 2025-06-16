<?php
// Start session if needed
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Book Categories</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #fafafa;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #4CAF50;
      color: white;
      padding: 30px 20px;
      text-align: center;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    nav {
      background-color: #333;
      padding: 12px 0;
      text-align: center;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    nav ul {
      list-style: none;
      margin: 0;
      padding: 0;
    }

    nav li {
      display: inline;
      margin: 0 15px;
    }

    nav a {
      color: #fff;
      text-decoration: none;
      font-weight: bold;
      transition: color 0.3s ease;
    }

    nav a:hover {
      color: #4CAF50;
    }

    main {
      padding: 40px 20px;
      text-align: center;
    }

    h2 {
      margin-bottom: 30px;
      font-size: 28px;
      color: #333;
    }

    .categories {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 30px;
    }

    .category {
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.05);
      width: 240px;
      padding: 20px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .category:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    .category h3 {
      margin: 0 0 10px;
      font-size: 20px;
      color: #4CAF50;
    }

    .category a {
      text-decoration: none;
      color: #4CAF50;
    }

    .category a:hover {
      text-decoration: underline;
    }

    .category p {
      color: #555;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <header>
    <h1>Book Categories</h1>
  </header>
  <nav>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="product.php">Product</a></li>
    </ul>
  </nav>
  <main>
    <h2>Explore Our Book Categories</h2>
    <div class="categories">
      <div class="category">
        <h3><a href="scifi.php">Science Fiction</a></h3>
        <p>Explore our collection of science fiction books</p>
      </div>
      <div class="category">
        <h3><a href="novels.php">Novels</a></h3>
        <p>Discover our selection of novels books</p>
      </div>
      <div class="category">
        <h3><a href="story.php">Story</a></h3>
        <p>Find your next favorite story book</p>
      </div>
      <div class="category">
        <h3><a href="computer.php">Computer Science</a></h3>
        <p>Find your next favorite CS book</p>
      </div>
    </div>
  </main>
</body>
</html>
