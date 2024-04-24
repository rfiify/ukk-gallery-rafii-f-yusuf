<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #D2691E;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            color: #000;
        }

        p {
            text-align: center;
            margin-top: 10px;
            color: #000;
        }

        ul {
            list-style-type: none;
            padding: 15px;
            text-align: center;
            margin-top: 15px;
        }

        ul li {
            display: inline;
            margin-right: 10px;
        }

        ul li a {
            text-decoration: none;
            color: #ffffff;
            padding: 8px 16px;
            border-radius: 15px;
            transition: background-color 0.3s ease;
            background-color: #000000;
        }

        ul li a:hover {
            background-color: #5E616B;
            color: #CDD3D6;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Home</title>
    <link rel="icon" type="imagejpg/" href="bg2.jpg">
</head>
<body>
    <h1>Website Gallery Foto</h1>
    <p>Selamat datang <b><?=$_SESSION['namalengkap']?></b></p>
    
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>