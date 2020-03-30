<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>penjualan-Tambah Distributor</title>
</head>

<body>
    <div class="row">
        <h3>Tambah Distributor</h3>
        <table border="0" width="80%">

        </table>
        <div class="col-md-8">
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama Ditributor" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" class="form-control" id="alamat" placeholder="Alamat Ditributor" required></textarea>
                </div>

                <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input name="telepon" type="number" class="form-control" id="telepon" placeholder="Telepon Ditributor" required>
                </div>
                <input name="fsimpan" type="submit" class="btn btn-sm btn-success" value="Simpan">
                <a class="btn btn-sm btn-danger" href="?menu=data_distributor">Batal</a>
            </form>
            <?php
            if (isset($_POST['fsimpan'])) {
                $nama = $_POST['nama'];
                $alamat = $_POST['alamat'];
                $telepon = $_POST['telepon'];

                $q = "INSERT INTO tb_distributor (nama_distributor, alamat, telepon) VALUES ('$nama', '$alamat', '$telepon')";
                // var_dump($q);
                // die;
                $qi = mysqli_query($koneksi, $q);
                ?>
                <script type="text/javascript">
                    alert('Berhasil menambah distributor!');
                    document.location.href = "?menu=data_distributor";
                </script>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>