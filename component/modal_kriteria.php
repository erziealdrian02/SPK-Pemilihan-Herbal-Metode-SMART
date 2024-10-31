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
            <input type="hidden" name="id" id="edit-product-id" />
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
                fetch(`get_product.php?id=${productId}`)
                    .then(response => response.json())
                    .then(data => {
                        // Isi form dengan data produk
                        document.getElementById('edit-product-id').value = data.id;
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

<!-- Category Modal -->
<div id="open-kriteria-add" class="modal-window">
    <div>
        <a href="#" title="Close" class="modal-close">Close</a>
        <h1>Form Kriteria</h1>
        <form id="diagnosa-form" action="proses/tambah_kriteria.php" method="post" enctype="multipart/form-data" role="form">
            <div class="formBody row">
                <div class="column s-12">
                    <label class="inputGroup">
                        <span>Nama</span>
                        <span><input type="text" name="name" /></span>
                    </label>
                    <label class="inputGroup">
                        <span>Bobot</span>
                        <span><input type="number" name="weight" /></span>
                    </label>
                    <label class="inputGroup">
                        <span>Description</span>
                        <span><textarea name="description"></textarea></span>
                    </label>
                </div>
            </div>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</div>
<div id="open-kriteria-edit<?php echo $data['criteria_id']; ?>" class="modal-window">
    <div>
        <a href="#" title="Close" class="modal-close">Close</a>
        <h1>Form Input Pelanggan</h1>
        <form id="diagnosa-form-edit-<?php echo $data['criteria_id']; ?>" action="proses/edit_kriteria.php" method="post" enctype="multipart/form-data" role="form">
            <div class="formBody row">
                <div class="column s-12">
                    <label class="inputGroup">
                        <span>Bobot Harga</span>
                        <span><input type="number" name="harga" value="<?php echo $data['harga']; ?>" /></span>
                    </label>
                    <label class="inputGroup">
                        <span>Bobot Keefektifan</span>
                        <span><input type="number" name="efek" value="<?php echo $data['efek']; ?>" /></span>
                    </label>
                    <label class="inputGroup">
                        <span>Bobot Keamanan</span>
                        <span><input type="number" name="aman" value="<?php echo $data['aman']; ?>" /></span>
                    </label>
                    <label class="inputGroup">
                        <span>Bobot Ketersediaan</span>
                        <span><input type="number" name="sedia" value="<?php echo $data['sedia']; ?>" /></span>
                    </label>
                    <label class="inputGroup">
                        <span>Bobot Kepopularan</span>
                        <span><input type="number" name="popular" value="<?php echo $data['popular']; ?>" /></span>
                    </label>
                    <input type="hidden" name="criteria_id" value="<?php echo $data['criteria_id']; ?>" />
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
                window.location.href = './kriteria.php';
            }).catch(error => {
                console.error('Error:', error);
            });
        });
    });
</script>
<!-- Category Modal END -->