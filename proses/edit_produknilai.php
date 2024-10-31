<?php
include('onek.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $efektivitas = mysqli_real_escape_string($dbcon, $_POST['efektivitas']);
    $keamanan = mysqli_real_escape_string($dbcon, $_POST['keamanan']);
    $ketersediaan = mysqli_real_escape_string($dbcon, $_POST['ketersediaan']);
    $popularitas = mysqli_real_escape_string($dbcon, $_POST['popularitas']);

    // Update the database with the new data
    $query = "UPDATE products SET efektivitas = '$efektivitas', keamanan = '$keamanan', ketersediaan = '$ketersediaan', popularitas = '$popularitas' WHERE product_id = '$product_id'";
    $result = mysqli_query($dbcon, $query);

    if ($result) {
        echo "<script>alert('Berhasil Mengedit Data'); window.location.href = '../produk_nilai.php';</script>";
    } else {
        echo "<script>alert('Gagal mengedit data: " . mysqli_error($dbcon) . "'); window.location.href = 'form_page.php';</script>";
    }
} else {
    echo "<script>alert('Form tidak disubmit dengan benar'); window.location.href = '../produk_nilai.php';</script>";
}
