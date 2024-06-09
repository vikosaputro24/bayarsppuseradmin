<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "db_spp"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$id = $_POST['id'];
$newStatus = $_POST['status'];

$sql = "UPDATE tb_bayar SET status='$newStatus' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Status berhasil diubah.";
    header("Location: adminStatus.php"); 
    exit(); 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
