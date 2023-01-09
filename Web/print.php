<?php ob_start(); ?>
<html>
<head>
  <title>LAPORAN TRANSAKSI</title>
  <style>
   
    table {
      border-collapse:collapse;
      table-layout:fixed;width: 630px;
    }

    th{
        padding:15px;
        text-align:center;
      
    }
    table td {
      padding-left:5px;
      padding-right:5px;
      text-align:center;
    }
  </style>
</head>
<body>
          <?php
            if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
                $filter = $_GET['filter']; // Ambil data filder yang dipilih user
                if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                    $tgl = date('d-m-y', strtotime($_GET['tanggal']));
                    
                    echo '<b>Data Transaksi Tanggal '.$tgl.'';
                    echo '<a href="print.php?filter=1&tanggal='.$_GET['tanggal'].'"<div class="position-absolute top-0 end-0">
                    <button type="button" class="btn btn-primary">Cetak PDF</button></a><br/>';
                    $query = "SELECT transaksi_detail.id_TransaksiDetail, transaksi.waktu_pembayaran, pembeli.nama, barang.nama_barang, 
                    transaksi_detail.jumlah, transaksi.grand_total FROM transaksi_detail JOIN transaksi ON transaksi_detail.id_TransaksiDetail = 
                    transaksi.transaksi_id JOIN pembeli ON transaksi.id_UserBeli = pembeli.id_user JOIN barang ON transaksi_detail.id_BarangDetail = 
                    barang.id_barang WHERE transaksi.waktu_pembayaran != 'NULL' AND DATE(transaksi.waktu_pembayaran)='".$_GET['tanggal']."'"; // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
                
                  }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                    $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                    
                    echo '<b>Data Transaksi Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'';
                    echo '<a href="print.php?filter=2&bulan='.$_GET['bulan'].'&tahun='.$_GET['tahun'].'"<div class="position-absolute top-0 end-0">
                    <button type="button" class="btn btn-primary">Cetak PDF</button></a><br/>';
                    $query = "SELECT transaksi_detail.id_TransaksiDetail, transaksi.waktu_pembayaran, pembeli.nama, barang.nama_barang, 
                    transaksi_detail.jumlah, transaksi.grand_total FROM transaksi_detail JOIN transaksi 
                    ON transaksi_detail.id_TransaksiDetail = transaksi.transaksi_id JOIN pembeli ON transaksi.id_UserBeli = pembeli.id_user 
                    JOIN barang ON transaksi_detail.id_BarangDetail = barang.id_barang WHERE transaksi.waktu_pembayaran != 'NULL' AND MONTH(transaksi.waktu_pembayaran)='".$_GET['bulan']."' 
                    AND YEAR(transaksi.waktu_pembayaran)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
                
                  }else{ // Jika filter nya 3 (per tahun)
                    
                    echo '<b>Data Transaksi Tahun '.$_GET['tahun'].'</b>';
                    echo '<a href="print.php?filter=3&tahun='.$_GET['tahun'].'"<div class="position-absolute top-0 end-0">
                    <button type="button" class="btn btn-primary">Cetak PDF</button></a><br/>';
                    $query = "SELECT transaksi_detail.id_TransaksiDetail, transaksi.waktu_pembayaran, pembeli.nama, barang.nama_barang, 
                    transaksi_detail.jumlah, transaksi.grand_total FROM transaksi_detail JOIN transaksi 
                    ON transaksi_detail.id_TransaksiDetail = transaksi.transaksi_id JOIN pembeli ON transaksi.id_UserBeli = pembeli.id_user 
                    JOIN barang ON transaksi_detail.id_BarangDetail = barang.id_barang WHERE transaksi.waktu_pembayaran != 'NULL' AND YEAR(transaksi.waktu_pembayaran)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
                }

            }else{ // Jika user tidak mengklik tombol tampilkan
                echo '<b>Semua Data Transaksi</b>';
                echo '<a href="print.php"<div class="position-absolute top-0 end-0"><button type="button" class="btn btn-primary">Cetak PDF</button>
                </a><br/>';
                $query = "SELECT transaksi_detail.id_TransaksiDetail, transaksi.waktu_pembayaran, pembeli.nama, barang.nama_barang, 
                transaksi_detail.jumlah, transaksi.grand_total FROM transaksi_detail JOIN transaksi 
                ON transaksi_detail.id_TransaksiDetail = transaksi.transaksi_id JOIN pembeli ON transaksi.id_UserBeli = pembeli.id_user 
                JOIN barang ON transaksi_detail.id_BarangDetail = barang.id_barang WHERE transaksi.waktu_pembayaran != 'NULL' ORDER BY transaksi.waktu_pembayaran ASC"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
            }
            ?>
            </div>
          

          
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Transaksi ID</th>
                      <th>Waktu Pembayaran</th>
                      <th>Nama Pembeli</th>
                      <th>Nama Barang</th>
                      <th>Jumlah Barang</th>
                      <th>Total Harga</th>
                    </tr>
                  </thead>

            <?php
            $no = 1;
            $sql = mysqli_query($mysqli, $query); // Eksekusi/Jalankan query dari variabel $query
            $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
            if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                    $tgl = date('d-m-Y', strtotime($data['waktu_pembayaran'])); // Ubah format tanggal jadi dd-mm-yyyy
                    echo "<tr>";
                    echo "<td>".$no++."</td>";
                    echo "<td>".$data['id_TransaksiDetail']."</td>";
                    echo "<td>".$data['waktu_pembayaran']."</td>";
                    echo "<td>".$data['nama']."</td>";
                    echo "<td>".$data['nama_barang']."</td>";
                    echo "<td>".$data['jumlah']."</td>";
                    echo "<td>".$data['grand_total']."</td>";
                    echo "</tr>";
                }
            }else{ // Jika data tidak ada
                echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
            }
            ?>
            </table>
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
require 'plugin/html2pdf/autoload.php';
$pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('LAPORAN TRANSAKSI.pdf', 'D');
?>