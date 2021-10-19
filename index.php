<?php 
session_start();
include 'db_connect.php';
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
            <article id="home" class="card">
                <h2>Synchronize Fest</h2>
                <img src="aset/img/bg.png" class="featured-image" alt="Synchronize_Fest">
                <p style="text-align: justify;">Synchronize Fest merupakan festival musik multi-genre tahunan berskala nasional yang mengundang puluhan ribu audience untuk merayakan keberagaman jenis musik hidup di lima panggung selama tiga hari, tiga malam, menikmati suguhan 100-an pertunjukan terkurasi dari artis-artis terfavorit dan terbaik tanah air yang datang dari dekade &#96;70-an, &#96;80-an, &#96;90-an hingga 2000-an. Seluruh genre musik populer bakal ditampilkan di Synchronize Fest .</p>
                <p style="text-align: justify;">Mulai dari genre pop, R&B, rock & roll, blues, folk, jazz, punk, heavy metal, hiphop, reggae, ska, atau sub-genre hardcore, metalcore, death metal, grindcore, industrial rock, new wave, indie pop, alternative rock/grunge, bossa nova, komedi bahkan hingga dangdut pun akan ikut ditampilkan di pergelaran ini. Selain menikmati ratusan pertunjukan musik, Synchronize Fest juga akan menyuguhkan berbagai pengalaman terkurasi lainnya bagi para audience, di antaranya adalah Outdoor Cinema, Art & Merch Market, Records Fair hingga F&B Festival. Rincian mengenai program-program tersebut akan dijelaskan lebih lanjut dalam rilis pers berikutnya. Sejarah digelarnya Synchronize Fest sendiri terjadi pada tahun 2000. Berawal dari semangat militan sekelompok anak muda yang mempelopori festival musik elektronik hingga akhirnya sembilan tahun kemudian, pada Februari 2009, berkembang menjadi sebuah festival musik tiga hari yang menampilkan beragam aksi terbaik dari kancah hiburan musik hidup tanah air di Plaza Indonesia Entertainment X&#96;nter, Jakarta.</p>
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