<?php 
require 'functions.php';

// query zikir
$zikirq = "SELECT * FROM zikir";
$zikirs = mysqli_query($conn, $zikirq);

// query id dari table anggota
$anggotaq = "SELECT * FROM anggota";
$anggotas = mysqli_query($conn, $anggotaq);

if( isset($_POST['save']) ){
    // $data=$_POST;
    // echo(json_encode($data));
    foreach ($_POST['ang'] as $key => $value) {
        // echo " <br> Anggota dengan id ".$key." : ".$value."";
        if( $value=='H' ){
            $hadirq = "UPDATE zikir SET hadir=hadir+1 WHERE anggotaID=$key";
            mysqli_query($conn, $hadirq);
            header("Location: zikir.php");
        } else {
            $hadirq = "UPDATE zikir SET hadir=hadir-1 WHERE anggotaID=$key";
            mysqli_query($conn, $hadirq);
            header("Location: zikir.php");
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>zikir</title>
</head>
<body>
    <h1>zikir</h1>
    <form action="" method = "POST">
        <button type="submit" name="save">save</button>
        <a href="index.php">cencel</a>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No</th>
                <th>H | A</th>
                <th>Nama</th>
                <th>hadir</th>
            </tr>

        <?php $nomor = 1; ?>
        <?php foreach( $zikirs as $zikir ) : ?>
        <tr>
            <td><?= $nomor; ?></td>
            <td>
                <input type="radio" value="H" name="ang[<?= $zikir['anggotaID']; ?>]">
                <input type="radio" value="A" name="ang[<?= $zikir['anggotaID']; ?>]">
            </td>
            <td>roky</td>
            <td><?= $zikir['hadir']; ?></td>
        </tr>
        <?php $nomor++; ?>
        <?php endforeach; ?>
    </form>
</body>
</html>