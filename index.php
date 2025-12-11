<?php
// DATABASE CONNECTION
require_once 'db.php';
$connection = db_connect();

// REUSABLE COMPONENTS
require_once 'recipe_card.php';

// GET SEARCH PARAMETER
$search = isset($_GET['search']) ? $_GET['search'] : "";

if ($search != "") {
  $like = "%" . $search . "%";
  $stmt = $connection->prepare("
    SELECT id, heading, subheading, description, 
           `img-folder` AS img_folder, `hero-sm` AS hero_sm
    FROM `idm232_recipes___sheet`
    WHERE heading LIKE ? OR subheading LIKE ? OR description LIKE ?
    ORDER BY heading ASC
  ");
  if (!$stmt) die("Database error");
  $stmt->bind_param("sss", $like, $like, $like);
} else {
  $stmt = $connection->prepare("
    SELECT id, heading, subheading, description,
           `img-folder` AS img_folder, `hero-sm` AS hero_sm
    FROM `idm232_recipes___sheet`
    ORDER BY heading ASC LIMIT 6
  ");
  if (!$stmt) die("Database error");
}

$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Eat My Food | Home</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>

<?php include 'header.php'; ?>

<!-- MAIN CONTENT -->
<main>
  <!-- Hero Image -->
  <section class="hero">
    <img src="images/chicken-rice.jpg" alt="Chicken and rice in a pan">
  </section>

  <!-- Intro Section -->
  <section class="intro">
    <h2>PLEASE...</h2>
    <p>Eat my food and turn whatever is rotting in your fridge into something vaguely decent.</p>
  </section>

  <!-- Recipes Section -->
  <section class="recipes">
    <!-- Search Results or Featured Title -->
    <?php if ($search != "") { ?>
      <div class="filter">Search results for: "<?php echo htmlspecialchars($search); ?>"</div>
    <?php } else { ?>
      <section class="intro">
        <h2>Featured Recipes</h2>
      </section>
    <?php } ?>

    <!-- Recipe Cards -->
    <div class="cards">
      <?php display_recipe_cards($result); ?>
    </div>

    <!-- View All Link (only when not searching) -->
    <?php if ($search == "") { ?>
      <div class="see-all">
        <a href="recipe.php" class="see-all-link">View All Recipes →</a>
      </div>
    <?php } ?>
  </section>
</main>

<?php include 'footer.php'; ?>

</body>
</html>
<?php
// CLOSE DATABASE CONNECTION
$stmt->close();
mysqli_close($connection);
?>