<?php

require 'function.php';

$id = $_GET["id"];
$tmn = query("SELECT * FROM teman WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        echo "
        <script>
            alert('Data Berhasil di ubah!');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Gagal di ubah!');
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
    <title>Ubah</title>
</head>

<body>
    <h1>Masukan data untuk di Ubah!</h1>
    <form action="" method="post">
        <table>
            <input type="hidden" name="id" value="<?= $tmn["id"] ?>">
            <tr>
                <td><label for="nama">Nama</label></td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama" required value="<?= $tmn["nama"] ?>"></td>
            </tr>
            <tr>
                <td><label for="umur">Umur</label></td>
                <td>:</td>
                <td><input type="text" name="umur" id="umur" required value="<?= $tmn["umur"] ?>"></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat</label></td>
                <td>:</td>
                <td><input type="text" name="alamat" id="alamat" required value="<?= $tmn["alamat"] ?>"></td>
            </tr>
            <tr>
                <td><label for="hobi">Hobi</label></td>
                <td>:</td>
                <td><input type="text" name="hobi" id="hobi" required value="<?= $tmn["hobi"] ?>"></td>
            </tr>
            <tr>
                <td><label for="gambar">Gambar</label></td>
                <td>:</td>
                <td><input type="text" name="gambar" id="gambar" required value="<?= $tmn["gambar"] ?>"></td>
            </tr>
            <tr>
                <td colspan="3"><button type="reset" name="reset">RESET</button></td>
                <td><button type="submit" name="submit">Ubah</button></td>
            </tr>
        </table>
    </form>
</body>

</html>