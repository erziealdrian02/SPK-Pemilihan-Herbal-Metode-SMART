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
                        <h2 class="text-1 fl">Hasil Nilai Pakar</h2>
                        <div class="fr">
                            <a href="printspk.php" target="_blank" class="btnAdd fa fa-print bg-1 text-fff"></a>
                        </div>
                    </div>
                    <div class="table">
                        <div class="row bg-1">
                            <div class="cell cell-100 text-center text-fff">No</div>
                            <div class="cell cell-100p text-center text-fff">Name Pelanggan</div>
                            <div class="cell cell-100 text-center text-fff">Range Harga</div>
                            <div class="cell cell-100 text-center text-fff">Range Efektivitas</div>
                            <div class="cell cell-100 text-center text-fff">Range Keamanan</div>
                            <div class="cell cell-100 text-center text-fff">Range Ketersediaan</div>
                            <div class="cell cell-100 text-center text-fff">Range Popularitas</div>
                            <div class="cell cell-100 text-center text-fff">Nilai Evaluasi Weight</div>
                            <div class="cell cell-100 text-center text-fff">Pilihan data</div>
                        </div>
                        <!--   BEGIN LOOP -->
                        <ul>
                            <?php
                            $no = 1;
                            $select = mysqli_query($dbcon, "SELECT * FROM penilaian");
                            while ($data = mysqli_fetch_array($select)) {
                                $select_kri = mysqli_query($dbcon, "SELECT * FROM criteria");
                                while ($data_bobot = mysqli_fetch_array($select_kri)) {
                                    $harga_relatif = $data_bobot['harga_relatif'] * $data['harga'];
                                    $efek_relatif = $data_bobot['efek_relatif'] * $data['efektivitas'];
                                    $aman_relatif = $data_bobot['aman_relatif'] * $data['keamanan'];
                                    $sedia_relatif = $data_bobot['sedia_relatif'] * $data['ketersediaan'];
                                    $popular_relatif = $data_bobot['popular_relatif'] * $data['popularitas'];

                                    $total_penilaian = $harga_relatif + $efek_relatif + $aman_relatif + $sedia_relatif + $popular_relatif;
                                    $total_penilaian = number_format($total_penilaian, 1);

                                    // Update total_penilaian in the penilaian table
                                    $update_query = "
                                        UPDATE penilaian 
                                        SET 
                                            total_penilaian = '$total_penilaian'
                                        WHERE penilaian_id = '{$data['penilaian_id']}'
                                    ";
                                    mysqli_query($dbcon, $update_query);

                                    // Select products and compare total_relatif with total_penilaian
                                    $products = [];
                                    $select_pen = mysqli_query($dbcon, "SELECT * FROM products");
                                    while ($data_pen = mysqli_fetch_array($select_pen)) {
                                        $products[] = $data_pen;
                                    }

                                    $closestAbove = null;
                                    $closestBelow = null;
                                    foreach ($products as $product) {
                                        if ($product['total_relatif'] >= $total_penilaian && ($closestAbove === null || $product['total_relatif'] < $closestAbove['total_relatif'])) {
                                            $closestAbove = $product;
                                        }
                                        if ($product['total_relatif'] <= $total_penilaian && ($closestBelow === null || $product['total_relatif'] > $closestBelow['total_relatif'])) {
                                            $closestBelow = $product;
                                        }
                                    }

                                    $produkCocokAtas = $closestAbove !== null ? $closestAbove['name'] : 'Tidak ada';
                                    $produkCocokBawah = $closestBelow !== null ? $closestBelow['name'] : 'Tidak ada';
                                }
                            ?>
                                <li class="row">
                                    <div class="cell cell-100 text-center"><?php echo $no; ?></div>
                                    <div class="cell cell-100p text-center"><?php echo $data['name']; ?></div>
                                    <div class="cell cell-100 text-center"><?php echo $data['harga']; ?></div>
                                    <div class="cell cell-100 text-center"><?php echo $data['efektivitas']; ?></div>
                                    <div class="cell cell-100 text-center"><?php echo $data['keamanan']; ?></div>
                                    <div class="cell cell-100 text-center"><?php echo $data['ketersediaan']; ?></div>
                                    <div class="cell cell-100 text-center"><?php echo $data['popularitas']; ?></div>
                                    <div class="cell cell-100 text-center"><?= $total_penilaian ?></div>
                                    <div class="cell cell-100 text-center"><a href="#open-spk-view<?php echo $produkCocokAtas; ?>" data-toggle="modal" data-target="#open_modal<?php echo $produkCocokAtas; ?>"><?php echo htmlspecialchars($produkCocokAtas); ?></a></div>
                                    <?php include('component/modal_spk.php'); ?>
                                </li>
                            <?php
                                $no++;
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