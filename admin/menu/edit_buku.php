<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>penjualan-Edit Pegawai</title>
</head>

<body>
    <?php
    $id = $_GET['id_buku'];
    $q = mysqli_query($koneksi, "SELECT * FROM tb_buku WHERE id_buku='$id'");
    $data = mysqli_fetch_array($q);
    ?>
    <div class="row">
        <h3>Edit Buku</h3>
        <table border="0" width="80%">

        </table>
        <!-- <div class="col-md-8"> -->
        <form action="" method="post">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input name="judul" type="text" class="form-control" id="judul" placeholder="Judul Buku" value="<?= $data['judul'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="noisbn">noisbn</label>
                    <input name="noisbn" type="number" class="form-control" id="noisbn" placeholder="noisbn Buku" value="<?= $data['noisbn'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="penulis">Penulis</label>
                    <input name="penulis" type="text" class="form-control" id="penilis" placeholder="Penulis Buku" value="<?= $data['penulis'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="penerbit">Penerbit</label>
                    <input name="penerbit" type="text" class="form-control" id="penilis" placeholder="Penerbit Buku" value="<?= $data['penerbit'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <input name="tahun" type="number" class="form-control" id="tahun" placeholder="Tahun" value="<?= $data['tahun'] ?>" required>
                </div>
                <input name="fsimpan" type="submit" class="btn btn-sm btn-success" value="Simpan">
                <a class="btn btn-sm btn-danger" href="?menu=data_buku">Batal</a>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input name="stok" type="number" class="form-control" id="stok" placeholder="Stok Buku" value="<?= $data['stok'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="harga_pokok">Harga pokok</label>
                    <input name="harga_pokok" type="text" class="form-control" id="harga_pokok" value="<?= $data['harga_pokok'] ?>" readonly required>
                </div>
                <div class="form-group">
                    <label for="harga_jual">Harga jual</label>
                    <input name="hargajual" type="number" class="form-control" id="harga_jual" placeholder="Harga jual Buku" value="<?= $data['harga_jual'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="ppn">PPN</label>
                    <input name="ppn" type="text" class="form-control" id="ppn" value="<?= $data['ppn'] ?>" readonly required>
                </div>
                <div class="form-group">
                    <label for="diskon">Diskon</label>
                    <input name="diskon" type="number" class="form-control" id="diskon" placeholder="Diskon" value="<?= $data['diskon'] ?>" required>
                </div>
            </div>
        </form>
        <?php
        if (isset($_POST['fsimpan'])) {
            $judul = $_POST['judul'];
            $noisbn = $_POST['noisbn'];
            $penulis = $_POST['penulis'];
            $penerbit = $_POST['penerbit'];
            $tahun = $_POST['tahun'];
            $stok = $_POST['stok'];

            $hargajual = $_POST['hargajual'];
            $jml_ppn = 0.1;
            $ppn = $hargajual * $jml_ppn;
            // echo $hargajual;

            $diskon = $_POST['diskon'];
            $harga_pokok = $hargajual + $ppn - $diskon;

            $q = "UPDATE tb_buku SET judul='$judul', noisbn='$noisbn', penulis='$penulis', penerbit='$penerbit', tahun='$tahun', stok='$stok', harga_pokok='$harga_pokok', harga_jual='$hargajual', ppn='$ppn', diskon='$diskon' WHERE id_buku='$id'";
            // var_dump($q);
            // die;
            $qi = mysqli_query($koneksi, $q);
            ?>
            <script type="text/javascript">
                alert('Berhasil merubah data buku!');
                document.location.href = "?menu=data_buku";
            </script>
        <?php
        }
        ?>
        <!-- </div> -->
    </div>
</body>

</html>