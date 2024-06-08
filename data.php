<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_spp";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $operation = $_POST['operation'];

    if ($operation == 'add') {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $query = "INSERT INTO tb_login (fullname, username, email, password) VALUES ('$fullname', '$username', '$email', '$password')";
        if (mysqli_query($conn, $query)) {
            header('Location: dataLoginUser.php');
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    } elseif ($operation == 'update') {
        $id = $_POST['id'];
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!empty($password)) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $query = "UPDATE tb_login SET fullname='$fullname', username='$username', email='$email', password='$password' WHERE id='$id'";
        } else {
            $query = "UPDATE tb_login SET fullname='$fullname', username='$username', email='$email' WHERE id='$id'";
        }

        if (mysqli_query($conn, $query)) {
            header('Location: dataLoginUser.php');
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    $query = "DELETE FROM tb_login WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        header('Location: dataLoginUser.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
