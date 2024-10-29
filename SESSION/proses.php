<?php
session_start();

// Ambil data dari POST dan simpan ke dalam session
$nama = isset($_POST["nama"]) ? $_POST["nama"] : '';
$umur = isset($_POST["umur"]) ? $_POST["umur"] : '';
$email = isset($_POST["email"]) ? $_POST["email"] : '';
$waktu = isset($_POST["waktu"]) ? $_POST["waktu"] : '';

$_SESSION["nama"] = $nama;
$_SESSION["umur"] = $umur;
$_SESSION["email"] = $email;
$_SESSION["waktu"] = $waktu;
?>
<html>
<head>
    <title>Data Session</title>
</head>
<body>
<?php
echo "<h1>Hallo, " . $_SESSION["nama"] . "</h1>";
?>
<h2>Selamat Datang Di Situs Kami</h2>
<?php
echo "Umur Anda saat ini adalah : " . $_SESSION["umur"] . " tahun.<br>";
echo "Alamat email Anda adalah : " . $_SESSION["email"] . ".<br>";
echo "Waktu online : " . $_SESSION["waktu"] . ".<br>"
?>
<br>
<a href="http://localhost/web_6/next.php">Klik di sini</a> untuk menuju ke halaman berikut.
</body>
</html>
