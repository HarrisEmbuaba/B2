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
          include "koneksi.php";
            if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
                $filter = $_GET['filter']; // Ambil data filder yang dipilih user
                if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                    $tgl = date('d-m-y', strtotime($_GET['tanggal']));
                    
                    echo '<b>Data Transaksi Tanggal '.$tgl.'</b><br />';
                    echo '<a href="print.php?filter=1&tanggal='.$_GET['tanggal'].'"></a><br /><br />';
                    $query = "SELECT transaksi.transaksi_id, transaksi.waktu_transaksi, pembeli.nama, barang.nama_barang, transaksi.pembayaran, transaksi.total  FROM transaksi JOIN pembeli ON transaksi.id_user = pembeli.id_user JOIN barang ON transaksi.id_barang = barang.id_barang WHERE DATE(transaksi.waktu_transaksi)='".$_GET['tanggal']."'"; // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
                
                  }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                    $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                    
                    echo '<b>Data Transaksi Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'</b><br />';
                    echo '<a href="print.php?filter=2&bulan='.$_GET['bulan'].'&tahun='.$_GET['tahun'].'"></a><br /><br />';
                    $query = "SELECT transaksi.transaksi_id, transaksi.waktu_transaksi, pembeli.nama, barang.nama_barang, transaksi.pembayaran, transaksi.total  FROM transaksi JOIN pembeli ON transaksi.id_user = pembeli.id_user JOIN barang ON transaksi.id_barang = barang.id_barang WHERE MONTH(transaksi.waktu_transaksi)='".$_GET['bulan']."' AND YEAR(transaksi.waktu_transaksi)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
                
                  }else{ // Jika filter nya 3 (per tahun)
                    
                    echo '<b>Data Transaksi Tahun '.$_GET['tahun'].'</b><br />';
                    echo '<a href="print.php?filter=3&tahun='.$_GET['tahun'].'"></a><br /><br />';
                    $query = "SELECT transaksi.transaksi_id, transaksi.waktu_transaksi, pembeli.nama, barang.nama_barang, transaksi.pembayaran, transaksi.total  FROM transaksi JOIN pembeli ON transaksi.id_user = pembeli.id_user JOIN barang ON transaksi.id_barang = barang.id_barang WHERE YEAR(transaksi.waktu_transaksi)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
                }
            }else{ // Jika user tidak mengklik tombol tampilkan
                echo '<b>Semua Data Transaksi</b><br /><br />';
                echo '<a href="print.php">Cetak PDF</a><br /><br />';
                $query = "SELECT transaksi.transaksi_id, transaksi.waktu_transaksi, pembeli.nama, barang.nama_barang, transaksi.pembayaran, transaksi.total  FROM transaksi JOIN pembeli ON transaksi.id_user = pembeli.id_user JOIN barang ON transaksi.id_barang = barang.id_barang ORDER BY transaksi.waktu_transaksi ASC"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
            }
            ?>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Transaksi ID</th>
                <th>Waktu Transaksi</th>
                <th>Nama Pembeli</th>
                <th>Nama Barang</th>
                <th>Pembayaran</th>
                <th>Total</th>
              </tr>
            </thead>
            <?php
            $no = 1;
            $sql = mysqli_query($mysqli, $query); // Eksekusi/Jalankan query dari variabel $query
            $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
            if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                    $tgl = date('d-m-Y', strtotime($data['waktu_transaksi'])); // Ubah format tanggal jadi dd-mm-yyyy
                    echo "<tr>";
                    echo "<td>".$no++."</td>";
                    echo "<td>".$data['transaksi_id']."</td>";
                    echo "<td>".$data['waktu_transaksi']."</td>";
                    echo "<td>".$data['nama']."</td>";
                    echo "<td>".$data['nama_barang']."</td>";
                    echo "<td>".$data['pembayaran']."</td>";
                    echo "<td>".$data['total']."</td>";
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