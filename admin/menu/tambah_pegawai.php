<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>penjualan-Tambah Pegawai</title>
</head>

<body>
    <div class="row">
        <h3>Tambah Pegawai</h3>
        <table border="0" width="80%">

        </table>
        <div class="col-md-8">
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama Pegawai" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" class="form-control" id="alamat" placeholder="Alamat Pegawai" required></textarea>
                </div>

                <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input name="telepon" type="number" class="form-control" id="telepon" placeholder="Telepon Pegawai" required>
                </div>
                <div class="form-group">
                    <label for="status">Status User</label>
                    <select name="status" class="form-control" id="status">
                        <option class="form-control" value="aktif">Aktif</option>
                        <option class="form-control" value="nonaktif">Tidak Aktif</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="username">Username untuk pegawai</label>
                    <input name="username" type="text" class="form-control" id="username" placeholder="Username untuk Pegawai" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
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
                $username = $_POST['username'];
                $password = md5($_POST['password']);
                $akses = "kasir";

                $q = "INSERT INTO tb_kasir(nama, alamat, telepon, status, username, password, akses) VALUES ('$nama', '$alamat', '$telepon', '$status', '$username', '$password', '$akses')";
                // var_dump($q);
                // die;
                $qi = mysqli_query($koneksi, $q);
                ?>
                <script type="text/javascript">
                    alert('Berhasil menambah pegawai!');
                    document.location.href = "?menu=data_pegawai";
                </script>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>