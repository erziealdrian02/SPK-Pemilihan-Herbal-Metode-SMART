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
                                    $sql ="SELECT * FROM categories";
                                    $query = mysqli_query($dbcon, $sql);
                                    while ($siswa = mysqli_fetch_array($query)) {
                                ?>
                                <option value="<?=$siswa['name']?>"><?=$siswa['name']?></option>
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
        <form id="edit-form" action="../proses/update_produk.php" method="post" enctype="multipart/form-data" role="form">
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

<!-- Category Modal -->
<div id="open-modal-category" class="modal-window">
    <div>
        <a href="#" title="Close" class="modal-close">Close</a>
        <h1>Form Category Product</h1>
        <form id="diagnosa-form" action="proses/tambah_kategori.php" method="post" enctype="multipart/form-data" role="form">
            <div class="formBody row">
                <div class="column s-12">
                    <label class="inputGroup">
                        <span>Nama</span>
                        <span><input type="text" name="name" /></span>
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
<!-- Category Modal END -->

<!-- User Modal -->
<div id="open-modal-user" class="modal-window">
    <div>
        <a href="#" title="Close" class="modal-close">Close</a>
        <h1>Form Input Pelanggan</h1>
        <form id="diagnosa-form" action="proses/tambah_user.php" method="post" enctype="multipart/form-data" role="form">
            <div class="formBody row">
                <div class="column s-12">
                    <label class="inputGroup">
                        <span>Nama</span>
                        <span><input type="text" name="name" /></span>
                    </label>
                    <label class="inputGroup">
                        <span>Email</span>
                        <span><input type="text" name="email" /></span>
                    </label>
                </div>
            </div>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</div>
<!-- User Modal END -->