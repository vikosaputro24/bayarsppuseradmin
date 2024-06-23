<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_spp";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete_id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['delete_id']);
    $query = "DELETE FROM tb_bayar WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        header('Location: dataPembayaran.php');
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

$search_query = "";
if (isset($_GET['search'])) {
    $search_query = mysqli_real_escape_string($conn, $_GET['search']);
}

$query = "SELECT * FROM tb_bayar WHERE nama LIKE '%$search_query%'";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sekolahku - Home Admin</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .wrapper {
            display: flex;
            flex-grow: 1;
        }

        #sidebar-wrapper {
            min-height: 100vh;
            width: 250px;
            margin-left: -250px;
            transition: margin 0.25s ease-out;
            background-color: #343a40;
            color: #fff;
        }

        #sidebar-wrapper .list-group {
            width: 100%;
        }

        #page-content-wrapper {
            flex: 1;
            background-color: #fff;
        }

        .navbar {
            border-bottom: 1px solid #e5e5e5;
        }

        .table-responsive {
            margin-top: 20px;
        }

        .btn-primary {
            margin-right: 10px;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            margin-bottom: 20px;
        }

        .form-container .form-group {
            margin-bottom: 20px;
        }

        .form-container .btn {
            width: 100%;
        }

        .icon {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <a class="navbar-brand" href="./homeAdmin.php">
                        <img src="./assets/logo ahe putih.png" alt="Logo" width="30" height="30" class="d-inline-block align-top">
                        Anak Hebat.
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                            <li class="nav-item active"><a class="nav-link" href="./homeAdmin.php">Beranda</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Masuk</a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="./dataLoginAdmin.php">Sebagai Admin</a>
                                    <a class="dropdown-item" href="./dataLoginUser.php">Sebagai User</a>
                                </div>
                            </li>
                            <li class="nav-item active"><a class="nav-link" href="./dataPembayaran.php">Data Pembayaran</a></li>
                            <li class="nav-item active"><a class="nav-link" href="./adminPengumuman.php">Pengumuman</a></li>
                            <li class="nav-item active"><a class="nav-link" href="./adminStatus.php">Status</a></li>
                        </ul>
                        <button class="btn btn-primary" id="sidebarToggle" onclick="logoutFunction()"><i class="fas fa-sign-out-alt icon"></i>Keluar</button>
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
                <h1 class="text-center pt-5">DATA PEMBAYARAN</h1>
                <div class="table-responsive">
                    <form method="GET" action="dataPembayaran.php" class="mb-3">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama" value="<?php echo htmlspecialchars($search_query); ?>">
                            <button class="btn btn-outline-secondary" type="submit">Cari</button>
                        </div>
                    </form>
                    <table class="table table-bordered" width="100%">
                        <thead class="bg-info">
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>No Telepon</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Kelas</th>
                                <th>Bulan pembayaran</th>
                                <th>Tanggal pembayaran</th>
                                <th>Jumlah pembayaran</th>
                                <th>Bukti Pembayaran</th>
                                <th>Bukti</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row['nama']; ?></td>
                                    <td><?php echo $row['no_telepon']; ?></td>
                                    <td><?php echo $row['email'];
                                        ?></td>
                                    <td><?php echo $row['alamat']; ?></td>
                                    <td><?php echo $row['kelas']; ?></td>
                                    <td><?php echo $row['bulan_pembayaran']; ?></td>
                                    <td><?php echo $row['tanggal_pembayaran']; ?></td>
                                    <td>Rp <?php echo number_format($row['jumlah_pembayaran'], 0, ',', '.'); ?></td>
                                    <td>
                                        <img src="./uploads/<?php echo $row['bukti_pembayaran']; ?>" alt="Bukti Pembayaran" style="max-width: 100px; cursor: pointer;" onclick="showImage('./uploads/<?php echo $row['bukti_pembayaran']; ?>')">
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" onclick="detailFunction(<?php echo $row['id']; ?>)" class="btn btn-sm btn-warning">
                                            <i class="fas fa-info-circle icon"></i>Bukti
                                        </a>
                                    </td>
                                    <td>
                                        <a href="dataPembayaran.php?delete_id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash-alt icon"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Bukti Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="modalImage" src="" alt="Bukti Pembayaran" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function logoutFunction() {
            window.location.href = 'home.php';
        }

        function detailFunction(id) {
            window.location.href = 'detail.php?id=' + id;
        }

        function showImage(src) {
            var modalImage = document.getElementById('modalImage');
            modalImage.src = src;
            var myModal = new bootstrap.Modal(document.getElementById('imageModal'), {
                keyboard: false
            });
            myModal.show();
        }
    </script>
</body>

</html>

<?php
mysqli_close($conn);
?>