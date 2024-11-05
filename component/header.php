<?php
session_start();
if ($_SESSION['stat'] != 'masuk') {
    echo "<script>alert('anda belum login')</script>";
    header("location:login.php?id=out");
}
?>

<head>
    <meta charset="UTF-8" />
    <title>Sistem Pengambilan Keputusan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/10.1.0/nouislider.css" />
    <link rel="stylesheet" href="./css/style.css" />
</head>