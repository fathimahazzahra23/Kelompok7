<html>
	<head>
		<title>akses tabel pegawai1</title>
	</head>
	<body>
	<?php 
		include ("1_koneksi.php");
		$hasil = mysqli_query($konek,"SELECT * FROM pegawai1");
		$kolom = mysqli_num_fields($hasil);
		echo "Jumlah fields : $kolom <br>";
		$data = mysqli_num_rows($hasil);
		echo "Jumlah record : $data";
		mysqli_close($konek);
	?>
	</body>
</html>