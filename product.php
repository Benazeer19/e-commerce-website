<?php
session_start();
include 'config.php'; // Database connection

// Fetch products from database
$result = $conn->query("SELECT * FROM products");
$products = array();
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Add to cart functionality
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $quantity = 1; // Default quantity

    // Check if product is already in cart
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += $quantity;
    } else {
        $_SESSION['cart'][$product_id] = $quantity;
    }

    header("Location: product.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="veiwport" content="width=device-width, inital-scale=1.0">
    <title>Four Roses Online Book Store - Shopping Cart | Codehal</title>
    <div class="navmenu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <ul>
</div>
    
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <style>
        /* Reset and Base */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
    background-color: #f9f9f9;
    color: #333;
}

a {
    text-decoration: none;
    color: inherit;
}

header {
    background-color: #2c3e50;
    padding: 20px 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: white;
}

.logo {
    font-size: 24px;
    font-weight: bold;
}

#cart-icon {
    position: relative;
    cursor: pointer;
    font-size: 24px;
}

.cart-item-count {
    background-color: crimson;
    color: white;
    border-radius: 50%;
    padding: 2px 6px;
    font-size: 12px;
    position: absolute;
    top: -10px;
    right: -10px;
}

/* Cart Styling */
.cart {
    position: fixed;
    right: -100%;
    top: 0;
    width: 350px;
    height: 100%;
    background: #fff;
    box-shadow: -2px 0 8px rgba(0, 0, 0, 0.1);
    z-index: 1001;
    transition: right 0.3s ease;
    padding: 20px;
    overflow-y: auto;
}

.cart.active {
    right: 0;
}

.cart-title {
    font-size: 22px;
    margin-bottom: 20px;
}

.cart-box {
    display: flex;
    margin-bottom: 20px;
}

.cart-img {
    width: 70px;
    height: 90px;
    object-fit: cover;
    border-radius: 8px;
    margin-right: 10px;
}

.cart-detail {
    flex: 1;
}

.cart-price {
    display: block;
    margin-top: 5px;
    color: #2c3e50;
}

.cart-quantity {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-top: 10px;
}

.cart-quantity button {
    padding: 4px 8px;
    background: #2c3e50;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.cart-remove {
    font-size: 18px;
    color: crimson;
    cursor: pointer;
    margin-left: 10px;
}

.total {
    display: flex;
    justify-content: space-between;
    font-size: 18px;
    margin-top: 20px;
}

.btn-buy {
    margin-top: 20px;
    width: 100%;
    padding: 12px;
    background-color: #27ae60;
    color: white;
    border: none;
    font-size: 16px;
    cursor: pointer;
    border-radius: 8px;
    transition: background-color 0.3s ease;
}

.btn-buy:hover {
    background-color: #219150;
}

#cart-close {
    position: absolute;
    top: 20px;
    right: 20px;
    font-size: 24px;
    cursor: pointer;
}

/* Product Section */
.section-title {
    font-size: 28px;
    text-align: center;
    margin: 40px 0;
}

.product-content {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px;
    padding: 0 30px;
}

.product-box {
    background-color: #fff;
    padding: 15px;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
}

.product-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.12);
}

.img-box {
    width: 100%;
    height: 240px;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
}

.img-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 10px;
}

.product-title {
    font-size: 18px;
    font-weight: bold;
    margin: 10px 0;
    color: #2c3e50;
}

.price-and-cart {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.price {
    font-size: 16px;
    font-weight: bold;
    color: #27ae60;
}

.add-cart {
    font-size: 20px;
    color: #2c3e50;
    cursor: pointer;
    transition: color 0.3s ease;
}

.add-cart:hover {
    color: #27ae60;
}
.navmenu {
    background-color: #333;
    padding: 10px 0;
}

.navmenu ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: flex-start; /* aligns items to the left */
}

.navmenu ul li {
    margin: 0 15px;
}

.navmenu ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 18px;
    padding: 8px 12px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.navmenu ul li a:hover {
    background-color: #555;
}

</style>
</head>

