<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>penjualan-Data Buku</title>
</head>

<body>
    <div class="row">
        <div class="col-md-8">
            <h3>Data Buku</h3>
            <?php
            $qjumlah = mysqli_query($koneksi, "SELECT * FROM tb_buku");
            $jumlah = mysqli_num_rows($qjumlah);
            ?>
            <a class="btn btn-sm btn-success" href="?menu=tambah_buku">Tambah Data</a>
            <button class="btn btn-sm btn-defrault">Jumlah Data <span class="badge"><?= $jumlah ?></span></button>
            <a class="btn btn-sm btn-primary" href="?menu=data_buku">refres / tampil all data</a>
        </div>
        <div class="col-md-4 col-md-offset-7">
            <form class="input-group" action="" method="post">
                <input type="text" name="inputan" class="form-control" placeholder="Cari Buku">
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
                <th>Judul</th>
                <th>Noisbn</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Stok</th>
                <th>Harga pokok</th>
                <th>Harga jual</th>
                <th>Ppn</th>
                <th>Diskon</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //paging
                $batas = 5;
                $hal = ceil($jumlah / $batas);
                $page = (isset($_GET['hal'])) ? $_GET['hal']:1;
                $posisi = ($page - 1) * $batas;
            //end paging
            $no = 1+$posisi;
            $inputan = $_POST['inputan'];
            if ($_POST['cari']) {
                if ($inputan == "") {
                    $q = mysqli_query($koneksi, "SELECT * FROM tb_buku limit $posisi,$batas");
                } else if ($inputan != "") {
                    // var_dump($inputan);
                    // die;
                    $q = mysqli_query($koneksi, "SELECT * FROM tb_buku WHERE judul LIKE '%$inputan%' OR noisbn LIKE '%$inputan%' OR penulis LIKE '%$inputan%' OR penerbit LIKE '%$inputan%' OR tahun LIKE '%$inputan%' OR stok LIKE '%$inputan%' OR harga_pokok LIKE '%$inputan%' OR harga_jual LIKE '%$inputan%' OR ppn LIKE '%$inputan%' OR diskon LIKE '%$inputan%'");
                }
            } else {
                $q = mysqli_query($koneksi, "SELECT * FROM tb_buku limit $posisi,$batas");
            }
            $cek = mysqli_num_rows($q);

            if ($cek < 1) {
                ?>
                <tr>
                    <td colspan="12">
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
                        <td><?= $data['noisbn']; ?></td>
                        <td><?= $data['penulis']; ?></td>
                        <td><?= $data['penerbit']; ?></td>
                        <td><?= $data['tahun']; ?></td>
                        <td><?= $data['stok']; ?></td>
                        <td>Rp. <?= $data['harga_pokok']; ?></td>
                        <td>Rp. <?= $data['harga_jual']; ?></td>
                        <td>Rp. <?= $data['ppn']; ?></td>
                        <td>Rp. <?= $data['diskon']; ?></td>
                        <td>
                            <a onclick="return confirm('Anda yakin akan menghapusnya?')" href="?menu=hapus_buku&id_buku=<?php echo $data['id_buku']; ?>"><span class=" glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                            |
                            <a href="?menu=edit_buku&id_buku=<?php echo $data['id_buku']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                            <br>
                            <a href="?menu=input_pemasukan&id_buku=<?php echo $data['id_buku']; ?>" class="btn btn-xs btn-info" title="Pasok Buku">Pasok</a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
    <nav class="pagination">
        <?php 
            for ($i=1; $i <=$hal; $i++){

            
        ?>
        <li <?php if ($page==$i) {
                echo "class='active'";
              } ?>><a href="?menu=data_buku&hal=<?= $i; ?>"><?= $i; ?></a></li>
        <?php 
        }
        ?>
    </nav>
</body>

</html>