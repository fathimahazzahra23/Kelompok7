<html>
	<head>
		<title>hapus data dosen</title>
	</head>
	<body>
		<h2>hapus data</h2>
		<form method="POST">
			<label>pilih npp yang akan dihapus<br>NPP: </label>
			<input type="text" id="NPP" name="NPP" required><br><br>
			<input type="submit" value="hapus">
		</form>
		<?php
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				$NPP = $_POST["NPP"];
				include("1_koneksi.php");

			//proses hapus
				$hasil = mysqli_query($konek,"DELETE FROM dosen WHERE NPP='$NPP'");
				if($hasil){
					echo "data sudah dihapus";
				}
				else{
					echo "gagal".mysqli_error($konek);
				}

				mysqli_close($konek);
			}
		?>
	</body>
</html>