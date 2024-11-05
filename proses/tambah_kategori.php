<?php
include ('onek.php');
if (isset($_POST['submit'])) {
    $name        = $_POST['name'];
    $description = $_POST['description'];

    $sql = "INSERT INTO categories (name, description) VALUES ('$name', '$description')";
    $query = mysqli_query($dbcon, $sql);
    
    if ($query) {
        echo "<script>alert('Berhasil memasukkan data Alternatif'); window.location.href = '../category.php';</script>";
    } else {
        echo "<script>alert('Gagal memasukkan data: " . mysqli_error($dbcon) . "'); window.location.href = 'form_page.php';</script>";
    }

    mysqli_close($dbcon);
} else {
    echo "<script>alert('Form tidak disubmit dengan benar'); window.location.href = 'form_page.php';</script>";
}
?>
