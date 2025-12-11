<?php
// DATABASE CONNECTION
require_once 'db.php';
$connection = db_connect();

// GET RECIPE ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  header("Location: error.php");
  exit;
}

$recipe_id = (int) $_GET['id'];

// FETCH RECIPE
$stmt = $connection->prepare("
  SELECT heading, subheading, description, ingredients, steps, 
         `img-folder` AS img_folder, `hero-lg` AS hero_lg
  FROM `idm232_recipes___sheet` WHERE id = ?
");
if (!$stmt) die("Database error");

$stmt->bind_param("i", $recipe_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if recipe exists
if (mysqli_num_rows($result) == 0) {
  $stmt->close();
  header("Location: error.php");
  exit;
}

// Get recipe data
$row = mysqli_fetch_assoc($result);
$heading = $row['heading'];
$subheading = $row['subheading'];
$description = $row['description'];
$ingredients = $row['ingredients'];
$steps = $row['steps'];
$img_folder = $row['img_folder'];
$hero_lg = $row['hero_lg'];

// Build image paths
$base_path = $img_folder ? "images/" . $img_folder . "/" : "images/";
$hero_path = $hero_lg ? $base_path . $hero_lg : "images/placeholder-hero.jpg";

// Split ingredients and steps
$ingredient_items = explode("*", $ingredients);
$steps_array = explode("*", $steps);

$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($heading); ?> | Eat My Food</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'header.php'; ?>

<!-- MAIN CONTENT -->
<main class="recipe-page">
  <!-- Recipe Header -->
  <section class="recipe-header">
    <img src="<?php echo $hero_path; ?>" alt="<?php echo htmlspecialchars($heading); ?>">
    
    <div class="recipe-text">
      <h2><?php echo htmlspecialchars($heading); ?></h2>
      
      <?php if ($subheading != "") { ?>
        <p><strong><?php echo htmlspecialchars($subheading); ?></strong></p>
      <?php } ?>
      
      <p><?php echo htmlspecialchars($description); ?></p>
    </div>
  </section>

  <!-- Recipe Details -->
  <section class="recipe-main">
    <!-- Ingredients Section -->
    <div class="ingredients">
      <h3>Ingredients</h3>
      <ul>
        <?php foreach ($ingredient_items as $item) { 
          $clean = trim($item);
          if ($clean == "") continue; ?>
          <li><?php echo htmlspecialchars($clean); ?></li>
        <?php } ?>
      </ul>
      <img src="<?php echo $base_path . "ingredients.png"; ?>" alt="Ingredients for <?php echo htmlspecialchars($heading); ?>">
    </div>

    <!-- Steps Section -->
    <div class="steps">
      <?php 
        $step_num = 1;
        foreach ($steps_array as $step_text) { 
          $clean_step = trim($step_text);
          if ($clean_step == "") continue;
          
          $step_lg = $base_path . "step" . $step_num . "-lg.jpg";
          $step_sm = $base_path . "step" . $step_num . "-sm.jpg"; ?>
        
        <!-- Individual Step -->
        <div class="recipe-step">
          <div class="step-copy">
            <h3>Step <?php echo $step_num; ?></h3>
            <p><?php echo htmlspecialchars($clean_step); ?></p>
          </div>
          
          <div class="step-image">
            <picture>
              <source media="(min-width:980px)" srcset="<?php echo $step_lg; ?>">
              <img src="<?php echo $step_sm; ?>" alt="Step <?php echo $step_num; ?>">
            </picture>
          </div>
        </div>
      <?php 
        $step_num++; 
        } 
      ?>
    </div>
  </section>
</main>

<?php include 'footer.php'; ?>

</body>
</html>

<?php
mysqli_close($connection);
?>