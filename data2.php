<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['operation'] == 'add') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password']; 

        $sql = "INSERT INTO tb_admin (username, email, password) VALUES ('$username', '$email', '$password')";
        if (mysqli_query($conn, $sql)) {
            header("Location: dataLoginAdmin.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } elseif ($_POST['operation'] == 'update') {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password']; 

        $sql = "UPDATE tb_admin SET username='$username', email='$email', password='$password' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            header("Location: dataLoginAdmin.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    $sql = "DELETE FROM tb_admin WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        header("Location: dataLoginAdmin.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
