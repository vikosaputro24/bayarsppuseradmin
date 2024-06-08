<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit;
}

$email = $_SESSION['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];

    $update_query = "UPDATE tb_login SET fullname='$fullname', username='$username' WHERE email='$email'";
    if(mysqli_query($conn, $update_query)) {
        header("Location: profile.php");
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
