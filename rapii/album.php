<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Album</title>
    <link rel="icon" type="imagejpg/" href="bg2.jpg">
    <style> 
        /* CSS styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #E9967A;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            color: #000000;
        }

        p {
            text-align: center;
            margin-top: 10px;
            color: #000000;
        }

        ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
            margin-top: 20px;
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
            background-color: #593c1d;
            color: #2b884de8;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #660000;
            border-radius: 35px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form table {
            width: 100%;
        }

        form table tr {
            margin-bottom: 15px;
        }

        form table tr:last-child {
            margin-bottom: 0;
        }

        form table td {
            padding: 10px;
            text-align: center;
        }

        form table input[type="text"] {
            width: 100%;
            padding: 8px;
            border-radius: 50px;
            border: 1px solid #ccc;
        }

        form table input[type="submit"] {
            padding: 10px 20px;
            background-color: #660000;
            color: #FFFFFF;
            border: none;
            border-radius: 90px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form table input[type="submit"]:hover {
            background-color: #593c1d;
            color: #2b884de8;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #593c1d;
        }

        th {
            background-color: #ffffff;
            color: #000000;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    
        td:last-child {
            text-align: center;
        }

        a {
            text-decoration: none;
            color: #a92e44;
            transition: color 0.3s ease;
            margin-right: 10px;
        }

        a:hover {
            color: #fc9aff99;;
        }

        b {
            color: #fc9aff99;;
        }

        /* Responsive CSS */
        @media screen and (max-width: 768px) {
            body {
                font-size: 14px;
            }

            form {
                max-width: 90%;
            }

            table {
                width: 100%;
                font-size: 14px;
            }

            img {
                max-width: 80px;
            }
        }

        @media screen and (max-width: 480px) {
            body {
                font-size: 12px;
            }

            form {
                max-width: 100%;
            }

            table {
                font-size: 12px;
            }

            img {
                max-width: 60px;
            }
        }
    </style>
</head>
<body>
    <h1>Website Galeri Foto Rafii</h1>
    <p>Buat album yang berisi lebih dari satu foto</p>
    
    <!-- Navigation menu -->
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

    <!-- Form to add album -->
    <form action="tambah_album.php" method="post" onsubmit="return validateForm()">
        <table>
            <tr>
                <td>Nama Album</td>
                <td><input type="text" name="namaalbum" id="namaalbum"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsi" id="deskripsi"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>

    <!-- Table to display existing albums -->
    <table border="1" cellpadding=5 cellspacing=0>
        <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Tanggal dibuat</th>
            <th>Aksi</th>
        </tr>
        <?php
            include "koneksi.php";
            $userid=$_SESSION['userid'];
            $sql=mysqli_query($conn,"select * from album where userid='$userid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
                <tr>
                    <td><?=$data['namaalbum']?></td>
                    <td><?=$data['deskripsi']?></td>
                    <td><?=$data['tanggaldibuat']?></td>
                    <td>
                        <a href="hapus_album.php?albumid=<?=$data['albumid']?>">Hapus</a>
                        <a href="edit_album.php?albumid=<?=$data['albumid']?>">Edit</a>
                    </td>
                </tr>
        <?php
            }
        ?>
    </table>

    <script>
        // JavaScript validation function
        function validateForm() {
            var namaAlbum = document.getElementById("namaalbum").value.trim();
            var deskripsi = document.getElementById("deskripsi").value.trim();

            // Check if any field is empty
            if (namaAlbum === "" || deskripsi === "") {
                alert("Semua kolom wajib diisi!");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>