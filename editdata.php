<?php
require 'fungsi.php';

$id = $_GET['id'];
$query = "SELECT * FROM mahasiswa WHERE id = $id";
$mhs = tampildata($query)[0]; /// mengambil data mahasiswa berdasarkan id yang dikirim melalui URL dan mengambil data pertama dari hasil query

if (isset($_POST['submit'])) {
    if (editdata($_POST, $id) > 0) {
        echo "<script>
                alert('Data berhasil diubah!');
                window.location.href = 'mahasiswa.php';
            </script>";
    } else {
        echo "<script>
                alert('Data gagal diubah!');
                window.location.href = 'mahasiswa.php';
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>

<body>
    <h2>Edit Data Mahasiswa</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $mhs['id']; ?>">
        <table>
            <tr>
                <td><label for="nama">Nama</label></td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama" required value="<?= $mhs['nama'] ?>"></td>
            </tr>
            <tr>
                <td><label for="nim">NIM</label></td>
                <td>:</td>
                <td><input type="text" name="nim" id="nim" required value="<?= $mhs['nim'] ?>"></td>
            </tr>
            <tr>
                <td><label for="jurusan">Jurusan</label></td>
                <td>:</td>
                <td><input type="text" name="jurusan" id="jurusan" required value="<?= $mhs['jurusan'] ?>"></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td>:</td>
                <td><input type="email" name="email" id="email" required value="<?= $mhs['email'] ?>">
                </td>
            </tr>
            <tr>
                <td><label for="no_hp">Nomor HP</label></td>
                <td>:</td>
                <td><input type="tel" name="no_hp" id="no_hp" required value="<?= $mhs['no_hp'] ?>"></td>
            </tr>
            <tr>
                <td><label for="foto">Foto</label></td>
                <td>:</td>
                <td><input type="file" name="foto" id="foto"></td>
            </tr>
            </td>
            </tr>
            <tr>
                <td colspan="3">
                    <button type="submit" name="submit">Ubah Data</button>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>