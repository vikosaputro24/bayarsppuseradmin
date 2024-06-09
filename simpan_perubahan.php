<?php
// update_status.php

$servername = "localhost";
$username = "root";
$password = "";
$database = "db_spp";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $status = $_POST['status'];

    // Update status pembayaran dalam database
    $update_query = "UPDATE tb_bayar SET status_pembayaran = '$status' WHERE id = $id";

    if (mysqli_query($conn, $update_query)) {
        echo "Status pembayaran berhasil diperbarui";
    } else {
        echo "Error: " . $update_query . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
