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

function tambah($data)
{
    global $conn;
    // M<engambil semua data dari $_POST dan memasukannya ke variabel bari $data agar lebih mudah untuk menulis query
    $nama = htmlspecialchars($data["nama"]);
    $umur = htmlspecialchars($data["umur"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $hobi = htmlspecialchars($data["hobi"]);
    $gambar = htmlspecialchars($data["gambar"]);
    // membuat Variabel baru $query yang berisi query agar lebih mudah
    $query = "INSERT INTO teman VALUES (NULL, '$nama', $umur, '$alamat', '$hobi', '$gambar')";
    // Menulis Query untuk menambah data pada data base
    mysqli_query($conn, $query);
    // mengembalikan nilai angka yang dimana jiga data tidak berhasil diisi/tidak berhasil di tambahkan ke dalam database akan mengembalikan nilai -1(gagal)
    return mysqli_affected_rows($conn);
};

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM teman WHERE id = $id");
    return mysqli_affected_rows($conn);
};

function ubah($data)
{
    global $conn;
    // M<engambil semua data dari $_POST dan memasukannya ke variabel bari $data agar lebih mudah untuk menulis query
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $umur = htmlspecialchars($data["umur"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $hobi = htmlspecialchars($data["hobi"]);
    $gambar = htmlspecialchars($data["gambar"]);
    // membuat Variabel baru $query yang berisi query agar lebih mudah
    $query = "UPDATE teman SET nama = '$nama', umur = $umur, alamat = '$alamat', hobi = '$hobi', gambar = '$gambar' WHERE id = $id";
    // Menulis Query untuk menambah data pada data base
    mysqli_query($conn, $query);
    // mengembalikan nilai angka yang dimana jiga data tidak berhasil diisi/tidak berhasil di tambahkan ke dalam database akan mengembalikan nilai -1(gagal)
    return mysqli_affected_rows($conn);
}
