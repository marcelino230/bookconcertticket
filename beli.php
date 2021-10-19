<?php
session_start();
$id_tiket = $_GET['id'];
if(isset($_SESSION['keranjang'][$id_tiket]))
{
    $_SESSION['keranjang'][$id_tiket]+= 1;
}
else{
    $_SESSION['keranjang'][$id_tiket]= 1;
}

//echo "<pre>";
//print_r($_SESSION);
//echo "<pre>";

//melanjutkan pembelian ke halaman keranjang
echo "<script>alert('Tiket telah masuk ke keranjang');</script>";
echo "<script>location='keranjang.php';</script>";
?>