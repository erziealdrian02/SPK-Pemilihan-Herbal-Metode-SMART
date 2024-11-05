<?php
session_start();
include 'onek.php';

if (isset($_GET['name'])) {

	$penilaian_id = $_GET['name'];
	mysqli_query($dbcon, "DELETE FROM penilaian WHERE penilaian_id  = '$penilaian_id'");
	echo "<script>confirm('Verhasil Menghapus')</script>";
	header("location:../penilaian.php");
} else {
	echo "<h1>NGAPAIN WOI</h1>";
}
