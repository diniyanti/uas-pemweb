<?php 
include 'koneksi.php';
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Zahara Collection</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .custom-form {
            background-color: rgba(0,0,0,0.2);;
            padding: 30px;
            border-radius: 10px;
        }
        .custom-form .form-control {
            border-radius: 20px;
        }
        .custom-form .btn {
            border-radius: 20px;
        }
    </style>
</head>
<body>
<div class="bg-image" style="background-image: url(img/pin.png); height: auto;">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                <div class="container-fluid">
                    <div class="navbar-header">
                    <a class="navbar-brand" href="#" style="font-family: playfair display;">Zahara Collection</a>
                    </div>
                    
                    <ul class="navbar-nav nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="tampil_sewa.php">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    <li  class="nav-item text-white ">
                        <?php
                            session_start();

                            // Cek apakah pengguna sudah login
                            if (!isset($_SESSION['email'])) {
                                header("Location: login.php");
                                exit;
                            }

                            // Tampilkan nama pengguna
                            $nama = $_SESSION['nama'];
                            ?>
                            <h2>Selamat datang, <?php echo $nama; ?>!</h2>
                    </li>
                    </ul>  
                </div>
            </nav>
    </div>
  
    <?php
    include 'koneksi.php';
    $id = $_GET['id'];
    $sql = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk = '$id'");
    $tampil = mysqli_fetch_assoc($sql);
    ?>

    <div class="container">
        <h2>Isilah Inputan Di Bawah Ini!!!!</h2>
        <div class="custom-form">
            <form action="proses_sewa.php?id=<?php echo $tampil['id_produk'] ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Nama Produk:</label>
                    <input class="form-control" type="text" name="nama_produk" value="<?php echo $tampil['nama_produk'];?>">
                </div>
                <div class="form-group">
                    <label for="nama">Nama Pemesan:</label>
                    <input class="form-control" type="text" name="nama"  >
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" >
                </div>
                <div class="form-group">
                    <label for="telephone">Telephone:</label>
                    <input type="number" class="form-control" id="telephone" name="telephone" >
                </div>
                <div class="form-group">
                    <label for="ktp" >Foto KTP:</label><br>
                    <input type="file"  id="ktp" name="ktp" >
                </div>
                <div class="form-group">
                    <label for="tgl_mulai">Tanggal Mulai:</label>
                    <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" >
                </div>
                <div class="form-group">
                    <label for="tgl_mulai">Tanggal Selesai:</label>
                    <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" >
                </div>
                
                <button type="submit" class="btn btn-primary" name="kirim" action="">Kirim</button>
                <button type="submit" class="btn btn-danger" action="tampil_sewa.php" >Batal</button>
                
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
