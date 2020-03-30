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
    $id = $_GET['id_pegawai'];
    $q = mysqli_query($koneksi, "SELECT * FROM tb_kasir WHERE id_kasir='$id'");
    $data = mysqli_fetch_array($q);
    ?>
    <div class="row">
        <h3>Edit Pegawai</h3>
        <table border="0" width="80%">

        </table>
        <div class="col-md-8">
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama Pegawai" value="<?= $data['nama'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" class="form-control" id="alamat" placeholder="Alamat Pegawai" required><?= $data['alamat'] ?></textarea>
                </div>

                <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input name="telepon" type="number" class="form-control" id="telepon" placeholder="Telepon Pegawai" value="<?= $data['telepon'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="status">Status User</label>
                    <select name="status" class="form-control" id="status">
                        <option class="form-control" value="aktif" <?php if ($data['status'] == "aktif") {
                                                                        echo "selected";
                                                                    } ?>>Aktif</option>
                        <option class="form-control" value="nonaktif" <?php if ($data['status'] == "nonaktif") {
                                                                            echo "selected";
                                                                        } ?>>Tidak Aktif</option>
                    </select>
                </div>
                <input name="fsimpan" type="submit" class="btn btn-sm btn-success" value="Simpan">
                <a class="btn btn-sm btn-danger" href="?menu=data_pegawai">Batal</a>
            </form>
            <?php
            if (isset($_POST['fsimpan'])) {
                $nama = $_POST['nama'];
                $alamat = $_POST['alamat'];
                $telepon = $_POST['telepon'];
                $status = $_POST['status'];

                $q = "UPDATE tb_kasir SET nama='$nama', alamat='$alamat', telepon='$telepon', status='$status' WHERE id_kasir='$id'";
                // var_dump($q);
                // die;
                $qi = mysqli_query($koneksi, $q);
                ?>
                <script type="text/javascript">
                    alert('Berhasil merubah data pegawai!');
                    document.location.href = "?menu=data_pegawai";
                </script>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>