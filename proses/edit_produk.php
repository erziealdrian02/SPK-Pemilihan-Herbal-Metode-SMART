<?php
include('onek.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $name = mysqli_real_escape_string($dbcon, $_POST['name']);
    $category = mysqli_real_escape_string($dbcon, $_POST['category']);
    $description = mysqli_real_escape_string($dbcon, $_POST['description']);
    $price = mysqli_real_escape_string($dbcon, $_POST['price']);
    $brand = mysqli_real_escape_string($dbcon, $_POST['brand']);

    // Update the database with the new data
    $query = "UPDATE products SET name = '$name', category = '$category', description = '$description', price = '$price', brand = '$brand' WHERE product_id = '$product_id'";
    $result = mysqli_query($dbcon, $query);

    if ($result) {
        echo "<script>alert('Berhasil Mengedit Data'); window.location.href = '../produk.php';</script>";
    } else {
        echo "<script>alert('Gagal mengedit data: " . mysqli_error($dbcon) . "'); window.location.href = 'form_page.php';</script>";
    }
} else {
    echo "<script>alert('Form tidak disubmit dengan benar'); window.location.href = '../produk.php';</script>";
}
