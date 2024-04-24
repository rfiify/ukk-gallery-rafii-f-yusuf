<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="icon" type="imagejpg/" href="logolink.jpeg">
    <link rel="stylesheet" href="style.css"/>
</head>

<body style="background-image: url('bg1.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">  
<div id="wrapper">
    <div id="header">
        <h1 style="color: #000000">Silahkan Login</h1>
        <?php
            // Check if error is set and not empty
            if(isset($_GET['error']) && !empty($_GET['error'])) {
                echo '<p style="color: red;">Username atau password salah!</p>';
            }
        ?>
        <form id="loginForm" action="proses_login.php" method="post" onsubmit="return validateForm()">
            <table>
                <tr>
                    <td style="color: #336633">Username</td>
                    <td><input type="text" name="username" id="username"></td>
                </tr>
                <tr>
                    <td style="color: #336633">Password</td>
                    <td><input type="password" name="password" id="password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Login"></td>
                </tr>
            </table>
        </form>
        <!-- Tombol Registrasi -->
        <div style="text-align: center; margin-top: 10px;">
            <a href="register.php" style="text-decoration: none; color: #FF0000;">Belum punya akun? Registrasi di sini!</a>
        </div>
        <div id="footer">
            <h4 style="color: #6b3b08"></h4>
        </div>
    </div>
</div>

<script>
    function validateForm() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;

        if (username === "" || password === "") {
            alert("Username dan Password wajib diisi!");
            return false;
        }
        return true;
    }
</script>

</body>
</html>
