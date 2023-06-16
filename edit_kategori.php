<?php 
  include 'koneksi.php';

  $data = mysqli_query($koneksi,"SELECT * FROM kategori WHERE id_kategori = '".$_GET['id']."'" );
  $r = mysqli_fetch_array($data);

  $nama_kategori = $r['nama_kategori'];
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
	
	<title>Zahara Collection | Admin Edit Kategori</title>

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
<script type="text/javascript">
function valid(theform)
{
		pola_nama=/^[a-zA-Z]*$/;
		if (!pola_nama.test(theform.brand.value)){
		alert ('Hanya huruf yang diperbolehkan untuk Merek!');
		theform.brand.focus();
		return false;
		}
		return (true);
}
</script>
</head>
<body>
	<div class="ts-main-content">
	<?php include('atribut/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Edit Kategori</h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">Form Edit Kategori</div>
									<div class="panel-body">
									<form method="post" name="theform" class="form-horizontal" action="" onSubmit="return valid(this);">	
									<?php
									$id=$_GET['id'];
									$sql ="SELECT * FROM kategori WHERE id_kategori='$id'";
									$query = mysqli_query($koneksi,$sql);
									$result = mysqli_fetch_array($query);
									?>
									<div class="form-group">
												<label class="col-sm-4 control-label">Nama Kategori</label>
												<div class="col-sm-8">
													 <input type="text" class="form-control" name="nama_kategori" value="<?php echo $nama_kategori ?>" />
												</div>
									</div>
									<div class="hr-dashed"></div>
									<div class="form-group">
										<div class="col-sm-8 col-sm-offset-4">
													<button class="btn btn-primary" type="submit" name="kirim">Submit</button>
												</div>
									</div>
									</form>
									</div>
								</div>
							</div>
							
						</div>
						
					

					</div>
				</div>
				
			
			</div>
		</div>
	</div>

	<?php 
    if (isset($_POST['kirim'])) {
      $nama_kategori = $_POST['nama_kategori'];

    
         $update = mysqli_query($koneksi, "UPDATE kategori SET 
            nama_kategori = '".$nama_kategori."'
            WHERE id_kategori = '".$_GET['id']."'
            ");
      if ($update) {
      echo "<script type='text/javascript'>
      		alert('Berhasil Edit');
      		document.location = 'data_kategori.php';
      		</script>";
    }else{
      echo "<script type='text/javascript'>
      		alert('Terjadi Kesalahan, Silakan Coba Lagi');
      		document.location = 'edit_kategori.php';
      		</script>";
    }
      
      // else{
      //       $update = mysqli_query($koneksi, "UPDATE kategori SET 
      //       nama_kategori = '".$nama_kategori."'
      //       WHERE id_kategori = '".$_GET['id']."'
            
      //       ");
      //       if($update){
      //       echo 'Berhasil Update';
      //    }else{
      //       echo 'Gagal Update';
      //    }
      // }


    }
    ?>
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
