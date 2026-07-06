<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
    .produk-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 30px 20px;
        border-radius: 15px;
        margin-bottom: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    
    .produk-header h1 {
        font-weight: 700;
        font-size: 2rem;
        margin-bottom: 5px;
    }
    
    .produk-header p {
        font-size: 1rem;
        margin-bottom: 0;
        opacity: 0.95;
    }
    
    .produk-actions {
        display: flex;
        gap: 10px;
        margin-bottom: 30px;
        flex-wrap: wrap;
    }
    
    .produk-actions .btn {
        font-weight: 600;
        padding: 10px 20px;
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    
    .produk-actions .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
    }
    
    .produk-actions .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
    }
    
    .produk-table {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    }
    
    .produk-table table {
        margin-bottom: 0;
    }
    
    .produk-table thead {
        background: #f8f9fa;
        border-bottom: 2px solid #e9ecef;
    }
    
    .produk-table thead th {
        color: #2c3e50;
        font-weight: 600;
        padding: 16px;
        vertical-align: middle;
    }
    
    .produk-table tbody tr {
        border-bottom: 1px solid #e9ecef;
        transition: background-color 0.2s ease;
    }
    
    .produk-table tbody tr:hover {
        background-color: #f8f9fa;
    }
    
    .produk-table tbody td {
        padding: 16px;
        vertical-align: middle;
    }
    
    .produk-row-num {
        font-weight: 600;
        color: #667eea;
    }
    
    .produk-name {
        font-weight: 600;
        color: #2c3e50;
    }
    
    .produk-price {
        color: #667eea;
        font-weight: 600;
        font-size: 1rem;
    }
    
    .produk-stock {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
    }
    
    .stock-high {
        background: #d4edda;
        color: #155724;
    }
    
    .stock-low {
        background: #fff3cd;
        color: #856404;
    }
    
    .stock-out {
        background: #f8d7da;
        color: #721c24;
    }
    
    .produk-image {
        width: 80px;
        height: 80px;
        border-radius: 8px;
        overflow: hidden;
        background: #f8f9fa;
    }
    
    .produk-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .produk-actions-col {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }
    
    .btn-ubah, .btn-hapus {
        padding: 8px 12px;
        border-radius: 6px;
        font-size: 0.9rem;
        border: none;
        transition: all 0.3s ease;
    }
    
    .btn-ubah {
        background: #3498db;
        color: white;
    }
    
    .btn-ubah:hover {
        background: #2980b9;
        transform: translateY(-2px);
    }
    
    .btn-hapus {
        background: #e74c3c;
        color: white;
    }
    
    .btn-hapus:hover {
        background: #c0392b;
        transform: translateY(-2px);
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
<?php
if (session()->getFlashData('failed')) {
?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-circle"></i> <?= session()->getFlashData('failed') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>

<!-- Header -->
<div class="produk-header">
    <h1>📦 Manajemen Produk</h1>
    <p>Kelola produk toko Anda dengan mudah</p>
</div>

<!-- Actions -->
<div class="produk-actions">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
        <i class="bi bi-plus-lg"></i> Tambah Produk
    </button>
    <a class="btn btn-success" target="_blank" href="<?= base_url()?>produk/download">
        <i class="bi bi-download"></i> Download Data
    </a>
</div>

<!-- Table -->
<div class="produk-table">
    <table class="table datatable">
        <thead>
            <tr>
                <th scope="col" style="width: 60px;">#</th>
                <th scope="col">Nama Produk</th>
                <th scope="col" style="width: 150px;">Harga</th>
                <th scope="col" style="width: 100px;">Stok</th>
                <th scope="col" style="width: 100px;">Foto</th>
                <th scope="col" style="width: 150px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $index => $produk) : ?>
                <tr>
                    <td class="produk-row-num"><?= $index + 1 ?></td>
                    <td class="produk-name"><?= $produk['nama'] ?></td>
                    <td class="produk-price"><?=$produk['harga'] ?></td>
                    <td>
                        <span class="produk-stock <?= $produk['jumlah'] > 10 ? 'stock-high' : ($produk['jumlah'] > 0 ? 'stock-low' : 'stock-out') ?>">
                            <?= $produk['jumlah'] ?> unit
                        </span>
                    </td>
                    <td>
                        <?php if ($produk['foto'] != '' and file_exists("img/" . $produk['foto'] . "")) : ?>
                            <div class="produk-image">
                                <img src="<?= base_url() . "img/" . $produk['foto'] ?>" alt="<?= $produk['nama'] ?>">
                            </div>
                        <?php else : ?>
                            <span class="text-muted">No Image</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div class="produk-actions-col">
                            <button type="button" class="btn-ubah" data-bs-toggle="modal" data-bs-target="#editModal-<?= $produk['id'] ?>">
                                <i class="bi bi-pencil"></i> Ubah
                            </button>
                            <a href="<?= base_url('produk/delete/' . $produk['id']) ?>" class="btn-hapus" onclick="return confirm('Yakin hapus data ini?')">
                                <i class="bi bi-trash"></i> Hapus
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div> 

<!-- Modal Add -->
<?= $this->include('produk/modal_add') ?>

<!-- Modal Edit -->
<?= $this->include('produk/modal_edit') ?>

<?= $this->endSection() ?>