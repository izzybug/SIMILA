<?php
include('../../includes/config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["file"])) {
    $fileID = $_GET["file"];

    try {
        // Get the file name from the database
        $sqlGetFileName = "SELECT file FROM tbl_file WHERE tbl_file_id = :fileID";
        $stmtGetFileName = $dbh->prepare($sqlGetFileName);
        $stmtGetFileName->bindParam(':fileID', $fileID);
        $stmtGetFileName->execute();
        $fileName = $stmtGetFileName->fetchColumn();

        if (!$fileName) {
            throw new Exception("File not found in the database.");
        }

        $uploadDirectory = "../../file-uploads/";
        $filePath = $uploadDirectory . $fileName;

        if (file_exists($filePath)) {
            if (unlink($filePath)) {
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
                        window.location.href = 'http://localhost/coding/project%20amel/admin/materi.php';
                    </script>
                    ";
                    exit;
                } else {
                    throw new Exception("Error deleting file record from the database.");
                }
            } else {
                throw new Exception("Error deleting the file.");
            }
        } else {
            throw new Exception("File not found in the directory.");
        }
    } catch (Exception $e) {
        echo "
        <script>
            alert('" . $e->getMessage() . "');
            window.location.href = 'http://localhost/coding/project%20amel/admin/materi.php';
        </script>
        ";
    }
} else {
    echo "
    <script>
        alert('Invalid request.');
        window.location.href = 'http://localhost/coding/project%20amel/admin/materi.php';
    </script>
    ";
}
?>
