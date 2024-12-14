<?php 
	session_start();
	include 'koneksi.php';
	if($_SESSION['stat_login'] != true){
		echo '<script>window.location="index.php"</script>';
	}

	$peserta = mysqli_query($conn, "SELECT * FROM pendaftaran WHERE id_pendaftaran = '".$_GET['id']."' ");
	$p = mysqli_fetch_object($peserta);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PSB | Administrator</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
</head>
<body>

	<!-- bagian header -->
	<header>
		<h1><a href="beranda.php"></a></h1>
		<ul>
			<li><a href="beranda.php">Beranda</a></li>
			<li><a href="data-peserta.php">Santri Baru</a></li>
			<li><a href="kelas.php">Kelas</a></li>
			<li><a href="keluar.php">Keluar</a></li>
		</ul>
	</header>

	<!-- bagian content -->
	<section class="content">
		<h2>Detail Peserta</h2>
		<div class="box">
			
			<table class="table-data" border="0">
				<tr>
					<td>Kode Pendaftaran</td>
					<td>:</td>
					<td><?php echo $p->id_pendaftaran ?></td>
				</tr>
				<tr>
					<td>Tahun Ajaran</td>
					<td>:</td>
					<td><?php echo $p->th_ajaran ?></td>
				</tr>
				<tr>
					<td>Tingkat</td>
					<td>:</td>
					<td><?php echo $p->tingkat ?></td>
				</tr>
				<tr>
					<td>Nama Lengkap</td>
					<td>:</td>
					<td><?php echo $p->nm_santri ?></td>
				</tr>
				<tr>
					<td>Tempat, Tanggal Lahir</td>
					<td>:</td>
					<td><?php echo $p->tmp_lahir.', '.$p->tgl_lahir ?></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>:</td>
					<td><?php echo $p->jk ?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><?php echo $p->almt_santri ?></td>
				</tr>
				<tr>
					<td>Asal Sekolah</td>
					<td>:</td>
					<td><?php echo $p->asal_sekolah ?></td>
				</tr>
				<tr>
					<td>Nama Ayah</td>
					<td>:</td>
					<td><?php echo $p->nm_ayah ?></td>
				</tr>
				<tr>
					<td>Nama Ibu</td>
					<td>:</td>
					<td><?php echo $p->nm_ibu ?></td>
				</tr>
				<tr>
					<td>Telepon</td>
					<td>:</td>
					<td><?php echo $p->no_telp ?></td>
				</tr>
			</table>
		</div>
	</section>

</body>
</html>