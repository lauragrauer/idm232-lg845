<?php
require_once 'db.php';
$connection = db_connect();

require_once 'recipe_card.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';

$sql = "
  SELECT id, heading, subheading, description, 
         `img-folder` AS img_folder, `hero-sm` AS hero_sm, category
  FROM `idm232_recipes___sheet` WHERE 1=1
";

if ($search != '') {
  $sql .= " AND heading LIKE '%" . $search . "%'";
}

if ($filter != '' && $filter != 'all') {
  $sql .= " AND category = '" . $filter . "'";
}

$sql .= " ORDER BY heading ASC";
$result = mysqli_query($connection, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Recipes | Eat My Food</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'header.php'; ?>

<!-- MAIN CONTENT -->
<main class="recipe-page">
  <section class="recipes">
    <h2>All Recipes</h2>
    <p style="text-align:center;">Browse everything you can make with whatever's dying in your fridge.</p>

    <!-- Filter and Search Controls -->
    <div class="recipes-controls">
      <!-- Category Filter -->
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

      <!-- Search Form -->
      <form action="index.php" method="get" class="recipes-search-form">
        <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="Search recipes..." class="recipes-search-input">
        <button class="recipes-search-button" type="submit">Search</button>
      </form>
    </div>

    <!-- Recipe Cards Grid -->
    <div class="cards">
      <?php display_recipe_cards($result); ?>
    </div>
  </section>
</main>

<?php include 'footer.php'; ?>

</body>
</html>

<?php
mysqli_close($connection);
?>