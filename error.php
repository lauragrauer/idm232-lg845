<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Page Not Found | Eat My Food</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>

<?php include 'header.php'; ?>

<!-- ERROR PAGE CONTENT -->
<main class="error-page">
  <div class="error-box">
    <!-- Error Icon -->
    <img src="images/sad-face-icon.png" alt="Sad face icon" class="error-icon">
    
    <!-- 404 Title -->
    <h2>404</h2>
    
    <!-- Error Message -->
    <p>Oops... the page you're looking for doesn't exist.</p>
    <p>It might've been eaten 🍽️</p>
    
    <br>
    
    <!-- Back to Home Button -->
    <button class="back-home" onclick="window.location.href='index.php'">
      Go Back Home
    </button>
  </div>
</main>

<?php include 'footer.php'; ?>

</body>
</html>