<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding-top: 50px;
        }

        .header-section {
            background-size: cover;
            color: white;
            padding: 100px 0;
            text-align: center;
        }

        .header-section h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .header-section p {
            font-size: 1.25rem;
        }



        .content-section h2 {
            font-size: 2rem;
            margin-bottom: 30px;
        }

        .content-section p {
            font-size: 1.1rem;
            line-height: 1.6;
        }

        .team-section {
            background-color: #e9ecef;
            padding: 50px 0;
        }

        .team-section h2 {
            font-size: 2rem;
            margin-bottom: 30px;
        }

        .team-member {
            text-align: center;
            margin-bottom: 30px;
        }

        .team-member img {
            border-radius: 50%;
            margin-bottom: 20px;
            width: 150px;
            height: 150px;
            object-fit: cover;
        }

        .team-member h5 {
            font-size: 1.25rem;
            margin-bottom: 10px;
        }

        .team-member p {
            font-size: 1rem;
            color: #6c757d;
        }

        .back-button {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class="header-section">
        <img src="./assets/banner.jpg" alt="Banner Image" style="width: 100%; height: auto;">
    </div>

    <div class="content-section">
        <div class="container">
            <h2>Visi Kami</h2>
            <p>Visi kami adalah menjadi perusahaan terdepan dalam menyediakan solusi inovatif dan berkualitas tinggi untuk kebutuhan pelanggan kami. Kami berkomitmen untuk selalu meningkatkan kualitas layanan dan produk kami melalui penelitian dan pengembangan yang berkelanjutan.</p>
            
            <h2>Misi Kami</h2>
            <p style="padding-bottom: 60px;">Misi kami adalah memberikan nilai lebih bagi pelanggan kami dengan menyediakan produk dan layanan yang memenuhi standar tertinggi. Kami berupaya untuk mencapai kepuasan pelanggan maksimal dengan berfokus pada keunggulan operasional, inovasi, dan etika bisnis yang kuat.</p>
        </div>
    </div>

    <div class="team-section">
        <div class="container">
            <h2>Tim Kami</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="team-member">
                        <img src="https://via.placeholder.com/150" alt="Member 1">
                        <h5>John Doe</h5>
                        <p>CEO</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-member">
                        <img src="https://via.placeholder.com/150" alt="Member 2">
                        <h5>Jane Smith</h5>
                        <p>CTO</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-member">
                        <img src="https://via.placeholder.com/150" alt="Member 3">
                        <h5>Michael Johnson</h5>
                        <p>COO</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="back-button mb-4">
        <a href="home.php" class="btn btn-primary">Kembali ke Beranda</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
