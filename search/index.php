<?php
// Menyambungkan file function.php
require 'function.php';
// mengambil data dari tabel teman menggunakan bahasa query
$teman = query("SELECT * FROM teman");
// jika tombol cari di pencet
if (isset($_POST["cari"])) {
    $teman = cari($_POST["keyword"]);
}
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
    <h1>DAFTAR TEMAN</h1>
    <a href="tambah.php">Tambahkan Teman!</a>
    <form action="" method="POST">
        <input type="text" name="keyword" size="38" autofocus placeholder="Silahkan masukan keyword yang anda ingin cari!" autocomplete="off">
        <button type="submit" name="cari">CARI!</button>
    </form>
    <br>
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
                    <a href="ubah.php?id=<?= $tmn["id"] ?>">Ubah</a> | <a href="hapus.php?id=<?= $tmn["id"]; ?>" onclick="return confirm('apakah anda yakin akan menghapusnya?');">Hapus</a>
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