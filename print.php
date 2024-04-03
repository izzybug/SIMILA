<?php include('includes/config.php') ?>

<?php
if (isset($_GET['id']) && ($_GET['id'] == 1 || $_GET['id'] == 2)) {
    $id = $_GET['id'];

    // Define the SQL query based on the id parameter
    $sqlQuery = ($id == 1) ? "SELECT * FROM daftar_istilah_medis" : "SELECT * FROM daftar_istilah_penanganan";

    $result = mysqli_query($conn, $sqlQuery);

    if ($result) {
        echo "
        <!DOCTYPE html>
        <html>
        <head>
            <title>Print</title>
            <!-- Custom fonts for this template-->
            <link href='src/fontawesome-free/css/all.min.css' rel='stylesheet' type='text/css'>
            <style>
                body {
                    font-family: Arial, sans-serif;
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-bottom: 20px;
                }
                th, td {
                    border: 1px solid #ddd;
                    padding: 8px;
                    text-align: left;
                }
                th {
                    background-color: #f2f2f2;
                }
                h2 {
                    text-align: center;
                }
            </style>
        </head>
        <body>
            <center>
                <h2>DAFTAR ISTILAH MEDIS</h2>
            </center>
            <br>
            <table>
                <tr>
                    <th width='1%'>No</th>
                    <th>Istilah Medis</th>
                    <th>Pembentukan Istilan Medis</th>
                    <th>Arti</th>
                    <th>Kode ICD</th>
                </tr>";

        $no = 1;
        while ($data = mysqli_fetch_array($result)) {
            echo "
            <tr>
                <td>{$no}</td>
                <td>{$data['istilah_medis']}</td>
                <td>{$data['pembentukan_istilah_medis']}</td>
                <td>{$data['arti']}</td>
                <td>{$data['kode_icd']}</td>
            </tr>";
            $no++;
        }

        echo "
            </table>
            <script>
                window.print();
            </script>
        </body>
        </html>";
    } else {
        echo "Error in SQL query: " . mysqli_error($conn);
    }
} else {
    echo "
    <!DOCTYPE html>
    <html>
    <head>
        <title>Error</title>
    </head>
    <body>
        <script>
            alert('Invalid request.');
            window.location.href = 'http://localhost/coding/project%20amel/termin.php';
        </script>
    </body>
    </html>";
}
?>
