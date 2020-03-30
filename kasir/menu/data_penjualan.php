<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Penjualan</title>
</head>

<body>
    <div class="row">
        <div class="col-md-8">
            <h3>Data Penjualan</h3>
            <?php
            $qjumlah = mysqli_query($koneksi, "SELECT * FROM tb_jual");
            $jumlah = mysqli_num_rows($qjumlah);
            ?>
            <button class="btn btn-sm btn-defrault">Jumlah Data <span class="badge"><?= $jumlah ?></span></button>
            <a class="btn btn-sm btn-primary" href="?menu=data_penjualan">refresh / tampil all data</a>
        </div>
        <div class="col-md-4 col-md-offset-7">
            <form class="input-group" action="" method="post">
                <input type="text" name="inputan" class="form-control" placeholder="Cari pegawai">
                <span class="input-group-btn">
                    <input name="cari" class="btn btn-default" type="submit" value="cari">
                </span>
            </form>
        </div>
    </div>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kasir</th>
                <th>Total</th>
                <th>Uang Pembeli</th>
                <th>Uang Kembali</th>
                <th>Tanggal</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $inputan = $_POST['inputan'];
            if ($_POST['cari']) {
                if ($inputan == "") {
                    $q = mysqli_query($koneksi, "SELECT tb_jual.*,tb_kasir.*
                    FROM tb_jual
                    INNER JOIN tb_kasir ON tb_kasir.id_kasir=tb_jual.id_kasir");
                } else if ($inputan != "") {
                    // var_dump($inputan);
                    // die;
                    $q = mysqli_query($koneksi, "SELECT tb_jual.*,tb_kasir.*
                    FROM tb_jual
                    INNER JOIN tb_kasir ON tb_kasir.id_kasir=tb_jual.id_kasir WHERE nama LIKE '%$inputan%' ");
                }
            } else {
                $q = mysqli_query($koneksi, "SELECT tb_jual.*,tb_kasir.*
                FROM tb_jual
                INNER JOIN tb_kasir ON tb_kasir.id_kasir=tb_jual.id_kasir");
            }
            $cek = mysqli_num_rows($q);

            if ($cek < 1) {
                ?>
                <tr>
                    <td colspan="7">
                        <center>
                            Data yang anda cari tidak tersedia!
                            <a href="" class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span></a>
                        </center>
                    </td>
                </tr>
                <?php
                } else {

                    while ($data = mysqli_fetch_array($q)) {
                        ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['total']; ?></td>
                        <td>Rp.<?= $data['uang']; ?></td>
                        <td><?= $data['kembali']; ?></td>
                        <td><?= $data['tanggal']; ?></td>
                        <td>
                            <a class="btn btn-success" href="?menu=detail&id_jual=<?php echo $data['id_jual']?>">detail</a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>