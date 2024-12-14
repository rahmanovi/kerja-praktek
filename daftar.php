<?php 
	include 'koneksi.php';

	$errors = array();

	if(isset($_POST['submit'])){
		// Validasi Tahun Ajaran
		$th_ajaran = $_POST['th_ajaran'];
		if(empty($th_ajaran)){
			$errors[] = "Tahun Ajaran tidak boleh kosong";
		}

		// Validasi Tingkat
		$tingkat = $_POST['tingkat'];
		if(empty($tingkat)){
			$errors[] = "Tingkat tidak boleh kosong";
		}

		// Validasi Nama Santri
		$nm_santri = $_POST['nm_santri'];
		if(empty($nm_santri)){
			$errors[] = "Nama Santri tidak boleh kosong";
		}

		// Validasi Tempat Lahir
		$tmp_lahir = $_POST['tmp_lahir'];
		if(empty($tmp_lahir)){
			$errors[] = "Tempat Lahir tidak boleh kosong";
		}

		// Validasi Tanggal Lahir
		$tgl_lahir = $_POST['tgl_lahir'];
		if(empty($tgl_lahir)){
			$errors[] = "Tanggal Lahir tidak boleh kosong";
		}

		// Validasi Jenis Kelamin
		$jk = $_POST['jk'];
		if(empty($jk)){
			$errors[] = "Jenis Kelamin tidak boleh kosong";
		}

		// Validasi Alamat Santri
		$almt_santri = $_POST['almt_santri'];
		if(empty($almt_santri)){
			$errors[] = "Alamat Santri tidak boleh kosong";
		}

		// Validasi Asal Sekolah
		$asal_sekolah = $_POST['asal_sekolah'];
		if(empty($asal_sekolah)){
			$errors[] = "Asal Sekolah tidak boleh kosong";
		}

		// Validasi Nama Ayah
		$nm_ayah = $_POST['nm_ayah'];
		if(empty($nm_ayah)){
			$errors[] = "Nama Ayah tidak boleh kosong";
		}

		// Validasi Nama Ibu
		$nm_ibu = $_POST['nm_ibu'];
		if(empty($nm_ibu)){
			$errors[] = "Nama Ibu tidak boleh kosong";
		}

		// Validasi Nomor Telepon
		$no_telp = $_POST['no_telp'];
		if(empty($no_telp)){
			$errors[] = "Nomor Telepon tidak boleh kosong";
		}

		// Jika tidak ada kesalahan, lakukan proses insert
		if(empty($errors)){
			$getMaxId = mysqli_query($conn, "SELECT MAX(RIGHT(id_pendaftaran, 5)) AS id FROM pendaftaran");
			$d = mysqli_fetch_object($getMaxId);
			$generateId = 'P'.date('Y').sprintf("%05s", $d->id + 1);

			// proses insert
			$insert = mysqli_query($conn, "INSERT INTO pendaftaran VALUES (
					'".$generateId."',
					'".date('Y-m-d')."',
					'".$th_ajaran."',
					'".$tingkat."',
					'".$nm_santri."',
					'".$tmp_lahir."',
					'".$tgl_lahir."',
					'".$jk."',
					'".$almt_santri."',
					'".$asal_sekolah."',
					'".$nm_ayah."',
					'".$nm_ibu."',
					'".$no_telp."'
				)");

			if($insert){
				echo '<script>window.location="berhasil.php?id='.$generateId.'"</script>';
			}else{
				echo 'huft '.mysqli_error($conn);
			}
		} else {
			// Tampilkan pesan kesalahan
			foreach ($errors as $error) {
				echo '<div style="color: red;">'.$error.'</div>';
			}
		}

	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PSB</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
</head>
<body>

	<!-- bagian box formulir -->
	<section class="box-formulir">
		
		<h2>Formulir Pendaftaran Santri Baru</h2>

		<!-- bagian form -->
		<form action="" method="post" enctype="multipart/form-data">
			
			<div class="box">
				<table border="0" class="table-form">
					<tr>
						<td>Tahun Ajaran</td>
						<td>:</td>
						<td>
							<input type="text" name="th_ajaran" class="input-control" value="2023/2024" readonly>
						</td>
					</tr>
				</table>
			</div>

			<h3>Data Diri Calon Santri</h3>
			<div class="box">
				<table border="0" class="table-form">
					<tr>
						<td>Tingkat</td>
						<td>:</td>
						<td>
							<select class="input-control" name="tingkat">
								<option value="">--Pilih--</option>
								<option value="Iqro 1">Iqro 1</option>
								<option value="Iqro 2">Iqro 2</option>
								<option value="Iqro 3">Iqro 3</option>
								<option value="Iqro 4">Iqro 4</option>
								<option value="Iqro 5">Iqro 5</option>
								<option value="Iqro 6">Iqro 6</option>
								<option value="Al Quran">Al Quran</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Nama Lengkap</td>
						<td>:</td>
						<td>
							<input type="text" name="nm_santri" class="input-control">
						</td>
					</tr>
					<tr>
						<td>Tempat Lahir</td>
						<td>:</td>
						<td>
							<input type="text" name="tmp_lahir" class="input-control">
						</td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td>
						<td>:</td>
						<td>
							<input type="date" name="tgl_lahir" class="input-control">
						</td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td>
							<input type="radio" name="jk" class="input-control" value="Laki-laki"> Laki-laki &nbsp;&nbsp;&nbsp;
							<input type="radio" name="jk" class="input-control" value="Perempuan"> Perempuan
						</td>
					</tr>
					<tr>
						<td>Alamat Lengkap</td>
						<td>:</td>
						<td>
							<textarea class="input-control" name="almt_santri"></textarea>
						</td>
					</tr>
					<tr>
						<td>Asal Sekolah</td>
						<td>:</td>
						<td>
							<textarea class="input-control" name="asal_sekolah"></textarea>
						</td>
					</tr>
					<tr>
						<td>Nama Ayah</td>
						<td>:</td>
						<td>
							<textarea class="input-control" name="nm_ayah"></textarea>
						</td>
					</tr>
					<tr>
						<td>Nama Ibu</td>
						<td>:</td>
						<td>
							<textarea class="input-control" name="nm_ibu"></textarea>
						</td>
					</tr>
					<tr>
						<td>Telepon</td>
						<td>:</td>
						<td>
							<textarea class="input-control" name="no_telp"></textarea>
						</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>
							<input type="submit" name="submit" class="btn-daftar" value="Daftar Sekarang">
						</td>
					</tr>
				</table>
			</div>

		</form>

	</section>

</body>
</html>
