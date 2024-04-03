<?php
include ('../includes/config.php');

try {
    $fileID = $_GET['fileID'];
    $stmt = $dbh->prepare("SELECT * FROM `tbl_file` WHERE tbl_file_id = :fileID");
    $stmt->bindParam(':fileID', $fileID);
    $stmt->execute();
    $fileData = $stmt->fetch();

    if ($fileData) {
        $file_name = $fileData['file'];
        $file_path = '../file-uploads/' . $file_name;

        if (file_exists($file_path)) {
            header('Content-Type: application/octet-stream'); // Add this line
            header('Content-Disposition: attachment; filename="' . $file_name . '"');
            readfile($file_path);
        } else {
            echo 'File not found.';
        }
    } else {
        echo 'File not found.';
    }
} catch (PDOException $e) {
    echo 'Database Error: ' . $e->getMessage();
}

?>
