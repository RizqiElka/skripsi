<div class="animate-reveal">
    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-3">
        <div>
            <h3 class="fw-bold mb-1" style="font-family:'Outfit',sans-serif;">Kelola Peringatan Kesehatan</h3>
            <p class="text-muted small mb-0">Publikasikan informasi penting atau peringatan wabah ke halaman utama.</p>
        </div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="fas fa-bullhorn me-2"></i>Tambah Peringatan
        </button>
    </div>

    <div class="admin-card overflow-hidden">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th style="width:5%;">#</th>
                        <th style="width:20%;">Judul</th>
                        <th style="width:35%;">Pesan</th>
                        <th style="width:10%;">Tipe</th>
                        <th style="width:10%;">Status</th>
                        <th style="width:20%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($peringatan)): ?>
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted small">Belum ada peringatan aktif.</td>
                    </tr>
                    <?php else: ?>
                    <?php $no=1; foreach($peringatan as $p): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td class="fw-bold small"><?= $p['judul']; ?></td>
                        <td class="small text-muted"><?= substr($p['pesan'], 0, 100); ?>...</td>
                        <td>
                            <?php 
                                $badge = 'bg-warning';
                                if($p['tipe'] == 'danger') $badge = 'bg-danger';
                                if($p['tipe'] == 'info') $badge = 'bg-info';
                            ?>
                            <span class="badge <?= $badge; ?>"><?= strtoupper($p['tipe']); ?></span>
                        </td>
                        <td>
                            <?= $p['is_active'] ? '<span class="badge bg-success">Aktif</span>' : '<span class="badge bg-secondary">Nonaktif</span>'; ?>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $p['id']; ?>"><i class="fas fa-edit"></i></button>
                                <a href="<?= base_url('adminperingatan/hapus/'.$p['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus peringatan ini?')"><i class="fas fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Peringatan Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('adminperingatan/tambah'); ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Judul <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="judul" required placeholder="Contoh: Waspada Demam Berdarah">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipe Alert</label>
                        <select class="form-select" name="tipe">
                            <option value="warning">Warning (Kuning)</option>
                            <option value="danger">Danger (Merah - Darurat)</option>
                            <option value="info">Info (Biru)</option>
                        </select>
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Pesan / Detail <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="pesan" rows="4" required placeholder="Jelaskan detail peringatan atau tindakan yang harus dilakukan..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<?php foreach($peringatan as $p): ?>
<div class="modal fade" id="modalEdit<?= $p['id']; ?>" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Peringatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('adminperingatan/update'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?= $p['id']; ?>">
                    <div class="mb-3">
                        <label class="form-label">Judul <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="judul" value="<?= $p['judul']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipe Alert</label>
                        <select class="form-select" name="tipe">
                            <option value="warning" <?= $p['tipe'] == 'warning' ? 'selected' : ''; ?>>Warning (Kuning)</option>
                            <option value="danger" <?= $p['tipe'] == 'danger' ? 'selected' : ''; ?>>Danger (Merah - Darurat)</option>
                            <option value="info" <?= $p['tipe'] == 'info' ? 'selected' : ''; ?>>Info (Biru)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="is_active">
                            <option value="1" <?= $p['is_active'] == 1 ? 'selected' : ''; ?>>Aktif</option>
                            <option value="0" <?= $p['is_active'] == 0 ? 'selected' : ''; ?>>Nonaktif</option>
                        </select>
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Pesan / Detail <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="pesan" rows="4" required><?= $p['pesan']; ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>
