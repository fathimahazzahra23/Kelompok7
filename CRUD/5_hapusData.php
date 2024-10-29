<html>
	<head>
		<title>hapus data pegawai</title>
	</head>
	<body>
		<h2>hapus data</h2>
		<form method="POST">
			<label>pilih nik yang akan dihapus<br>nik: </label>
			<input type="text" id="nik" name="nik" required><br><br>
			<input type="submit" value="hapus">
		</form>
		<?php
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				$nik = $_POST["nik"];
				include("1_koneksi.php");

			//proses hapus
				$hasil = mysqli_query($konek,"DELETE FROM pegawai1 WHERE nik='$nik'");
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