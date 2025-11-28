<?php
require_once 'db.php';

$connection = db_connect();

// SEARCH
$search = "";
if (isset($_GET['search'])) {
  $search = $_GET['search'];
}

if ($search != "") {
  $like = "%" . $search . "%";

  $stmt = $connection->prepare("
    SELECT 
      id,
      heading,
      subheading,
      description,
      `img-folder` AS img_folder,
      `hero-sm`    AS hero_sm
    FROM `idm232_recipes___sheet`
    WHERE heading LIKE ? 
      OR subheading LIKE ?
      OR description LIKE ?
    ORDER BY heading ASC
  ");

  if (!$stmt) {
    die("Database error");
  }

  $stmt->bind_param("sss", $like, $like, $like);

} else {
  // DEFAULT: featured 6 recipes
  $stmt = $connection->prepare("
    SELECT 
      id,
      heading,
      subheading,
      description,
      `img-folder` AS img_folder,
      `hero-sm`    AS hero_sm
    FROM `idm232_recipes___sheet`
    ORDER BY heading ASC
    LIMIT 6
  ");

  if (!$stmt) {
    die("Database error");
  }
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

  <nav class="main-nav">
    <a href="index.php" class="nav-link">Home</a>
    <a href="recipe.php" class="nav-link">Recipes</a>
  </nav>

  <div class="header-right">
    <a href="info.php">
      <img src="images/question-thing.png" alt="info" class="question-icon">
    </a>

    <form action="index.php" method="get">
      <input 
        type="text"
        name="search"
        placeholder="Search recipes…"
        class="pretty-search"
      >
    </form>
  </div>
</header>

<main>
  <section class="hero">
    <img src="images/chicken-rice.jpg" alt="Chicken and rice in a pan">
  </section>

  <section class="intro">
    <h2>PLEASE...</h2>
    <p>Eat my food and turn whatever is rotting in your fridge into something vaguely decent.</p>
  </section>

  <section class="recipes">
    <?php if ($search != "") { ?>
      <div class="filter">Search results for: "<?php echo htmlspecialchars($search); ?>"</div>
    <?php } else { ?>
        <section class="intro">
    <h2>Featured Recipes</h2>
    </section>
    <?php } ?>

    <div class="cards">
      <?php 
      $has_results = false;
      while ($row = $result->fetch_assoc()) { 
        $has_results = true;

        $id          = $row['id'];
        $heading     = htmlspecialchars($row['heading']);
        $subheading  = htmlspecialchars($row['subheading']);
        $description = htmlspecialchars($row['description']);
        $img_folder  = $row['img_folder'];
        $hero_sm     = $row['hero_sm'];

        if ($img_folder != "" && $hero_sm != "") {
          $img_path = "images/" . $img_folder . "/" . $hero_sm;
        } else {
          $img_path = "images/placeholder-card.jpg";
        }
      ?>
        <a href="recipe.php?id=<?php echo $id; ?>">
          <article class="card">
            <img src="<?php echo $img_path; ?>" alt="<?php echo $heading; ?>">
            <h4><?php echo $heading; ?></h4>

            <?php if ($subheading != "") { ?>
              <p><?php echo $subheading; ?></p>
            <?php } else if ($description != "") { ?>
              <p><?php echo $description; ?></p>
            <?php } ?>
          </article>
        </a>
      <?php } ?>

      <?php if (!$has_results) { ?>
        <p>No recipes found. Try a different word.</p>
      <?php } ?>
    </div>

    <?php if ($search == "") { ?>
      <div class="see-all">
        <a href="recipe.php" class="see-all-link">View All Recipes →</a>
      </div>
    <?php } ?>
  </section>
</main>

<footer>
  EAT MY FOOD • Drexel IDM 232 • <?php echo date("Y"); ?>
</footer>
</body>
</html>
<?php
$stmt->close();
$connection->close();
?>