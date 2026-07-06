<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
    .cart-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 30px 20px;
        border-radius: 15px;
        margin-bottom: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    
    .cart-header h1 {
        font-weight: 700;
        font-size: 2rem;
        margin-bottom: 5px;
    }
    
    .cart-header p {
        font-size: 1rem;
        margin-bottom: 0;
        opacity: 0.95;
    }
    
    .cart-empty {
        text-align: center;
        padding: 60px 20px;
    }
    
    .cart-empty i {
        font-size: 4rem;
        color: #ddd;
        margin-bottom: 20px;
    }
    
    .cart-items {
        margin-bottom: 30px;
    }
    
    .cart-item {
        background: white;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        border-left: 4px solid #667eea;
    }
    
    .cart-item:hover {
        box-shadow: 0 10px 25px rgba(0,0,0,0.12);
    }
    
    .cart-item-row {
        display: grid;
        grid-template-columns: 100px 1fr auto auto auto;
        gap: 20px;
        align-items: center;
    }
    
    .cart-item-image {
        width: 100px;
        height: 100px;
        border-radius: 8px;
        overflow: hidden;
        background: #f8f9fa;
    }
    
    .cart-item-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .cart-item-details h5 {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 8px;
    }
    
    .cart-item-price {
        font-size: 1.2rem;
        color: #667eea;
        font-weight: 700;
        margin-bottom: 10px;
    }
    
    .cart-item-quantity input {
        width: 80px;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 6px;
        text-align: center;
        font-weight: 600;
    }
    
    .cart-item-subtotal {
        font-size: 1.1rem;
        font-weight: 700;
        color: #2c3e50;
        min-width: 150px;
        text-align: right;
    }
    
    .cart-item-delete {
        width: 40px;
        height: 40px;
        padding: 0;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .cart-summary {
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        max-width: 500px;
        margin-left: auto;
    }
    
    .summary-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .summary-row.total {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 20px;
        margin: 20px -30px -30px -30px;
        border-radius: 0 0 12px 12px;
        border-bottom: none;
    }
    
    .summary-row.total .total-label {
        font-size: 1.2rem;
        font-weight: 700;
    }
    
    .summary-row.total .total-amount {
        font-size: 1.5rem;
        font-weight: 700;
    }
    
    .cart-actions {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }
    
    .btn-update {
        flex: 1;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: white;
        font-weight: 600;
        padding: 12px;
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    
    .btn-update:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
    }
    
    .btn-clear {
        background: #e74c3c;
        border: none;
        color: white;
        font-weight: 600;
        padding: 12px 20px;
        border-radius: 8px;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .btn-clear:hover {
        background: #c0392b;
        transform: translateY(-2px);
    }
    
    .btn-back {
        background: #95a5a6;
        border: none;
        color: white;
        font-weight: 600;
        padding: 12px 20px;
        border-radius: 8px;
        transition: all 0.3s ease;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
    }
    
    .btn-back:hover {
        background: #7f8c8d;
        color: white;
        text-decoration: none;
    }
    
    @media (max-width: 768px) {
        .cart-item-row {
            grid-template-columns: 80px 1fr;
            gap: 10px;
        }
        
        .cart-item-quantity,
        .cart-item-subtotal,
        .cart-item-delete {
            grid-column: 2;
            margin-top: 10px;
        }
        
        .cart-item-quantity {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        
        .cart-item-quantity label {
            min-width: 60px;
        }
        
        .cart-summary {
            max-width: 100%;
            margin-left: 0;
            margin-top: 20px;
        }
        
        .cart-actions {
            flex-direction: column;
        }
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

<!-- Cart Header -->
<div class="cart-header">
    <h1>🛒 Keranjang Belanja</h1>
    <p>Periksa produk Anda sebelum melakukan checkout</p>
</div>

<?php if (empty($items)) : ?>
    <!-- Empty Cart -->
    <div class="cart-empty">
        <i class="bi bi-cart-x"></i>
        <h3>Keranjang Anda Kosong</h3>
        <p class="text-muted">Belum ada produk dalam keranjang Anda</p>
        <a href="<?= base_url() ?>" class="btn btn-back" style="margin-top: 20px;">
            <i class="bi bi-arrow-left"></i> Kembali Berbelanja
        </a>
    </div>
<?php else : ?>
    <!-- Cart Items -->
    <?= form_open('keranjang/edit') ?>
    
    <div class="cart-items">
        <?php
        $i = 1;
        foreach ($items as $index => $item) :
        ?>
            <div class="cart-item">
                <div class="cart-item-row">
                    <div class="cart-item-image">
                        <img src="<?= base_url() . "img/" . $item['options']['foto'] ?>" alt="<?= $item['name'] ?>">
                    </div>
                    
                    <div class="cart-item-details">
                        <h5><?= $item['name'] ?></h5>
                        <div class="cart-item-price">
                            <?= number_to_currency($item['price'], 'IDR') ?> / item
                        </div>
                    </div>
                    
                    <div class="cart-item-quantity">
                        <label>Qty</label>
                        <input type="number" min="1" name="qty<?= $i ?>" class="form-control" value="<?= $item['qty'] ?>">
                    </div>
                    
                    <div class="cart-item-subtotal">
                        <?= number_to_currency($item['subtotal'], 'IDR') ?>
                    </div>
                    
                    <div>
                        <a href="<?= base_url('keranjang/delete/' . $item['rowid'] . '') ?>" class="btn btn-danger btn-sm btn-item-delete" onclick="return confirm('Hapus item ini?')">
                            <i class="bi bi-trash"></i>
                        </a>
                    </div>
                </div>
            </div>
        <?php
            $i++;
        endforeach;
        ?>
    </div>
    
    <!-- Cart Summary -->
    <div class="row">
        <div class="col-lg-6"></div>
        <div class="col-lg-6">
            <div class="cart-summary">
                <div class="summary-row">
                    <span>Subtotal</span>
                    <span><?= number_to_currency($total, 'IDR') ?></span>
                </div>
                <div class="summary-row total">
                    <span class="total-label">Total Bayar</span>
                    <span class="total-amount"><?= number_to_currency($total, 'IDR') ?></span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Actions -->
    <div class="cart-actions" style="margin-top: 30px;">
        <button type="submit" class="btn btn-update">
            <i class="bi bi-arrow-repeat"></i> Perbarui Keranjang
        </button>
    </div>
    
    <div style="margin-top: 10px; display: flex; gap: 10px;">
        <a class="btn btn-back" href="<?= base_url() ?>">
            <i class="bi bi-arrow-left"></i> Lanjut Belanja
        </a>
        <a class="btn btn-clear" href="<?= base_url() ?>keranjang/clear" onclick="return confirm('Kosongkan keranjang?')">
            <i class="bi bi-trash"></i> Kosongkan Keranjang
        </a>
    </div>
    
    <?= form_close() ?>
<?php endif; ?>

<?= $this->endSection() ?>