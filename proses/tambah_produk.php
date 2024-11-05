<?php
include('onek.php');
if (isset($_POST['submit'])) {
    $name        = $_POST['name'];
    $category    = $_POST['category'];
    $description = $_POST['description'];
    $price       = $_POST['price'];
    $brand       = $_POST['brand'];
    $efektivitas = 0;
    $keamanan    = 0;
    $ketersediaan = 0;
    $popularitas = 0;

    $sql = "INSERT INTO products (name, category, description, price, brand, efektivitas, keamanan, ketersediaan, popularitas) VALUES ('$name', '$category', '$description', '$price', '$brand', '$efektivitas', '$keamanan', '$ketersediaan', '$popularitas')";
    $query = mysqli_query($dbcon, $sql);

    if ($query) {
        echo "<script>alert('Berhasil memasukkan data Alternatif'); window.location.href = '../produk.php';</script>";
    } else {
        echo "<script>alert('Gagal memasukkan data: " . mysqli_error($dbcon) . "'); window.location.href = 'form_page.php';</script>";
    }

    mysqli_close($dbcon);
} else {
    echo "<script>alert('Form tidak disubmit dengan benar'); window.location.href = 'form_page.php';</script>";
}
