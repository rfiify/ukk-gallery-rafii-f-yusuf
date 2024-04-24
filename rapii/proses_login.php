<?php
    include "koneksi.php";
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($sql);

    if($cek == 1) {
        while($data = mysqli_fetch_array($sql)) {
            $_SESSION['userid'] = $data['userid'];
            $_SESSION['namalengkap'] = $data['namalengkap'];
        }
        header("location:home.php");
        exit(); // Ensure script stops execution after redirect
    } else {
        // Redirect back to login page with error message
        header("location:login.php?error=1");
        exit(); // Ensure script stops execution after redirect
    }
?>