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
            background-color: #f8f9fa;
            padding-top: 20px;
            background-image: url(./assets/p.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .searchFunction {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            display: none;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3ABEF9;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center mb-3" style="margin-top: 100px;">Status Pembayaran</h1>
        <input type="text" id="searchName" onkeyup="searchFunction()" placeholder="Cari nama atau bulan pembayaran..." class="searchFunction">
        <div class="pb-3">
            <input type="button" class="btn btn-danger btn-block" onclick="window.location.href='./home.php'" value="Kembali">
        </div>

        <table id="dataTable">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Bulan Pembayaran</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
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
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["nama"] . "</td><td>" . $row["bulan_pembayaran"] . "</td><td>" . $row["tanggal_pembayaran"] . "</td><td>" . $row["status"] . "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Tidak ada data.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function searchFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchName");
            filter = input.value.toUpperCase();
            table = document.getElementById("dataTable");
            tr = table.getElementsByTagName("tr");
            for (i = 1; i < tr.length; i++) { // Mulai dari 1 untuk melewatkan baris header
                td = tr[i].getElementsByTagName("td");
                var found = false;
                for (var j = 0; j < td.length; j++) {
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            found = true;
                        }
                    }
                }
                if (found) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }

            if (filter === "") {
                table.style.display = "none";
            } else {
                table.style.display = "table";
            }
        }
    </script>
</body>

</html>
