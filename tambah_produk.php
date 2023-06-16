<?php
session_start();
error_reporting(0);
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
	
	<title>Zahara Collection | Admin Tambah Produk</title>
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
<!-- <script type="text/javascript">
function valid(theform){
		pola_nama=/^[a-zA-Z]*$/;
		if (!pola_nama.test(theform.vehicletitle.value)){
		alert ('Hanya huruf yang diperbolehkan untuk Nama Mobil!');
		theform.vehicletitle.focus();
		return false;
		}
		return (true);
}
</script> -->
</head>
<body>
	<div class="ts-main-content">
	<?php include('atribut/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Tambah Produk</h2>
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
									<div class="panel-heading">Form Tambah Produk</div>
								<div class="panel-body">
									<form method="post" name="theform" action="proses_tambah_produk.php" class="form-horizontal" onsubmit="return valid(this);" enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-sm-2 control-label">Nama Produk<span style="color:red">*</span></label>
										<div class="col-sm-4">
											<input type="text" name="nama_produk" class="form-control" required>
										</div>
										<label class="col-sm-2 control-label">Pilih Kategori<span style="color:red">*</span></label>
										<div class="col-sm-4">
											<select class="form-control" name="nama_kategori" required="" data-parsley-error-message="Field ini harus diisi" >
												<option value="">== Pilih Kategori ==</option>
													<?php
														$mySql = "SELECT * FROM kategori ORDER BY id_kategori";
														$myQry = mysqli_query($koneksi, $mySql);
														while ($myData = mysqli_fetch_array($myQry)) {
															if ($myData['id_kategori']== $dataMerek) {
															$cek = " selected";
															} else { $cek=""; }
															echo "<option value='$myData[id_kategori]' $cek>$myData[nama_kategori] </option>";
														}
													?>
											</select>
										</div>
									</div> 
																				
									<div class="hr-dashed"></div>
									<div class="form-group">
										<label class="col-sm-2 control-label">Ukuran<span style="color:red">*</span></label>
										<div class="col-sm-4">
											<select class="form-control" name="ukuran" required>
											<option value=""> == Pilih Ukuran == </option>
											<option value="S">S</option>
											<option value="M">M</option>
											<option value="L">L</option>
											<option value="XL">XL</option>
											</select>
										</div>
										<label class="col-sm-2 control-label">Harga<span style="color:red">*</span></label>
										<div class="col-sm-4">
											<input type="text" name="harga" class="form-control" required>
										</div>
									</div>

									<div class="hr-dashed"></div>
									<div class="form-group">
										<label class="col-sm-2 control-label">Status<span style="color:red">*</span></label>
										<div class="col-sm-4">
											<input type="text" name="status" class="form-control" required>
										</div>	
										
										<div class="col-sm-12">
											<div class="col-sm-4">
											Upload Gambar<span style="color:red"></span><input type="file" name="image" accept="img/" required>
										</div>
										</div>									
									</div>
									<div class="hr-dashed"></div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="form-group">
										<div class="col-sm-3">
											<div class="checkbox checkbox-inline">
												<button class="btn btn-primary" type="submit">Save</button>
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>					
					</div>
				</div>
				
			</div>
		</div>
	</div>
</form>

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
