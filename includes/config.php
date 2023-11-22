<?php

define('DB_HOST', 'db-simila-kti-do-user-14642497-0.c.db.ondigitalocean.com');
define('DB_USER', 'doadmin');
define('DB_PASS', 'AVNS_ToMvDp0ynbRdnQaw1Tq');
define('DB_NAME', 'simila');
define('DB_PORT', '25060');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Establish PDO database connection.
try {
    $dbh = new PDO("mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    // Set the PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}

// Now you can use $conn for mysqli functions and $dbh for PDO functions.

?>