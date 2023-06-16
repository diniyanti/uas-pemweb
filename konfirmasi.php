<?php 
include 'koneksi.php';
$id = $_GET['id'];
$status = 'terkonfirmasi';
$sql = mysqli_query($koneksi,"UPDATE sewa SET status_sewa = '$status' WHERE id_sewa = '$id'");
if ($sql) {
	echo "<script>window.location.href='data_sewa.php'</script>";
}
 ?>