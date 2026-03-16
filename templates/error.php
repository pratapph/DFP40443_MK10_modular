<!-- templates/error.php -->
<h1 class="page-title">Ralat - Halaman Tidak Dijumpai</h1>

<div class="error-page">
    <div class="error-message">
        <h2>Maaf, menu tidak wujud</h2>
        <p>Menu "<strong><?= htmlspecialchars($_GET['menu'] ?? '') ?></strong>" tidak ditemui.</p>
        <p>Sila semak semula URL anda.</p>
        
        <div class="error-links">
            <a href="index.php?menu=utama" class="home-link">Kembali ke Utama</a>
            <a href="index.php?menu=tempah" class="order-link">Buat Tempahan</a>
        </div>
    </div>
</div>