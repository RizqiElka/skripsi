<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800 fw-bold">Pengaduan Masyarakat</h1>
            <p class="text-muted small mb-0">Kelola dan tindak lanjuti laporan keluhan dan aspirasi dari masyarakat.</p>
        </div>
        <a href="<?= base_url('dashboard'); ?>" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
            <i class="fas fa-arrow-left me-1"></i> Dashboard
        </a>
    </div>

    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i><?= $this->session->flashdata('success'); ?>
            <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i><?= $this->session->flashdata('error'); ?>
            <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="card border-0 shadow-sm" style="border-radius:20px;">
        <div class="card-header bg-transparent border-0 pt-4 px-4 d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div class="d-flex align-items-center gap-2">
                <div class="bg-warning bg-opacity-10 p-2 rounded-3 text-warning">
                    <i class="fas fa-bullhorn fs-5"></i>
                </div>
                <h6 class="m-0 fw-bold text-dark">Daftar Pengaduan Masuk (<?= count($pengaduan); ?>)</h6>
            </div>
            <div class="input-group" style="max-width: 280px;">
                <span class="input-group-text bg-light border-0"><i class="fas fa-search text-muted small"></i></span>
                <input type="text" id="searchPengaduan" class="form-control form-control-sm bg-light border-0" placeholder="Cari pelapor, kategori, isi...">
            </div>
        </div>

        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table align-middle" id="tablePengaduan">
                    <thead>
                        <tr class="text-muted small">
                            <th>NO</th>
                            <th>PELAPOR &amp; KONTAK</th>
                            <th>KATEGORI &amp; LOKASI</th>
                            <th>ISI PENGADUAN</th>
                            <th>STATUS</th>
                            <th>TANGGAL</th>
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($pengaduan)): ?>
                            <?php $no = 1; foreach($pengaduan as $p): ?>
                            <tr>
                                <td class="fw-bold text-muted small"><?= $no++; ?></td>
                                <td>
                                    <div class="fw-bold text-dark"><?= htmlspecialchars($p['nama_pelapor']); ?></div>
                                    <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $p['no_hp']); ?>" target="_blank" class="small text-success text-decoration-none fw-semibold">
                                        <i class="fab fa-whatsapp me-1"></i><?= htmlspecialchars($p['no_hp']); ?>
                                    </a>
                                    <?php if(!empty($p['nik'])): ?>
                                        <div class="text-muted font-monospace" style="font-size:10px;">NIK: <?= htmlspecialchars($p['nik']); ?></div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="badge bg-light text-primary border mb-1"><?= htmlspecialchars($p['kategori']); ?></div>
                                    <div class="small text-muted"><i class="fas fa-location-dot me-1"></i><?= htmlspecialchars($p['lokasi_layanan']); ?></div>
                                </td>
                                <td>
                                    <div class="small text-dark fw-medium" style="max-width: 320px; line-height: 1.4;">
                                        <?= nl2br(htmlspecialchars($p['isi_pengaduan'])); ?>
                                    </div>
                                    <?php if(!empty($p['tanggapan'])): ?>
                                        <div class="mt-2 p-2 rounded bg-light border text-success" style="font-size: 11px;">
                                            <strong>Tindak Lanjut:</strong> <?= htmlspecialchars($p['tanggapan']); ?>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php 
                                        $badge_class = 'bg-warning text-dark';
                                        if ($p['status'] == 'Diproses') $badge_class = 'bg-info text-white';
                                        elseif ($p['status'] == 'Selesai') $badge_class = 'bg-success text-white';
                                        elseif ($p['status'] == 'Ditolak') $badge_class = 'bg-danger text-white';
                                    ?>
                                    <span class="badge rounded-pill <?= $badge_class; ?> px-3 py-1">
                                        <?= $p['status']; ?>
                                    </span>
                                </td>
                                <td class="small text-muted" style="white-space: nowrap;">
                                    <?= date('d/m/Y H:i', strtotime($p['created_at'])); ?>
                                </td>
                                <td class="text-center" style="white-space: nowrap;">
                                    <!-- Button Modal Tindak Lanjut -->
                                    <button class="btn btn-sm btn-outline-primary rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalTanggapan<?= $p['id']; ?>">
                                        <i class="fas fa-reply me-1"></i> Respon
                                    </button>
                                    <a href="<?= base_url('adminpengaduan/delete/' . $p['id']); ?>" class="btn btn-sm btn-outline-danger rounded-circle p-1 ms-1" style="width:30px;height:30px;" onclick="return confirm('Hapus pengaduan ini?');" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </a>

                                    <!-- Modal Tanggapan -->
                                    <div class="modal fade" id="modalTanggapan<?= $p['id']; ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog text-start">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fw-bold">Tindak Lanjut Pengaduan #<?= $p['id']; ?></h5>
                                                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form action="<?= base_url('adminpengaduan/update_status/' . $p['id']); ?>" method="post">
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label small fw-bold">Pelapor</label>
                                                            <input type="text" class="form-control" value="<?= htmlspecialchars($p['nama_pelapor']); ?> (<?= $p['no_hp']; ?>)" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label small fw-bold">Isi Aduan</label>
                                                            <div class="p-2 rounded bg-light border small text-muted"><?= htmlspecialchars($p['isi_pengaduan']); ?></div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label small fw-bold">Update Status</label>
                                                            <select name="status" class="form-select" required>
                                                                <option value="Menunggu" <?= ($p['status'] == 'Menunggu') ? 'selected' : ''; ?>>Menunggu</option>
                                                                <option value="Diproses" <?= ($p['status'] == 'Diproses') ? 'selected' : ''; ?>>Diproses</option>
                                                                <option value="Selesai" <?= ($p['status'] == 'Selesai') ? 'selected' : ''; ?>>Selesai</option>
                                                                <option value="Ditolak" <?= ($p['status'] == 'Ditolak') ? 'selected' : ''; ?>>Ditolak</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label small fw-bold">Tanggapan / Catatan Tindak Lanjut</label>
                                                            <textarea name="tanggapan" class="form-control" rows="3" placeholder="Tuliskan tindakan yang telah diambil atau klarifikasi..."><?= htmlspecialchars($p['tanggapan'] ?? ''); ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light rounded-pill px-3" data-bs-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary rounded-pill px-4">Simpan Perubahan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted">
                                    <i class="fas fa-clipboard-check fs-1 opacity-25 mb-3 d-block"></i>
                                    Belum ada pengaduan masyarakat yang masuk.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('searchPengaduan').addEventListener('keyup', function() {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll('#tablePengaduan tbody tr');
    rows.forEach(function(row) {
        let text = row.textContent.toLowerCase();
        row.style.display = text.includes(filter) ? '' : 'none';
    });
});
</script>
