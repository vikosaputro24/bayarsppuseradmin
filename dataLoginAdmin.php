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
                            <li class="nav-item active"><a class="nav-link" href="#!">Status</a></li>
                        </ul>
                        <button class="btn btn-primary" id="sidebarToggle" onclick="logoutFunction()"><i class="fas fa-sign-out-alt icon"></i>Logout</button>
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
            <h1 class="text-center pt-5">DAFTAR ADMIN LOGIN</h1>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fas fa-plus icon"></i>Tambah User</button>
           

                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%">
                            <thead class="bg-info">
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'koneksi.php';
                                $query = mysqli_query($conn, "SELECT * FROM tb_admin");
                                $no = 1;
                                while ($result = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $result['username']; ?></td>
                                    <td><?php echo $result['email']; ?></td>
                                    <td>
                                    <button class="btn btn-sm btn-warning edit-btn" data-id="<?php echo $result['id']; ?>" data-username="<?php echo $result['username']; ?>" data-email="<?php echo $result['email']; ?>"><i class="fas fa-edit icon"></i>Edit</button>
                                        <a href="data2.php?delete_id=<?php echo $result['id']; ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt icon"></i>Delete</a>
                                    </td>
                                </tr>
                                <?php
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </center>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="data2.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="operation" value="add">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder
                            ="Masukkan Username" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save icon"></i>Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="data2.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="operation" value="update">
                        <input type="hidden" id="edit-id" name="id">
                        <div class="form-group">
                            <label for="edit-username">Username</label>
                            <input type="text" class="form-control" id="edit-username" name="username" placeholder="Masukkan Username" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-email">Email</label>
                            <input type="email" class="form-control" id="edit-email" name="email" placeholder="Masukkan Email" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-password">Password</label>
                            <input type="password" class="form-control" id="edit-password" name="password" placeholder="Masukkan Password (opsional)">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save icon"></i>Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById("sidebarToggle").addEventListener("click", function () {
            document.getElementById("wrapper").classList.toggle("toggled");
        });

        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const username = this.getAttribute('data-username');
                const email = this.getAttribute('data-email');

                document.getElementById('edit-id').value = id;
                document.getElementById('edit-username').value = username;
                document.getElementById('edit-email').value = email;

                var editModal = new bootstrap.Modal(document.getElementById('editModal'));
                editModal.show();
            });
        });
    </script>
</body>

</html>
