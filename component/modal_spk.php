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
                                while ($herbal = mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?= $herbal['name'] ?>"><?= $herbal['name'] ?></option>
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
                                while ($herbal = mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?= $herbal['name']; ?>"><?= $herbal['name']; ?></option>
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

<!-- SPK Modal -->
<div id="open-spk-view<?php echo $produkCocokAtas ?>" class="modal-window">
    <div class="modal-content">
        <a href="#" title="Close" class="modal-close">Close</a>
        <h1>Detail Herbal</h1>
        <?php
        $sql = "SELECT * FROM products WHERE name = '$produkCocokAtas'";
        $query = mysqli_query($dbcon, $sql);
        while ($herbal = mysqli_fetch_array($query)) {
        ?>
            <div class="herbal-details">
                <p><strong>Herbal yang disarankan adalah:</strong> <?php echo $herbal['name']; ?></p>
                <p><strong>Kategori Herbal:</strong> <?php echo $herbal['category']; ?></p>
                <p><strong>Penjelasan mengenai Herbal ini:</strong><?php echo $herbal['description']; ?></p>
                <p><strong>Harga Herbal ini:</strong> Rp.<?php echo $herbal['price']; ?></p>
                <p><strong>Brand Herbal:</strong><?php echo $herbal['brand']; ?></p>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<style>
    .herbal-details p {
        margin: 10px 0;
        line-height: 1.6;
    }

    .herbal-details p strong {
        display: block;
        margin-bottom: 5px;
    }
</style>