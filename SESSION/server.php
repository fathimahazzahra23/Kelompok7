<?php
session_start();
if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
}
$_SESSION['count']++;
?>
<html>
<head>

<title>Demo session – destroy </title>

</head>
<body>
<h1> Demo Session – reset nilai </h1>
<?php
echo "<br> ID Session : ". $_SESSION['count'] ;
echo "<br> Anda mengakses sever ini sebanyak : ". $_SESSION['count'] ;
?>
</body>
</html>