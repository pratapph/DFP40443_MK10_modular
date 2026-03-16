<?php
// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $invois_data = processOrder($_POST, $produk_list);
    
    if ($invois_data === false) {
        echo "<script>alert('Sila pilih sekurang-kurangnya satu jenis biskut sebelum meneruskan tempahan.'); window.location.href='index.php?menu=tempah';</script>";
        exit();
    }
    
    $_SESSION['invois_data'] = $invois_data;
    
    // Redirect to invoice page
    header("Location: index.php?menu=invois");
    exit();
}
?>

<h1 class="page-title">Borang Tempahan</h1>

<form action="" method="POST">
    <div class="product-grid">
        <?php foreach ($produk_list as $produk): ?>
            <div class="product-card">
                <img src="gambar/<?= htmlspecialchars($produk['gambar']) ?>" 
                     alt="<?= htmlspecialchars($produk['nama']) ?>" 
                     class="product-image">
                <h3 class="product-name"><?= htmlspecialchars($produk['nama']) ?></h3>
                
                <?php foreach ($produk['harga'] as $saiz_key => $harga): ?>
                    <div class="product-option">
                        <label for="produk_<?= $produk['id'] ?>_<?= $saiz_key ?>" class="option-label">
                            <span class="option-name"><?= htmlspecialchars(ucwords(str_replace('_', ' ', $saiz_key))) ?></span>
                            <span class="option-price"><?= formatRupiah($harga) ?></span>
                        </label>
                        <input type="number" 
                               id="produk_<?= $produk['id'] ?>_<?= $saiz_key ?>" 
                               name="tempahan[<?= $produk['id'] ?>][<?= $saiz_key ?>]" 
                               min="0" 
                               value="0" 
                               data-price="<?= $harga ?>" 
                               class="qty-input">
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="checkout-section">
        <div class="total-display">
            <span class="total-label">Jumlah Harga:</span>
            <span class="total-amount" id="total-price">RM 0.00</span>
        </div>
        
        <div class="form-group">
            <label for="nama" class="input-label">Nama Penuh Anda:</label>
            <input type="text" 
                   id="nama" 
                   name="nama_pelanggan" 
                   placeholder="Contoh: Ali Bin Abu" 
                   required 
                   class="checkout-input">
        </div>
        
        <button type="submit" class="checkout-button">Teruskan</button>
    </div>
</form>

<script src="js/order-calculator.js"></script>