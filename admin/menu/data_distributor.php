<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>penjualan-Data Distributor</title>
</head>

<body>
    <div class="row">
        <div class="col-md-8">
            <h3>Data Ditributor</h3>
            <?php
            $qjumlah = mysqli_query($koneksi, "SELECT * FROM tb_distributor");
            $jumlah = mysqli_num_rows($qjumlah);
            ?>
            <a class="btn btn-sm btn-success" href="?menu=tambah_distributor">Tambah Data</a>
            <button class="btn btn-sm btn-defrault">Jumlah Data <span class="badge"><?= $jumlah ?></span></button>
        </div>
        <div class="col-md-4 col-md-offset-7">
            <form class="input-group" action="" method="post">
                <input type="text" name="inputan" class="form-control" placeholder="Cari Distributor">
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
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $inputan = $_POST['inputan'];
            if ($_POST['cari']) {
                if ($inputan == "") {
                    $q = mysqli_query($koneksi, "SELECT * FROM tb_distributor");
                } else if ($inputan != "") {
                    // var_dump($inputan);
                    // die;
                    $q = mysqli_query($koneksi, "SELECT * FROM tb_distributor WHERE nama_distributor LIKE '%$inputan%' OR alamat LIKE '%$inputan%' OR telepon LIKE '%$inputan%'");
                }
            } else {
                $q = mysqli_query($koneksi, "SELECT * FROM tb_distributor");
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
                        <td><?= $data['alamat']; ?></td>
                        <td><?= $data['telepon']; ?></td>
                        <td>
                            <a onclick="return confirm('Anda yakin akan menghapusnya?')" href="?menu=hapus_distributor&id_distributor=<?php echo $data['id_distributor']; ?>"><span class=" glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                            |
                            <a href="?menu=edit_distributor&id_distributor=<?php echo $data['id_distributor']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
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