<div class="sideArea">
    <div class="avatar">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSCNOdyoIXDDBztO_GC8MFLmG_p6lZ2lTDh1ZnxSDawl1TZY_Zw" alt="" />
        <div class="avatarName">Welcome,<br /><?php echo $_SESSION['nama']; ?></div>
    </div>
    <ul class="sideMenu">
        <li>
            <a href="home.php"><span class="fa fa-home"></span>Beranda</a>
        </li>
        <li>
            <a href="customer.php"><span class="fa fa-user-o"></span>Pembeli</a>
        </li>
        <li>
            <a href="javascript:void(0)" class="has-submenu"><span class="fa fa-table"></span>Produk</a>
            <ul class="submenu">
                <li>
                    <a href="produk.php"><span class="fa fa-list"></span>List Produk</a>
                </li>
                <li>
                    <a href="produk_nilai.php"><span class="fa fa-bar-chart"></span>List Nilai Produk</a>
                </li>
                <!-- <li>
                    <a href="category.php"><span class="fa fa-tags"></span>List Kategori</a>
                </li> -->
            </ul>
        </li>
        <li>
            <a href="kriteria.php"><span class="fa fa-sitemap"></span>Kriteria</a>
        </li>
        <li>
            <a href="penilaian.php"><span class="fa fa-money"></span>Isi Nilai Objek</a>
        </li>
        <li>
            <a href="spk.php"><span class="fa fa-envelope-o"></span>Proses SPK</a>
        </li>
    </ul>
</div>