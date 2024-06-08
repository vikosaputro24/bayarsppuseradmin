<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query_sql = "INSERT INTO tb_admin (username, email, password)
            VALUES ('$username', '$email', '$password')";

    if (mysqli_query($conn, $query_sql)) {
        mysqli_close($conn); 
        header("Location: loginAdmin.php");
        exit;
    } else {
        echo "Pendaftaran Gagal : " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="./style/register.css">
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
        }

        body {
            position: relative;
            margin: 0;
            padding: 0;
            background: none;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('./assets/p.jpg') no-repeat center center fixed;
            background-size: cover;

            z-index: -1;
        }

        .input-group-text {
            background-color: #343a40;
            border: none;
        }

        .input-group .form-control {
            border-left: none;
        }

        .input-group .form-control:focus {
            box-shadow: none;
        }

        .form-group {
            position: relative;
        }

        .form-group i {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: gray;
        }

        .form-group i.left {
            left: 15px;
            top: 50px;
        }

        .form-group i.right {
            right: 15px;
            top: 50px;
            cursor: pointer;
        }

        .blur-background {
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: url('./assets/p.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: blur(8px);
            z-index: -1;
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center min-vh-100 bg-gradient" style="background-image: linear-gradient(90deg, rgba(145, 175, 175, 1), rgba(188, 146, 166, 1));">
<div class="blur-background"></div>
    <div class="bg-dark bg-opacity-90 p-5 rounded-lg shadow-lg w-80">
        <h2 class="text-center text-white mb-4">REGISTRASI ADMIN</h2>
        <form action="regisAdmin.php" method="POST">
            <div class="form-group mb-3">
                <label for="username" class="text-light">Username</label>
                <input type="text" class="form-control pl-5" name="username" placeholder="Masukkan Username" required>
                <i class="fas fa-user left"></i>
            </div>
            <div class="form-group mb-3">
                <label for="email" class="text-light">Email</label>
                <input type="email" class="form-control pl-5" name="email" placeholder="Masukkan Email" required>
                <i class="fas fa-envelope left"></i>
            </div>
            <div class="form-group mb-3">
                <label for="password" class="text-light">Password</label>
                <input type="password" class="form-control pl-5" name="password" id="password" placeholder="Masukkan Password" required>
                <i class="fas fa-lock left"></i>
                <i class="fas fa-eye-slash right" id="togglePassword"></i>
            </div>
            <button type="submit" class="btn btn-outline-light btn-block">Registrasi</button>
        </form>
        <p class="text-center text-light mt-3">
            Sudah punya akun? <a href="./loginAdmin.php" class="text-success">Login Admin disini</a>
        </p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
