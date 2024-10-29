<html>
	<head>
		<title>dalam tabel Pegawai1</title>
	</head>
	<body>
	<h1><b>Daftar Pegawai</b></h1>
	<?php 
		include ("1_koneksi.php");
		$hasil = mysqli_query($konek,"SELECT * FROM pegawai1");
		echo "<table border=1>";
		echo "<tr>
				<td>NPP</td>
				<td>NAMA_DOSEN</td>
			 </tr>";
		while ($baris = mysqli_fetch_row($hasil))
		{
			echo "<tr>
					<td>$baris[0]</td>
					<td>$baris[1]</td>
			 	 </tr>";
		}
	?>
	</body>
</html>