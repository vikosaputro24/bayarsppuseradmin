<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran SPP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #343a40;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            margin-bottom: 15px;
        }

        .btn {
            height: calc(2.25rem + 2px);
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center mb-4 text-white">Form Pembayaran SPP</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama" class="form-label text-white">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap Anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_telepon" class="form-label text-white">Nomor Telepon</label>
                        <input type="text" class="form-control" name="no_telepon" placeholder="Masukkan Nomor Telepon Anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label text-white">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukkan Email Anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label text-white">Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat Anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label text-white">Kelas</label>
                        <select class="form-select" name="kelas" id="kelas" required>
                            <option selected disabled value="">Pilih Kelas Anda</option>
                            <option value="Regular">Regular</option>
                            <option value="Platinum">Platinum</option>
                            <option value="VIP">VIP</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="bulan_pembayaran" class="form-label text-white">Bulan Pembayaran</label>
                        <select class="form-select" name="bulan_pembayaran" id="bulan_pembayaran" required>
                            <option selected disabled value="">Pilih bulan pembayaran</option>
                            <option value="Januari">Januari</option>
                            <option value="Febuari">Febuari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_pembayaran" class="form-label text-white">Tanggal Pembayaran</label>
                        <input type="text" class="form-control" name="tanggal_pembayaran" id="tanggal_pembayaran" placeholder="Pilih Tanggal Pembayaran" required>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label text-white">Jumlah Pembayaran (Rp)</label>
                        <input type="text" class="form-control" name="jumlah_pembayaran" id="jumlah_pembayaran" placeholder="Masukkan Jumlah Pembayaran" required readonly>
                    </div>
                    <div class="mb-3">
                        <label for="bukti_pembayaran" class="form-label text-white">Unggah Bukti Pembayaran (JPG/PNG, max 1 MB)</label>
                        <input type="file" class="form-control" name="bukti_pembayaran" accept="image/jpeg, image/png" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Kirim Pembayaran</button>
                    </div>
                    <div class="text-center pb-5">
                        <a href="./home.php" class="btn btn-warning">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.id.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tanggal_pembayaran').datepicker({
                format: 'yyyy/mm/dd',
                language: 'id',
                autoclose: true,
                todayHighlight: true
            });

            $('#kelas').change(function() {
                var selectedKelas = $(this).val();
                var amount = 0;

                if (selectedKelas === "Regular") {
                    amount = 3000000;
                } else if (selectedKelas === "Platinum") {
                    amount = 4000000;
                } else if (selectedKelas === "VIP") {
                    amount = 5000000;
                }

                $('#jumlah_pembayaran').val(amount);
            });
           
        });
    </script>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "db_spp";

        $koneksi = new mysqli($servername, $username, $password, $database);

        if ($koneksi->connect_error) {
            die("Koneksi gagal: " . $koneksi->connect_error);
        }

        $nama = $koneksi->real_escape_string($_POST['nama']);
        $no_telepon = $koneksi->real_escape_string($_POST['no_telepon']);
        $email = $koneksi->real_escape_string($_POST['email']);
        $alamat = $koneksi->real_escape_string($_POST['alamat']);
        $kelas = $koneksi->real_escape_string($_POST['kelas']);
        $bulan_pembayaran = $koneksi->real_escape_string($_POST['bulan_pembayaran']);
        $tanggal_pembayaran = $koneksi->real_escape_string($_POST['tanggal_pembayaran']);
        $jumlah_pembayaran = $koneksi->real_escape_string($_POST['jumlah_pembayaran']); 
        $bukti_pembayaran = $koneksi->real_escape_string($_FILES['bukti_pembayaran']['name']);
        $tmp_bukti = $_FILES['bukti_pembayaran']['tmp_name'];
        $folder_bukti = "uploads/" . $bukti_pembayaran;

        // Validasi tipe file yang diunggah
        $allowed_types = array('image/jpeg', 'image/png');
        $file_info = finfo_open(FILEINFO_MIME_TYPE);
        $file_type = finfo_file($file_info, $tmp_bukti);
        finfo_close($file_info);

        if (!in_array($file_type, $allowed_types)) {
            die("<script>alert('Format file tidak didukung. Hanya JPG atau PNG yang diperbolehkan.'); window.location.href = './';</script>");
        }

        // Validasi ukuran file yang diunggah (misalnya minimal 1 MB)
        $file_size_mb = $_FILES['bukti_pembayaran']['size'] / (1024 * 1024); // konversi ke MB
        $max_file_size_mb = 1; // Ukuran maksimum file dalam MB

        if ($file_size_mb > $max_file_size_mb) {
            die("<script>alert('Ukuran file terlalu besar. Maksimal {$max_file_size_mb} MB.'); window.location.href = './';</script>");
        }

        if (!is_dir('uploads')) {
            mkdir('uploads', 0777, true);   
        }

        if (move_uploaded_file($tmp_bukti, $folder_bukti)) {
            $stmt = $koneksi->prepare("INSERT INTO tb_bayar (nama, no_telepon, email, alamat, kelas, bulan_pembayaran, tanggal_pembayaran, jumlah_pembayaran, bukti_pembayaran) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssss", $nama, $no_telepon, $email, $alamat, $kelas, $bulan_pembayaran, $tanggal_pembayaran, $jumlah_pembayaran, $bukti_pembayaran);

            if ($stmt->execute()) {
                echo "<script>
                        alert('Pembayaran SPP berhasil dikirim. Terima kasih sudah mendaftar.');
                        window.location.href = './home.php';
                      </script>";
            } else {
                echo "<script>
                        alert('Maaf, terjadi kesalahan saat mengirim pembayaran. Silakan coba lagi.');
                        window.location.href = './';
                      </script>";
            }
            

            $stmt->close();
        } else {
            echo "<script>alert('File gagal diunggah.'); window.location.href = './';</script>";
        }

        $koneksi->close();
    }
    ?>
</body>

</html>
