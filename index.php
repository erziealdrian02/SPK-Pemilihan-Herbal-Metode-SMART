<?php
session_start();
include './proses/onek.php';

if (isset($_GET['id'])) {
  if ($_GET['id'] == 'false') {
    echo "<script>alert('username / password salah. Gagal masuk.')</script>";
    header("location:login.php");
  } else if ($_GET['id'] == 'out') {
    echo "<script>alert('Anda belum masuk, silahkan maasuk.')</script>";
    header("location:login.php");
  } else {
    echo "<script>alert('Logout berhasil.')</script>";
    header("location:login.php");
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login Sistem Pengambilan Keputusan</title>
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="./css/login.css">

</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="container">
    <div class="login-wrapper">
      <form class="login-form" method="POST" role="form">
        <div class="username">
          <label><span class="fa"></span></label>
          <input type="text" placeholder="Username" name="username" />
        </div>
        <div class="password">
          <label><span class="entypo-lock"></span></label>
          <input type="password" placeholder="Password" name="password" />
        </div>
        <button class="btn" type="submit" name="submit" value="Masuk">Sign in</button>
      </form>
      <?php
      if (isset($_POST['submit'])) {
        $username = mysqli_real_escape_string($dbcon, $_POST['username']);
        $password = mysqli_real_escape_string($dbcon, $_POST['password']);

        $sqllogin = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $querylogin = mysqli_query($dbcon, $sqllogin);

        if (mysqli_num_rows($querylogin) > 0) {
          $row = mysqli_fetch_assoc($querylogin);
          $_SESSION['username'] = $username;
          $_SESSION['nama'] = $row['nama'];
          $_SESSION['stat'] = 'masuk';
          echo "<script>alert('Berhasil masuk, selamat datang " . $row['nama'] . "')</script>";
          header("location:home.php");
          exit;
        } else {
          echo "<script>alert('Username/password salah')</script>";
        }
      }

      ?>
    </div> <!-- /login-wrapper -->
  </div> <!-- /container -->
  <!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js'></script>
</body>

</html>