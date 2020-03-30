<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>penjualan-Tambah Buku</title>
</head>

<body>
    <div class="row">
        <h3>Tambah Buku</h3>
        <table border="0" width="80%">

        </table>
        <!-- <div class="col-md-8"> -->
        <form action="" method="post">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input name="judul" type="text" class="form-control" id="judul" placeholder="Judul Buku" required>
                </div>
                <div class="form-group">
                    <label for="noisbn">noisbn</label>
                    <input name="noisbn" type="number" class="form-control" id="noisbn" placeholder="noisbn Buku" required>
                </div>

                <div class="form-group">
                    <label for="penulis">Penulis</label>
                    <input name="penulis" type="text" class="form-control" id="penilis" placeholder="Penulis Buku" required>
                </div>
                <div class="form-group">
                    <label for="penerbit">Penerbit</label>
                    <input name="penerbit" type="text" class="form-control" id="penilis" placeholder="Penerbit Buku" required>
                </div>
                <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <input name="tahun" type="number" class="form-control" id="tahun" placeholder="Tahun" required>
                </div>
                <input name="fsimpan" type="submit" class="btn btn-sm btn-success" value="Simpan">
                <a class="btn btn-sm btn-danger" href="?menu=data_buku">Batal</a>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input name="stok" type="number" class="form-control" id="stok" placeholder="Stok Buku" required>
                </div>
                <div class="form-group">
                    <label for="harga_pokok">Harga pokok</label>
                    <input name="harga_pokok" type="text" class="form-control" id="harga_pokok" value="Harga pokok dihitung otomatis" readonly required>
                </div>
                <div class="form-group">
                    <label for="harga_jual">Harga jual</label>
                    <input name="hargajual" type="number" class="form-control" id="harga_jual" placeholder="Harga jual Buku" required>
                </div>
                <div class="form-group">
                    <label for="ppn">PPN</label>
                    <input name="ppn" type="text" class="form-control" id="ppn" value="PPN dihitung otomatis 10% dari harga jual" readonly required>
                </div>
                <div class="form-group">
                    <label for="diskon">Diskon</label>
                    <input name="diskon" type="number" class="form-control" id="diskon" placeholder="Diskon" required>
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

            $q = "INSERT INTO tb_buku(judul, noisbn, penulis, penerbit, tahun, stok, harga_pokok, harga_jual, ppn, diskon)VALUES('$judul', '$noisbn', '$penulis', '$penerbit', '$tahun', '$stok', '$harga_pokok', '$hargajual', '$ppn', '$diskon')";
            // var_dump($q);
            // die;
            $qi = mysqli_query($koneksi, $q);
            ?>
            <script type="text/javascript">
                alert('Berhasil menambah buku!');
                document.location.href = "?menu=data_buku";
            </script>
        <?php
        }
        ?>
        <!-- </div> -->
    </div>
</body>

</html>