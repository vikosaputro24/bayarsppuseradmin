<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_spp";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$query = "SELECT id, status_pembayaran FROM tb_bayar";
$result = mysqli_query($conn, $query);

$statuses = array();

if ($result) {
  
    while ($row = mysqli_fetch_assoc($result)) {
        $statuses[$row['id']] = $row['status_pembayaran'];
    }
} else {

    echo json_encode(array("success" => false, "message" => "Gagal mengambil status dari database."));
    exit();
}


echo json_encode($statuses);

mysqli_close($conn);
?>
