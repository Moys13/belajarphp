<?php
// Menghubungkan PHP ke MySql localhost
$conn = mysqli_connect("localhost", "root", "1234", "phpdasar");
// Membuat Function MySql Query dengan pengulangan While
function query($query)
{
    // Membuat agar variabel $conn menjadi globbal agar bisa kebaca di dalam function (Variabel Scope)
    global $conn;
    // Membuat variabel $result yaitu untuk mengambil data yang ada di database dengan mysqli_query
    $result = mysqli_query($conn, $query);
    // Variabel $rows adalah tempat untuk menyimpan array yang telah di ambil dalam database
    $rows = [];
    // Pengulangan While dan membuat variabel baru $row yang didalamnya mysqli_fetch_assoc yaitu untuk mengubah array dalam database tabel menjadi array associative
    while ($row = mysqli_fetch_assoc($result)) {
        // menambahkanb array pada variabel $rows dengan cara menyamakan array pada $row dan dilakukan secara berulang
        $rows[] = $row;
    }
    // mengembalikan nilai $rows
    return $rows;
};
