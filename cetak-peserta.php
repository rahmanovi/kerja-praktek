<?php 
	include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cetak Peserta</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
	<script>
		window.print();
	</script>
</head>
<body>

	<h2>Laporan Santri Baru</h2><br><br>
	<table class="table" border="1">
				<thead>
					<tr>
						<th>No</th>
						<th>ID Pendaftaran</th>
						<th>Tahun Ajaran</th>
						<th>Tingkat</th>
						<th>Nama</th>
						<th>Tempat, Tanggal Lahir</th>
						<th>Jenis Kelamin</th>
						<th>Alamat</th>
						<th>Asal Sekolah</th>
						<th>Nama Ayah</th>
						<th>Nama Ibu</th>
						<th>Telepon</>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no = 1;
						$list_peserta = mysqli_query($conn, "SELECT * FROM pendaftaran");
						while($row = mysqli_fetch_array($list_peserta)){
					?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $row['id_pendaftaran'] ?></td>
						<td><?php echo $row['th_ajaran'] ?></td>
						<td><?php echo $row['tingkat'] ?></td>
						<td><?php echo $row['nm_santri'] ?></td>
						<td><?php echo $row['tmp_lahir'].', '.$row['tgl_lahir'] ?></td>
						<td><?php echo $row['jk'] ?></td>
						<td><?php echo $row['almt_santri'] ?></td>
						<td><?php echo $row['asal_sekolah'] ?></td>
						<td><?php echo $row['nm_ayah'] ?></td>
						<td><?php echo $row['nm_ibu'] ?></td>
						<td><?php echo $row['no_telp'] ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>

</body>
</html>