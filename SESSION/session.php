<?php
session_start();
if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
}
$_SESSION['count']++;
?>

<html>
<head>
    <title>Demo Session 1</title>
</head>
<body>
    <h1>Demo Session 1</h1>
    <?php
    echo "Anda telah mengakses halaman ini sebanyak : " . $_SESSION['count'] . " kali";
    ?>
</body>
</html>
