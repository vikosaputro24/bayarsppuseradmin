<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(./assets/p.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            padding-top: 50px;
        }

        .card {
            margin: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border: none;
            border-radius: 10px;
        }

        .card-title {
            color: #333;
            font-weight: bold;
            font-size: 1.25rem;
        }

        .card-text {
            color: #555;
            font-size: 1rem;
        }

        .social-icons a {
            margin-right: 15px;
            color: #555;
            text-decoration: none;
            font-size: 1.2rem;
        }

        .social-icons a:hover {
            color: #007bff;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        h1 {
            color: #fff;
            margin-bottom: 30px;
        }

        .back-button {
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Kontak Kami</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Alamat</h5>
                        <p class="card-text text-center">Jl. Contoh No. 123, Jakarta<br> Tel: (021) 12345678<br> Email: alamat@example.com</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Kontak</h5>
                        <p class="card-text text-center">Tel: (021) 98765432<br> Fax: (021) 87654321<br> Email: kontak@example.com</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Media Sosial</h5>
                        <div class="social-icons text-center">
                            <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i> Instagram</a><br>
                            <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook"></i> Facebook</a><br>
                            <a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i> Twitter</a><br>
                        </div>
                        <p class="card-text text-center">Ikuti kami di media sosial untuk update terbaru.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center back-button">
            <a href="home.php" class="btn btn-primary">Kembali ke Home</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
