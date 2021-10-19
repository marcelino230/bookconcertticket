<?php 
session_start();
include 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <link rel="stylesheet" href="aset/css/styles.css">
    <link rel="icon" href="aset/img/icon1.png">
</head>
<body>

<div id="canvas">
    <h3>Form Pendaftaran Member</h3>
        <form action="" method="POST">
                <label for="name">Nama Lengkap</label>
                <input class="form_login" type="text" id="name_user" name="nama_user" placeholder="Nama" />

                <label for="email_user">Email</label>
                <input class="form_login" type="text" id="email_user" name="email_user" placeholder="Email" />
            
                <label for="password">Password</label>
                <input class="form_login" type="password" id="password_user" name="password_user" placeholder="Password" />
                
                <label for="no_hp">No HP</label>
                <input class="form_login" type="text" id="no_hp" name="no_hp" placeholder="No HP" />

                <label for="alamat">Alamat</label>
                <input class="form_login" type="text" id="alamat" name="alamat" placeholder="Alamat" />
                <br/>
                    <center>
                            <a  class="link" href="login.php">Sudah punya akun? Login sekarang</a>
                    </center>
                <br/>
                <input type="submit" class="tombol_login" name="register" value="Daftar" />
                <br/>
                <br/>
                    <center>
                        <a  class="link" href="index.php">Kembali</a>
                    </center>

        </form>
        <?php
          if (isset($_POST["register"]))
          {
            $nama = $_POST["nama_user"];  
            $email = $_POST["email_user"];
            $password = $_POST["password_user"];
            $no_hp = $_POST["no_hp"];
            $alamat = $_POST["alamat"];
            $register = $koneksi->query("INSERT INTO tb_user (nama_user , email_user , password_user , no_hp , alamat)
            VALUES ('$nama' , '$email' , '$password' , '$no_hp' , '$alamat')");
            
              echo "<script>alert('Berhasil membuat akun');</script>";
              echo "<script>location='login.php';</script>";
            
          }
        ?>
</div>

</body>
</html>