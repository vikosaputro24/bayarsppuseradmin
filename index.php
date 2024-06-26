<?php
require 'koneksi.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query_sql = "SELECT * FROM tb_login
                WHERE email = '$email' AND password = '$password'";

    $result = mysqli_query($conn, $query_sql);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['email'] = $email;
        header("Location: home.php");
        exit;
    } else {
        echo "<script>
                alert('Email atau kata sandi Anda salah. Silakan coba login kembali.');
                window.location.href = 'login.php';
              </script>";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="./style/login.css">
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

<body class="d-flex align-items-center justify-content-center min-vh-100">
    <div class="blur-background"></div>
    <div class="bg-dark p-5 rounded-lg shadow-lg w-80">
        <h2 class="text-center text-white mb-4">MASUK</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" onsubmit="return validateForm()">
            <div class="form-group mb-3 position-relative">
                <label for="email" class="text-light">Email</label>
                <input type="email" class="form-control pl-5" name="email" placeholder="Masukkan Email" required>
                <i class="fas fa-envelope left"></i>
            </div>
            <div class="form-group mb-3 position-relative">
                <label for="password" class="text-light">
                    Password <a href="./forgotPass.php" class="text-decoration-none">(Lupa Password?)</a>
                </label>
                <input type="password" class="form-control pl-5" name="password" id="password" placeholder="Masukkan Password" required>
                <i class="fas fa-lock left"></i>
                <i class="fas fa-eye-slash right" id="togglePassword"></i>
            </div>

            <button type="submit" class="btn btn-outline-light btn-block">MASUK</button>
        </form>
        <p class="text-center text-light mt-3">
            Belum punya akun? <a href="./register.php" class="text-success">Daftar disini</a>
        </p>
        <p class="text-center text-light mt-3">
            Masuk sebagai admin? <a href="./loginAdmin.php" class="text-success">Masuk disini</a>
        </p>
    </div>

    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("password");
            var toggleIcon = document.getElementById("togglePassword");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            } else {
                passwordInput.type = "password";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            }
        }

        document.getElementById("togglePassword").addEventListener("click", togglePassword);

        function validateForm() {
            var passwordInput = document.getElementById("password");
            var password = passwordInput.value;

            if (password.length < 8) {
                alert("Password harus terdiri dari minimal 8 karakter.");
                return false;
            }

            return true;
        }

    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
