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
