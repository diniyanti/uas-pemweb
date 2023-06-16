<?php
include('koneksi.php');
$nama_kategori	= $_POST['nama_kategori'];
$sql 	= "INSERT INTO kategori (nama_kategori) VALUES ('$nama_kategori')";
$query 	= mysqli_query($koneksi,$sql);
echo "<script type='text/javascript'>
		alert('Berhasil tambah data.'); 
			document.location = 'data_kategori.php'; 
		</script>";
// if($query){
// 	echo "<script type='text/javascript'>
// 			alert('Berhasil tambah data.'); 
// 			document.location = 'data_kategori.php'; 
// 		</script>";

// }else {
// 	echo "<script type='text/javascript'>
// 			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
// 			document.location = 'tambah_kategori.php'; 
// 		</script>";

// }
?>