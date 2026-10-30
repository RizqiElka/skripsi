<div class="animate-reveal">
    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-3">
        <div>
            <h3 class="fw-bold mb-1" style="font-family:'Outfit',sans-serif;">Kelola Wilayah Layanan</h3>
            <p class="text-muted small mb-0">Daftar desa, kelurahan, atau wilayah cakupan pelayanan Puskesmas.</p>
        </div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="fas fa-map-marker-alt me-2"></i>Tambah Wilayah
        </button>
    </div>

    <div class="admin-card overflow-hidden">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th style="width:5%;">#</th>
                        <th style="width:25%;">Nama Desa / Kelurahan</th>
                        <th style="width:20%;">Kecamatan</th>
                        <th style="width:30%;">Keterangan / Dusun</th>
                        <th style="width:20%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($wilayah)): ?>
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted small">Belum ada data wilayah. Tambahkan data wilayah kerja Puskesmas.</td>
                    </tr>
                    <?php else: ?>
                    <?php $no=1; foreach($wilayah as $w): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td class="fw-bold fs-6" style="color:#1e293b;"><?= $w['nama_desa']; ?></td>
                        <td>
                            <span class="badge rounded-pill" style="background:rgba(2,132,199,.1);color:#0284c7;border:1px solid rgba(2,132,199,.2);padding:.35rem .75rem;font-size:.72rem;">
                                <?= $w['kecamatan']; ?>
                            </span>
                        </td>
                        <td class="small text-muted"><?= $w['keterangan'] ? $w['keterangan'] : '-'; ?></td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $w['id']; ?>"><i class="fas fa-edit me-1"></i>Edit</button>
                                <a href="<?= base_url('adminwilayah/hapus/'.$w['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus wilayah <?= $w['nama_desa']; ?>?')"><i class="fas fa-trash"></i></a>
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
                <h5 class="modal-title">Tambah Wilayah Kerja</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('adminwilayah/tambah'); ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Desa / Kelurahan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama_desa" required placeholder="Contoh: Desa Rowosari">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kecamatan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="kecamatan" required placeholder="Contoh: Kec. Rowosari">
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Keterangan Tambahan / Cakupan Dusun</label>
                        <textarea class="form-control" name="keterangan" rows="3" placeholder="Contoh: Mencakup Dusun 1, Dusun 2, dan Dusun 3..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Wilayah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<?php foreach($wilayah as $w): ?>
<div class="modal fade" id="modalEdit<?= $w['id']; ?>" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Wilayah Kerja</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('adminwilayah/update'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?= $w['id']; ?>">
                    <div class="mb-3">
                        <label class="form-label">Nama Desa / Kelurahan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama_desa" value="<?= $w['nama_desa']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kecamatan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="kecamatan" value="<?= $w['kecamatan']; ?>" required>
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Keterangan Tambahan / Cakupan Dusun</label>
                        <textarea class="form-control" name="keterangan" rows="3"><?= $w['keterangan']; ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>
