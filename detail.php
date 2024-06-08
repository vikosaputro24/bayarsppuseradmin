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
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve data from the database based on the ID
    $query = "SELECT * FROM tb_bayar WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
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
    <style>
        /* Custom styles untuk tampilan */
        body {
            background-color: gray;
            /* Warna abu-abu */
        }

        .container {
            padding-top: 50px;
        }

        .card {
            max-width: 600px;
            margin: 0 auto;
        }

        .card-title {
            color: #007bff;
        }

        .card-text {
            margin-bottom: 10px;
        }

        .btn {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card mt-3 mb-5">
            <div class="card-body">
                <h2 class="card-title text-center">Detail Pembayaran</h2>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Nama:</strong> <?php echo $nama; ?></li>
                    <li class="list-group-item"><strong>No Telepon:</strong> <?php echo $no_telepon; ?></li>
                    <li class="list-group-item"><strong>Email:</strong> <?php echo $email; ?></li>
                    <li class="list-group-item"><strong>Alamat:</strong> <?php echo $alamat; ?></li>
                    <li class="list-group-item"><strong>Kelas:</strong> <?php echo $kelas; ?></li>
                    <li class="list-group-item"><strong>Bulan Pembayaran:</strong> <?php echo $bulan_pembayaran; ?></li>
                    <li class="list-group-item"><strong>Tanggal Pembayaran:</strong> <?php echo $tanggal_pembayaran; ?></li>
                    <li class="list-group-item"><strong>Jumlah Pembayaran:</strong> Rp <?php echo number_format($jumlah_pembayaran, 0, ',', '.'); ?></li>
                </ul>
                <div class="text-center mt-3">
                    <img src="./uploads/<?php echo $bukti_pembayaran; ?>" alt="Bukti Pembayaran" style="max-width: 80%;">
                </div>
                <p class="card-text text-center pt-3">Terima kasih telah melakukan pembayaran.</p>
                <div class="text-center " id="buttons">
                    <a href="dataPembayaran.php" class="btn btn-primary">Kembali</a>
                    <button onclick="printPage()" class="btn btn-primary">Print</button>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function printPage() {
            var buttons = document.getElementById('buttons');
            buttons.style.display = 'none';
            window.print();
            buttons.style.display = 'block';
        }
    </script>
</body>

</html>



<?php
mysqli_close($conn);
?>