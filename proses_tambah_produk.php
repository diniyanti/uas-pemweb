<?php
include('koneksi.php');
$nama_produk=$_POST['nama_produk'];
$nama_kategori=$_POST['nama_kategori'];
$ukuran=$_POST['ukuran']; 
$harga=$_POST['harga']; 
$status=$_POST['status'];
$image=$_FILES["image"]["name"];

move_uploaded_file($_FILES["image"]["tmp_name"],"img/".$_FILES["image"]["name"]);

$sql 	= "INSERT INTO produk (nama_produk,id_kategori,ukuran,harga,status,image)
			VALUES ('$nama_produk','$nama_kategori','$ukuran','$harga','$status','$image')";
$query 	= mysqli_query($koneksi,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil tambah data.'); 
			document.location = 'data_koleksi.php'; 
		</script>";
}else {
			echo "No Error : ".mysqli_errno($koneksi);
			echo "<br/>";
			echo "Pesan Error : ".mysqli_error($koneksi);

	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'tambah_produk.php'; 
		</script>";
}

?>