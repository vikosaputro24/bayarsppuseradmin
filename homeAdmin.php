<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sekolahku - Home Admin</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
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
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
                        <button class="btn btn-primary" id="sidebarToggle"><i class="fas fa-sign-out-alt icon"></i>Logout</button>
                    </div>
                </div>
            </nav>
           

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById("sidebarToggle").addEventListener("click", function () {
            document.getElementById("wrapper").classList.toggle("toggled");
        });
    </script>
</body>

</html>
