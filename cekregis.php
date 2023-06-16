<?php
session_start();
error_reporting(0);
include('koneksi.php');
$nama=$_POST['nama'];
$notelphone=$_POST['notelphone']; 
$alamat=$_POST['alamat'];
$email=$_POST['email']; 
$password=$_POST['password'];
$password2=$_POST['password2'];


if($password2!=$password){
    echo "<script>alert('Password tidak sama!');</script>";
    echo "<script type='text/javascript'> document.location = 'registrasi.php'; </script>";         
}else{
    $sqlcek = "SELECT email FROM customer WHERE email='$email'";
    $querycek = mysqli_query($koneksi,$sqlcek);
        if(mysqli_num_rows($querycek)>0){
            echo "<script>alert('Email sudah terdaftar, silahkan gunakan email lain!');</script>";
            echo "<script type='text/javascript'> document.location = 'registrasi.php'; </script>";         
        }else{
            $password=md5($_POST['password']);
            $sql1="INSERT INTO customer(nama,notelphone,alamat,email,password) VALUES('$nama','$notelphone','$alamat','$email','$password')";
            $lastInsertId = mysqli_query($koneksi, $sql1);
                if($lastInsertId){
                    echo "<script>alert('Registrasi berhasil. Sekarang anda bisa login.');</script>";
                    echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
                }else {
                    echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
                    echo "<script type='text/javascript'> document.location = 'registrasi.php'; </script>";
                }
        }   
}
?>