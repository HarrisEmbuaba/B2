</head>
<body>
    <h1>Laporan Transaksi</h1>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Transaksi ID</th>
                        <th>Waktu Transaksi</th>
                        <th>Waktu Pengambilan</th>
                        <th>Total</th>
                        <th>ID User</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include ('koneksi.php');
        
                    $no=1;
                    $sql = mysqli_query($mysqli, "SELECT * FROM transaksi");
                    while ($data=mysqli_fetch_array($sql)) {
                        $transaksi_id = $data['transaksi_id'];
                        $waktu_transaksi = $data['waktu_transaksi'];
                        $waktu_pengambilan = $data['waktu_pengambilan'];
                        $total = $data['total'];
                        $id_user = $data['id_user'];
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $transaksi_id; ?></td>
                        <td><?php echo $waktu_transaksi; ?></td>
                        <td><?php echo $waktu_pengambilan; ?></td>
                        <td><?php echo $total; ?></td>
                        <td><?php echo $id_user; ?></td>
                    </tr>
                <?php ; }?>
                </tbody>
                </table>

                <script type="text/javascript">
                    window.print();
                </script>
            </div>
        </div>