<?php
include('onek.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $criteria_id = $_POST['criteria_id'];
    $harga = mysqli_real_escape_string($dbcon, $_POST['harga']);
    $efek = mysqli_real_escape_string($dbcon, $_POST['efek']);
    $aman = mysqli_real_escape_string($dbcon, $_POST['aman']);
    $sedia = mysqli_real_escape_string($dbcon, $_POST['sedia']);
    $popular = mysqli_real_escape_string($dbcon, $_POST['popular']);

    // Update the database with the new data
    $query = "UPDATE criteria SET harga = '$harga', efek='$efek', aman = '$aman', sedia = '$sedia', popular = '$popular' WHERE criteria_id = '$criteria_id'";
    $result = mysqli_query($dbcon, $query);

    if ($result) {
        echo "Berhasil Mengedit Data";
    } else {
        echo "<script>alert('Gagal mengedit data: " . mysqli_error($dbcon) . "'); window.location.href = 'form_page.php';</script>";
    }
} else {
    echo "<script>alert('Form tidak disubmit dengan benar'); window.location.href = '../kriteria.php';</script>";
}
