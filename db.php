<?php

function is_drexel_host() {
    if (!isset($_SERVER['HTTP_HOST'])) {
        return false;
    }
    return strpos($_SERVER['HTTP_HOST'], 'digmstudents') !== false
        || strpos($_SERVER['HTTP_HOST'], 'drexel.edu') !== false;
}

if (is_drexel_host()) {
    define("DB_SERVER",   "localhost");
    define("DB_USERNAME", "lg845");
    define("DB_NAME",     "lg845_db");

} else {
    define("DB_SERVER",   "localhost");
    define("DB_USERNAME", "root");
    define("DB_PASSWORD", "root");
    define("DB_NAME",     "lg845_db");
}

function db_connect() {
    $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    return $connection;
}
?>
