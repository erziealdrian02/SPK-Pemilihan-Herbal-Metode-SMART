<?php
$s = "localhost";
$u = "root";
$p = "";
$db = "spk_herbal_smart";

$dbcon = mysqli_connect($s, $u, $p, $db);

if (!$dbcon) {
	die("Gagal ke DataBase : " . mysqli_connect_error());
} else {
	//echo"INI TERHU BUNG";
}