<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Page Not Found | Eat My Food</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <header>
    <a href="index.php" class="logo">
      <h1>EAT MY FOOD</h1>
      <img src="images/sad-face-icon.png" alt="Sad face icon" class="sad-icon">
    </a>

    <div class="header-right">
      <a href="info.php">
        <img src="images/question-thing.png" alt="Question icon" class="question-icon">
      </a>
      <button class="discover" onclick="window.location.href='index.php'">🔍 DISCOVER A RECIPE</button>
    </div>
  </header>

  <main class="error-page">
    <div class="error-box">
      <img src="images/sad-face-icon.png" alt="Sad face icon" class="error-icon">
      <h2>404</h2>
      <p>Oops... the page you’re looking for doesn’t exist.</p>
      <p>It might’ve been eaten 🍽️</p>
      <br>
      <button class="back-home" onclick="window.location.href='index.php'">Go Back Home</button>
    </div>
  </main>

  <footer>
    <p>LAURA GRAUER</p>
  </footer>
</body>

<footer>
  <p>LAURA GRAUER</p>
</footer>

<?php
  echo "Hello, World!";
?>
</body>
</html>