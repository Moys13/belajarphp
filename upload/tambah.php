<?php

require 'function.php';


if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert('Data Berhasil di tambahkan!');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Gagal di tambahkan!');
            document.location.href = 'index.php';
        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah</title>
</head>

<body>
    <h1>Masukan data untuk di tambahkan!</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="nama">Nama</label></td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama" required></td>
            </tr>
            <tr>
                <td><label for="umur">Umur</label></td>
                <td>:</td>
                <td><input type="text" name="umur" id="umur" required></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat</label></td>
                <td>:</td>
                <td><input type="text" name="alamat" id="alamat" required></td>
            </tr>
            <tr>
                <td><label for="hobi">Hobi</label></td>
                <td>:</td>
                <td><input type="text" name="hobi" id="hobi" required></td>
            </tr>
            <tr>
                <td><label for="gambar">Gambar</label></td>
                <td>:</td>
                <td><input type="file" name="gambar" id="gambar" required></td>
            </tr>
            <tr>
                <td colspan="3"><button type="reset" name="reset">RESET</button></td>
                <td><button type="submit" name="submit">SIMPAN</button></td>
            </tr>
        </table>
    </form>
</body>

</html>