<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_spp";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the ID from the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve data from the database based on the ID
    $query = "SELECT * FROM tb_bayar WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Data found, display it
        $nama = $row['nama'];
        $no_telepon = $row['no_telepon'];
        $email = $row['email'];
        $alamat = $row['alamat'];
        $kelas = $row['kelas'];
        $bulan_pembayaran = $row['bulan_pembayaran'];
        $tanggal_pembayaran = $row['tanggal_pembayaran'];
        $jumlah_pembayaran = $row['jumlah_pembayaran'];
        // Retrieve the image data
        $bukti_pembayaran = $row['bukti_pembayaran'];

    } else {
        echo "No data found!";
        exit();
    }
} else {
    echo "ID not specified!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pembayaran</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Detail Pembayaran</h1>
        <div class="card mt-3">
            <div class="card-body">
                <p class="card-text">Terima kasih telah melakukan pembayaran. Berikut merupakan rincian pembayaran yang telah Anda lakukan.</p>
                <h5 class="card-title">Nama: <?php echo $nama; ?></h5>
                <p class="card-text">No Telepon: <?php echo $no_telepon; ?></p>
                <p class="card-text">Email: <?php echo $email; ?></p>
                <p class="card-text">Alamat: <?php echo $alamat; ?></p>
                <p class="card-text">Kelas: <?php echo $kelas; ?></p>
                <p class="card-text">Bulan Pembayaran: <?php echo $bulan_pembayaran; ?></p>
                <p class="card-text">Tanggal Pembayaran: <?php echo $tanggal_pembayaran; ?></p>
                <p class="card-text">Jumlah Pembayaran: <?php echo $jumlah_pembayaran; ?></p>
                <!-- Display the image -->
                <p class="card-text">Bukti Pembayaran: <br><img src="./uploads/<?php echo $bukti_pembayaran; ?>" alt="Bukti Pembayaran" style="max-width: 50%;"></p>
               
            </div>
        </div>
        <a href="dataPembayaran.php" class="btn btn-primary mt-3">Kembali</a>
        <button onclick="window.print()" class="btn btn-primary mt-3">Print</button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
mysqli_close($conn);
?>
