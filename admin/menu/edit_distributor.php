<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>penjualan-Edit Distributor</title>
</head>

<body>
    <?php
    $id = $_GET['id_distributor'];
    $q = mysqli_query($koneksi, "SELECT * FROM tb_distributor WHERE id_distributor='$id'");
    $data = mysqli_fetch_array($q);
    ?>
    <div class="row">
        <h3>Edit Distributor</h3>
        <table border="0" width="80%">

        </table>
        <div class="col-md-8">
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama distributor" value="<?= $data['nama_distributor'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" class="form-control" id="alamat" placeholder="Alamat distributor" required><?= $data['alamat'] ?></textarea>
                </div>

                <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input name="telepon" type="number" class="form-control" id="telepon" placeholder="Telepon distributor" value="<?= $data['telepon'] ?>" required>
                </div>
                <input name="fsimpan" type="submit" class="btn btn-sm btn-success" value="Simpan">
                <a class="btn btn-sm btn-danger" href="?menu=data_distributor">Batal</a>
            </form>
            <?php
            if (isset($_POST['fsimpan'])) {
                $nama = $_POST['nama'];
                $alamat = $_POST['alamat'];
                $telepon = $_POST['telepon'];

                $q = "UPDATE tb_distributor SET nama_distributor='$nama', alamat='$alamat', telepon='$telepon' WHERE id_distributor='$id'";
                // var_dump($q);
                // die;
                $qi = mysqli_query($koneksi, $q);
                ?>
                <script type="text/javascript">
                    alert('Berhasil merubah data distributor!');
                    document.location.href = "?menu=data_distributor";
                </script>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>