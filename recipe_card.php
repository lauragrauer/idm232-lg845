<?php
// REUSABLE FUNCTION: DISPLAY RECIPE CARDS FROM DATABASE RESULT
function display_recipe_cards($result) {
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      // Get card data
      $id = $row['id'];
      $heading = htmlspecialchars($row['heading']);
      $subheading = htmlspecialchars($row['subheading']);
      $description = htmlspecialchars($row['description']);
      $folder = $row['img_folder'];
      $hero_sm = $row['hero_sm'];
      
      // Build image path
      $img_path = ($folder && $hero_sm) 
        ? "images/" . $folder . "/" . $hero_sm 
        : "images/placeholder-card.jpg";
      ?>
      <!-- Individual Recipe Card -->
      <a href="single_recipe.php?id=<?php echo $id; ?>">
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
      <?php
    }
  } else {
    echo '<p>No recipes found.</p>';
  }
}
?>