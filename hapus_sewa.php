<?php
session_start();
error_reporting(0);
include('koneksi.php');
if(isset($_GET['id'])){
	$id	= $_GET['id'];
	$mySql	= "DELETE FROM sewa WHERE id_sewa='$id'";
	$myQry	= mysqli_query($koneksi, $mySql);
	echo "<script type='text/javascript'>
			alert('Data berhasil dihapus.'); 
			document.location = 'data_sewa.php'; 
		</script>";
}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'data_sewa.php'; 
		</script>";
}

?>