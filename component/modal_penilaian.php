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

<!-- penilaian Modal -->
<div id="open-penilaian-add" class="modal-window">
    <div>
        <a href="#" title="Close" class="modal-close">Close</a>
        <h1>Form Input Nilai Pakar</h1>
        <form id="diagnosa-form" action="proses/tambah_penilaian.php" method="post" enctype="multipart/form-data" role="form">
            <div class="formBody row">
                <div class="column s-12">
                    <label class="inputGroup">
                        <span>Nama</span>
                        <span>
                            <select name="name" id="name" required>
                                <option value="" disabled selected>--Pilih Nama--</option>
                                <?php
                                $sql = "SELECT * FROM consumers";
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
                        <span>Range Harga</span>
                        <span><input type="number" name="harga" placeholder="Masukkan Rate Harga" /></span>
                    </label>
                    <label class="inputGroup">
                        <span>Range Efektivitas</span>
                        <span><input type="number" name="efektivitas" placeholder="Masukkan nilai 1-100" /></span>
                    </label>
                    <label class="inputGroup">
                        <span>Range Keamanan</span>
                        <span><input type="number" name="keamanan" placeholder="Masukkan nilai 1-100" /></span>
                    </label>
                    <label class="inputGroup">
                        <span>Range Ketersediaan</span>
                        <span><input type="number" name="ketersediaan" placeholder="Masukkan nilai 1-100" /></span>
                    </label>
                    <label class="inputGroup">
                        <span>Range Poularitas</span>
                        <span><input type="number" name="popularitas" placeholder="Masukkan nilai 1-100" /></span>
                    </label>
                </div>
            </div>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</div>
<div id="open-penilaian-edit<?php echo $data['penilaian_id']; ?>" class="modal-window">
    <div>
        <a href="#" title="Close" class="modal-close">Close</a>
        <h1>Form Input Nilai Pakar</h1>
        <form id="diagnosa-form-edit-<?php echo $data['penilaian_id']; ?>" action="proses/edit_penilaian.php" method="post" enctype="multipart/form-data" role="form">
            <div class="formBody row">
                <div class="column s-12">
                    <label class="inputGroup">
                        <span>Nama</span>
                        <span>
                            <select name="name">
                                <?php
                                $sql = "SELECT * FROM penilaian";
                                $query = mysqli_query($dbcon, $sql);
                                while ($siswa = mysqli_fetch_array($query)) {
                                    $selected = ($siswa['name'] == $data['name']) ? 'selected' : '';
                                ?>
                                    <option value="<?= $siswa['name'] ?>" <?= $selected ?>><?= $siswa['name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </span>
                    </label>
                    <label class="inputGroup">
                        <span>Range Harga</span>
                        <span><input type="number" name="harga" placeholder="Masukkan Rate Harga" value="<?php echo $data['harga']; ?>" /></span>
                    </label>
                    <label class="inputGroup">
                        <span>Range Efektivitas</span>
                        <span><input type="number" name="efektivitas" placeholder="Masukkan nilai 1-100" value="<?php echo $data['efektivitas']; ?>" /></span>
                    </label>
                    <label class="inputGroup">
                        <span>Range Keamanan</span>
                        <span><input type="number" name="keamanan" placeholder="Masukkan nilai 1-100" value="<?php echo $data['keamanan']; ?>" /></span>
                    </label>
                    <label class="inputGroup">
                        <span>Range Ketersediaan</span>
                        <span><input type="number" name="ketersediaan" placeholder="Masukkan nilai 1-100" value="<?php echo $data['ketersediaan']; ?>" /></span>
                    </label>
                    <label class="inputGroup">
                        <span>Range Poularitas</span>
                        <span><input type="number" name="popularitas" placeholder="Masukkan nilai 1-100" value="<?php echo $data['popularitas']; ?>" /></span>
                    </label>
                    <input type="hidden" name="penilaian_id" value="<?php echo $data['penilaian_id']; ?>" />
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
                window.location.href = './penilaian.php';
            }).catch(error => {
                console.error('Error:', error);
            });
        });
    });
</script>

<!-- Category Modal END -->