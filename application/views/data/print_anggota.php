<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<table>
		<tr>
			<th>NO</th>
			<th>NO INDUK</th>
			<th>NAMA ANGGOTA</th>
			<th>KELAS</th>
			<th>ALAMAT</th>
			<th>NO TELEPON</th>
			<th>EMAIL</th>
			<th>TANGGAL LAHIR</th>
		</tr>

		<?php 
		$no= 1;
		foreach ($anggota as $anggota): ?>

		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $anggota->no_induk ?></td>
			<td><?php echo $anggota->nama ?></td>
			<td><?php echo $anggota->kelas ?></td>
			<td><?php echo $anggota->alamat ?></td>
			<td><?php echo $anggota->no_telp ?></td>
			<td><?php echo $anggota->email ?></td>
			<td><?php echo $anggota->tgl_lahir ?></td>
		</tr>

	<?php endforeach; ?>
	</table>

	<script type="text/javascript">
		window.print();
	</script>

</body>
</html>