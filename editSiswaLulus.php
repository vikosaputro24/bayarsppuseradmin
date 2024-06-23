<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa Lulus</title>
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
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container table-container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center mb-4 text-white">Data Siswa Lulus</h2>
                <div class="pb-2 pt-5">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Data</button>
                    <a href="../bayarspp/homeAdmin.php" class="btn btn-warning">Kembali</a>
                </div>
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

                // Handle delete request
                if (isset($_GET['delete_id'])) {
                    $delete_id = $_GET['delete_id'];
                    $sql = "DELETE FROM siswa_lulus WHERE id=$delete_id";
                    if ($conn->query($sql) === TRUE) {
                        echo "<div class='alert alert-success mt-3'>Data berhasil dihapus.</div>";
                    } else {
                        echo "<div class='alert alert-danger mt-3'>Error: " . $conn->error . "</div>";
                    }
                }

                // Handle tambah data request
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
                    $namaTambah = $_POST["namaTambah"];
                    $no_teleponTambah = $_POST["no_teleponTambah"];
                    $emailTambah = $_POST["emailTambah"];
                    $alamatTambah = $_POST["alamatTambah"];
                    $tahun_kelulusanTambah = $_POST["tahun_kelulusanTambah"];

                    $sql = "INSERT INTO siswa_lulus (nama, no_telepon, email, alamat, tahun_kelulusan) 
                            VALUES ('$namaTambah', '$no_teleponTambah', '$emailTambah', '$alamatTambah', '$tahun_kelulusanTambah')";
                    if ($conn->query($sql) === TRUE) {
                        echo "<div class='alert alert-success mt-3'>Data berhasil ditambahkan.</div>";
                    } else {
                        echo "<div class='alert alert-danger mt-3'>Error: " . $conn->error . "</div>";
                    }
                }

                // Handle edit data request
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_id'])) {
                    $id = $_POST["edit_id"];
                    $nama = $_POST["nama"];
                    $no_telepon = $_POST["no_telepon"];
                    $email = $_POST["email"];
                    $alamat = $_POST["alamat"];
                    $tahun_kelulusan = $_POST["tahun_kelulusan"];

                    $sql = "UPDATE siswa_lulus SET nama='$nama', no_telepon='$no_telepon', email='$email', alamat='$alamat', tahun_kelulusan='$tahun_kelulusan' WHERE id=$id";
                    if ($conn->query($sql) === TRUE) {
                        echo "<div class='alert alert-success mt-3'>Data berhasil diupdate.</div>";
                    } else {
                        echo "<div class='alert alert-danger mt-3'>Error: " . $conn->error . "</div>";
                    }
                }

                // Fetch data or handle edit mode
                if (isset($_GET['id'])) {
                    // Edit mode
                    $edit_id = $_GET['id'];
                    $sql = "SELECT * FROM siswa_lulus WHERE id=$edit_id";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();

                        // Edit form
                        echo "<div class='form-container'>";
                        echo "<h2 class='text-center mb-4 text-white'>Edit Data Siswa Lulus</h2>";
                        echo "<form method='post' action=''>";
                        echo "<input type='hidden' name='edit_id' value='" . $row['id'] . "'>";
                        echo "<div class='mb-3'>
                                <label for='nama' class='form-label'>Nama Lengkap</label>
                                <input type='text' class='form-control' id='nama' name='nama' value='" . $row['nama'] . "' required>
                              </div>";
                        echo "<div class='mb-3'>
                                <label for='no_telepon' class='form-label'>Nomor Telepon</label>
                                <input type='text' class='form-control' id='no_telepon' name='no_telepon' value='" . $row['no_telepon'] . "' required>
                              </div>";
                        echo "<div class='mb-3'>
                                <label for='email' class='form-label'>Email</label>
                                <input type='email' class='form-control' id='email' name='email' value='" . $row['email'] . "' required>
                              </div>";
                        echo "<div class='mb-3'>
                                <label for='alamat' class='form-label'>Alamat</label>
                                <input type='text' class='form-control' id='alamat' name='alamat' value='" . $row['alamat'] . "' required>
                              </div>";
                        echo "<div class='mb-3'>
                                <label for='tahun_kelulusan' class='form-label'>Tahun Kelulusan</label>
                                <input type='text' class='form-control' id='tahun_kelulusan' name='tahun_kelulusan' value='" . $row['tahun_kelulusan'] . "' required>
                              </div>";
                        echo "<div class='text-center'>
                                <button type='submit' class='btn btn-primary'>Ubah</button>
                                <a href='editSiswaLulus.php' class='btn btn-secondary'>Tutup</a>
                              </div>";
                        echo "</form>";
                        echo "</div>";
                    } else {
                        echo "Data not found.";
                    }
                } else {
                    // Display data table
                    $sql = "SELECT id, nama, no_telepon, email, alamat, tahun_kelulusan FROM siswa_lulus";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo "<table class='table table-bordered table-striped'>
                                <thead class='thead-dark'>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Lengkap</th>
                                        <th>Nomor Telepon</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Tahun Kelulusan</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>";

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["nama"] . "</td>
                            <td>" . $row["no_telepon"] . "</td>
                            <td>" . $row["email"] . "</td>
                            <td>" . $row["alamat"] . "</td>
                            <td>" . $row["tahun_kelulusan"] . "</td>
                            <td>
                                <a href='" . $_SERVER['PHP_SELF'] . "?id=" . $row["id"] . "' class='btn btn-primary btn-sm'>Ubah</a>
                                <a href='" . $_SERVER['PHP_SELF'] . "?delete_id=" . $row["id"] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\")'>Hapus</a>
                            </td>
                        </tr>";
                    
                        }
                        echo "</tbody>
                            </table>";
                    } else {
                        echo "<div class='alert alert-warning text-center'>No data found</div>";
                    }
                }

                $conn->close();
                ?>


            </div>
        </div>
    </div>

    <!-- Modal untuk tambah data -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="namaTambah" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="namaTambah" name="namaTambah" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_teleponTambah" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="no_teleponTambah" name="no_teleponTambah" required>
                    </div>
                    <div class="mb-3">
                        <label for="emailTambah" class="form-label">Email</label>
                        <input type="email" class="form-control" id="emailTambah" name="emailTambah" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamatTambah" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamatTambah" name="alamatTambah" required>
                    </div>
                    <div class="mb-3">
                        <label for="tahun_kelulusanTambah" class="form-label">Tahun Kelulusan</label>
                        <input type="text" class="form-control" id="tahun_kelulusanTambah" name="tahun_kelulusanTambah" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" name="add" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
