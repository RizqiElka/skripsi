<div class="animate-reveal">
    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-3">
        <div>
            <h3 class="fw-bold mb-1" style="font-family:'Outfit',sans-serif;">Kelola Tenaga Medis</h3>
            <p class="text-muted small mb-0">Tambah dan kelola data dokter serta tenaga kesehatan.</p>
        </div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="fas fa-user-plus me-2"></i>Tambah Tenaga Medis
        </button>
    </div>

    <div class="admin-card overflow-hidden">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th style="width:5%;">#</th>
                        <th style="width:12%;">Foto</th>
                        <th style="width:25%;">Nama Lengkap</th>
                        <th style="width:20%;">Jabatan / Jadwal</th>
                        <th style="width:10%;">Status</th>
                        <th style="width:18%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($tenaga as $t): ?>
                    <tr>
                        <td class="text-muted small"><?= $no++; ?></td>
                        <td>
                            <img src="<?= base_url('assets/uploads/tenaga/' . $t['foto']); ?>"
                                 style="width:46px;height:46px;border-radius:50%;object-fit:cover;border:2px solid #e2e8f0;box-shadow:0 2px 8px rgba(0,0,0,.08);"
                                 onerror="this.src='https://ui-avatars.com/api/?name=<?= urlencode($t['nama']) ?>&background=0d9488&color=fff&size=100&bold=true'"
                                 alt="<?= $t['nama']; ?>">
                        </td>
                        <td>
                            <div class="fw-bold" style="color:#1e293b;"><?= $t['nama']; ?></div>
                        </td>
                        <td>
                            <div class="fw-bold fs-6" style="color:#1e293b;"><?= $t['jabatan']; ?></div>
                            <div class="small text-muted mt-1"><i class="far fa-clock me-1" style="font-size:.7rem;"></i> <?= $t['jadwal'] ? $t['jadwal'] : 'Jadwal belum diisi'; ?></div>
                        </td>
                        <td>
                            <?php if($t['status_kerja'] == 'Aktif'): ?>
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1" style="font-size:.7rem;">Aktif</span>
                            <?php else: ?>
                                <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1" style="font-size:.7rem;">Cuti</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $t['id']; ?>">
                                    <i class="fas fa-pen me-1"></i>Edit
                                </button>
                                <a href="<?= base_url('admintenaga/hapus/'.$t['id']); ?>" class="btn btn-danger btn-sm"
                                   onclick="return confirm('Hapus data tenaga medis ini?');">
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
<?php foreach($tenaga as $t): ?>
<div class="modal fade" id="modalEdit<?= $t['id']; ?>" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-pen me-2 text-primary"></i>Edit Data Tenaga Medis</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('admintenaga/update'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?= $t['id']; ?>">
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap &amp; Gelar <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama" value="<?= $t['nama']; ?>" required placeholder="Dr. John Doe, Sp.A">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jabatan / Spesialisasi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="jabatan" value="<?= $t['jabatan']; ?>" required placeholder="Dokter Gigi">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jadwal Praktik <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="jadwal" value="<?= $t['jadwal']; ?>" required placeholder="Senin - Jumat, 08:00 - 12:00">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status Kehadiran</label>
                        <select class="form-select" name="status_kerja">
                            <option value="Aktif" <?= $t['status_kerja'] == 'Aktif' ? 'selected' : ''; ?>>Aktif / Hadir</option>
                            <option value="Cuti" <?= $t['status_kerja'] == 'Cuti' ? 'selected' : ''; ?>>Sedang Cuti</option>
                        </select>
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Foto <span class="text-muted">(Abaikan jika tak ingin ganti)</span></label>
                        <input type="file" class="form-control" name="foto" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style="border:1.5px solid #e2e8f0;border-radius:10px;font-weight:600;padding:.5rem 1.25rem;color:#64748b;" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save me-2"></i>Perbarui</button>
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
                <h5 class="modal-title"><i class="fas fa-user-plus me-2 text-primary"></i>Tambah Tenaga Medis Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('admintenaga/tambah'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap &amp; Gelar <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama" required placeholder="Dr. Jane Smith, Sp.M">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jabatan / Spesialisasi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="jabatan" required placeholder="Contoh: Dokter Umum">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jadwal Praktik <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="jadwal" required placeholder="Contoh: Senin - Sabtu, 08:00 - 11:00">
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Foto <span class="text-muted">(Opsional)</span></label>
                        <input type="file" class="form-control" name="foto" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style="border:1.5px solid #e2e8f0;border-radius:10px;font-weight:600;padding:.5rem 1.25rem;color:#64748b;" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4"><i class="fas fa-plus me-2"></i>Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
