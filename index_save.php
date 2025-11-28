<?php
require_once 'db.php';

// create the mysqli connection object using your helper
$connection = db_connect();

/*
  RANDOM RECIPE for the DISCOVER button
*/
$random_id = null;

$random_stmt = $connection->prepare("
    SELECT id 
    FROM `idm232_recipes___sheet`
    ORDER BY RAND()
    LIMIT 1
");

if (!$random_stmt) {
    die("Prepare failed: " . $connection->error);
}

$random_stmt->execute();
$random_result = $random_stmt->get_result();
if ($row = $random_result->fetch_assoc()) {
    $random_id = $row['id'];
}
$random_stmt->close();

/*
  ALL RECIPES FOR THE CARDS
*/
$stmt = $connection->prepare("
    SELECT 
        id,
        heading,
        subheading,
        description,
        `img-folder`,
        `hero-sm`
    FROM `idm232_recipes___sheet`
    ORDER BY heading ASC
");

if (!$stmt) {
    die("Prepare failed: " . $connection->error);
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
<header>
  <a href="index.php" class="logo">
    <h1>EAT MY FOOD</h1>
    <img src="images/sad-face-icon.png" alt="Sad face icon" class="sad-icon">
  </a>

  <div class="header-right">
    <a href="info.php">
      <img src="images/question-thing.png" alt="About this site" class="question-icon">
    </a>

    <?php if ($random_id !== null): ?>
      <button class="discover" onclick="window.location.href='recipe.php?id=<?php echo $random_id; ?>'">
        🔍 DISCOVER A RECIPE
      </button>
    <?php else: ?>
      <button class="discover" disabled>🔍 DISCOVER A RECIPE</button>
    <?php endif; ?>
  </div>
</header>

<main>
  <!-- HERO -->
  <section class="hero">
    <!-- use any large hero image you like here -->
    <img src="images/chicken-rice.jpg" alt="Chicken and rice in a pan">
  </section>

  <!-- INTRO -->
  <section class="intro">
    <h2>PLEASE...</h2>
    <p>Eat my food and turn whatever is rotting in your fridge into something vaguely decent.</p>
  </section>

  <!-- RECIPE CARDS -->
  <section class="recipes">
    <div class="filter">Browse all recipes</div>

    <div class="cards">
      <?php while ($row = $result->fetch_assoc()) : 
          $id          = $row['id'];
          $heading     = htmlspecialchars($row['heading']);
          $subheading  = htmlspecialchars($row['subheading']);
          $description = htmlspecialchars($row['description']);
          $img_folder  = trim($row['img-folder']);
          $hero_sm     = trim($row['hero-sm']);

          // Build image path from img-folder + hero-sm
          if ($img_folder !== '' && $hero_sm !== '') {
              $img_path = "images/{$img_folder}/{$hero_sm}";
          } else {
              $img_path = "images/placeholder-card.jpg"; // optional fallback image
          }
      ?>
        <a href="recipe.php?id=<?php echo $id; ?>">
          <article class="card">
            <img src="<?php echo $img_path; ?>" alt="<?php echo $heading; ?>">
            <h4><?php echo $heading; ?></h4>
            <?php if ($subheading !== ''): ?>
              <p><?php echo $subheading; ?></p>
            <?php elseif ($description !== ''): ?>
              <p><?php echo $description; ?></p>
            <?php endif; ?>
          </article>
        </a>
      <?php endwhile; ?>
    </div>
  </section>
</main>

<footer>
  EAT MY FOOD • Drexel IDM 232 • <?php echo date('Y'); ?>
</footer>
</body>
</html>
<?php
$stmt->close();
$connection->close();
?>
