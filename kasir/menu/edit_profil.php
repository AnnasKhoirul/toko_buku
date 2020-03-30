<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User-Edit Profil</title>
</head>

<body>
    <div class="row">
        <h3>Rubah Informasi Tentang Anda</h3>
        <div class="col-md-8">
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input name="nama" type="text" class="form-control" id="nama" value="<?= $profil['nama'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" class="form-control" id="alamat" required><?= $profil['alamat'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input name="telepon" type="number" class="form-control" id="telepon" value="<?= $profil['telepon'] ?>" required>
                </div>
                <input type="submit" name="edit_profil" class="btn btn-sm btn-success" value="Simpan">
                <a class="btn btn-sm btn-danger" href="?menu=profil">Batal</a>
            </form>
            <?php
            if (isset($_POST['edit_profil'])) {
                $nama = $_POST['nama'];
                $alamat = $_POST['alamat'];
                $telepon = $_POST['telepon'];
                mysqli_query($koneksi, "UPDATE tb_kasir SET nama='$nama', alamat='$alamat', telepon='$telepon' WHERE id_kasir='$profil[id_kasir]'");
                ?>
                <script type="text/javascript">
                    alert('Perubahan telah tersimpan!');
                    document.location.href = "?menu=profil";
                </script>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>