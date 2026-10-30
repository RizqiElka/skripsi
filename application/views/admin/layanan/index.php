<div class="animate-reveal">
    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-3">
        <div>
            <h3 class="fw-bold mb-1" style="font-family:'Outfit',sans-serif;">Kelola Layanan Medis</h3>
            <p class="text-muted small mb-0">Tambah dan kelola daftar layanan medis puskesmas.</p>
        </div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="fas fa-plus me-2"></i>Tambah Layanan
        </button>
    </div>

    <div class="admin-card overflow-hidden">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th style="width:5%;">#</th>
                        <th style="width:8%;">Icon</th>
                        <th style="width:25%;">Nama Layanan</th>
                        <th style="width:45%;">Deskripsi</th>
                        <th style="width:17%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($layanan as $l): ?>
                    <tr>
                        <td class="text-muted small"><?= $no++; ?></td>
                        <td>
                            <div style="width:42px;height:42px;background:rgba(13,148,136,.1);border-radius:12px;display:flex;align-items:center;justify-content:center;">
                                <i class="<?= $l['icon']; ?>" style="color:#0d9488;font-size:1.1rem;"></i>
                            </div>
                        </td>
                        <td class="fw-bold" style="color:#1e293b;"><?= $l['nama_layanan']; ?></td>
                        <td class="text-muted small"><?= $l['deskripsi']; ?></td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $l['id']; ?>">
                                    <i class="fas fa-pen me-1"></i>Edit
                                </button>
                                <a href="<?= base_url('adminlayanan/hapus/'.$l['id']); ?>" class="btn btn-danger btn-sm"
                                   onclick="return confirm('Hapus layanan ini?');">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modals Edit -->
<?php foreach($layanan as $l): ?>
<div class="modal fade" id="modalEdit<?= $l['id']; ?>" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-pen me-2 text-primary"></i>Edit Layanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('adminlayanan/update'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?= $l['id']; ?>">
                    <div class="mb-3">
                        <label class="form-label">Nama Layanan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama_layanan" value="<?= $l['nama_layanan']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">FontAwesome Icon Class <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="icon" value="<?= $l['icon']; ?>" required>
                        <div class="form-text"><i class="fas fa-circle-info me-1"></i>Contoh: <code>fas fa-stethoscope</code> — cek di <a href="https://fontawesome.com/icons" target="_blank">fontawesome.com</a></div>
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="deskripsi" rows="3" required><?= $l['deskripsi']; ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style="border:1.5px solid #e2e8f0;border-radius:10px;font-weight:600;padding:.5rem 1.25rem;color:#64748b;" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save me-2"></i>Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-plus me-2 text-primary"></i>Tambah Layanan Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('adminlayanan/tambah'); ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Layanan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama_layanan" required placeholder="Contoh: Poli Umum">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">FontAwesome Icon Class <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="icon" value="fas fa-stethoscope" required>
                        <div class="form-text"><i class="fas fa-circle-info me-1"></i>Contoh: <code>fas fa-stethoscope</code> — cek di <a href="https://fontawesome.com/icons" target="_blank">fontawesome.com</a></div>
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="deskripsi" rows="3" required placeholder="Deskripsi layanan..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style="border:1.5px solid #e2e8f0;border-radius:10px;font-weight:600;padding:.5rem 1.25rem;color:#64748b;" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4"><i class="fas fa-plus me-2"></i>Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>
