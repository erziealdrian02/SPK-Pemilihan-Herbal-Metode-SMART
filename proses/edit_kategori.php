<?php
include('onek.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = mysqli_real_escape_string($dbcon, $_POST['name']);
    $description = mysqli_real_escape_string($dbcon, $_POST['description']);

    // Update the database with the new data
    $query = "UPDATE categories SET name = '$name', description = '$description' WHERE id = '$id'";
    $result = mysqli_query($dbcon, $query);

    if ($result) {
        echo "Berhasil Mengedit Data";
    } else {
        echo "<script>alert('Gagal mengedit data: " . mysqli_error($dbcon) . "'); window.location.href = 'form_page.php';</script>";
    }
} else {
    echo "<script>alert('Form tidak disubmit dengan benar'); window.location.href = '../category.php';</script>";
}
