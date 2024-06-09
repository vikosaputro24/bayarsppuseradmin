<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #808080;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3ABEF9;
        }

        .status-form {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .status-form h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .status-form select,
        .status-form input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .status-form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        .status-form input[type="submit"]:hover {
            background-color: #45a049;
        }

        #searchInput {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            background-color: #f8f8f8;
            background-image: url('search-icon.png');
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding-left: 40px;
        }

        .searchFunction {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            margin-bottom: 7px;
        }
    </style>
</head>

<body>
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
                    <li class="nav-item active"><a class="nav-link" href="./homeAdmin.php">Dashboard</a></li>
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
                <button class="btn btn-primary" id="sidebarToggle" onclick="logoutFunction()"><i class="fas fa-sign-out-alt icon"></i>Logout</button>
            </div>
        </div>
    </nav>

    <h1 class="pb-3" style="font-weight: 600; color: yellow;">Status Pembayaran</h1>

    <div class="container">
        <input type="text" id="searchName" onkeyup="searchFunction()" placeholder="Cari nama..." class="searchFunction">

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "db_spp";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM tb_bayar";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table><tr><th>ID</th><th>Nama</th><th>bulan_pembayaran</th><th>tanggal_pembayaran</th><th>Status</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nama"] . "</td><td>" . $row["bulan_pembayaran"] . "</td><td>" . $row["tanggal_pembayaran"] . "</td><td>" . $row["status"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "Tidak ada data.";
        }
        $conn->close();
        ?>
    </div>

    <div class="status-form" style="border-radius: 10px;">
        <h3>Ubah Status Pembayaran</h3>
        <form action="update_status.php" method="POST">
            <div style="margin-bottom: 10px;">
                <label for="id">ID:</label>
                <input type="text" id="id" name="id" placeholder="Masukkan ID" style="width: 100%; border:1px solid #ccc; padding: 10px; border-radius: 5px; box-sizing: border-box;">
            </div>
            <div style="margin-bottom: 10px;">
                <label for="status">Status Baru:</label>
                <select id="status" name="status" style="width: 100%;">
                    <option value="Pending">Pending</option>
                    <option value="Sedang dicek pembayaran">Sedang dicek pembayaran</option>
                    <option value="Dikonfirmasi pembayaran">Dikonfirmasi pembayaran</option>
                    <option value="Tidak terkonfirmasi">Tidak terkonfirmasi</option>
                </select>
            </div>
            <div>
                <input type="submit" value="Simpan" style="width: 100%; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function logoutFunction() {
            window.location.href = 'login.php';
        }
    </script>
    <script>
        function searchFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchName");
            filter = input.value.toUpperCase();
            table = document.querySelector("table");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>

</html>