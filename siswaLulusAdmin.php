<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa Lulus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #343a40;
        }
        .form-label {
            font-weight: bold;
        }
        .form-control {
            margin-bottom: 15px;
        }
        .btn {
            height: calc(2.25rem + 2px);
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center mb-4 text-white">Tambah Siswa Lulus</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama" class="form-label text-white">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap Siswa" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_telepon" class="form-label text-white">Nomor Telepon</label>
                        <input type="text" class="form-control" name="no_telepon" placeholder="Masukkan Nomor Telepon Siswa" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label text-white">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukkan Email Siswa" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label text-white">Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat Siswa" required>
                    </div>
                    <div class="mb-3">
                        <label for="tahun_kelulusan" class="form-label text-white">Tahun Kelulusan</label>
                        <input type="text" class="form-control" name="tahun_kelulusan" placeholder="Masukkan Tahun Kelulusan" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Tambah Siswa</button>
                    </div>
                    <div class="text-center pb-5">
                        <a href="./admin_home.php" class="btn btn-warning">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $nama = $_POST['nama'];
    $no_telepon = $_POST['no_telepon'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $tahun_kelulusan = $_POST['tahun_kelulusan'];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_spp";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO siswa_lulus (nama, no_telepon, email, alamat, tahun_kelulusan) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nama, $no_telepon, $email, $alamat, $tahun_kelulusan);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "<div class='container mt-3'><div class='alert alert-success text-center'>New record created successfully</div></div>";
    } else {
        echo "<div class='container mt-3'><div class='alert alert-danger text-center'>Error: " . $stmt->error . "</div></div>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
