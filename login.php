<?php 
session_start();
include 'db_connect.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="aset/css/styles.css" />
    <link rel="icon" href="aset/img/icon1.png">
</head>
<body>

<div id="canvas">
        <h3>Silahkan Login</h3>
        <form action="" method="POST">
            <label for="email">Email</label>
            <input class="form_login" type="text" name="email" placeholder="Email" />

            <label for="password">Password</label>
            <input class="form_login" type="password" name="password" placeholder="Password" />

            <br/>
                    <center>
                            <a  class="link" href="register.php">Belum punya akun? Daftar sekarang</a>
                    </center>
                <br/>
                <button class="tombol_login" name="login"> Login </button>
                <br/>
                <br/>
                    <center>
                        <a  class="link" href="index.php">Kembali</a>
                    </center>
        </form>
</div>
      <?php
          if (isset($_POST["login"]))
          {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $ambil = $koneksi->query("SELECT * FROM tb_user WHERE email_user='$email' AND password_user='$password' ");
            $akunyangcocok = $ambil->num_rows;
            
            if ($akunyangcocok==1)
            {
              $akun = $ambil->fetch_assoc();
              $_SESSION["user"] = $akun ; 
              echo "<script>alert('Anda berhasil login');</script>";
              echo "<script>location='checkout.php';</script>";
            } 
            else 
            {
              echo "<script>alert('Anda gagal login,periksa akun kembali');</script>";
              echo "<script>location='login.php';</script>";
            }
          }
        ?>
</body>
</html>