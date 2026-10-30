
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <a href="<?= base_url('reaktivasi/admin_list'); ?>" class="btn btn-sm btn-light border fw-bold px-3">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success animate-reveal"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <?php $p = $pengajuan; ?>

    <div class="row g-4">
        <!-- Detail Data -->
        <div class="col-lg-7">
            <div class="admin-card p-4 mb-4">
                <h5 class="fw-bold mb-4"><i class="fas fa-user-circle text-primary me-2"></i>Data Pemohon</h5>
                <div class="row g-3">
                    <div class="col-sm-4"><span class="text-muted small">NIK</span><div class="fw-bold"><?= $p['nik']; ?></div></div>
                    <div class="col-sm-4"><span class="text-muted small">No HP</span><div class="fw-bold"><?= $p['no_hp']; ?></div></div>
                    <div class="col-sm-4"><span class="text-muted small">Tanggal Pengajuan</span><div class="fw-bold"><?= date('d M Y H:i', strtotime($p['created_at'])); ?></div></div>
                    <?php if(!empty($p['keterangan'])): ?>
                    <div class="col-12"><span class="text-muted small">Keterangan Pemohon</span><div class="fw-bold"><?= $p['keterangan']; ?></div></div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Dokumen -->
            <div class="admin-card p-4">
                <h5 class="fw-bold mb-4"><i class="fas fa-file-alt text-primary me-2"></i>Dokumen Pendukung</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="p-3 rounded-3" style="background:#f8fafc; border:1px solid #e2e8f0;">
                            <div class="text-muted small mb-2 fw-bold">Surat Keterangan Sakit</div>
                            <?php if(!empty($p['bukti_sakit'])): ?>
                                <?php
                                $ext = pathinfo($p['bukti_sakit'], PATHINFO_EXTENSION);
                                $file_url = base_url('uploads/reaktivasi/' . $p['bukti_sakit']);
                                ?>
                                <?php if(in_array(strtolower($ext), ['jpg','jpeg','png'])): ?>
                                    <img src="<?= $file_url; ?>" class="img-fluid rounded-3 mb-2" style="max-height:200px;">
                                <?php endif; ?>
                                <a href="<?= $file_url; ?>" target="_blank" class="btn btn-sm btn-info w-100">
                                    <i class="fas fa-download me-1"></i> Lihat / Unduh
                                </a>
                            <?php else: ?>
                                <span class="text-muted small">Tidak ada file</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 rounded-3" style="background:#f8fafc; border:1px solid #e2e8f0;">
                            <div class="text-muted small mb-2 fw-bold">Kartu Keluarga (KK)</div>
                            <?php if(!empty($p['bukti_kk'])): ?>
                                <?php
                                $ext2 = pathinfo($p['bukti_kk'], PATHINFO_EXTENSION);
                                $file_url2 = base_url('uploads/reaktivasi/' . $p['bukti_kk']);
                                ?>
                                <?php if(in_array(strtolower($ext2), ['jpg','jpeg','png'])): ?>
                                    <img src="<?= $file_url2; ?>" class="img-fluid rounded-3 mb-2" style="max-height:200px;">
                                <?php endif; ?>
                                <a href="<?= $file_url2; ?>" target="_blank" class="btn btn-sm btn-info w-100">
                                    <i class="fas fa-download me-1"></i> Lihat / Unduh
                                </a>
                            <?php else: ?>
                                <span class="text-muted small">Tidak ada file</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status & Aksi -->
        <div class="col-lg-5">
            <div class="admin-card p-4 mb-4">
                <h5 class="fw-bold mb-3"><i class="fas fa-flag text-primary me-2"></i>Status Pengajuan</h5>
                <?php
                $badge_map = [
                    'Diajukan' => 'bg-warning text-dark',
                    'Diverifikasi Admin' => 'bg-info text-white',
                    'Sedang Diproses' => 'bg-primary',
                    'Menunggu Persetujuan' => 'bg-secondary',
                    'Selesai' => 'bg-success',
                    'Ditolak' => 'bg-danger'
                ];
                $badge_class = isset($badge_map[$p['status']]) ? $badge_map[$p['status']] : 'bg-secondary';
                ?>
                <span class="badge <?= $badge_class; ?> px-4 py-2 rounded-pill fs-6"><?= $p['status']; ?></span>
                <?php if(!empty($p['keterangan'])): ?>
                    <div class="mt-3 p-3 rounded-3" style="background:#f8fafc; border:1px solid #e2e8f0;">
                        <div class="text-muted small fw-bold mb-1">Keterangan Admin:</div>
                        <div class="small"><?= nl2br($p['keterangan']); ?></div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Form Update Status -->
            <div class="admin-card p-4">
                <h5 class="fw-bold mb-3"><i class="fas fa-edit text-primary me-2"></i>Ubah Status</h5>
                <form action="<?= base_url('reaktivasi/admin_update_status/' . $p['id']); ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label fw-bold small">Status Baru</label>
                        <select name="status" class="form-select" required>
                            <option value="Diajukan" <?= ($p['status'] == 'Diajukan') ? 'selected' : ''; ?>>Diajukan</option>
                            <option value="Diverifikasi Admin" <?= ($p['status'] == 'Diverifikasi Admin') ? 'selected' : ''; ?>>Diverifikasi Admin</option>
                            <option value="Sedang Diproses" <?= ($p['status'] == 'Sedang Diproses') ? 'selected' : ''; ?>>Sedang Diproses</option>
                            <option value="Menunggu Persetujuan" <?= ($p['status'] == 'Menunggu Persetujuan') ? 'selected' : ''; ?>>Menunggu Persetujuan</option>
                            <option value="Selesai" <?= ($p['status'] == 'Selesai') ? 'selected' : ''; ?>>Selesai</option>
                            <option value="Ditolak" <?= ($p['status'] == 'Ditolak') ? 'selected' : ''; ?>>Ditolak</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold small">Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="3" placeholder="Tuliskan keterangan..."><?= $p['keterangan']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100" onclick="return confirm('Yakin ingin memperbarui status pengajuan ini?')">
                        <i class="fas fa-save me-1"></i> Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
