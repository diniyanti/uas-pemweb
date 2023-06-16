<?php
include('koneksi.php');
 ?>
<!doctype html>
<html lang="en" class="no-js">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="theme-color" content="#3e454c">
  
  <title>Zahara Collection | Admin Kelola Koleksi</title>

  <!-- Font awesome -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- Sandstone Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Bootstrap Datatables -->
  <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
  <!-- Bootstrap social button library -->
  <link rel="stylesheet" href="css/bootstrap-social.css">
  <!-- Bootstrap select -->
  <link rel="stylesheet" href="css/bootstrap-select.css">
  <!-- Bootstrap file input -->
  <link rel="stylesheet" href="css/fileinput.min.css">
  <!-- Awesome Bootstrap checkbox -->
  <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
  <!-- Admin Stye -->
  <link rel="stylesheet" href="css/style.css">
<style>
.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
</style>
</head>
<body>
  <div class="ts-main-content">
    <?php include('atribut/leftbar.php');?>
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h2 class="page-title">Kelola Data Sewa</h2>
            <!-- Zero Configuration Table -->
            <div class="panel panel-default">
              <div class="panel-heading">Daftar Sewa</div>
              <div class="panel-body">
                <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                  <thead>

                    <tr>
                      <th>No</th>
                      <th>Nama Produk</th>
                      <th>Tanggal Sewa</th>
                      <th>Tanggal Mulai</th>
                      <th>Tanggal Selesai</th>
                      <th>Nama Penyewa</th>
                      <th>KTP</th>
                      <th>Durasi</th>
                      <th>Total</th>
                      <th>Status Pengembalian</th>
                      <th>Status Pembayaran</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php 
                  $nomor = 0;
                  $qOpenSewa = "SELECT * FROM sewa inner join produk ON produk.id_produk = sewa.id_produk";


                  $openSewa = mysqli_query($koneksi, $qOpenSewa);
                     while ($result = mysqli_fetch_assoc($openSewa) ) {
                      $nomor++;
                  ?>
                    <tr>
                      <td><?php echo ($nomor);?></td>
                      <td><?php echo($result['nama_produk']);?></td>
                      <td><?php echo ($result['tgl_sewa']);?></td>
                      <td><?php echo ($result['tgl_mulai']);?></td>
                      <td><?php echo ($result['tgl_selesai']);?></td>
                      <td><?php echo ($result['nama']);?></td>
                      <td><img src="img/<?php echo $result['ktp'] ?> " width="100px" height="100px"></td>
                       <td><?php echo ($result['durasi']);?></td>
                      <td><?php echo ($result['sub_total']);?></td>
                      <td>
                       <?php if ($result['status_sewa'] == 'terkonfirmasi') { ?>   
                        <a href="batalkan_konfirmasi.php?id=<?php echo $result['id_sewa'] ?>">
                          <button class="btn btn-warning">Terkonfirmasi</button>
                        </a><?php } ?>
                         
                         <?php if ($result['status_sewa'] == 'belum terkonfirmasi') { ?>
                        <a href="konfirmasi.php?id=<?php echo $result['id_sewa'] ?>">
                          <button class="btn btn-danger">Belum Terkonfirmasi</button>
                        </a><?php } ?>
                      </td>
                       <td>
                        <?php if ($result['status_pembayaran'] == 'sudah bayar') { ?>   
                        <a href="batalkan_pembayaran.php?id=<?php echo $result['id_sewa'] ?>">
                          <button class="btn btn-success">Sudah Bayar</button>
                        </a><?php } ?>
                         
                         <?php if ($result['status_pembayaran'] == 'belum bayar') { ?>
                        <a href="konfirmasi_pembayaran.php?id=<?php echo $result['id_sewa'] ?>">
                          <button class="btn btn-danger">Belum Bayar</button>
                        </a><?php } ?>
                      </td>

                      <td class="text-center">
                        <a href="hapus_sewa.php?id=<?php echo $result['id_sewa'];?>" onclick="return confirm('Apakah anda akan menghapus <?php echo $result['kode_sewa'];?>?');"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Loading Scripts -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap-select.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap.min.js"></script>
  <script src="js/Chart.min.js"></script>
  <script src="js/fileinput.js"></script>
  <script src="js/chartData.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
