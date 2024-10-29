<html>
	<head>
		<title>Koneksi ke database Coba</title>
	</head>
	<body>
		<h2>Koneksi ke Database Coba</h2>
	<?php 

		$konek = mysqli_connect ('localhost', 'root','','coba');
		if($konek){
			echo "";
		}
		else {
			echo "koneksi gagal";
		}
	?>
	</body>
</html>

