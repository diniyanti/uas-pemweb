<?php 
 header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=Data Laporan.xls");
 ?>

 <!DOCTYPE html>
 <html>
 <head>
    <title>Export Excel</title>
 </head>
 <body>
    <style type="text/css">
    body{
        font-family: sans-serif;
    }
    table{
        margin: 20px auto;
        border-collapse: collapse;
    }
    table th
    table td{
        border: 1px solid #3c3c3c;
        padding: 3px 8px;
    } 
    a{
        background: blue;
        color: #fff;
        padding: 8px 10px;
        text-decoration: none;
        border-radius: 2px;
    }
    </style>

     <?php 
      include 'koneksi.php'; 
      if(isset($_POST['filter'])){
      $awal = $_POST['awal'];
      $akhir = $_POST['akhir'];
      $sql  = "SELECT * FROM sewa Inner Join produk ON sewa.id_produk = produk.id_produk WHERE sewa.status_sewa = 'terkonfirmasi' AND sewa.tgl_sewa BETWEEN '$awal' AND '$akhir' ORDER BY sewa.id_sewa";
    }
    ?>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Costum</th>
                <th>Nama Penyewa</th>
                <th>Tanggal Mulai</th>
                <th>tanggal Selesai</th>
                <th>Durasi</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php 

        if (isset($_POST['filter'])) {
          $awal = $_POST['awal'];
          $akhir = $_POST['akhir'];
          $no = 1;
          $sql  = "SELECT * FROM sewa Inner Join produk ON produk.id_produk = sewa.id_produk WHERE sewa.status_sewa = 'terkonfirmasi' AND sewa.tgl_sewa BETWEEN '$awal' AND '$akhir' ORDER BY sewa.id_sewa";
          $query = mysqli_query($koneksi, $sql);
        
            while ($row = mysqli_fetch_assoc($query) ) {
            ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['nama_produk'] ?></td>
                <td><?php echo $row['nama'] ?></td>
                <td><?php echo $row['tgl_mulai'] ?></td>
                <td><?php echo $row['tgl_selesai'] ?></td>
                <td><?php echo $row['durasi'] ?>hari</td>
                <td><?php echo $row['sub_total'] ?></td>
            </tr>
            <?php 
            }
            }
            ?>
        </tbody>
       
        <tfoot>
            <td colspan="6">TOTAL JUMLAH</td>
            <?php 
            // $sqlJmlh = mysqli_query($openDatabase, "SELECT SUM(sub_total) AS jmlh FROM sewa WHERE WHERE sewa.status_sewa = 'terkonfirmasi' AND sewa.tgl_mulai BETWEEN '$awal' AND '$akhir'  ");
      $sqlJumlah  = "SELECT SUM(sub_total) AS jmlh FROM sewa WHERE sewa.status_sewa = 'terkonfirmasi' AND sewa.tgl_sewa BETWEEN '$awal' AND '$akhir'";
      $queryJumlah = mysqli_query($koneksi, $sqlJumlah);
            $jmlh = mysqli_fetch_assoc($queryJumlah);
            ?>
            <td><?php echo $jmlh['jmlh'] ?></td>
        </tfoot>
       
        
    </table>
 
 </body>
 </html>