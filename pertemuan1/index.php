<?php
// Menyambungkan file function.php
require 'function.php';
// mengambil data dari tabel teman menggunakan bahasa query
$teman = query("SELECT * FROM teman");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Teman</title>
</head>

<body>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Alamat</th>
            <th>Hobi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($teman as $tmn) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="">Ubah</a> | <a href="">Hapus</a>
                </td>
                <td><?= $tmn["gambar"] ?></td>
                <td><?= $tmn["nama"] ?></td>
                <td><?= $tmn["umur"] ?></td>
                <td><?= $tmn["alamat"] ?></td>
                <td><?= $tmn["hobi"] ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>

</html>