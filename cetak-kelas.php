<?php 
	include 'koneksi.php';

    function getNamaKelas($tingkat) {
        if ($tingkat >= "Iqro 1" && $tingkat <= "Iqro 3") {
            return "Kelas A";
        } elseif ($tingkat >= "Iqro 4" && $tingkat <= "Iqro 6") {
            return "Kelas B";
        } elseif ($tingkat == "Al Quran") {
            return "Kelas C";
        } else {
            return "Tidak Diketahui";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cetak Kelas</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
	<script>
		window.print();
	</script>
</head>
<body>

	<h2>Laporan Data Kelas</h2><br><br>
	<table class="table" border="1">
				<thead>
                    <tr>
                        <th>No</th>
                        <th>Id Santri</th>
                        <th>Nama</th>
                        <th>Tingkat</th>
                        <th>Kelas</th>
                    </tr>
				</thead>
				<tbody>
                <?php
                    $no = 1;
                    $list_peserta = mysqli_query($conn, "SELECT * FROM pendaftaran");
                    while ($row = mysqli_fetch_array($list_peserta)) {
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['id_pendaftaran'] ?></td>
                            <td><?php echo $row['nm_santri'] ?></td>
                            <td><?php echo $row['tingkat'] ?></td>
                            <td><?php echo getNamaKelas($row['tingkat']); ?></td>
                        </tr>
                    <?php } ?>
				</tbody>
			</table>

</body>
</html>