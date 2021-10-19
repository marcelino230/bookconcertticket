<?php 
session_start();
include 'db_connect.php';

if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
    echo "<script>alert('Keranjang kosong,silahkan pilih tiket');</script>";
    echo "<script>location='tiket.php';</script>";
}
?>
<html>
<head>
    <title>Keranjang</title>
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
        <div id="keranjang">
            <article id="ticket" class="card">
                <h2>Keranjang</h2>
                    <table class="table1">
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Keterangan</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subharga</th>
                            <th><img src="aset/img/settings-icon.png" class="icon"/></th>
                        </tr>
                        <?php $nomor=1;?>
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
                            <td>
                                <a href="hapuskeranjang.php?id=<?php echo $id_tiket ?>"><img src="aset/img/delete.png" class="icon"/></a>
                            </td>
                        </tr>
                        <?php $nomor++;?>
                        <?php endforeach ?>
                    </table>
                    <a href="tiket.php"><button class="tombol_abu" name="belanja"> Lanjutkan belanja </button></a>
                    <a href="checkout.php"><button class="tombol_ungu" name="checkout"> Checkout </button></a>
            </article>
        </div>
    </main>
    <footer>
        <p>Synchronize Fest &#169; 2020</p>
    </footer>
</body>
</html>