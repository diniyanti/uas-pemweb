<?php 
include 'koneksi.php';
 
 $id = $_GET['id'];
 $status_pembayaran = 'belum bayar';
 $sql = mysqli_query($koneksi, "UPDATE sewa SET status_pembayaran = '$status_pembayaran' WHERE id_sewa = '$id'");
 if ($sql) {
 	echo "<script>window.location.href='data_sewa.php'</script>";
 }
 ?> 
