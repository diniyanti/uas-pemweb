<!DOCTYPE html>
<html>
    <header>
    <title> Zahara Collection </title>
      
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    </header>
    <body>
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
          <a class="nav-link" href="registrasi.php">Registrasi/Login</a>
        </li>
      </ul>
    </div>
    </nav>

            <div class="container" style="margin-top: 150px;">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header bg-dark text-white mb-0"> <h5 class="text-center"> <span class="font-weight-bold"> LOGIN ADMIN </span> </h5>                               
                            </div>
                            <div class="card-body">
                                <form action="cekadmin.php" method="POST">
                                    <div class="input-group mb-3">
                                        <input type="text" name="username" class="form-control" placeholder="Username">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="input-group mb-3 justify-content-center">
                                        <input type="submit" name="login" value="Login" class="btn btn-dark btn-block">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

    </body>
    <br>
    <br>
     <footer class="bg-dark text-left text-white">
        <div class="container p-4">

        <section class="mb-4">
         <div class="col-md-6">
        <br>
          <h4 >TENTANG KAMI</h4>
          <ul>        
          <li><a href="page.php?type=aboutus">Tentang Kami</a></li>
          <li><a href="page.php?type=terms">Terms of use</a></li>
               <li><a href="admin/">Admin Login</a></li>
          </ul>
        </div>
        </section>
        </div>

        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright:
            <a class="text-white">DinaDini Final Project</a>
        </div>
    </footer>
</html>