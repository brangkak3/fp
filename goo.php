<?php
	$siswa=array(
		array('id'=>1,'nama'=>'fai 1'),
		array('id'=>2,'nama'=>'fai 2'),
		array('id'=>3,'nama'=>'fai 3'),
		array('id'=>9,'nama'=>'fai 4')
		);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" action="">
	<table border="1" cellspacing="0" cellpadding="10">
		<tr>
			<th>Nama</th>
			<th>Hadir</th>
			<th>Sakit</th>
			<th>Ijin</th>
			<th>Alpha</th>
		</tr>
		<?php foreach ($siswa as $key => $value) : ?>
		<tr>
			<td><?= $value['nama']; ?></td>
			<td><input type="radio" value="H" name="siswa[<?= $value['id']; ?>]"></td>
			<td><input type="radio" value="S" name="siswa[<?= $value['id']; ?>]"></td>
			<td><input type="radio" value="I" name="siswa[<?= $value['id']; ?>]"></td>
			<td><input type="radio" value="A" name="siswa[<?= $value['id']; ?>]"></td>
		</tr>
		<?php endforeach; ?>
	</table>
	<input type="submit" value='simpan'>
</form>

<?php
	$data=$_POST;
	echo(json_encode($data));
	foreach ($data['siswa'] as $key => $value) {
		echo " <br> Siswa dengan id ".$key." : ".$value."";
		/*
		update/insert ke database
		insert into absensi(tgl,id_siswa,status) values (now(),$key,$value);

		update absensi set status=$value where id_siswa=$key;
		*/
	}
?>
</body>
</html>