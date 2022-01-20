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
    // mengecek gambar apakah di upload atau tidak. Didalam isi $gambar adalah nama file gambar yang di upload
    $gambar = upload();
    if (!$gambar) {
        return false;
    }
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
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    // membuat Variabel baru $query yang berisi query agar lebih mudah
    $query = "UPDATE teman SET nama = '$nama', umur = $umur, alamat = '$alamat', hobi = '$hobi', gambar = '$gambar' WHERE id = $id";
    // Menulis Query untuk menambah data pada data base
    mysqli_query($conn, $query);
    // mengembalikan nilai angka yang dimana jiga data tidak berhasil diisi/tidak berhasil di tambahkan ke dalam database akan mengembalikan nilai -1(gagal)
    return mysqli_affected_rows($conn);
}
function cari($keyword)
{
    $query = "SELECT * FROM teman WHERE 
                nama LIKE '%$keyword%' OR 
                umur LIKE '%$keyword%' OR 
                alamat LIKE '%$keyword%' OR 
                hobi LIKE '%$keyword%'";
    return query($query);
}
function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $tmpNama = $_FILES['gambar']['tmp_name'];
    $error = $_FILES['gambar']['error'];
    // mengecek apakah gambar telah di upload apa belum
    if ($error === 4) {
        echo "<script>
                alert('Upload gambar terlebih dahulu!');
                document.location.href = 'index.php';
            </script>";
        return false;
    }
    // mengecek apakah nama ekstensi file sesuai dengan ketentuan
    $ekstensinama = ['jpeg', 'png', 'jpg', 'gif'];
    // explode digunakan agar memecah string menjadi beberapa array. Contohnya di bawah saya memecah nama file sebelum titik dan sesudah titik
    $ekstensigambar = explode('.', $namaFile);
    // memilih string di belakang nya agar terpilih ekstensi file dan mengecilkan hurufnya secara paksa.
    $ekstensigambar = strtolower(end($ekstensigambar));
    if (!in_array($ekstensigambar, $ekstensinama)) {
        echo "<script>
                alert('Yang anda upload bukan gambar!');
                document.location.href = 'index.php';
            </script>";
        return false;
    }
    // memeriksa jika ukuran gambar melebihi 1mb / 1000000 bite 
    if ($ukuranFile > 1000000) {
        echo "<script>
                alert('Gambar yang anda upload melebihi 1mb!');
                document.location.href = 'index.php';
            </script>";
        return false;
    }
    // membuat nama gambar yang uniq jadi tidak akan sama dengan nama gambar yg lain
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensigambar;
    // memindahkan file gambar ke dalam directory/folder yang di tentukan.
    move_uploaded_file($tmpNama, 'img/' . $namaFileBaru);
    return $namaFileBaru;
}
