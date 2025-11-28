<?php
$db_host = 'localhost';
$db_user = 'lg845';
$db_password = '4v244nagodc1uFvo'; 
$db_db = 'lg845_db'; 

// CREATE CONNECTION
$mysqli = @new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db
);

// CHECK CONNECTION
if ($mysqli->connect_error) {
    die('Database connection failed: ' . $mysqli->connect_error);
}
?> 