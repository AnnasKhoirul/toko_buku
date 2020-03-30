<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>penjualan-Input Pemasukan</title>
</head>

<body>
    <?php
    $id = $_GET['id_buku'];
    $q = mysqli_query($koneksi, "SELECT * FROM tb_buku WHERE id_buku='$id'");
    $data = mysqli_fetch_array($q);
    ?>
    <div class="row">
        <h3>Input Pemasukan Buku</h3>
        <table border="0" width="80%">

        </table>
        <!-- <div class="col-md-8"> -->
        <form action="" method="post">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="buku">Buku</label>
                    <input name="buku" type="text" class="form-control" id="buku" placeholder="buku Buku" value="<?= $data['judul'] ?>" readonly required>
                </div>
                <div class="form-group">
                    <?php
                    $id = $_GET['id_buku'];
                    $q = mysqli_query($koneksi, "SELECT * FROM tb_distributor");
                    // $data = mysqli_fetch_array($q);
                    ?>
                    <label for="status">Status User</label>
                    <select name="id_distributor" class="form-control" id="status">
                        <?php
                        foreach ($q as $key => $value) {
                            ?>
                            <option class="form-control" value="<?= $value['id_distributor'] ?>"><?= $value['nama_distributor'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="stok">Stok awal buku</label>
                    <input name="stok" type="number" class="form-control" id="stok" placeholder="stok Buku" value="<?= $data['stok'] ?>" readonly required>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah Pemasuk</label>
                    <input name="jumlah" type="number" class="form-control" id="penulis" placeholder="jumlah Pemasukan" required>
                </div>
                <div class="form-group">
                    <label for="tanggal">tanggal</label>
                    <input name="tanggal" type="text" class="form-control" id="tanggal" placeholder="tanggal" value="<?= date('d-m-Y'); ?>" readonly required>
                </div>
                <input name="fsimpan" type="submit" class="btn btn-sm btn-success" value="Simpan">
                <a class="btn btn-sm btn-danger" href="?menu=data_buku">Batal</a>
            </div>
        </form>
        <?php
        if (isset($_POST['fsimpan'])) {
            $id_distributor = $_POST['id_distributor'];
            $jumlah = $_POST['jumlah'];
            $tanggal = $_POST['tanggal'];
            $stokupdate = $jumlah + $data['stok'];

            $q = "INSERT INTO tb_pasok (id_distributor, id_buku, jumlah, tanggal) VALUES ('$id_distributor', '$id', '$jumlah', '$tanggal')";
            mysqli_query($koneksi, $q);
            mysqli_query($koneksi, "UPDATE tb_buku SET stok='$stokupdate' WHERE id_buku='$id'");
            ?>
            <script type="text/javascript">
                alert('Berhasil input pemasukan!');
                document.location.href = "?menu=data_buku";
            </script>
        <?php
        }
        ?>
        <!-- </div> -->
    </div>
</body>

</html>