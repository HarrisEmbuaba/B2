<style>
    #judul{
        text-align:center;
        font-size:14pt;
        font-weight:bold;
        margin-bottom:20px;
    }
    table{
        border-collapse:collapse;
    }
    th{
        padding:15px;
        text-align:center;
    }
    td{
        padding-left:5px;
        padding-right:5px;
    }
</style>

</head>
<body>
    <div id="judul">LAPORAN TRANSAKSI</div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <table border="1" align="center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Transaksi ID</th>
                    <th>Waktu Transaksi</th>
                    <th>Nama Pembeli</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include ('koneksi.php');
        
                    $no=1;
                    $sql = mysqli_query($mysqli, "SELECT transaksi.transaksi_id, transaksi.waktu_transaksi, pembeli.nama, transaksi.total  FROM transaksi JOIN pembeli ON transaksi.id_user = pembeli.id_user");
                    while ($data=mysqli_fetch_array($sql)) {
                    $transaksi_id = $data['transaksi_id'];
                    $waktu_transaksi = $data['waktu_transaksi'];
                    $total = $data['total'];
                    $nama = $data['nama'];
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $transaksi_id; ?></td>
                    <td><?php echo $waktu_transaksi; ?></td>
                    <td><?php echo $nama; ?></td>
                    <td><?php echo $total; ?></td>
                </tr>
                <?php ; }?>
            </tbody>
        </table>

                <script type="text/javascript">
                    window.print();
                    
                </script>
            </div>
        </div>