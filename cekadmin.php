<?php
    //memualai session php
    session_start();

    //membuat koneksi
    include 'koneksi.php';

    //membuat variable
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //query sql untuk mengambil data pada database tabel admin
    $sql= mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");

    //cek data dengan menghitung data pada tabel
    $cek= mysqli_num_rows($sql);

    if ($cek > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        echo "<script> alert('Welcome Admin Zahara Collection') </script>";
        echo "<script> location='dashboard.php' </script>";
        //jika username dan password benar akan menuju ke halaman admin.php
    }
    else {
        echo "<script> alert('Username atau Password yang Anda Masukan Salah') </script>";
        echo "<script> location='logadmin.php' </script>";
        //jika salah tetap dihalaman logadmin.php
    }
?>