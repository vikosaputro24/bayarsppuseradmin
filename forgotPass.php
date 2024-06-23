<?php
// Proses reset password
require './koneksi.php'; // Sesuaikan dengan file koneksi yang sesuai

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmPassword"];

    // Validasi jika password baru dan konfirmasi password sama
    if ($newPassword !== $confirmPassword) {
        echo "<script>
                alert('Konfirmasi password tidak cocok.');
                window.location.href = 'forgetPass.php';
              </script>";
        exit;
    }

    // Update password di database (tanpa hashing)
    $update_sql = "UPDATE tb_login SET password = '$newPassword' WHERE email = '$email'";
    $update_result = mysqli_query($conn, $update_sql);

    if ($update_result) {
        echo "<script>
                alert('Password berhasil direset. Silakan login dengan password baru Anda.');
                window.location.href = 'index.php';
              </script>";
        exit;
    } else {
        echo "<script>
                alert('Gagal mereset password. Silakan coba lagi.');
                window.location.href = 'forgetPass.php';
              </script>";
        echo "Error: " . mysqli_error($conn); // Tampilkan pesan error dari MySQL
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forget Password</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .form-container {
      max-width: 400px;
      margin: 0 auto;
      margin-top: 50px;
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
  </style>
</head>
<body class="d-flex align-items-center justify-content-center min-vh-100">
  
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow p-4 bg-dark text-light">
                <h2 class="text-center mb-4">Forget Password</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="newPassword">New Password</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
</div>




  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
