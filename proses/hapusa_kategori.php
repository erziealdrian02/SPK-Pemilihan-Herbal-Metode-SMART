<?php
	session_start();
	include 'onek.php';

	if (isset($_GET['name'])) {
		
		$id = $_GET['name'];
		mysqli_query($dbcon,"DELETE FROM categories WHERE id  = '$id'");
		echo "<script>confirm('Verhasil Menghapus')</script>";
		header("location:../category.php");

	}else{
		echo "<h1>NGAPAIN WOI</h1>";
	}

?>