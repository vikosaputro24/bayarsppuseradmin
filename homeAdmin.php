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

        .card {
            margin: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border: none;
            border-radius: 10px;
        }

        .card-body {
            text-align: center;
        }

        .card-title {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .card-text {
            font-size: 1rem;
            color: #6c757d;
        }

        .card-link {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
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
                                    <a class="dropdown-item" href="./dataLoginAdmin.php">Login Admin</a>
                                    <a class="dropdown-item" href="./dataLoginUser.php">Login User</a>
                                </div>
                            </li>
                            <li class="nav-item active"><a class="nav-link" href="./dataPembayaran.php">Data Pembayaran</a></li>
                            <li class="nav-item active"><a class="nav-link" href="./adminPengumuman.php">Pengumuman</a></li>
                            <li class="nav-item active"><a class="nav-link" href="./adminStatus.php">Status</a></li>
                        </ul>
                        <button class="btn btn-primary" id="sidebarToggle" onclick="window.location.href='./loginAdmin.php';"><i class="fas fa-sign-out-alt icon"></i>Logout</button>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="container">
        <h1 class="text-center pt-3">Dashboard</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title"><i class="fas fa-database icon"></i>Data Pembayaran</h2>
                        <p class="card-text">Kelola data pembayaran.</p>
                        <a href="dataPembayaran.php" class="card-link">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title"><i class="fas fa-bullhorn icon"></i>Pengumuman</h2>
                        <p class="card-text">Kelola pengumuman kepada pengguna.</p>
                        <a href="adminPengumuman.php" class="card-link">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title"><i class="fas fa-money-check icon"></i>Status Pembayaran</h2>
                        <p class="card-text">Perbarui status pembayaran.</p>
                        <a href="adminStatus.php" class="card-link">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title"><i class="fas fa-user icon"></i>Daftar Login User</h2>
                        <p class="card-text">Kelola data user login.</p>
                        <a href="dataLoginUser.php" class="card-link">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title"><i class="fas fa-user-shield icon"></i>Daftar Login Admin</h2>
                        <p class="card-text">Kelola data admin login.</p>
                        <a href="dataLoginAdmin.php" class="card-link">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>