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
						<h2 class="page-title">Kelola costume</h2>
						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Daftar Koleksi</div>
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Produk</th>
											<th>Kategori</th>
											<th>Ukuran</th>
											<th>Harga</th>
											<th>Status</th>
											<th><a href="tambah_produk.php"><span class="fa fa-plus-circle"></span>Tambah Produk</a></th>
										</tr>
									</thead>
									<tbody>
									<?php 
										$nomor = 0;
										$sqlproduk = "SELECT produk.*, kategori.* FROM produk, kategori WHERE produk.id_kategori=kategori.id_kategori ORDER BY produk.id_produk ASC";
										$queryproduk = mysqli_query($koneksi,$sqlproduk);
										while ($result = mysqli_fetch_array($queryproduk)){
											$nomor++;
									?>
										<tr>
											<td><?php echo htmlentities($nomor);?></td>
											<td><?php echo htmlentities($result['nama_produk']);?></td>
											<td><?php echo htmlentities($result['nama_kategori']);?></td>
											<td><?php echo htmlentities($result['ukuran']);?></td>
											<td><?php echo htmlentities($result['harga']);?></td>
											<td><?php echo htmlentities($result['status']);?></td>
											
											<td class="text-center"><a href="edit_produk.php?id=<?php echo $result['id_produk'];?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
												<a href="hapus_produk.php?id=<?php echo $result['id_produk'];?>" onclick="return confirm('Apakah anda akan menghapus <?php echo $result['nama_produk'];?>?');"><i class="fa fa-trash"></i></a></td>
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
