<?php 
include 'koneksi.php';
  if (isset($_POST['kirim'])) {
    $id_produk = $_GET['id'];
    $tgl_mulai = $_POST['tgl_mulai'];
    $tgl_selesai = $_POST['tgl_selesai'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telephone = $_POST['telephone'];
    $tgl_sewa = date('Y-m-d');
   
   $tgl1 = date_create($tgl_mulai);
   $tgl2 = date_create($tgl_selesai);
   $diff = date_diff($tgl1,$tgl2);
   $durasi = $diff->d;

   $harga = 100000;
  $sub_total = $durasi*$harga;
  $status = 'belum terkonfirmasi';
  $status_pembayaran = 'belum bayar';

  function acak($panjang)
  {
    $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
    $string = '';
    for ($i=0; $i < $panjang ; $i++) { 
     $pos = rand(0, strlen($karakter)-1);
     $string .= $karakter{$pos};
    }
    return $string;
  }
  $kode_sewa = acak(8);

   $sqlCek = mysqli_query($koneksi, "SELECT * From produk Where id_produk = '$id_produk' AND status = 'ready'");
  $cekProduk = mysqli_num_rows($sqlCek);

   if($cekProduk == null){
    echo "<script>alert('Maaf barang Kosong');window.location.href='tambah_sewa.php?id=$id_produk'</script>";
   }else{
    $nama_file =$_FILES['ktp']['name'];
    $tmp_name = $_FILES['ktp']['tmp_name'];
    $folder = './img/';

    move_uploaded_file($tmp_name, $folder.$nama_file);
    $sql = mysqli_query($koneksi, "INSERT INTO sewa VALUES(0,'$id_produk','$nama','$alamat','$telephone','$kode_sewa','$nama_file','$tgl_sewa','$tgl_mulai','$tgl_selesai','$durasi','$sub_total', '$status', '$status_pembayaran')");
   }

   $sqlId= mysqli_query($koneksi, "SELECT * From sewa Order By id_sewa DESC");
   $cekId = mysqli_fetch_assoc($sqlId);

   $id_sewa = $cekId['id_sewa'];
   if($sql){
    echo "<script>window.location.href='status.php?id=$id_sewa'</script>";
   }else{
    echo "<script>window.location.href='tambah_sewa.php?id=$id_produk'</script>";
   }

    // $durasi = $tgl_selesai->diff($tgl_mulai)->days;
    // echo $durasi;


    
  }


 ?>