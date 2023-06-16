 <!DOCTYPE html>
 <html>
 <head>
   <title></title>
 </head>
 <body>
  <?php include('atribut/leftbar.php'); ?>
  <?php 
  include 'koneksi.php';
  $sql1=mysqli_query($koneksi, "select * from produk");
  $tampil1 = mysqli_num_rows($sql1);
  $sql2 = mysqli_query($koneksi, "select * from sewa where status_sewa = 'belum terkonfirmasi'");
  $tampil2 = mysqli_num_rows($sql2);
  $sql3 = mysqli_query($koneksi, "select * from sewa where status_sewa = 'terkonfirmasi'");
  $tampil3 = mysqli_num_rows($sql3);
  $sql4=mysqli_query($koneksi, "select * from customer");
  $tampil4 = mysqli_num_rows($sql4);
   ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $tampil1; ?></h3>

                <p>Total Produk</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="data_koleksi.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $tampil4; ?></h3>

                <p>Total Penyewa</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="data_sewa.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $tampil3; ?></h3>

                <p>Total Pengembalian</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="data_sewa.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $tampil2; ?></h3>

                <p>Total Belum Mengembalikan</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="data_sewa.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
         
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <?php include ('atribut/footer_dash.php'); ?>
 </body>
 </html>


 