<?php
include('onek.php');
if (isset($_POST['submit'])) {
    $name         = $_POST['name'];
    $harga        = $_POST['harga'];
    $efektivitas  = $_POST['efektivitas'];
    $keamanan     = $_POST['keamanan'];
    $ketersediaan = $_POST['ketersediaan'];
    $popularitas  = $_POST['popularitas'];

    $sql = "INSERT INTO penilaian (name, harga, efektivitas, keamanan, ketersediaan, popularitas) VALUES ('$name', '$harga', '$efektivitas', '$keamanan', '$ketersediaan', '$popularitas')";
    $query = mysqli_query($dbcon, $sql);

    if ($query) {
        echo "<script>alert('Berhasil memasukkan data Alternatif'); window.location.href = '../penilaian.php';</script>";
    } else {
        echo "<script>alert('Gagal memasukkan data: " . mysqli_error($dbcon) . "'); window.location.href = 'form_page.php';</script>";
    }

    mysqli_close($dbcon);
} else {
    echo "<script>alert('Form tidak disubmit dengan benar'); window.location.href = 'form_page.php';</script>";
}
