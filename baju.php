<?php 
require 'functions.php';

$id = $_GET['id'];

$anggotaq = "SELECT * FROM anggota WHERE anggotaID=$id";
$anggotas = mysqli_query($conn, $anggotaq);
foreach( $anggotas as $anggota );

if( isset($_POST['submit']) ){
    $bayar = $_POST['bayar'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];

    $query = "UPDATE anggota SET bayar='$bayar', harga='$harga', ambil='$status' WHERE anggotaID=$id";

    mysqli_query($conn, $query);
    header("Location: index.php");
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>baju</title>
</head>
<body>
    <h1>Update Data Baju</h1>
    <form action="" method="POST">
        <ul>
            <li>
                <label for="bayar">bayar</label>
                <input type="text" name="bayar" id="bayar" value="<?= $anggota['bayar']; ?>">
            </li>
            <li>
                <label for="harga">harga</label>
                <input type="text" name="harga" id="harga" value="<?= $anggota['harga']; ?>">
            </li>
            <li>
                <label for="status">status</label>
                <input type="text" name="status" id="status" value="<?= $anggota['ambil']; ?>">
            </li>
            <li>
                <button type="submit" name="submit">update</button> |
                <a href="index.php">cencel</a>
            </li>
        </ul>
    </form>
</body>
</html>

