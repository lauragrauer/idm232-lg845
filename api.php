<?php
require_once 'db.php';
$connection = db_connect();

header('Content-Type: application/json');


$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
  
  // GET ALL RECIPES: api.php?action=recipes
  case 'recipes':
    $stmt = $connection->prepare("
      SELECT id, heading, subheading, description, category,
             `img-folder` AS img_folder, `hero-sm` AS hero_sm
      FROM `idm232_recipes___sheet`
      ORDER BY heading ASC
    ");
    $stmt->execute();
    $result = $stmt->get_result();
    
    $recipes = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $recipes[] = $row;
    }
    
    echo json_encode([
      'success' => true,
      'count' => count($recipes),
      'recipes' => $recipes
    ]);
    
    $stmt->close();
    break;

  // GET SINGLE RECIPE: api.php?action=recipe&id=1
  case 'recipe':
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    
    if ($id <= 0) {
      echo json_encode([
        'success' => false,
        'error' => 'Invalid recipe ID'
      ]);
      break;
    }
    
    $stmt = $connection->prepare("
      SELECT id, heading, subheading, description, ingredients, steps, category,
             `img-folder` AS img_folder, `hero-lg` AS hero_lg, `hero-sm` AS hero_sm
      FROM `idm232_recipes___sheet`
      WHERE id = ?
    ");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if (mysqli_num_rows($result) == 0) {
      echo json_encode([
        'success' => false,
        'error' => 'Recipe not found'
      ]);
    } else {
      $recipe = mysqli_fetch_assoc($result);
      
      $recipe['ingredients'] = array_filter(array_map('trim', explode('*', $recipe['ingredients'])));
      $recipe['steps'] = array_filter(array_map('trim', explode('*', $recipe['steps'])));
      
      echo json_encode([
        'success' => true,
        'recipe' => $recipe
      ]);
    }
    
    $stmt->close();
    break;

  default:
    echo json_encode([
      'success' => true,
      'message' => 'Eat My Food API',
      'endpoints' => [
        'GET api.php?action=recipes' => 'Get all recipes',
        'GET api.php?action=recipe&id={id}' => 'Get single recipe by ID'
      ]
    ]);
    break;
}

mysqli_close($connection);
?>