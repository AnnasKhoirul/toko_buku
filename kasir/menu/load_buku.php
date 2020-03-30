<!DOCTYPE html>
    <head></head>
<body>
    <h1>Pilih Buku</h1>
        <br>
        <div class="col-md-6">
            <form action="" class="form-inline" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" name="carian" placeholder="cari buku...">
                    <span class="input-group-btn">
                        <input class="btn btn-info" type="submit" name="cari" value="cari">
                    </span>
                </div>
                <a class="btn btn-sm btn-success" href="?menu=load_buku">refresh / tampil all</a>
                <br>
            </form>
            <br>
            <table class="table table-bordered">
                <?php
                $inputan = $_POST['carian'];
                if ($_POST['cari']) {
                    if ($inputan == "") {
                        $buku = mysqli_query($koneksi, "SELECT * FROM tb_buku");
                    } else if ($inputan != "") {
                        $buku = mysqli_query($koneksi, "SELECT * FROM tb_buku WHERE judul LIKE '%$inputan%' OR noisbn LIKE '%$inputan%' OR penulis LIKE '%$inputan%' OR penerbit LIKE '%$inputan%'");
                    }
                } else {
                    // var_dump($_POST['cari']);
                    // die;
                    $buku = mysqli_query($koneksi, "SELECT * FROM tb_buku");
                }
                $cek = mysqli_num_rows($buku);
                if ($cek < 1) {
                    ?>
                    <tr>
                        <td>
                            <center>
                                Data yang anda cari tidak tersedia!
                                <a href="?menu=load_buku" class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span></a>
                            </center>
                        </td>
                    </tr>
                <?php
                }
                while ($data = mysqli_fetch_array($buku)) {
                    ?>
                    <tr>
                        <td><?= $data['judul'] ?></td>
                        <td><?= $data['stok'] ?></td>
                        <td>
                            <a href="?menu=input_penjualan&id_buku=<?= $data['id_buku'] ?>" class="btn btn-sm btn-block btn-warning">Pilih</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
</body>    
</html>