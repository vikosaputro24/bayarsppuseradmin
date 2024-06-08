<?php
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

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete_id'])) {
    // Sanitize input to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['delete_id']);

    // Perform the deletion
    $query = "DELETE FROM tb_bayar WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        // Redirect to dataPembayaran.php
        header('Location: dataPembayaran.php');
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
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
                    <a class="navbar-brand" href="#">
                        <img src="./assets/logo ahe putih.png" alt="Logo" width="30" height="30" class="d-inline-block align-top">
                        Anak Hebat.
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                            <li class="nav-item active"><a class="nav-link" href="#!">Dashboard</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login</a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#!">Login Admin</a>
                                    <a class="dropdown-item" href="./dataLoginUser.php">Login User</a>
                                </div>
                            </li>
                            <li class="nav-item active"><a class="nav-link" href="./dataPembayaran.php">Data Pembayaran</a></li>
                            <li class="nav-item active"><a class="nav-link" href="#!">Pengumuman</a></li>
                            <li class="nav-item active"><a class="nav-link" href="#!">Status</a></li>
                        </ul>
                        <button class="btn btn-primary" id="sidebarToggle" onclick="logoutFunction()"><i class="fas fa-sign-out-alt icon"></i>Logout</button>
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
                <h1 class="text-center pt-5">BUKTI PEMBAYARAN</h1>
                <div class="table-responsive">
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
                                <th>Unggah Bukti Pembayaran</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM tb_bayar");
                            $no = 1;
                            while ($result = mysqli_fetch_assoc($query)) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $result['nama']; ?></td>
                                    <td><?php echo $result['no_telepon']; ?></td>
                                    <td><?php echo $result['email']; ?></td>
                                    <td><?php echo $result['alamat']; ?></td>
                                    <td><?php echo $result['kelas']; ?></td>
                                    <td><?php echo $result['bulan_pembayaran']; ?></td>
                                    <td><?php echo $result['tanggal_pembayaran']; ?></td>
                                    <td><?php echo $result['jumlah_pembayaran']; ?></td>
                                    <td><?php echo $result['bukti_pembayaran']; ?></td>
                                    <td>
                                        <a href="javascript:void(0);" onclick="detailFunction(<?php echo $result['id']; ?>)" class="btn btn-sm btn-info"><i class="fas fa-info-circle icon"></i>Detail</a>
                                        <a href="dataPembayaran.php?delete_id=<?php echo $result['id']; ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt icon"></i>Delete</a>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function logoutFunction() {
            window.location.href = 'login.php';
        }

        function detailFunction(id) {
            window.location.href = 'detail.php?id=' + id;
        }
    </script>
</body>

</html>

<?php
mysqli_close($conn);
?>