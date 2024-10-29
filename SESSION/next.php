<?php
session_start();
?>
<html>
<head>
    <title>Halaman Kedua</title>
</head>
<body>
    <h2>Anda memasuki halaman kedua</h2>
    <?php
    // Tampilkan data session sebelum session di-destroy
    if (isset($_SESSION["nama"]) && isset($_SESSION["umur"]) && isset($_SESSION["email"])) {
        echo "Nama Anda: " . $_SESSION["nama"] . "<br>";
        echo "Umur Anda saat ini adalah: " . $_SESSION["umur"] . " tahun<br>";
        echo "Alamat email Anda: " . $_SESSION["email"] . "<br>";
    } else {
        echo "Tidak ada data sesi yang tersedia.<br>";
    }
    ?>
    <a href="data.php">Klik di sini</a> untuk menuju ke halaman awal.
    <?php
    // Menghapus session
    session_destroy();
    ?>
</body>
</html>
