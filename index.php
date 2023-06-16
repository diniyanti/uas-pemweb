<!DOCTYPE html>
<html>
<head>
	<title>Halaman Utama</title>
	<link rel="stylesheet" type="text/css">
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style> 
*{
	margin: 0px;
	padding: 0px;
	font-family: century gothic;
}
header{
	background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url("img/b.jpg");
	height: 100vh;
	background-size: cover;
	
}

.main{
	max-width: 1200px;
	margin: auto;
}
.title {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
}
.title h1{
	color: white;
	font-size: 66px;
	text-decoration: underline;
}

.button{
	position: absolute;
	top: 65%;
	left: 50%;
	color: white;
	transform: translate(-50%,-50%);
}
.btn{
	border: 1px solid white;
	padding: 15px 40px;
	color: white;
	text-decoration: none;
	transition: 0.6%;
}
.btn:hover{
	background-color: white;
	color: black;
}
</style>
<body>
	<header>
		<nav class="navbar navbar-expand-md bg-dark navbar-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#" style="font-family: playfair display;">Zahara Collection</a>
			</div>
			<ul class="navbar-nav nav justify-content-end" >
				<li class="nav-item">
					<a class="nav-link active" arial-current="page" href="index.php">HOME</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="view.php">Produk</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="tentang_kami.php">Tentang Kami</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="contact.php">Hubungi</a>
				</li>
				<li class="nav-item">
					<?php  ?>
					<a class="nav-link" href="login.php">Login/Registrasi</a>
				</li>
			</ul>
		</div>
		</nav>
		<div class="container" style="margin-top:300px; color: white; text-align: center;">
      <p class="display-1"> Zahara Colection</p>
      <p class="lead"> Persewaan Berbagai Pakaian Adat Indonesia dan Dress Pesta </p>
      <a href="view.php" type="button" class="btn btn-dark" style="margin-top: 25px;" >View Product</a>
    </div><br><br>
	</header>

</body>

  <footer class="bg-dark text-left text-white">
        <div class="container p-4">

        <section class="mb-4">
         <div class="col-md-6">
        <br>
          <h4 >TENTANG KAMI</h4>
          <ul>        
          <li><a href="tentang_kami.php?type=aboutus">Tentang Kami</a></li>
          <li><a href="contact.php?type=terms">Hubungi</a></li>
               <li><a href="login_admin.php">Admin Login</a></li>
          </ul>
        </div>
        </section>
        </div>

        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright:
            <a class="text-white">DinaDIni Final Project</a>
        </div>
    </footer>
</html>