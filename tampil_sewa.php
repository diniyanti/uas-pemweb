<?php 
include 'koneksi.php';
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Zahara Collection</title>
    <!-- Tambahkan stylesheet Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
                        <a class="nav-link active" aria-current="page" href="product.php">Product</a>
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

    <div class="container">
        <h2 class="text-center">Barang Tersedia</h2>
        <br>
        <div class="row">
            <?php
            // Koneksi ke database
        

            // Ambil data barang dari database
            $query = "SELECT * FROM produk";
            $result = mysqli_query($koneksi, $query);

            // Tampilkan data barang dalam bentuk card Bootstrap
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-md-3">
                    <div class="card mb-3"  >
                        <img src="img/<?php echo $row['image'] ?>" class="card-img-top btn btn-warning" alt="..." >
                        <div class="card-body btn btn-warning" >
                            <h5 class="card-title"><?php echo $row['nama_produk']; ?></h5>
                            <p class="card-text"><?php echo $row['ukuran']; ?></p>
                            <h6 class="card-subtitle mb-2 text-muted">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></h6>
                            <p class="card-text"><?php echo $row['status']; ?></p>
                            <a href="tambah_sewa.php?id=<?php echo $row['id_produk'] ?>" class="btn btn-primary">Sewa</a>
                        </div>
                    </div>
                </div>
                <?php
            }

            // Tutup koneksi database
            mysqli_close($koneksi);
            ?>
        </div>
    </div>
<footer class="bg-dark text-center text-white">
        <div class="container p-4">

        </div>

        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright:
            <a class="text-white">DinaDini Final Project</a>
        </div>
    </footer>
    <!-- Tambahkan script Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
