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
                  <h2 class="text-1 fl">List Pembeli</h2>
                  <div class="fr">
                     <a href="#open-customer-add" class="btnAdd fa fa-plus bg-1 text-fff"></a>
                  </div>
               </div>
               <div class="table">
                  <div class="row bg-1">
                     <div class="cell cell-100 text-center text-fff">No</div>
                     <div class="cell cell-150 text-center text-fff">Nama Konsumen</div>
                     <div class="cell cell-100p text-center text-fff">Email Konsumen</div>
                     <div class="cell cell-100 text-center text-fff"> Aksi </div>
                  </div>
                  <!--   BEGIN LOOP -->
                  <ul>
                     <?php
                     $no = 1;
                     $select = mysqli_query($dbcon, "SELECT * FROM consumers");
                     while ($data = mysqli_fetch_array($select)) {
                     ?>
                        <li class="row">
                           <div class="cell cell-100 text-center"><?php echo $no; ?></div>
                           <div class="cell cell-150 text-center"><?php echo $data['name']; ?></div>
                           <div class="cell cell-100p text-center"><?php echo $data['email']; ?></div>
                           <div class="cell cell-100">
                              <a href="#open-customer-edit<?php echo $data['consumer_id']; ?>" class="button" data-toggle="modal" data-target="#open_modal<?php echo $data['consumer_id']; ?>">Edit</a> |
                              <a href='proses/hapusa_customer.php?name=<?= $data['consumer_id']; ?>' onclick="return confirm('Apakah yakin menghapus ?')">Hapus</a>
                              <?php include('component/modal_customer.php'); ?>
                           </div>
                        </li>
                     <?php $no++;
                     } ?>
                  </ul>
                  <!--   END LOOP -->
               </div>
            </form>

            <!-- <div id="pagination">
                  <ul class="pagination list-inline text-center">
                     <li><a href="?page=1">1</a></li>
                     <li class="is-active"><a href="?page=2">2</a></li>
                     <li><a href="?page=3">3</a></li>
                     <li><a href="?page=4">4</a></li>
                     <li><a href="?page=5">5</a></li>
                  </ul>
               </div> -->
         </div>
         <!-- END CONTAINER  -->
      </div>
   </div>
   <!-- partial -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/10.1.0/nouislider.js"></script>
   <script src="./js/script.js"></script>
</body>

</html>