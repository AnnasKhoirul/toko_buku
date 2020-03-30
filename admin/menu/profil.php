<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User-Profil</title>
</head>

<body>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3>Informasi Tentang Anda</h3>
                </div>
                <div class="panel-body">
                    <table class="table" cellpadding="8" cellspacing="8">
                        <tr>
                            <th>Nama </th>
                            <td>:</td>
                            <td><?= $profil['nama'] ?></td>
                        </tr>
                        <tr>
                            <th>Alamat </th>
                            <td>:</td>
                            <td><?= $profil['alamat'] ?></td>
                        </tr>
                        <tr>
                            <th>Telepon </th>
                            <td>:</td>
                            <td><?= $profil['telepon'] ?></td>
                        </tr>
                    </table>
                    <a href="?menu=edit_profil" class="btn btn-sm btn-primary">Edit data saya</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3>Edit Username Atau Password</h3>
                </div>
                <div class="panel-body">
                    <fieldset>
                        <legend>Edit Username</legend>
                        <form action="" method="post">
                            <div class="input-group">
                                <span class="input-group-addon" id="user">User saat ini</span>
                                <input type="text" class="form-control" placeholder="Username" aria-describedby="user" value="<?= $profil['username'] ?>" readonly>
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon" id="user1">User baru</span>
                                <input type="text" name="userbaru" class="form-control" placeholder="Username" aria-describedby="user1">
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon" id="password">Password anda</span>
                                <input type="password" name="password" class="form-control" placeholder="Password saat ini" aria-describedby="password">
                            </div>
                            <br>
                            <input type="submit" name="edit_user" value="simpan" class="btn btn-sm btn-success">
                        </form>

                        <!-- fungsi edit username -->
                        <?php
                        if (isset($_POST['edit_user'])) {
                            $userbaru = $_POST['userbaru'];
                            $password = $_POST['password'];
                            if (md5($password) == $profil['password']) {
                                // var_dump($data['id_kasir']);
                                // die;
                                $q = mysqli_query($koneksi, "UPDATE tb_kasir SET username='$userbaru' WHERE id_kasir='$profil[id_kasir]'");
                                ?>
                                <script type="text/javascript">
                                    alert('Username anda berhasil diubah! Silahkan login kembali!');
                                    document.location.href = "../inc/keluar.php";
                                </script>
                        <?php
                            } else {
                                echo "tidak menjalankan fungsi edit";
                            }
                        }
                        ?>
                    </fieldset>
                    <fieldset>
                        <legend>Edit Password</legend>
                        <form action="" method="post">
                            <div class="input-group">
                                <span class="input-group-addon" id="p1">Password Baru</span>
                                <input type="password" name="password1" class="form-control" placeholder="Password Baru" aria-describedby="p1">
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon" id="p2">Ketik ulang password baru</span>
                                <input type="password" name="password2" class="form-control" placeholder="Ketik Ulang" aria-describedby="p2">
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon" id="p3">Password saat ini</span>
                                <input type="password" name="password_awal" class="form-control" placeholder="Password saat ini" aria-describedby="p3">
                            </div>
                            <br>
                            <input type="submit" name="edit_password" value="simpan" class="btn btn-sm btn-success">
                        </form>
                        <!-- fungsi edit password -->
                        ` <?php
                            if (isset($_POST['edit_password'])) {
                                $password1 = md5($_POST['password1']);
                                $password2 = md5($_POST['password2']);
                                $password = $_POST['password_awal'];
                                if ($password1 != $password2) {
                                    echo "password konfirmasi tidak cocok!";
                                } else {
                                    if (md5($password) == $profil['password']) {
                                        $q = mysqli_query($koneksi, "UPDATE tb_kasir SET password='$password1' WHERE id_kasir='$profil[id_kasir]'");
                                        ?>
                                    <script type="text/javascript">
                                        alert('Password anda berhasil diubah! Silahkan login kembali!');
                                        document.location.href = "../inc/keluar.php";
                                    </script>
                        <?php
                                } else {
                                    echo "Password anda salah!";
                                }
                            }
                        }
                        ?>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</body>

</html>