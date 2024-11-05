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
                <div class="formHeader row">
                    <h2 class="text-1 fl">List Nilai Produk</h2>
                </div>
                <form action="" method="GET" name="listForm" class="form scrollX">
                    <div class="table">
                        <div class="row bg-1">
                            <div class="cell cell-100 text-center text-fff">Product ID</div>
                            <div class="cell cell-150 text-center text-fff">Nama Produk</div>
                            <div class="cell cell-100p text-center text-fff">Range Harga</div>
                            <div class="cell cell-100 text-center text-fff">Range Efektivitas</div>
                            <div class="cell cell-100 text-center text-fff">Range Keamanan</div>
                            <div class="cell cell-100 text-center text-fff">Range Ketersediaan</div>
                            <div class="cell cell-100 text-center text-fff">Range Popularitas</div>
                            <div class="cell cell-100 text-center text-fff">Total Relatif</div>
                            <div class="cell cell-100 text-center text-fff">Aksi</div>
                        </div>
                        <!--   BEGIN LOOP -->
                        <ul>
                            <?php
                            $no = 1;
                            $select = mysqli_query($dbcon, "SELECT * FROM products");
                            while ($data = mysqli_fetch_array($select)) {
                                $select_kri = mysqli_query($dbcon, "SELECT * FROM criteria");
                                while ($data_bobot = mysqli_fetch_array($select_kri)) {
                                    $harga_relatif = $data_bobot['harga_relatif'] * $data['price'];
                                    $efek_relatif = $data_bobot['efek_relatif'] * $data['efektivitas'];
                                    $aman_relatif = $data_bobot['aman_relatif'] * $data['keamanan'];
                                    $sedia_relatif = $data_bobot['sedia_relatif'] * $data['ketersediaan'];
                                    $popular_relatif = $data_bobot['popular_relatif'] * $data['popularitas'];

                                    $total_relatif = $harga_relatif + $efek_relatif + $aman_relatif + $sedia_relatif + $popular_relatif;

                                    $update_query = "
                                        UPDATE products 
                                        SET 
                                            total_relatif = '$total_relatif'
                                        WHERE product_id = '{$data['product_id']}'
                                    ";
                                    mysqli_query($dbcon, $update_query);
                                }

                            ?>

                                <li class="row">
                                    <div class="cell cell-100 text-center"><?= $no ?></div>
                                    <div class="cell cell-150 text-center" disabled><?= $data['name'] ?></div>
                                    <div class="cell cell-100p text-center">Rp. <?= number_format($data['price'], 0, ',', '.') ?></div>
                                    <div class="cell cell-100 text-center"><?= $data['efektivitas'] ?></div>
                                    <div class="cell cell-100 text-center"><?= $data['keamanan'] ?></div>
                                    <div class="cell cell-100 text-center"><?= $data['ketersediaan'] ?></div>
                                    <div class="cell cell-100 text-center"><?= $data['popularitas'] ?></div>
                                    <div class="cell cell-100 text-center"><?= number_format($total_relatif, 1)  ?></div>
                                    <div class="cell cell-100 text-center">
                                        <a href="#open-productnilai-edit<?php echo $data['product_id']; ?>" class="button" data-toggle="modal" data-target="#open_modal<?php echo $data['product_id']; ?>">Edit</a>
                                        <?php include('component/modal_produk.php'); ?>
                                    </div>
                                </li>
                            <?php
                                $no++;
                            }
                            ?>
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
            <?php include('component/modal.php'); ?>
            <!-- END CONTAINER  -->
        </div>
    </div>
    <!-- partial -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/10.1.0/nouislider.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>