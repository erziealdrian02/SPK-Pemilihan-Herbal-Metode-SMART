<?php
session_start();
include 'onek.php';

if (isset($_GET['name'])) {

	$product_id = $_GET['name'];
	mysqli_query($dbcon, "DELETE FROM products WHERE product_id  = '$product_id'");
	echo "<script>confirm('Verhasil Menghapus')</script>";
	header("location:../produk.php");
} else {
	echo "<h1>NGAPAIN WOI</h1>";
}
