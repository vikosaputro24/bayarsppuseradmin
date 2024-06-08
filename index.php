<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/home.css">
    <style>
        body {
            background-color: #e9ecef;
        }

        @media (max-width: 991.98px) {
            .dropdown.text-center .dropdown-toggle {
                display: block;
                width: 100%;
                text-align: center;
            }

            .dropdown.text-center .dropdown-menu {
                width: 100%;
                text-align: center;
                left: auto;
                right: 0;
            }
        }

        .box {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
        }

        .dropdown-menu .dropdown-item:hover {
            background-color: #54595F !important;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Ahe.</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-secondary text-white" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-secondary text-white" href="./about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-secondary text-white" href="./pembayaran.php">Pembayaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-secondary text-white" href="#pengumuman">Pengumuman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-secondary text-white" href="#product">Contact</a>
                    </li>
                    <!-- Logout untuk mobile -->
                    <li class="nav-item d-lg-none">
                        <div class="dropdown text-center">
                            <button class="nav-link btn btn-outline-secondary dropdown-toggle text-white" type="button" id="mobileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                Profile
                            </button>
                            <ul class="dropdown-menu text-center" aria-labelledby="mobileDropdown" style="
                            background-color: #686D76;
                            ">
                                <li><a class="dropdown-item text-white" href="./profile.php">Profile</a></li>
                                <li><a class="dropdown-item text-white" href="">Status Pembayaran</a></li>
                                <li><a class="dropdown-item text-white" href="./login.php">Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- Logout untuk desktop -->
            <div class="navbar-nav d-none d-lg-flex ml-auto">
                <div class="dropdown">
                    <button class="nav-link btn btn-outline-secondary dropdown-toggle text-white" type="button" id="desktopDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Profile
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="desktopDropdown" style="
                        background-color: #686D76;
                        ">
                        <li><a class="dropdown-item text-white" href="./profile.php">Profile</a></li>
                        <li><a class="dropdown-item text-white" href="">Status Pembayaran</a></li>
                        <li><a class="dropdown-item text-white" href="./login.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Home Section -->
    <section id="home" class="d-flex align-items-center" style="height: 100vh; background-image: url('./assets/p.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; text-align: center; position: relative;">
        <div class="container text-center text-white">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="box">
                        <h1 class="display-4 mb-4">Welcome to Ahe Website</h1>
                        <p class="lead">Ini merupakan website pembayaran pada les Ahe.</p>
                        <a href="./pembayaran.php" class="btn btn-primary mt-3">Pembayaran</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-overlay"></div>
    </section>


<!-- Modal untuk menampilkan isi pengumuman -->
<div class="modal fade" id="pengumumanModal" tabindex="-1" aria-labelledby="pengumumanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pengumumanModalLabel">Pengumuman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><?php echo file_get_contents("pengumuman.txt"); ?></p>
            </div>
        </div>
    </div>
</div>


    <!-- Script untuk menampilkan modal saat halaman dimuat -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const pengumumanButton = document.querySelector('a[href="#pengumuman"]');
            if (pengumumanButton) {
                pengumumanButton.addEventListener('click', function(event) {
                    event.preventDefault();
                    const pengumumanModal = new bootstrap.Modal(document.getElementById('pengumumanModal'));
                    pengumumanModal.show();
                });
            }
        });
    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>