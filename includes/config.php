<?php

$host = "db-simila-kti-do-user-14642497-0.c.db.ondigitalocean.com";
$port = "25060";
$database = "simila";
$username = "doadmin";
$password = "AVNS_ToMvDp0ynbRdnQaw1Tq";

// Membuat koneksi MySQLi
$conn = mysqli_connect($host, $username, $password, $database, $port);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi ke database MySQLi gagal: " . mysqli_connect_error());
}

// PDO (yang sudah ada)
try {
    $dbh = new PDO("mysql:host=$host;port=$port;dbname=$database;sslmode:require", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi ke database MySQL PDO gagal: " . $e->getMessage();
}

?>

<?php

// $host = "localhost";
// $database = "simila";
// $username = "root";
// $password = "";

// // Membuat koneksi MySQLi
// $conn = mysqli_connect($host, $username, $password, $database);

// // Memeriksa koneksi
// if (!$conn) {
//     die("Koneksi ke database MySQLi gagal: " . mysqli_connect_error());
// }

// try {
//     $dbh = new PDO("mysql:host=$host;dbname=$database", $username, $password);
//     $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     echo "Failed " . $e->getMessage();
// }

?>