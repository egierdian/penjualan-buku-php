<?php
include 'konfig.php';

$idtransaksi = $_POST['notransaksi'];
$idbuku = $_POST['id_buku'];
$harga = $_POST['harga'];
$qty = $_POST['qty'];
$subtotal = $_POST['subtotal'];

print_r($_POST);
 
$query = "INSERT INTO detail_transaksi (no_transaksi, ID_buku, harga, jumlah_beli, subtotal) VALUES ('$idtransaksi','$idbuku','$harga','$qty','$subtotal')";
mysqli_query($koneksi, $query);

?>