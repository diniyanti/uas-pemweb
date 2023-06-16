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
                        <h2 class="page-title">Kelola Laporan</h2>
                        <!-- Zero Configuration Table -->
                        <div class="panel panel-default">
                            <form action="export_excel.php" method="POST">
                                <h3> <br> </h3>
                                <input type="date" name="awal">
                                <input type="date" name="akhir">
                                <button name="filter" type="submit" class="btn btn-success">Export Excel</button>
                                 <a href="pdf.php" type="button" class="btn btn-dark"> Download PDF</a>
                              </form>
                              <br>
                            <div class="panel-body">
                                <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                         <tr >
                                            <td><strong>No</strong></td>
                                            <td><strong>Costum</strong></td>
                                            <td><strong>Tanggal Sewa</strong></td>
                                            <td><strong>Tanggal Mulai</strong></td>
                                            <td><strong>Tanggal Selesai</strong></td>
                                            <td><strong>Nama Penyewa</strong></td>
                                             <td><strong>Kode Sewa</strong></td>
                                            <td><strong>KTP</strong></td>
                                            <td><strong>Durasi</strong></td>
                                            <td><strong>Total</strong></td>

                                         </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $nomor = 0;
                                        $sql = mysqli_query($koneksi, "SELECT * FROM sewa Inner Join produk ON sewa.id_produk = produk.id_produk WHERE sewa.status_sewa = 'terkonfirmasi' ORDER BY sewa.id_sewa");
                                        while ($result = mysqli_fetch_assoc($sql) ) {
                                            $nomor++;
                                        ?>
                                        <tr>
                                            <td><?php echo htmlentities($nomor);?></td>
                                            <td><?php echo htmlentities($result['nama_produk']);?></td>
                                            <td><?php echo htmlentities($result['tgl_sewa']);?></td>
                                            <td><?php echo htmlentities($result['tgl_mulai']);?></td>
                                            <td><?php echo htmlentities($result['tgl_selesai']);?></td>
                                            <td><?php echo htmlentities($result['nama']);?></td>
                                            <td><?php echo htmlentities($result['kode_sewa']);?></td>
                                            <td><img src="img/<?php echo $result['ktp'] ?> " width="100px" height="100px"></td>
                                            <td><?php echo htmlentities($result['durasi']);?></td>
                                            <td><?php echo htmlentities($result['sub_total']);?></td>
                                            
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
