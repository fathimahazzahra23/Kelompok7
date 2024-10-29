<html>
	<head>
		<title>form update pegawai</title>
	</head>
	<body>
		<h2>Form Update Pegawai</h2>
		<form method="POST" action="">
			<label for="nik">NIK:</label>
			<input type="text" id="nik" name="nik" required><br><br>
			<label for="nama">Nama:</label>
			<input type="text" id="nama" name="nama" required><br><br>
			<label for="alamat">Alamat:</label>
			<input type="text" id="alamat" name="alamat" required><br><br>

			<input type="submit" value="Update">
		</form>

		<?php
			// diproses ketika form sudah di submit
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$nik = $_POST["nik"];
				$nama = $_POST["nama"];
				$alamat = $_POST["alamat"];

				include("1_koneksi.php");

				// kode untuk update data
				$query = "UPDATE pegawai1 SET nama = '$nama', alamat = '$alamat' WHERE nik = '$nik'";
				$hasil = mysqli_query($konek, $query);

				if ($hasil) {
					echo "Update data berhasil";
				} else {
					echo "Update data gagal: " . mysqli_error($konek);
				}

				mysqli_close($konek);
			}
		?>
	</body>
</html>
