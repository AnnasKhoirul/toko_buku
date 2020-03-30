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
            $qjumlah = mysqli_query($koneksi, "SELECT * FROM tb_penjualan");
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
                <th>Buku</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Kasir</th>
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
                    $q = mysqli_query($koneksi, "SELECT tb_penjualan.*,tb_kasir.*,tb_buku.*
                    FROM tb_penjualan
                    INNER JOIN tb_kasir ON tb_kasir.id_kasir=tb_penjualan.id_kasir
                    INNER JOIN tb_buku ON tb_buku.id_buku=tb_penjualan.id_buku");
                } else if ($inputan != "") {
                    // var_dump($inputan);
                    // die;
                    $q = mysqli_query($koneksi, "SELECT tb_penjualan.*,tb_kasir.*,tb_buku.*
                    FROM tb_penjualan
                    INNER JOIN tb_kasir ON tb_kasir.id_kasir=tb_penjualan.id_kasir
                    INNER JOIN tb_buku ON tb_buku.id_buku=tb_penjualan.id_buku WHERE judul LIKE '%$inputan%' ");
                }
            } else {
                $q = mysqli_query($koneksi, "SELECT tb_penjualan.*,tb_kasir.*,tb_buku.*
                    FROM tb_penjualan
                    INNER JOIN tb_kasir ON tb_kasir.id_kasir=tb_penjualan.id_kasir
                    INNER JOIN tb_buku ON tb_buku.id_buku=tb_penjualan.id_buku");
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
                        <td><?= $data['judul']; ?></td>
                        <td><?= $data['jumlah']; ?></td>
                        <td>Rp.<?= $data['total']; ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['tanggal']; ?></td>
                        <td>
                            <a onclick="return confirm('Anda akan menghapusnya?')" 
                            href="?menu=hapus_penjualan&id_penjualan=<?php echo $data['id_penjualan']; ?>">
                            <span class=" glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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