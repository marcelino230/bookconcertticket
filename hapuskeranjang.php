<?php
session_start();
$id_tiket=$_GET['id'];
unset($_SESSION["keranjang"][$id_tiket]);

echo "<script>alert('Tiket dihapus dari keranjang');</script>";
echo "<script>location='keranjang.php';</script>";
?>