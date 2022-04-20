<?php 
require 'functions.php';

// SELECT nama FROM anggota INNER JOIN zikir ON anggota.anggotaID = zikir.anggotaID
$anggotaq = "SELECT * FROM anggota";
$anggotas = mysqli_query($conn, $anggotaq);

// tampil hadir from table zikir
$anggotaqt = "SELECT hadir FROM anggota INNER JOIN zikir ON anggota.anggotaID = zikir.anggotaID";
$anggotat = mysqli_query($conn, $anggotaqt);

$tmp = [];
foreach($anggotat as $zikir){
    $hadir = $zikir['hadir'];
    $tmp[]=$hadir;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>anggota</title>
</head>
<body>
    <h1>Daftar Anggota</h1>
    <a href="zikir.php">zikir</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>hadir</th>
            <th>baju</th>
        </tr>
        <?php $i = 1; ?>
        <?php $zikir = 0; ?>
        <?php foreach( $anggotas as $anggota ) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $anggota["nama"]; ?></td>
            <td><?= $anggota["alamat"]; ?></td>
            <td><?= $tmp[$zikir]; ?></td>
            <td>
                <?= $anggota['bayar']; ?> || <?= $anggota['harga']; ?> || <?= $anggota['ambil']; ?> || <a href="baju.php?id=<?= $anggota['anggotaID']; ?>">update</a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php $zikir++; ?>
        <?php endforeach; ?>
<script src="js/script.js"></script>
</body>
</html>