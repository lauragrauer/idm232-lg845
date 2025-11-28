<?php
require_once 'db.php';

$connection = db_connect();

$view_mode = 'list';
$recipe_id = null;
$search    = '';
$filter    = 'all';

if (isset($_GET['search'])) {
  $search = $_GET['search'];
}

if (isset($_GET['filter'])) {
  $filter = $_GET['filter'];
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
  $view_mode = 'single';
  $recipe_id = (int) $_GET['id'];
}

if ($view_mode == 'single') {

  $stmt = $connection->prepare("
    SELECT 
      heading,
      subheading,
      description,
      ingredients,
      steps,
      `img-folder` AS img_folder,
      `hero-lg`    AS hero_lg
    FROM `idm232_recipes___sheet`
    WHERE id = ?
  ");

  if (!$stmt) die("Database error");

  $stmt->bind_param("i", $recipe_id);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows == 0) {
    $stmt->close();
    header("Location: error.php");
    exit;
  }

  $stmt->bind_result(
    $heading,
    $subheading,
    $description,
    $ingredients,
    $steps,
    $img_folder,
    $hero_lg
  );

  $stmt->fetch();

  // image paths
  $base_path = $img_folder ? "images/" . $img_folder . "/" : "images/";
  $hero_path = $hero_lg ? $base_path . $hero_lg : "images/placeholder-hero.jpg";

  // splits
  $ingredient_items = explode("*", $ingredients);
  $steps_array      = explode("*", $steps);

} else {

  // LIST VIEW
  $sql = "
    SELECT 
      id,
      heading,
      subheading,
      description,
      `img-folder` AS img_folder,
      `hero-sm`    AS hero_sm,
      category
    FROM `idm232_recipes___sheet`
    WHERE 1=1
  ";

  if ($search != '') {
    $search_q = $connection->real_escape_string($search);
    $sql .= " AND heading LIKE '%" . $search_q . "%'";
  }

  if ($filter != '' && $filter != 'all') {
    $filter_q = $connection->real_escape_string($filter);
    $sql .= " AND category = '" . $filter_q . "'";
  }

  $sql .= " ORDER BY heading ASC";

  $result = $connection->query($sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php 
      if ($view_mode == 'single') {
        echo htmlspecialchars($heading) . " | Eat My Food";
      } else {
        echo "All Recipes | Eat My Food";
      }
    ?>
  </title>
  <link rel="stylesheet" href="style.css">
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

<main class="recipe-page">

<?php if ($view_mode == 'single') { ?>

  <!-- SINGLE RECIPE VIEW -->
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

  <section class="recipe-main">
    <div class="ingredients">
      <h3>Ingredients</h3>
      <ul>
        <?php foreach ($ingredient_items as $item) { 
          $clean = trim($item);
          if ($clean == "") continue;
        ?>
          <li><?php echo htmlspecialchars($clean); ?></li>
        <?php } ?>
      </ul>

      <img src="<?php echo $base_path . "ingredients.png"; ?>" alt="Ingredients for <?php echo htmlspecialchars($heading); ?>">
    </div>

    <div class="steps">
      <?php 
        $step_num = 1;
        foreach ($steps_array as $step_text) { 
          $clean_step = trim($step_text);
          if ($clean_step == "") continue;

          $step_lg = $base_path . "step" . $step_num . "-lg.jpg";
          $step_sm = $base_path . "step" . $step_num . "-sm.jpg";
      ?>
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

<?php } else { ?>

  <!-- LIST VIEW -->
  <section class="recipes">
    <h2>All Recipes</h2>
  <p style="text-align:center;">
  Browse everything you can make with whatever’s dying in your fridge.
  </p>

    <div class="recipes-controls">

      <!-- FILTER -->
      <form action="recipe.php" method="get" class="filter-form">
        <select name="filter" class="filter-select">
          <option value="all"<?php if ($filter=='all') echo ' selected'; ?>>All</option>
          <option value="meat"<?php if ($filter=='meat') echo ' selected'; ?>>Meat</option>
          <option value="vegetarian"<?php if ($filter=='vegetarian') echo ' selected'; ?>>Vegetarian</option>
          <option value="dairy"<?php if ($filter=='dairy') echo ' selected'; ?>>Dairy</option>
          <option value="pasta"<?php if ($filter=='pasta') echo ' selected'; ?>>Pasta</option>
          <option value="seafood"<?php if ($filter=='seafood') echo ' selected'; ?>>Seafood</option>
        </select>
        <button class="apply-filter-btn" type="submit">Apply</button>
      </form>

      <!-- SEARCH -->
      <form action="recipe.php" method="get" class="recipes-search-form">
        <input 
          type="text" 
          name="search" 
          value="<?php echo htmlspecialchars($search); ?>" 
          placeholder="Search recipes..."
          class="recipes-search-input"
        >
        <button class="recipes-search-button" type="submit">Search</button>
      </form>
    </div>

    <div class="cards">
      <?php if ($result && $result->num_rows > 0) { ?>
        <?php while ($row = $result->fetch_assoc()) { 
          $id          = $row['id'];
          $heading     = htmlspecialchars($row['heading']);
          $subheading  = htmlspecialchars($row['subheading']);
          $description = htmlspecialchars($row['description']);
          $folder      = $row['img_folder'];
          $hero_sm     = $row['hero_sm'];

          $img_path = ($folder && $hero_sm) 
            ? "images/" . $folder . "/" . $hero_sm
            : "images/placeholder-card.jpg";
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
      <?php } else { ?>
        <p>No recipes found.</p>
      <?php } ?>
    </div>

  </section>

<?php } ?>

</main>

<footer>
  EAT MY FOOD • Drexel IDM 232 • <?php echo date("Y"); ?>
</footer>

</body>
</html>

<?php
if (isset($stmt)) $stmt->close();
$connection->close();
?>