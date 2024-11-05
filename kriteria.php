<!DOCTYPE html>
<?php
include './proses/onek.php';
?>
<html lang="en">
<?php include('component/header.php'); ?>

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
            <form action="" method="GET" name="listForm" class="form scrollX">
               <div class="formHeader row">
                  <h2 class="text-1 fl">Data Kriteria</h2>
                  <!-- <div class="fr">
                     <a href="#open-kriteria-add" class="btnAdd fa fa-plus bg-1 text-fff"></a>
                  </div> -->
               </div>
               <div class="table">
                  <div class="row bg-1">
                     <div class="cell cell-100 text-center text-fff"></div>
                     <div class="cell cell-150 text-center text-fff">Bobot Harga</div>
                     <div class="cell cell-150 text-center text-fff">Bobot Keefektifan</div>
                     <div class="cell cell-150 text-center text-fff">Bobot Keamanan</div>
                     <div class="cell cell-150 text-center text-fff">Bobot Ketersediaan</div>
                     <div class="cell cell-150 text-center text-fff">Bobot Kepopularan</div>
                     <div class="cell cell-100p text-center text-fff">Total Bobot</div>
                     <div class="cell cell-100 text-center text-fff"> Aksi </div>
                  </div>
                  <!--   BEGIN LOOP -->

                  <ul>
                     <?php

                     // Fetch criteria from the database
                     $select = mysqli_query($dbcon, "SELECT * FROM criteria");

                     while ($data = mysqli_fetch_array($select)) {
                        // Calculate total weight
                        $total_bobot = $data['harga'] + $data['efek'] + $data['aman'] + $data['sedia'] + $data['popular'];

                        // Calculate normalized weights
                        $harga_relatif = $data['harga'] / $total_bobot;
                        $efek_relatif = $data['efek'] / $total_bobot;
                        $aman_relatif = $data['aman'] / $total_bobot;
                        $sedia_relatif = $data['sedia'] / $total_bobot;
                        $popular_relatif = $data['popular'] / $total_bobot;

                        // Update the database with the total and normalized weights
                        $update_query = "
                             UPDATE criteria 
                             SET 
                                 total_bobot = '$total_bobot',
                                 harga_relatif = '$harga_relatif',
                                 efek_relatif = '$efek_relatif',
                                 aman_relatif = '$aman_relatif',
                                 sedia_relatif = '$sedia_relatif',
                                 popular_relatif = '$popular_relatif'
                             WHERE criteria_id = '{$data['criteria_id']}'
                         ";
                        mysqli_query($dbcon, $update_query);

                        // $tota_normalisasi = $data['harga_relatif'] + $data['efek_relatif'] + $data['aman_relatif'] + $data['sedia_relatif'] + $data['popular_relatif'];
                        $tota_normalisasi = $harga_relatif + $efek_relatif + $aman_relatif + $sedia_relatif + $popular_relatif;
                     ?>
                        <li class="row">
                           <div class="cell cell-100 text-center"><b>Bobot</b></div>
                           <div class="cell cell-150 text-center"><?php echo $data['harga']; ?></div>
                           <div class="cell cell-150 text-center"><?php echo $data['efek']; ?></div>
                           <div class="cell cell-150 text-center"><?php echo $data['aman']; ?></div>
                           <div class="cell cell-150 text-center"><?php echo $data['sedia']; ?></div>
                           <div class="cell cell-150 text-center"><?php echo $data['popular']; ?></div>
                           <div class="cell cell-100p text-center"><?php echo $data['total_bobot']; ?></div>
                           <div class="cell cell-100 text-center">
                              <a href="#open-kriteria-edit<?php echo $data['criteria_id']; ?>" data-toggle="modal" data-target="#open_modal<?php echo $data['criteria_id']; ?>">Edit</a>
                              <?php include('component/modal_kriteria.php'); ?>
                           </div>
                        </li>
                        <li class="row">
                           <div class="cell cell-100 text-center"><b>Normalisasi Bobot</b></div>
                           <div class="cell cell-150 text-center"><?php echo $data['harga_relatif']; ?></div>
                           <div class="cell cell-150 text-center"><?php echo $data['efek_relatif']; ?></div>
                           <div class="cell cell-150 text-center"><?php echo $data['aman_relatif']; ?></div>
                           <div class="cell cell-150 text-center"><?php echo $data['sedia_relatif']; ?></div>
                           <div class="cell cell-150 text-center"><?php echo $data['popular_relatif']; ?></div>
                           <div class="cell cell-100p text-center"><?php echo $tota_normalisasi ?></div>
                           <div class="cell cell-100 text-center">
                           </div>
                        </li>
                     <?php
                     }
                     ?>
                  </ul>
                  <!--   END LOOP -->
               </div>
            </form>
         </div>
         <!-- END CONTAINER  -->
      </div>
   </div>
   <!-- partial -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/10.1.0/nouislider.js"></script>
   <script src="./js/script.js"></script>
</body>

</html>