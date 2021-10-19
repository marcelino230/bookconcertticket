<?php 
session_start();
include 'db_connect.php';
?>
<html>
<head>
    <title>List Tiket</title>
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
                <h2>Ticket List</h2>
                    <?php 
                    $ambil=$koneksi->query("SELECT * FROM tb_tiket");
                    while($pertiket=$ambil->fetch_assoc()){
                    ?>
                    <table class="table1 table2">
                        <tr>
                            <td rowspan="2"><img src="aset/img/barcode.png" class="barcode"/></td>
                            <td colspan="2"><strong><?php echo $pertiket['kategori']; ?></strong></td>
                        </tr>
                        <tr>
                            <td><?php echo $pertiket['keterangan']; ?></td>
                            <td>Rp. <?php echo number_format ($pertiket['harga']); ?>
                            <a href="beli.php?id=<?php echo $pertiket['id'];?>"><button class="tombol_ungu" name="beli"> Beli </button></a></td>
                            
                        </tr>
                    </table>
                    <?php }?>
            </article>
        </div>
        <aside>
            <article class="profile card">
                <header>
                    <h2>Dimeriahkan Oleh</h2>
                    <div class="left">
                    <p>Ardhito Pramono</p>
                    <p>Begundal Lowokwaru</p>
                    <p>Club Dangdut Racun</p>
                    <p>DeadSquad Reunited</p>
                    <p>Dekat, Dialog Dini Hari</p>
                    </div>
            </article>
        </aside>
    </main>
    <footer>
        <p>Synchronize Fest &#169; 2020</p>
    </footer>
</body>
</html>