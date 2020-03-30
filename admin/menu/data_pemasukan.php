<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Riwayat Pemasukan Buku</title>
</head>

<body>
    <div class="row">
        <div class="col-md-8">
            <h3>Data Pegawai</h3>
            <?php
            $qjumlah = mysqli_query($koneksi, "SELECT * FROM tb_pasok");
            $jumlah = mysqli_num_rows($qjumlah);
            ?>
            <button class="btn btn-sm btn-defrault">Jumlah Data <span class="badge"><?= $jumlah ?></span></button>
            <a class="btn btn-sm btn-primary" href="?menu=data_pemasukan">refres / tampil all data</a>
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
                <th>Nama Distributor</th>
                <th>Judul Buku</th>
                <th>Jumlah</th>
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
                    $q = mysqli_query($koneksi, "SELECT tb_pasok.*, tb_distributor.*, tb_buku.* FROM `tb_pasok` INNER JOIN tb_distributor ON tb_distributor.id_distributor=tb_pasok.id_distributor INNER JOIN tb_buku ON tb_buku.id_buku=tb_pasok.id_buku");
                } else if ($inputan != "") {
                    // var_dump($inputan);
                    // die;
                    $q = mysqli_query($koneksi, "SELECT tb_pasok.*, tb_distributor.*, tb_buku.* FROM `tb_pasok` INNER JOIN tb_distributor ON tb_distributor.id_distributor=tb_pasok.id_distributor INNER JOIN tb_buku ON tb_buku.id_buku=tb_pasok.id_buku WHERE nama_distributor LIKE '%$inputan%' OR judul LIKE '%$inputan%' OR jumlah LIKE '%$inputan%'");
                }
            } else {
                $q = mysqli_query($koneksi, "SELECT tb_pasok.*, tb_distributor.*, tb_buku.* FROM `tb_pasok` INNER JOIN tb_distributor ON tb_distributor.id_distributor=tb_pasok.id_distributor INNER JOIN tb_buku ON tb_buku.id_buku=tb_pasok.id_buku");
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
                        <td><?= $data['nama_distributor']; ?></td>
                        <td><?= $data['judul']; ?></td>
                        <td><?= $data['jumlah']; ?></td>
                        <td><?= $data['tanggal']; ?></td>
                        <td>
                            <a onclick="return confirm('Anda yakin akan menghapusnya?')" href="?menu=hapus_pasok&id_pasok=<?php echo $data['id_pasok']; ?>"><span class=" glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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