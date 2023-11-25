<?php
include ('../../includes/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["fileTitle"]) && isset($_FILES["file"]["name"]) && isset($_POST["fileUploader"])) {
        $fileTitle = $_POST["fileTitle"];
        $fileUploader = isset($_POST["fileUploader"]) ? $_POST["fileUploader"] : "";

        $uploadDirectory = "../file-uploads/";
        $uploadedFileName = $_FILES["file"]["name"];
        $targetFilePath = $uploadDirectory . $uploadedFileName;

        // Check if the file already exists
        if (file_exists($targetFilePath)) {
            echo "
            <script>
                alert('A file with the same name already exists. Please choose a different name for your file.');
                window.location.href = 'http://localhost/coding/project%20amel/admin/materi.php';
            </script>";
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                $dateUploaded = date("Y-m-d H:i:s"); 

                $sql = "INSERT INTO tbl_file (file_title, file, file_uploader, date_uploaded) VALUES (:fileTitle, :uploadedFileName, :fileUploader, :dateUploaded)";
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':fileTitle', $fileTitle);
                $stmt->bindParam(':uploadedFileName', $uploadedFileName);
                $stmt->bindParam(':fileUploader', $fileUploader);
                $stmt->bindParam(':dateUploaded', $dateUploaded);

                if ($stmt->execute()) {
                    echo "
                    <script>
                        alert('File uploaded and data inserted into the database successfully!');
                        window.location.href = 'http://localhost/coding/project%20amel/admin/materi.php';
                    </script>
                    ";
                } else {
                    echo "
                    <script>
                        alert('Error inserting data into the database.');
                        window.location.href = 'http://localhost/coding/project%20amel/admin/materi.php';
                    </script>";
                }
            } else {
                echo "
                <script>
                    alert('Error uploading the file.');
                    window.location.href = 'http://localhost/coding/project%20amel/admin/materi.php';
                </script>";
            }
        }
    } else {
        echo "
        <script>
            alert('Please fill out the required fields.');
            window.location.href = 'http://localhost/coding/project%20amel/admin/materi.php';
        </script>";
    }
}
?>