<body>

    <header>
        <a href="#" class="logo">Four Roses Online Book store</a>
        <div id="cart-icon">
            <i class="ri-shopping-bag-line"></i>
            <span class="cart-item-count"></span>
        </div>
    </header>
    

    <div class="cart">
        <h2 class="cart-title">Your Cart</h2>
        <div class="cart-content">
            <!-- <div class="cart-box">
                <img src="image/box.jpg" class="cart-img">
                <div class="cart-detail">
                    <h2 class="cart-product-title">The Mystery Box</h2>
                    <span class="cart-price">₹270</span>
                    <div class="cart-quantity">
                        <button id="decrement">-</button>
                        <span class="number">1</span>
                        <button id="increment">+</button>
                    </div>
                </div>
                <i class="ri-delete-bin-line cart-remove"></i>
            </div> -->
        </div>
        <div class="total">
            <div class="total-title">Total</div>
            <div class="total-price">₹0</div>
        </div>
        <button class="btn-buy">Buy Now</button>
        <i class="ri-close-line" id="cart-close"></i>
        
    </div>

    <section class="shop">
        <h1 class="section-title">Shop Products</h1>
        <div class="product-content">
            <div class="product-box">
                <div class="img-box">
                    <img src="image/scifi1.jpg">
                </div>
                <h2 class="product-title">Dune</h2>
                <div class="price-and-cart">
                    <span class="price">₹550</span>
                    <i class="ri-shopping-bag-line add-cart"></i>
                </div>
            </div>
            
            <div class="product-box">
                <div class="img-box">
                    <img src="image/scifi2.jpg">
                </div>
                <h2 class="product-title">Neuromancer</h2>
                <div class="price-and-cart">
                    <span class="price">₹420</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/scifi3.jpg">
                </div>
                <h2 class="product-title">Foundation</h2>
                <div class="price-and-cart">
                    <span class="price">₹480</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/scifi4.jpg">
                </div>
                <h2 class="product-title">The Martin </h2>
                <div class="price-and-cart">
                    <span class="price">₹390</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/scifi5.jpg">
                </div>
                <h2 class="product-title">Snow Crash</h2>
                <div class="price-and-cart">
                    <span class="price">₹430</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/scifi6.jpg">
                </div>
                <h2 class="product-title">Brave New World/h2>
                <div class="price-and-cart">
                    <span class="price">360</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/scifi7.jpg">
                </div>
                <h2 class="product-title">The Left Hand of Darkness</h2>
                <div class="price-and-cart">
                    <span class="price">₹400</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/scifi8.jpg">
                </div>
                <h2 class="product-title">Hyperion</h2>
                <div class="price-and-cart">
                  <span class="price">₹490</span>
                  <i class="ri-shopping-bag-line add-cart"></i>
    
                </div>
                
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/scifi9.jpg">
                </div>
                <h2 class="product-title">2001: A Space of Odyssey</h2>
                <div class="price-and-cart">
                    <span class="price">410</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/scifi10.jpg">
                </div>
                <h2 class="product-title">The War of the Worlds</h2>
                <div class="price-and-cart">
                    <span class="price">350</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/novel1.jpg">
                </div>
                <h2 class="product-title">Pride and Prejudice</h2>
                <div class="price-and-cart">
                    <span class="price">350</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/novel2.jpg">
                </div>
                <h2 class="product-title">To Kill a Mockingbird</h2>
                <div class="price-and-cart">
                    <span class="price">450</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>

            <div class="product-box">
                <div class="img-box">
                    <img src="image/novel3.jpg">
                </div>
                <h2 class="product-title">The Great Gatsby</h2>
                <div class="price-and-cart">
                    <span class="price">400</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/novel4.jpg">
                </div>
                <h2 class="product-title">1984</h2>
                <div class="price-and-cart">
                    <span class="price">300</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/novel5.jpg">
                </div>
                <h2 class="product-title">Wuthering Heights</h2>
                <div class="price-and-cart">
                    <span class="price">380</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/novel6.jpg">
                </div>
                <h2 class="product-title">Jane Eyre</h2>
                <div class="price-and-cart">
                    <span class="price">420</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/novel7.jpg">
                </div>
                <h2 class="product-title">Moby-Dick</h2>
                <div class="price-and-cart">
                    <span class="price">390</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/novel8.jpg">
                </div>
                <h2 class="product-title">Crime and Punishment</h2>
                <div class="price-and-cart">
                    <span class="price">450</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/novel9.jpg">
                </div>
                <h2 class="product-title">War and Peace</h2>
                <div class="price-and-cart">
                    <span class="price">500</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/novel10.jpg">
                </div>
                <h2 class="product-title">Les Miserables</h2>
                <div class="price-and-cart">
                    <span class="price">480</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/story1.jpg">
                </div>
                <h2 class="product-title">The Alchemist</h2>
                <div class="price-and-cart">
                    <span class="price">480</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/story2.jpg">
                </div>
                <h2 class="product-title">Harry Potter</h2>
                <div class="price-and-cart">
                    <span class="price">300</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/story3.jpg">
                </div>
                <h2 class="product-title">Hobbit</h2>
                <div class="price-and-cart">
                    <span class="price">270</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/story4.jpg">
                </div>
                <h2 class="product-title">Life of Pi</h2>
                <div class="price-and-cart">
                    <span class="price">320</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/story5.jpg">
                </div>
                <h2 class="product-title">The Little Prince</h2>
                <div class="price-and-cart">
                    <span class="price">260</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/story6.jpg">
                </div>
                <h2 class="product-title">Roald Dahl Charlie</h2>
                <div class="price-and-cart">
                    <span class="price">260</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/story7.jpg">
                </div>
                <h2 class="product-title">Roald Dahl Matilda</h2>
                <div class="price-and-cart">
                    <span class="price">240</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/story8.jpg">
                </div>
                <h2 class="product-title">Percye Jackson</h2>
                <div class="price-and-cart">
                    <span class="price">310</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/story9.jpg">
                </div>
                <h2 class="product-title">The Jungle Book</h2>
                <div class="price-and-cart">
                    <span class="price">290</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/story10.jpg">
                </div>
                <h2 class="product-title">The Book theif</h2>
                <div class="price-and-cart">
                    <span class="price">300</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/cs1.jpg">
                </div>
                <h2 class="product-title">The Introduction To Algorithms</h2>
                <div class="price-and-cart">
                    <span class="price">850</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/cs2.jpg">
                </div>
                <h2 class="product-title">Computer Networking</h2>
                <div class="price-and-cart">
                    <span class="price">700</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/cs3.jpg">
                </div>
                <h2 class="product-title">Artifical Intelligence</h2>
                <div class="price-and-cart">
                    <span class="price">700</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/cs4.jpg">
                </div>
                <h2 class="product-title">Operating System Concepts</h2>
                <div class="price-and-cart">
                    <span class="price">780</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/cs5.jpg">
                </div>
                <h2 class="product-title">Computer Organization And Design</h2>
                <div class="price-and-cart">
                    <span class="price">700</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/cs6.jpg">
                </div>
                <h2 class="product-title">Clean Code</h2>
                <div class="price-and-cart">
                    <span class="price">600</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/cs7.jpg">
                </div>
                <h2 class="product-title">Design Patterns</h2>
                <div class="price-and-cart">
                    <span class="price">680</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/cs8.jpg">
                </div>
                <h2 class="product-title">Computer Security Principles</h2>
                <div class="price-and-cart">
                    <span class="price">750</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/cs9.jpg">
                </div>
                <h2 class="product-title">The Pragmatic Programmer</h2>
                <div class="price-and-cart">
                    <span class="price">620</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>
            <div class="product-box">
                <div class="img-box">
                    <img src="image/cs2.jpg">
                </div>
                <h2 class="product-title"><SICP/h2>
                <div class="price-and-cart">
                    <span class="price">780</span>
                    <i class="ri-shopping-bag-line add-cart"></i>

                </div>
            </div>



        </div>
    </section>


    <script src="product.js"></script>
</body>
</html>