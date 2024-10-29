<html>
	<head>
		<title>Koneksi ke database kampus2</title>
	</head>
	<body>
		<h2>Koneksi ke Database Kampus2</h2>
	<?php 

		$konek = mysqli_connect ('localhost', 'root','','Kampus2');
		if($konek){
			echo "";
		}
		else {
			echo "koneksi gagal";
		}
	?>
	</body>
</html>

