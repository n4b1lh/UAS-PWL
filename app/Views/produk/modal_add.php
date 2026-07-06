<!-- Add Modal Begin -->
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 12px;">
            <div class="modal-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border-radius: 12px 12px 0 0; border: none;">
                <h5 class="modal-title"><i class="bi bi-plus-circle"></i> Tambah Produk Baru</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open_multipart(base_url('produk')); ?>
            <?= csrf_field(); ?>
            
            <div class="modal-body" style="padding: 25px;">
                <div class="mb-3">
                    <?= form_label('Nama Produk', 'nama', ['class' => 'form-label fw-600']); ?>
                    <?= form_input([
                        'name'        => 'nama',
                        'id'          => 'nama',
                        'class'       => 'form-control',
                        'placeholder' => 'Masukkan nama produk',
                        'required'    => true,
                        'style'       => 'border-radius: 8px; padding: 10px 12px;'
                    ]); ?>
                </div>
                
                <div class="mb-3">
                    <?= form_label('Harga (IDR)', 'harga', ['class' => 'form-label fw-600']); ?>
                    <?= form_input([
                        'type'        => 'number',
                        'name'        => 'harga',
                        'id'          => 'harga',
                        'class'       => 'form-control',
                        'placeholder' => 'Masukkan harga produk',
                        'required'    => true,
                        'style'       => 'border-radius: 8px; padding: 10px 12px;'
                    ]); ?>
                </div>
                
                <div class="mb-3">
                    <?= form_label('Jumlah Stok', 'jumlah', ['class' => 'form-label fw-600']); ?>
                    <?= form_input([
                        'type'        => 'number',
                        'name'        => 'jumlah',
                        'id'          => 'jumlah',
                        'class'       => 'form-control',
                        'placeholder' => 'Masukkan jumlah stok',
                        'required'    => true,
                        'style'       => 'border-radius: 8px; padding: 10px 12px;'
                    ]); ?>
                </div>
                
                <div class="mb-3">
                    <?= form_label('Foto Produk', 'foto', ['class' => 'form-label fw-600']); ?>
                    <div style="position: relative;">
                        <?= form_upload([
                            'name'    => 'foto',
                            'id'      => 'foto',
                            'class'   => 'form-control',
                            'accept'  => 'image/*',
                            'style'   => 'border-radius: 8px; padding: 10px 12px;'
                        ]); ?>
                        <small class="form-text text-muted" style="display: block; margin-top: 8px;">
                            <i class="bi bi-info-circle"></i> Format: JPG, PNG (Max 2MB)
                        </small>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer" style="padding: 15px 25px; border-top: 1px solid #e9ecef;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius: 8px;">
                    <i class="bi bi-x-lg"></i> Batal
                </button>
                <?= form_submit('submit', '✓ Simpan', ['class' => 'btn btn-primary', 'style' => 'background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none; border-radius: 8px;']); ?>
            </div>
            
            <?= form_close(); ?>
        </div>
    </div>
</div>
<!-- Add Modal End -->