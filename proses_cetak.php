<!DOCTYPE html>
<html>
<head>
  <title>Cetak</title>
  <style>
  :before,
  :after{
    box-sizing: border-box;
  }
  html{
    background-color:#f2f2f2;
    color: white;
  }
  h4{
    color: black;
  }@keyframes fadeInScale{
    0%{
      opacity: 0;
      transform: scale(0) translateY(50%);
    }
    90%{
      transform: scale(1.05);
    }
    100%{
      opacity: 1;
      transform: scale(1) translateY(0);
    }
  }
  .container{
    position: absolute;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .card{
    position: relative;
    width: 50%;
    background-color: #DDA0DD;
    transition: all .3s ease-in-out;

    &:hover{
      box-shadow:0 10px 20px 10px rgba(black, .2);
    }
  }
  .card__link{
    display: block;
    padding: 1em;
    text-decoration: none;
  }
  .card__icon{
    position: absolute;
    width: 4em;
    height: 4em;
    transition: all .3s ease-in-out;

    .card:hover &{
      opacity: 0;
      transform: scale(0);
    }
  }
  .card__media{
    padding: 2em 0;

    svg path{
      opacity: 0;
      transition: all .3s ease-in-out;
      transform-origin: center center;  
    }
    .card:hover & {
      svg path{
        animation: fadeInScale .3s ease-in-out forwards;
      }
      svg path:nth-child(2){
        animation-delay: .1s; 
      }
      svg path:nth-child(3){
        animation-delay: .2s;
      }
    }
  }
  .card__header{
    position: relative;
  }
  .card__header-title{
    margin: 0 0 .25em;
    color: black;
  }
  .card__header-meta{
    margin: 5px;
    color: #FF0000;
  }
  .card__header-icon{
    opacity: 0;
    position: absolute;
    right: 0;
    top: 50%;
    margin-top: -1em;
    transform: translateX(-20%);
    width: 2em;
    height: 2em;
    transition: all .3s ease-in-out;

    .card:hover &{
      opacity: 1;
      transform: translateX(0);
    }
  }
  .button{
  background-color: #CD5C5C;
  border: none;
  color: white;
  padding: 5px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 5px;
} 
  </style>
</head>
<body>
  <?php 
  include 'koneksi.php';
    $id_sewa = $_GET['id'];
    $sql = mysqli_query($koneksi, "SELECT * From sewa Inner Join produk ON sewa.id_produk = produk.id_produk Where id_sewa = '$id_sewa' ");
    $tampil = mysqli_fetch_assoc($sql); 
   ?>
   <div class="container">
    <article class="card">
      <a href="#" class="card__link">
        <!-- <header> -->
          <div class="card__header">
            <h1 class="card__header-title">Data Sewa Anda telah kami Proses</h1>
            <h4>Tanggal sewa  : <?php echo $tampil['tgl_sewa']; ?></h4>
            <h4>Kode Sewa  : <?php echo $tampil['kode_sewa']; ?></h4>
            <h4>Costume : <?php echo $tampil['nama_produk']; ?></h4>
            <h4>Nama Penyewa : <?php echo $tampil['nama']; ?></h4>
            <h4>Tanggal Mulai : <?php echo $tampil['tgl_mulai']; ?></h4>
            <h4>Tanggal Selesai : <?php echo $tampil['tgl_selesai']; ?></h4>
            <h4>Total : <?php echo $tampil['sub_total']; ?></h4>
            

            <a href="index.php" class="button">Kembali Ke Halaman Awal</a>
            <div class="card__header-icon">
              <svg viewbox="0 0 28 25">
                <path fill="#fff" d="M13.145 2.1311.94-1.867 12.178 12-12.178 12-94"/>
                
              </svg>
              
            </div>        
          </div>      
      </a>     
    </article>    
   </div>
        <script >
            window.print();
        </script>

</body>
</html>