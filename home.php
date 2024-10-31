<!DOCTYPE html>
<?php
include './proses/onek.php';

// Fetch total customers
$result = mysqli_query($dbcon, "SELECT COUNT(*) AS count FROM consumers");
$row = mysqli_fetch_assoc($result);
$total_customers = $row['count'];

// Fetch total products
$result = mysqli_query($dbcon, "SELECT COUNT(*) AS count FROM products");
$row = mysqli_fetch_assoc($result);
$total_products = $row['count'];

// Fetch total categories
$result = mysqli_query($dbcon, "SELECT COUNT(*) AS count FROM categories");
$row = mysqli_fetch_assoc($result);
$total_categories = $row['count'];

// Fetch total assessments
$result = mysqli_query($dbcon, "SELECT COUNT(*) AS count FROM penilaian");
$row = mysqli_fetch_assoc($result);
$total_assessments = $row['count'];
?>

<html lang="en">
<style>
   .cardContainer {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
      margin-top: 20px;
   }

   .card {
      background-color: #f8f8f8;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
      text-align: center;
      width: 200px;
      margin: 10px;
   }

   .card h3 {
      margin-bottom: 10px;
      font-size: 18px;
      color: #333;
   }

   .card p {
      font-size: 24px;
      color: #333;
   }

   .aboutSection {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-top: 20px;
   }

   .aboutPhoto {
      flex: 0 0 150px;
      margin-right: 20px;
   }

   .aboutPhoto img {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
   }

   .aboutInfo {
      flex: 1;
   }

   .aboutInfo h3 {
      margin-bottom: 10px;
      font-size: 24px;
      color: #333;
   }

   .aboutInfo p {
      margin: 5px 0;
      font-size: 16px;
      color: #666;
   }
</style>
<?php require_once('component/header.php'); ?>

<body>
   <!-- partial:index.partial.html -->
   <div class="container">
      <!--     SIDE AREA -->
      <?php include('component/sidebar.php'); ?>
      <!--     SIDE AREA -->
      <div class="mainArea">
         <!-- BEGIN NAV -->
         <?php include('component/navbar.php'); ?>
         <!-- END NAV -->
         <!-- CONTAINER  -->
         <div class="mainContent">
            <!-- LIST FORM -->
            <div class="formHeader row">
               <h2 class="text-1 text-center">Dashboard</h2>
               <div class="cardContainer">
                  <div class="card">
                     <h3>Total Customers</h3>
                     <p><?php echo $total_customers; ?></p>
                  </div>
                  <div class="card">
                     <h3>Total Products</h3>
                     <p><?php echo $total_products; ?></p>
                  </div>
                  <div class="card">
                     <h3>Total Categories</h3>
                     <p><?php echo $total_categories; ?></p>
                  </div>
                  <div class="card">
                     <h3>Total Assessments</h3>
                     <p><?php echo $total_assessments; ?></p>
                  </div>
               </div>
            </div>
         </div>
         <div class="mainContent">
            <!-- LIST FORM -->
            <div class="formHeader row">
               <h2 class="text-1 text-center">About</h2>
               <div class="aboutSection">
                  <div class="aboutPhoto">
                     <img src="/images/about.jpg" alt="Profile Photo">
                  </div>
                  <div class="aboutInfo">
                     <h3>User Name</h3>
                     <p><strong>NPM:</strong> 123123123</p>
                     <p>Saya Adalah mahasiswa akhir Teknik Informatika dari Universitas Indraprasta PGRI....(Lanjutin aja To ada di Home.php Line 139).</p>
                  </div>
               </div>
            </div>
         </div>
         <!-- END CONTAINER  -->
      </div>
   </div>
   <!-- partial -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/10.1.0/nouislider.js"></script>
   <script src="./js/script.js"></script>
</body>

</html>