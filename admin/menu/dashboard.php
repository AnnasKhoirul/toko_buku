<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Penjualan-Dashboard</title>
</head>

<body>
    <h4>Selamat datang si ADMIN</h4>
    <h2>Aplikasi TOKO BUKU</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">Data Pegawai</div>
                <div class="panel-body">
                    <center>
                        <h3>
                            <span class="glyphicon glyphicon-user"></span>
                            <?php
                            $qpeg = mysqli_query($koneksi, "SELECT * FROM tb_kasir");
                            $jumlah = mysqli_num_rows($qpeg);
                            echo $jumlah;
                            ?>
                        </h3>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">Data Penjualan</div>
                <div class="panel-body">
                    <center>
                        <h3>
                            <span class="glyphicon glyphicon-export"></span>
                            <?php
                            $qpnj = mysqli_query($koneksi, "SELECT * FROM tb_penjualan");
                            $jm_pnj = mysqli_num_rows($qpnj);
                            echo $jm_pnj;
                            ?>
                        </h3>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">Data Distributor</div>
                <div class="panel-body">
                    <center>
                        <h3>
                            <span class="glyphicon glyphicon-user"></span>
                            <?php
                            $qdis = mysqli_query($koneksi, "SELECT * FROM tb_distributor");
                            $jm_dis = mysqli_num_rows($qdis);
                            echo $jm_dis;
                            ?>
                        </h3>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">Data Buku</div>
                <div class="panel-body">
                    <center>
                        <h3>
                            <span class="glyphicon glyphicon-book"></span>
                            <?php
                            $qbuku = mysqli_query($koneksi, "SELECT * FROM tb_buku");
                            $jm_buku = mysqli_num_rows($qbuku);
                            echo $jm_buku;
                            ?>
                        </h3>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">Data Riwayat</div>
                <div class="panel-body">
                    <center>
                        <h3>
                            <span class="glyphicon glyphicon-import"></span>
                            <?php
                            $qpasok = mysqli_query($koneksi, "SELECT * FROM tb_pasok");
                            $jm_pasok = mysqli_num_rows($qpasok);
                            echo $jm_pasok;
                            ?>
                        </h3>
                    </center>
                </div>
            </div>
        </div>
    </div>
</body>

</html>