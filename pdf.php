<?php
//membuat koneksi
include ('koneksi.php');
// require file autoload.inc.php dari folder dompdf
require_once ("dompdf/autoload.inc.php");
//menggunakan dompdf
use Dompdf\Dompdf;
//membuat dompdf baru
$dompdf = new Dompdf();
//query sql untuk mengambil data pada database
$query = mysqli_query($koneksi, "SELECT * FROM sewa Inner Join produk ON produk.id_produk = sewa.id_produk ");
//membuat isi judul kolom pada pdf
$html = '<center> <h3> Laporan Penyewaan </h3> </center> <br>';
$html = '<table border="1" width="100%">
            <tr>
             <td>No</td>
            <td>Costum</td>
            <td>Tanggal Sewa</td>
            <td>Tanggal Mulai</td>
            <td>Tanggal Selesai</td>
            <td>Nama Penyewa</td>
            <td>Kode Sewa</td>
            <td>Alamat</td>
            <td>Durasi</td>
            <td>Total</td>
            </tr>';
$no = 1;
//memasukan data dari database ke pdf
while($row = mysqli_fetch_array($query)){
    $html .= " <tr> 
                <td> " .$no. " </td>
                <td> " .$row['nama_produk']. " </td>
                <td> " .$row['tgl_sewa']. " </td>
                <td> " .$row['tgl_mulai']. " </td>
                <td> " .$row['tgl_selesai']. " </td>
                <td> " .$row['nama']. " </td>
                <td> " .$row['kode_sewa']. " </td>
                <td> " .$row['alamat']. " </td>
                <td> " .$row['durasi']. " </td>
                <td> " .$row['sub_total']. " </td>
                </tr> ";
    $no++;
}
$html .= "</html>";
$dompdf -> loadHtml($html);
//Setting ukuran dan orientasi kertas
$dompdf -> setPaper('A4', 'landscape');
//Rendering dari HTML ke PDF
$dompdf -> render();
// ob_end_clean();
//Melakukan output file PDF
$dompdf -> stream('laporan_persewaan.pdf');
?>