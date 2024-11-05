<?php
	session_start();
	include 'onek.php';

	if (isset($_GET['name'])) {
		
		$consumer_id = $_GET['name'];
		mysqli_query($dbcon,"DELETE FROM consumers WHERE consumer_id  = '$consumer_id'");
		echo "<script>confirm('Verhasil Menghapus')</script>";
		header("location:../customer.php");

	}else{
		echo "<h1>NGAPAIN WOI</h1>";
	}

?>