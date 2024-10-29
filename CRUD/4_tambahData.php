<html>
	<head>
		<title>form input pegawai</title>
	</head>
	<body>
		<h2>form tambah pegawai</h2>
		<form method="POST" action="">
			<label for="nik">nik:</label>
			<input type="text" id="nik" name="nik" required><br><br>
			<label for="nama">nama:</label>
			<input type="text" id="nama" name="nama" required><br><br>
			<label for="alamat">alamat:</label>
			<input type="text" id="alamat" name="alamat" required><br><br>

			<input type="submit" value="submit">
		</form>

		<?php
			//diproses ketika form sudah di submit
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$nik = $_POST["nik"];
				$nama = $_POST["nama"];
				$alamat = $_POST["alamat"];


				include ("1_koneksi.php");

			//kode untuk tambah data
				$hasil = mysqli_query($konek,"INSERT INTO pegawai1 (nik,nama,alamat) VALUES ('$nik','$nama','$alamat')");
				if ($hasil){
					echo "Penambahan data berhasil";
				}
				else {
					echo "Penambahan data gagal". mysqli_error($konek);
				}
				mysqli_close($konek);
			}
		?>
	</body>
</html>