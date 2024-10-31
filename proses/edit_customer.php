<?php
include('onek.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $consumer_id = $_POST['consumer_id'];
    $name = mysqli_real_escape_string($dbcon, $_POST['name']);
    $email = mysqli_real_escape_string($dbcon, $_POST['email']);

    // Update the database with the new data
    $query = "UPDATE consumers SET name = '$name', email = '$email' WHERE consumer_id = '$consumer_id'";
    $result = mysqli_query($dbcon, $query);

    if ($result) {
        echo "Berhasil Mengedit Data";
    } else {
        echo "<script>alert('Gagal mengedit data: " . mysqli_error($dbcon) . "'); window.location.href = 'form_page.php';</script>";
    }
} else {
    echo "<script>alert('Form tidak disubmit dengan benar'); window.location.href = '../customer.php';</script>";
}
