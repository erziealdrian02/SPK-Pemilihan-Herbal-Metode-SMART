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
                  <h2 class="text-1 fl">List Kategori</h2>
                  <div class="fr">
                     <a href="#open-modal-category" class="btnAdd fa fa-plus bg-1 text-fff"></a>
                  </div>
               </div>
               <div class="table">
                  <div class="row bg-1">
                     <div class="cell cell-100 text-center text-fff">No</div>
                     <div class="cell cell-150 text-center text-fff">Nama Categori</div>
                     <div class="cell cell-100p text-center text-fff">List Categori</div>
                     <div class="cell cell-100 text-center text-fff"> Aksi </div>
                  </div>
                  <!--   BEGIN LOOP -->
                  <ul>
                     <?php
                     $no = 1;
                     $select = mysqli_query($dbcon, "SELECT * FROM categories");
                     while ($data = mysqli_fetch_array($select)) {
                     ?>
                        <li class="row">
                           <div class="cell cell-100 text-center"><?php echo $no; ?></div>
                           <div class="cell cell-150 text-center"><?php echo $data['name']; ?></div>
                           <div class="cell cell-100p text-center"><?php echo $data['description']; ?></div>
                           <div class="cell cell-100">
                              <a href="#open-categori-edit<?php echo $data['id']; ?>" data-toggle="modal" data-target="#open_modal<?php echo $data['id']; ?>">Edit</a> |
                              <a href='proses/hapusa_kategori.php?name=<?= $data['id']; ?>' onclick="return confirm('Apakah yakin menghapus ?')">Hapus</a>
                              <?php include('component/modal_categori.php'); ?>
                           </div>
                        </li>
                     <?php $no++;
                     } ?>
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