<?php 
  include 'koneksi.php';

 $id=intval($_GET['id']);
  $data = mysqli_query($koneksi,"SELECT produk.*,kategori.* FROM produk, kategori WHERE produk.id_kategori=kategori.id_kategori AND produk.id_produk='$id'" );
  $r = mysqli_fetch_array($data);

  $nama_produk = $r['nama_produk'];
  $nama_kategori = $r['nama_kategori'];
  $ukuran = $r['ukuran'];
  $harga = $r['harga'];
  $status = $r['status'];
  
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
  
  <title>Zahara Collection | Admin Edit Produk</title>

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
          
            <h2 class="page-title">Edit Produk</h2>

            <div class="row">
              <div class="col-md-10">
                <div class="panel panel-default">
                  <div class="panel-heading">Form Edit Produk</div>
                  <div class="panel-body">
                  <form method="post" name="theform" class="form-horizontal" action="" onSubmit="return valid(this);">  
                 
                  <div class="form-group">
                        <label class="col-sm-4 control-label">Nama produk</label>
                        <div class="col-sm-8">
                           <input type="text" class="form-control" name="nama_produk" value="<?php echo $nama_produk ?>" />
                        </div>

                        <label class="col-sm-2 control-label">Kategori<span style="color:red">*</span></label>
                      <div class="col-sm-4">
                        <select class="form-control" name="nama_kategori" required="" data-parsley-error-message="Field ini harus diisi" >
                          <option value=""></option>
                            <?php
                            $mySql = "SELECT * FROM kategori ORDER BY nama_kategori";
                            $myQry = mysqli_query($koneksi, $mySql);
                            $dataKategori = $r['id_kategori'];
                            while ($kategoriData = mysqli_fetch_array($myQry)) {
                              if ($kategoriData['id_kategori']== $dataKategori) {
                              $cek = " selected";
                              } else { $cek=""; }
                              echo "<option value='$kategoriData[id_kategori]' $cek>".strtoupper($kategoriData[nama_kategori])."</option>";
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
                            <?php
                              $jk = $r['ukuran'];
                              echo "<option value='$jk' selected>".$jk."</option>";
                              echo "<option value='S'>S</option>";
                              echo "<option value='M'>M</option>";
                              echo "<option value='L'>L</option>";
                              echo "<option value='XL'>XL</option>";
                            ?>
                        </select>
                      </div>
                      <label class="col-sm-2 control-label">Harga<span style="color:red">*</span></label>
                      <div class="col-sm-4">
                        <input type="text" name="harga" class="form-control" value="<?php echo htmlentities($r['harga']);?>" required>
                      </div>

                      <label class="col-sm-2 control-label">Status<span style="color:red">*</span></label>
                      <div class="col-sm-4">
                        <input type="text" name="status" class="form-control" value="<?php echo htmlentities($r['status']);?>" required>
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
     $nama_produk=$_POST['nama_produk'];
$nama_kategori=$_POST['nama_kategori'];
$ukuran=$_POST['ukuran'];
$harga=$_POST['harga'];
$status=$_POST['status'];

          
         $update = mysqli_query($koneksi, "UPDATE produk SET 
            nama_produk = '".$nama_produk."',
            id_kategori = '".$nama_kategori."',
            ukuran = '".$ukuran."',
            harga = '".$harga."',
            status = '".$status."'
            WHERE id_produk = '".$_GET['id']."'

            ");
         if($update){
            echo "<script type='text/javascript'>
          alert('Berhasil Edit');
          document.location = 'data_koleksi.php';
          </script>";
         }else{
            echo "<script type='text/javascript'>
          alert('Terjadi Kesalahan, Silakan Coba Lagi');
          document.location = 'edit_produk.php';
          </script>";
         }

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
