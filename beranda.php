<?php 
	session_start();
	include 'koneksi.php';
	if($_SESSION['stat_login'] != true){
		echo '<script>window.location="index.php"</script>';
	}
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
		<h2>Beranda</h2>
		<div class="box">
			<h3>Selamat Datang di Penerimaan Santri Baru di TPQ Nurul Qur'an Dayon.</h3>
			<h4>TPA/TPQ Nurul Qur'an Dayon beralamat di Klewonan, RT 22/RW 9, Triharjo, Kecamatan Wates, Kabupaten Kulon Progo, DIY 55651.</h4>
		</div>
	</section>

</body>
</html>