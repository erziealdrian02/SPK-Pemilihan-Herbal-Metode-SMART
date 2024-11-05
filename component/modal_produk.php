<!-- Product Modal -->
<div id="open-modal-product" class="modal-window">
    <div>
        <a href="#" title="Close" class="modal-close">Close</a>
        <h1>Form Diagnosa Handphone</h1>
        <form id="diagnosa-form" action="proses/tambah_produk.php" method="post" enctype="multipart/form-data" role="form">
            <div class="formBody row">
                <div class="column s-12">
                    <label class="inputGroup">
                        <span>Name</span>
                        <span><input type="text" name="name" /></span>
                    </label>
                    <label class="inputGroup">
                        <span>Category</span>
                        <span>
                            <select name="category">
                                <?php
                                $sql = "SELECT * FROM categories";
                                $query = mysqli_query($dbcon, $sql);
                                while ($siswa = mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?= $siswa['name'] ?>"><?= $siswa['name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </span>
                    </label>
                    <label class="inputGroup">
                        <span>Description</span>
                        <span><textarea name="description"></textarea></span>
                    </label>
                    <label class="inputGroup">
                        <span>Harga</span>
                        <span><input type="number" name="price" /></span>
                    </label>
                    <label class="inputGroup">
                        <span>Merek</span>
                        <span><input type="text" name="brand" /></span>
                    </label>
                </div>
            </div>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</div>
<div id="open-modal-product-edit" class="modal-window">
    <div>
        <a href="#" title="Close" class="modal-close">Close</a>
        <h1>Edit Produk</h1>
        <form id="edit-form" action="./proses/update_produk.php" method="post" enctype="multipart/form-data" role="form">
            <input type="hidden" name="product_id" id="edit-product-id" />
            <div class="formBody row">
                <div class="column s-12">
                    <label class="inputGroup">
                        <span>Name</span>
                        <span><input type="text" name="name" id="edit-name" /></span>
                    </label>
                    <label class="inputGroup">
                        <span>Category</span>
                        <span>
                            <select name="category" id="edit-category">
                                <?php
                                $sql = "SELECT * FROM categories";
                                $query = mysqli_query($dbcon, $sql);
                                while ($siswa = mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?= $siswa['name']; ?>"><?= $siswa['name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </span>
                    </label>
                    <label class="inputGroup">
                        <span>Description</span>
                        <span><textarea name="description" id="edit-description"></textarea></span>
                    </label>
                    <label class="inputGroup">
                        <span>Harga</span>
                        <span><input type="number" name="price" id="edit-price" /></span>
                    </label>
                    <label class="inputGroup">
                        <span>Merek</span>
                        <span><input type="text" name="brand" id="edit-brand" /></span>
                    </label>
                </div>
            </div>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editButtons = document.querySelectorAll('.edit-product');

        editButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const productId = this.getAttribute('data-product-id');

                // Mengambil data produk dari server menggunakan AJAX
                fetch(`get_product.php?product_id=${productId}`)
                    .then(response => response.json())
                    .then(data => {
                        // Isi form dengan data produk
                        document.getElementById('edit-product-id').value = data.product_id;
                        document.getElementById('edit-name').value = data.name;
                        document.getElementById('edit-category').value = data.category;
                        document.getElementById('edit-description').value = data.description;
                        document.getElementById('edit-price').value = data.price;
                        document.getElementById('edit-brand').value = data.brand;

                        // Buka modal
                        window.location.href = '#open-modal-product-edit';
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    });
</script>
<!-- Product Modal END -->

<!-- Product Modal -->
<div id="open-product-add" class="modal-window">
    <div>
        <a href="#" title="Close" class="modal-close">Close</a>
        <h1>Form Tambah Produk</h1>
        <form id="diagnosa-form" action="./proses/tambah_produk.php" method="post" enctype="multipart/form-data" role="form">
            <div class="formBody row">
                <div class="column s-12">
                    <label class="inputGroup">
                        <span>Name</span>
                        <span><input type="text" name="name" /></span>
                    </label>
                    <label class="inputGroup">
                        <span>Category</span>
                        <span>
                            <select name="category">
                                <option value="" disabled selected>--Pilih Category--</option>
                                <?php
                                $sql = "SELECT * FROM categories";
                                $query = mysqli_query($dbcon, $sql);
                                while ($siswa = mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?= $siswa['name'] ?>"><?= $siswa['name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </span>
                    </label>
                    <label class="inputGroup">
                        <span>Description</span>
                        <span><textarea name="description"></textarea></span>
                    </label>
                    <label class="inputGroup">
                        <span>Harga</span>
                        <span><input type="number" name="price" /></span>
                    </label>
                    <label class="inputGroup">
                        <span>Merek</span>
                        <span><input type="text" name="brand" /></span>
                    </label>
                </div>
            </div>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</div>
<div id="open-product-edit<?php echo $data['product_id']; ?>" class="modal-window">
    <div>
        <a href="#" title="Close" class="modal-close">Close</a>
        <h1>Form Input Pelanggan</h1>
        <form id="diagnosa-form" action="proses/edit_produk.php" method="post" enctype="multipart/form-data" role="form">
            <div class="formBody row">
                <div class="column s-12">
                    <input type="hidden" name="product_id" value="<?php echo $data['product_id']; ?>" />
                    <label class="inputGroup">
                        <span>Name</span>
                        <span><input type="text" name="name" value="<?php echo $data['name']; ?>" /></span>
                    </label>
                    <label class="inputGroup">
                        <span>Category</span>
                        <span>
                            <select name="category">
                                <?php
                                $sql = "SELECT * FROM categories";
                                $query = mysqli_query($dbcon, $sql);
                                while ($siswa = mysqli_fetch_array($query)) {
                                    $selected = ($siswa['name'] == $data['category']) ? 'selected' : '';
                                ?>
                                    <option value="<?= $siswa['name'] ?>" <?= $selected ?>><?= $siswa['name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </span>
                    </label>
                    <label class="inputGroup">
                        <span>Description</span>
                        <span><textarea name="description"><?php echo $data['description']; ?></textarea></span>
                    </label>
                    <label class="inputGroup">
                        <span>Harga</span>
                        <span><input type="number" name="price" value="<?php echo $data['price']; ?>" /></span>
                    </label>
                    <label class="inputGroup">
                        <span>Merek</span>
                        <span><input type="text" name="brand" value="<?php echo $data['brand']; ?>" /></span>
                    </label>
                </div>
            </div>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</div>
<script>
    document.querySelectorAll('form[id^="diagnosa-form-edit-"]').forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah pengiriman form default
            const formData = new FormData(this);
            fetch(this.action, {
                method: this.method,
                body: formData
            }).then(response => response.text()).then(data => {
                alert(data);
                window.location.href = './produk.php';
            }).catch(error => {
                console.error('Error:', error);
            });
        });
    });
</script>
<div id="open-productnilai-edit<?php echo $data['product_id']; ?>" class="modal-window">
    <div>
        <a href="#" title="Close" class="modal-close">Close</a>
        <h1>Form Input Pelanggan</h1>
        <form id="diagnosa-form" action="proses/edit_produknilai.php" method="post" enctype="multipart/form-data" role="form">
            <div class="formBody row">
                <div class="column s-12">
                    <input type="hidden" name="product_id" value="<?php echo $data['product_id']; ?>" />
                    <label class="inputGroup">
                        <span>Name</span>
                        <span><input type="text" name="name" value="<?php echo $data['name']; ?>" disabled /></span>
                    </label>
                    <label class="inputGroup">
                        <span>Range Harga</span>
                        <span><input type="number" name="price" value="<?php echo $data['price']; ?>" disabled /></span>
                    </label>
                    <label class="inputGroup">
                        <span>Range Efektivitas</span>
                        <span><input type="number" name="efektivitas" value="<?php echo $data['efektivitas']; ?>" /></span>
                    </label>
                    <label class="inputGroup">
                        <span>Range Keamanan</span>
                        <span><input type="number" name="keamanan" value="<?php echo $data['keamanan']; ?>" /></span>
                    </label>
                    <label class="inputGroup">
                        <span>Range Ketersediaan</span>
                        <span><input type="number" name="ketersediaan" value="<?php echo $data['ketersediaan']; ?>" /></span>
                    </label>
                    <label class="inputGroup">
                        <span>Range Popularitas</span>
                        <span><input type="number" name="popularitas" value="<?php echo $data['popularitas']; ?>" /></span>
                    </label>
                </div>
            </div>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</div>
<script>
    document.querySelectorAll('form[id^="diagnosa-form-edit-"]').forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah pengiriman form default
            const formData = new FormData(this);
            fetch(this.action, {
                method: this.method,
                body: formData
            }).then(response => response.text()).then(data => {
                alert(data);
                window.location.href = './produk_nilai.php';
            }).catch(error => {
                console.error('Error:', error);
            });
        });
    });
</script>
<!-- Product Modal END -->