<?php
$koneksi = mysqli_connect("localhost", "root", "", "surweekly");

function tampildata($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query); /// di depan $result itu ada object result yang berisi data dari query
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambahdata($data, $files)
{
    global $koneksi;
    $nama = htmlspecialchars($data['nama']);
    $nim = htmlspecialchars($data['nim']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $email = htmlspecialchars($data['email']);
    $no_hp = htmlspecialchars($data['no_hp']);
    $namafoto = htmlspecialchars($files['name']);
    $tmpfoto = $files['tmp_name'];
    $path = "assets/images/" . $namafoto;

    if (move_uploaded_file($tmpfoto, $path)) {
        // File uploaded successfully
    }
    $query = "INSERT INTO mahasiswa (nama, nim, jurusan, email, no_hp, foto) VALUES ('$nama', '$nim', '$jurusan', '$email', '$no_hp', '$namafoto')";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi); /// mengembalikan nilai 1 jika query berhasil dijalankan, dan -1 jika query gagal dijalankan
}

function deletedata($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = $id");
    mysqli_query($koneksi, "ALTER TABLE mahasiswa AUTO_INCREMENT = 1");

    return mysqli_affected_rows($koneksi);
}

function editdata($data, $files)
{
    global $koneksi;
    $id = $data['id'];
    $nama = htmlspecialchars($data['nama']);
    $nim = htmlspecialchars($data['nim']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $email = htmlspecialchars($data['email']);
    $no_hp = htmlspecialchars($data['no_hp']);
    $namafoto = htmlspecialchars($files['name']);
    $tmpfoto = $files['tmp_name'];
    $path = "assets/images/" . $namafoto;
    if ($files['error'] == 4) {
        $namafoto = $data['foto_lama'];
    } else {
        $namafoto = $files['name'];
        $tmpfoto = $files['tmp_name'];
        move_uploaded_file($tmpfoto, "assets/images/" . $namafoto);
    }

    $query = "UPDATE mahasiswa SET nama='$nama', nim='$nim', jurusan='$jurusan', email='$email', no_hp='$no_hp', foto='$namafoto' WHERE id=$id";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
