<?php
include('onek.php');
if (isset($_POST['submit'])) {
    $name        = $_POST['name'];
    $weight       = $_POST['weight'];
    $description       = $_POST['description'];

    $sql = "INSERT INTO criteria (name, weight, description) VALUES ('$name', '$weight', '$description')";
    $query = mysqli_query($dbcon, $sql);

    if ($query) {
        echo "<script>alert('Berhasil memasukkan data Alternatif'); window.location.href = '../kriteria.php';</script>";
    } else {
        echo "<script>alert('Gagal memasukkan data: " . mysqli_error($dbcon) . "'); window.location.href = 'form_page.php';</script>";
    }

    mysqli_close($dbcon);
} else {
    echo "<script>alert('Form tidak disubmit dengan benar'); window.location.href = 'form_page.php';</script>";
}
