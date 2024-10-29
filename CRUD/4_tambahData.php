<html>
	<head>
		<title>form input dosen</title>
	</head>
	<body>
		<h2>form tambah dosen</h2>
		<form method="POST" action="">
			<label for="NPP">NPP:</label>
			<input type="text" id="NPP" name="NPP" required><br><br>
			<label for="Nama_Dosen">Nama_Dosen:</label>
			<input type="text" id="Nama_Dosen" name="Nama_Dosen" required><br><br>

			<input type="submit" value="submit">
		</form>

		<?php
			//diproses ketika form sudah di submit
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$NPP = $_POST["NPP"];
				$Nama_Dosen = $_POST["Nama_Dosen"];

				include ("1_koneksi.php");

			//kode untuk tambah data
				$hasil = mysqli_query($konek,"INSERT INTO dosen(NPP, Nama_Dosen) VALUES ('$NPP','$Nama_Dosen')");
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