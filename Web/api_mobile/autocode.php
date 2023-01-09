<?php
require("koneksi.php");

if ($_SERVER['REQUEST_METHOD']==='POST') {
    $total = $_POST['grand_total'];
    $status = 'Belum Bayar';
    $Beli_idPembeli = $_POST['id_UserBeli'];
    // $sub = $_POST['sub_total'];
    // $jumlah = $_POST['jumlah'];
    // $idBarang = $_POST['id_BarangDetail'];
    $konek->autocommit(false);
    try {

    $queryKode = $konek->query("SELECT transaksi_id from transaksi ORDER BY waktu_transaksi DESC, transaksi_id DESC LIMIT 1");
                $maxKode = mysqli_fetch_row($queryKode);
                if ($maxKode == null) {
                    $kodeTransaksi = "M" . date("dmY") . "-0001";
                } else {
                    $kodeTransaksi = $maxKode[0];
                    $checkTanggal = substr($kodeTransaksi, 1, 8);
                    $checkNomor = (int) substr($kodeTransaksi, 10, 4);
                    $tanggalSekarang = date("dmY");
                    if ($checkTanggal == $tanggalSekarang) {
                        $checkNomor++;
                        $kodeAkhir = sprintf("%04s", $checkNomor);
                        $kodeTransaksi = "M" . $checkTanggal . "-" . $kodeAkhir;
                    } else {
                        $kodeTransaksi = "M" . date("dmY") . "-0001";
                    }
                }

                $parsingTanggal = date("Ymd");
                $konek->query("INSERT INTO transaksi (transaksi_id,waktu_transaksi,grand_total,status,id_UserBeli) VALUES('$kodeTransaksi', '$parsingTanggal', '$total', '$status', '$Beli_idPembeli')");

                // $konek->query("INSERT INTO transaksi_detail (sub_total,jumlah,id_BarangDetail,id_TransaksiDetail) VALUES('$sub', '$jumlah', '$idBarang', '$kodeTransaksi')");
                // $konek->query("DELETE FROM keranjang WHERE id_BarangKeranjang = '$idBarang' AND id_UserKeranjang='$Beli_idPembeli'");
                $response['pesan'] = "Data Telah Masuk";
                $response['kode'] = 1;
                $response['jumlah'] = ['transaksi_id' => $kodeTransaksi,
                
                'waktu_transaksi' => $parsingTanggal,
                'grand_total' => $total
            ];
                $konek->commit();
}catch (Exception $e) {
    $response['pesan'] = $e->getMessage();
    $response['kode'] = 0;
    $response['jumlah'] = null;
    $konek->rollback();
}
echo json_encode($response);
mysqli_close($konek);
}
?>