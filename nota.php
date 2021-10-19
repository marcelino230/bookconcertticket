<?php 
session_start();
include 'db_connect.php';
?>
<html>
<head>
    <title>Nota</title>
    <link rel="stylesheet" href="aset/css/styles.css">
    <link rel="icon" href="aset/img/icon1.png">
</head>
<body>
    <main>
        <div id="nota">
            <article id="ticket" class="card">
                <h2>SYNCHRONIZE FESTIVAL</h2>
                    <?php
                    $ambil = $koneksi->query("SELECT * FROM tb_order JOIN tb_user 
                    ON tb_order.id_user=tb_user.id_user WHERE tb_order.id_order='$_GET[id]'");
                    
                    $detail = $ambil->fetch_assoc();
                    ?>
                    <strong><?php echo $detail['nama_user']; ?></strong>
                    <p>
                    <?php echo $detail['email_user']; ?><br/>
                    <?php echo $detail['no_hp']; ?><br/>
                    <?php echo $detail['alamat']; ?>
                    </p>
                    <p>
                    <?php echo $detail['tgl_order'];?><br/>
                    Rp.<?php echo number_format ($detail['total']);?>
                    </p>

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
                    <?php
                    $ambil = $koneksi->query("SELECT * FROM tb_detail_order JOIN tb_tiket 
                    ON tb_detail_order.id_tiket=tb_tiket.id WHERE tb_detail_order.id_order='$_GET[id]'");
                    ?>
                    <?php while($pecah=$ambil->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah['kategori']; ?></td>
                        <td><?php echo $pecah['keterangan']; ?></td>
                        <td>Rp.<?php echo number_format ($pecah['harga']); ?></td>
                        <td><?php echo $pecah['jumlah']; ?></td>
                        <td>Rp.<?php echo number_format ($pecah['harga']*$pecah['jumlah']); ?></td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php } ?>
                </table>
                <p>Silahkan melakukan pembayaran sebesar Rp.<?php echo number_format ($detail['total']);?> ke :<br/>
                <strong>BANK MANDIRI 137-001088-3276 AN SYNCHRONIZE</strong>
                </p>

               <script>
		        window.print();
	            </script>
            </article>
        </div>
    </main>
</body>
</html>