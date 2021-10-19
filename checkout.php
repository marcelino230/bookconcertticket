<?php 
session_start();
include 'db_connect.php';

//jika belum login,memculkan perintah untuk login terlebih dahulu
if (!isset($_SESSION["user"]))
{
    echo "<script>alert('Silahkan login terlebih dahulu!');</script>" ;
    echo "<script>location='login.php';</script>" ;
}
if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
    echo "<script>alert('Keranjang kosong,silahkan pilih tiket');</script>";
    echo "<script>location='tiket.php';</script>";
}
?>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="aset/css/styles.css">
    <link rel="icon" href="aset/img/icon1.png">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li>|</li>
                <li><a href="tiket.php">List Ticket</a></li>
                <li>|</li>
                <li><a href="keranjang.php">Keranjang</a></li>
                <li>|</li>
                <!-- jika sudah login memunculkan logout-->
                <?php if(isset($_SESSION["user"])): ?>
                    <li><a href="logout.php">Logout</a></li>
                <!-- jika belum login,akan memunculkan login-->
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                <?php endif ?>
                <li>|</li>
                <li><a href="checkout.php">Checkout</a></li>
            </ul>
        </nav>
    </header>
    <main>
    <div id="content">
            <article id="ticket" class="card">
                <h2>Check Out</h2>
                <form action="" method="POST">
                    <table class="table1">
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Keterangan</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subharga</th>
                        </tr>
                        <?php $nomor=1;?>
                        <?php $totalpembelian=0;?>
                        <?php foreach ($_SESSION["keranjang"] as $id_tiket=>$jumlah): ?>
                        <!--menampilkan tiket yang dipilih berdasarkan id tiket-->
                        <?php
                        $ambil = $koneksi->query("SELECT * FROM tb_tiket
                            WHERE id='$id_tiket'");
                            $pecah = $ambil->fetch_assoc();
                            $subharga = $pecah["harga"]*$jumlah;
                        ?>
                        <tr>
                            <td><?php echo $nomor;?></td>
                            <td><?php echo $pecah["kategori"];?></td>
                            <td><?php echo $pecah["keterangan"];?></td>
                            <td>Rp.<?php echo number_format ($pecah["harga"]);?></td>
                            <td><?php echo $jumlah;?></td>
                            <td>Rp.<?php echo number_format ($subharga);?></td>

                        </tr>
                        <?php $nomor++;?>
                        <?php $totalpembelian+=$subharga ?>
                        <?php endforeach ?>
                        <tr>
                            <th colspan="5">Total pembelian</th>
                            <th>Rp. <?php echo number_format ($totalpembelian) ?></th>
                        </tr>
                    </table>
                    
                    <button class="tombol_ungu" name="print"> Print Nota </button>
                    </form>
            </article>
        </div>
        <?php
        if (isset($_POST["print"]))
        {
            $id_user = $_SESSION["user"]["id_user"];
            $tgl_order = date ("Y-m-d");
            $totalpembelian;
            
            //menyimpan data ke tb_order
            $koneksi->query("INSERT INTO tb_order (id_user , tgl_order , total)
            VALUES ('$id_user','$tgl_order','$totalpembelian') ");

            //mendapatkan id_order terbaru
            $id_order_baru = $koneksi->insert_id;

            foreach ($_SESSION["keranjang"] as $id_tiket => $jumlah)
            {
                $koneksi->query("INSERT INTO tb_detail_order (id_order , id_tiket , jumlah)
                VALUES ('$id_order_baru' , '$id_tiket' , '$jumlah') ");
            }

            //mengkosongkan keranjang belanja
            unset($_SESSION["keranjang"]);

            echo "<script>alert('Pembelian sukses');</script>";
            echo "<script>location='nota.php?id=$id_order_baru';</script>";
        }
        ?>
        
        <aside>
            <article class="profile card">
                <img class="featured-image" src="aset/img/profile.png"/>
                    <h3>Hello   <?php echo  $_SESSION["user"]['nama_user']; ?> !</h3>
            </article>
        </aside>
    </main>

    <footer>
        <p>Synchronize Fest &#169; 2020</p>
    </footer>
</body>
</html>