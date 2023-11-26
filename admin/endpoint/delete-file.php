<?php
include('../../includes/config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["file"])) {
    $fileID = $_GET["file"];

    // Get the file name from the database
    $sqlGetFileName = "SELECT file FROM tbl_file WHERE tbl_file_id = :fileID";
    $stmtGetFileName = $dbh->prepare($sqlGetFileName);
    $stmtGetFileName->bindParam(':fileID', $fileID);
    $stmtGetFileName->execute();
    $fileName = $stmtGetFileName->fetchColumn();


    $uploadDirectory = "../../file-uploads/";
    $filePath = $uploadDirectory . $fileName;
    
    if (file_exists($filePath) && unlink($filePath)) {
        // File in directory deleted successfully

        // Delete the file record from the database
        $sqlDeleteFile = "DELETE FROM tbl_file WHERE tbl_file_id = :fileID";
        $stmtDeleteFile = $dbh->prepare($sqlDeleteFile);
        $stmtDeleteFile->bindParam(':fileID', $fileID);
        
        if ($stmtDeleteFile->execute()) {
            // File record deleted successfully
            echo "
            <script>
                alert('File deleted successfully!');
                window.location.href = '';
            </script>
            ";
            exit;
        } else {
            echo "
            <script>
                alert('Error deleting file record from the database.');
                window.location.href = 'materi.php';
            </script>
            ";
        }
    } else {
        echo "
        <script>
            // alert('Error deleting the file.');
            window.location.href = 'materi.php';
        </script>
        ";
    }
} else {
    echo "
    <script>
        alert('Invalid request.');
        window.location.href = 'materi.php';
    </script>
    ";
}
?>
