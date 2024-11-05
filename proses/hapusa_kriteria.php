<?php
session_start();
include 'onek.php';

if (isset($_GET['name'])) {

	$criteria_id = $_GET['name'];
	mysqli_query($dbcon, "DELETE FROM criteria WHERE criteria_id  = '$criteria_id'");
	echo "<script>confirm('Verhasil Menghapus')</script>";
	header("location:../kriteria.php");
} else {
	echo "<h1>NGAPAIN WOI</h1>";
}
