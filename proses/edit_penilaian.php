<?php
include('onek.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $penilaian_id = $_POST['penilaian_id'];
    $name = mysqli_real_escape_string($dbcon, $_POST['name']);
    $harga = mysqli_real_escape_string($dbcon, $_POST['harga']);
    $efektivitas = mysqli_real_escape_string($dbcon, $_POST['efektivitas']);
    $keamanan = mysqli_real_escape_string($dbcon, $_POST['keamanan']);
    $ketersediaan = mysqli_real_escape_string($dbcon, $_POST['ketersediaan']);
    $popularitas = mysqli_real_escape_string($dbcon, $_POST['popularitas']);

    // Update the database with the new data
    $query = "UPDATE penilaian SET name = '$name', harga = '$harga', efektivitas = '$efektivitas', keamanan = '$keamanan', ketersediaan = '$ketersediaan', popularitas = '$popularitas' WHERE penilaian_id = '$penilaian_id'";
    $result = mysqli_query($dbcon, $query);

    if ($result) {
        echo "Berhasil Mengedit Data";
    } else {
        echo "<script>alert('Gagal mengedit data: " . mysqli_error($dbcon) . "'); window.location.href = 'form_page.php';</script>";
    }
} else {
    echo "<script>alert('Form tidak disubmit dengan benar'); window.location.href = '../penilaian.php';</script>";
}
