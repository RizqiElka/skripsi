<div class="animate-reveal">
    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-3">
        <div>
            <h3 class="fw-bold mb-1" style="font-family:'Outfit',sans-serif;">Kelola Fasilitas</h3>
            <p class="text-muted small mb-0">Tambah dan kelola daftar fasilitas penunjang puskesmas.</p>
        </div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="fas fa-plus me-2"></i>Tambah Fasilitas
        </button>
    </div>

    <div class="admin-card overflow-hidden">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th style="width:5%;">#</th>
                        <th style="width:28%;">Nama Fasilitas</th>
                        <th style="width:50%;">Deskripsi</th>
                        <th style="width:17%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($fasilitas as $f): ?>
                    <tr>
                        <td class="text-muted small"><?= $no++; ?></td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div style="width:38px;height:38px;background:rgba(13,148,136,.1);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                    <i class="fas fa-building-columns" style="color:#0d9488;font-size:.85rem;"></i>
                                </div>
                                <span class="fw-bold" style="color:#1e293b;"><?= $f['nama_fasilitas']; ?></span>
                            </div>
                        </td>
                        <td class="text-muted small"><?= $f['deskripsi']; ?></td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $f['id']; ?>">
                                    <i class="fas fa-pen me-1"></i>Edit
                                </button>
                                <a href="<?= base_url('adminfasilitas/hapus/'.$f['id']); ?>" class="btn btn-danger btn-sm"
                                   onclick="return confirm('Hapus fasilitas ini?');">
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
<?php foreach($fasilitas as $f): ?>
<div class="modal fade" id="modalEdit<?= $f['id']; ?>" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-pen me-2 text-primary"></i>Edit Fasilitas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('adminfasilitas/update'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?= $f['id']; ?>">
                    <div class="mb-3">
                        <label class="form-label">Nama Fasilitas <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama_fasilitas" value="<?= $f['nama_fasilitas']; ?>" required>
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="deskripsi" rows="3" required><?= $f['deskripsi']; ?></textarea>
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
                <h5 class="modal-title"><i class="fas fa-plus me-2 text-primary"></i>Tambah Fasilitas Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('adminfasilitas/tambah'); ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Fasilitas <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama_fasilitas" required placeholder="Contoh: Ruang IGD">
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="deskripsi" rows="3" required placeholder="Deskripsi fasilitas..."></textarea>
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
