<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Data Siswa Lulus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #343a40;
        }
        .table-container {
            margin-top: 50px;
        }
        .table {
            background-color: white;
        }
    </style>
</head>
<body>
    <div class="container table-container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center mb-4 text-white">Data Siswa Lulus</h2>
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nama Lengkap</th>
                            <th>Nomor Telepon</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Tahun Kelulusan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
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

                        // Fetch data
                        $sql = "SELECT id, nama, no_telepon, email, alamat, tahun_kelulusan FROM siswa_lulus";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $row["id"]. "</td>
                                        <td>" . $row["nama"]. "</td>
                                        <td>" . $row["no_telepon"]. "</td>
                                        <td>" . $row["email"]. "</td>
                                        <td>" . $row["alamat"]. "</td>
                                        <td>" . $row["tahun_kelulusan"]. "</td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>No data found</td></tr>";
                        }

                        $conn->close();
                        ?>
                    </tbody>
                </table>
                <div class="text-center pb-5">
                    <a href="../bayarspp/home.php" class="btn btn-warning">Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
