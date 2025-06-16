<!DOCTYPE html>
<html>
<head>
  <title>Feedback Us</title>
  <style>
    body {
      background-color: #FFC5C5;
      font-family: Arial, sans-serif;
    }
    nav {
      background-color: #333;
      padding: 10px 0;
      text-align: center;
    }
    nav a {
      color: white;
      text-decoration: none;
      margin: 0 15px;
      font-weight: bold;
    }
    nav a:hover {
      text-decoration: underline;
    }
    form, #thank-you-message {
      background-color: #fff;
      padding: 20px;
      border: 1px solid #ddd;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    label {
      display: block;
      margin-bottom: 10px;
    }
    input[type="text"], input[type="email"] {
      width: 100%;
      height: 40px;
      margin-bottom: 20px;
      padding: 10px;
      border: 1px solid #ccc;
    }
    textarea {
      width: 100%;
      height: 100px;
      margin-bottom: 20px;
      padding: 10px;
      border: 1px solid #ccc;
    }
    input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>
<body>

  <!-- Navigation Menu -->
  <nav>
    <a href="index.php">Home</a>
    
    
    
  </nav>

  <div style="max-width: 500px; margin: 40px auto;">
    <h1 style="color: #fff;">Feedback Us</h1>

    <?php if (!empty($formSubmitted)): ?>
      <div id="thank-you-message">
        <h2>Thank you for your message!</h2>
        <p>We'll get back to you soon.</p>
        <a href="index.php" style="display: inline-block; margin-top: 15px; padding: 10px 30px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">Go to Home</a>
      </div>       
    <?php else: ?>
      <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>

        <input type="submit" value="Send">
      </form>
    <?php endif; ?>
  </div>
</body>
</html>
