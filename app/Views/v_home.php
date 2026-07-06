<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
    .hero-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 60px 20px;
        border-radius: 15px;
        margin-bottom: 50px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    
    .hero-section h1 {
        font-weight: 700;
        font-size: 2.5rem;
        margin-bottom: 15px;
    }
    
    .hero-section p {
        font-size: 1.1rem;
        margin-bottom: 0;
        opacity: 0.95;
    }
    
    .product-card {
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        border-radius: 12px;
        height: 100%;
    }
    
    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.15);
    }
    
    .product-image-container {
        position: relative;
        overflow: hidden;
        height: 250px;
        border-radius: 12px 12px 0 0;
        background: #f8f9fa;
    }
    
    .product-image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    
    .product-card:hover .product-image-container img {
        transform: scale(1.05);
    }
    
    .product-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #667eea;
        color: white;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }
    
    .product-card-body {
        padding: 20px;
    }
    
    .product-title {
        font-weight: 600;
        font-size: 1.1rem;
        margin-bottom: 10px;
        color: #2c3e50;
    }
    
    .product-price {
        font-size: 1.4rem;
        color: #667eea;
        font-weight: 700;
        margin-bottom: 10px;
    }
    
    .product-stock {
        font-size: 0.9rem;
        color: #7f8c8d;
        margin-bottom: 15px;
    }
    
    .stock-badge {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
    }
    
    .stock-available {
        background: #d4edda;
        color: #155724;
    }
    
    .stock-limited {
        background: #fff3cd;
        color: #856404;
    }
    
    .btn-buy {
        width: 100%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: white;
        font-weight: 600;
        padding: 12px;
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    
    .btn-buy:hover {
        background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        color: white;
        transform: scale(1.02);
    }
    
    .products-section {
        margin-top: 40px;
    }
    
    .section-title {
        font-size: 2rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 30px;
        display: flex;
        align-items: center;
    }
    
    .section-title::before {
        content: '';
        display: inline-block;
        width: 5px;
        height: 35px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        margin-right: 15px;
        border-radius: 3px;
    }
</style>

<?php
if (session()->getFlashData('success')) {
?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle"></i> <?= session()->getFlashData('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>

<!-- Hero Section -->
<div class="hero-section">
    <h1>🛍️ Burjo 5758</h1>
    <p>Burjo 5758 menyediakan makanan dan minuman yang lezat dan menyegarkan. Belanja sekarang dan dapatkan pengalaman berbelanja yang menyenangkan!</p>
</div>

<!-- Products Section -->
<div class="products-section">
    <h2 class="section-title">Produk Terbaru</h2>
    
    <?php if (empty($products)) : ?>
        <div class="alert alert-info">
            <i class="bi bi-info-circle"></i> Belum ada produk yang tersedia. Silakan kembali lagi nanti.
        </div>
    <?php else : ?>
        <div class="row g-4">
            <?php foreach ($products as $key => $item) : ?>
                <div class="col-lg-4 col-md-6">
                    <?= form_open('keranjang') ?>
                    <?= form_hidden([
                        'id'    => $item['id'],
                        'nama'  => $item['nama'],
                        'harga' => $item['harga'],
                        'foto'  => $item['foto']]) ?>
                    
                    <div class="card product-card">
                        <div class="product-image-container">
                            <img src="<?= base_url() . "img/" . $item['foto'] ?>" alt="<?= $item['nama'] ?>">
                            <span class="product-badge">⭐ Pilihan</span>
                        </div>
                        
                        <div class="product-card-body">
                            <h5 class="product-title"><?= $item['nama'] ?></h5>
                            
                            <?php if (!empty($item['deskripsi'])) : ?>
                                <p class="product-description" style="font-size: 0.95rem; color: #555; margin-bottom: 12px; line-height: 1.4;">
                                    <?= $item['deskripsi'] ?>
                                </p>
                            <?php endif; ?>
                            
                            <div class="product-price">
                                <?= number_to_currency($item['harga'], 'IDR') ?>
                            </div>
                            
                            <div class="product-stock">
                                Stok: <span class="stock-badge <?= $item['jumlah'] > 5 ? 'stock-available' : 'stock-limited' ?>">
                                    <?= $item['jumlah'] ?> tersedia
                                </span>
                            </div>
                            
                            <button type="submit" class="btn btn-buy" <?= $item['jumlah'] <= 0 ? 'disabled' : '' ?>>
                                <i class="bi bi-cart-plus"></i> Tambah ke Keranjang
                            </button>
                        </div>
                    </div>
                    
                    <?= form_close() ?>
                </div>
            <?php endforeach ?>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>