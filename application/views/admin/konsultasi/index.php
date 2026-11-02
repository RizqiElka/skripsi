<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2">
        <div>
            <h1 class="h3 mb-1 text-gray-800 fw-bold">Kelola Konsultasi Medis</h1>
            <p class="text-muted small mb-0">Tindaklanjuti pertanyaan atau keluhan kesehatan dari masyarakat.</p>
        </div>
        <?php
        $belum = 0;
        foreach($konsultasi as $k) { if($k['status'] == 'Belum Dijawab') $belum++; }
        if($belum > 0): ?>
        <div class="d-flex align-items-center gap-2 px-3 py-2 rounded-pill shadow-sm"
             style="background:rgba(245,158,11,.1);border:1px solid rgba(245,158,11,.25);">
            <i class="fas fa-bell text-warning"></i>
            <span class="fw-bold small" style="color:#92400e;"><?= $belum; ?> pesan belum dijawab</span>
        </div>
        <?php endif; ?>
    </div>

    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert" style="border-radius:12px;">
            <i class="fas fa-check-circle me-2"></i><?= $this->session->flashdata('success'); ?>
            <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm border-0 mb-4" style="border-radius: 20px;">
        <div class="card-header bg-transparent border-0 pt-4 px-4 d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div class="d-flex align-items-center gap-2">
                <div class="bg-primary bg-opacity-10 p-2 rounded-3 text-primary">
                    <i class="fas fa-user-doctor fs-5"></i>
                </div>
                <h6 class="m-0 fw-bold text-primary">Daftar Konsultasi Masuk (<?= count($konsultasi); ?> Pesan)</h6>
            </div>
            <div class="d-flex gap-2 flex-wrap">
                <select id="filterStatusKonsultasi" class="form-select form-select-sm bg-light border-0" style="width: auto;">
                    <option value="">Semua Status</option>
                    <option value="Belum Dijawab">Belum Dijawab</option>
                    <option value="Dijawab">Sudah Dijawab</option>
                </select>
                <div class="input-group" style="max-width: 260px;">
                    <span class="input-group-text bg-light border-0"><i class="fas fa-search text-muted small"></i></span>
                    <input type="text" id="searchKonsultasi" class="form-control form-control-sm bg-light border-0" placeholder="Cari nama, kontak, keluhan...">
                </div>
            </div>
        </div>

        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="tableKonsultasi">
                    <thead>
                        <tr class="text-muted small text-uppercase" style="letter-spacing: 0.5px;">
                            <th>NO</th>
                            <th>WAKTU</th>
                            <th>PENGIRIM</th>
                            <th>KONTAK</th>
                            <th>KELUHAN</th>
                            <th class="text-center">STATUS</th>
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($konsultasi)): ?>
                            <?php $no=1; foreach($konsultasi as $k): ?>
                            <tr>
                                <td class="fw-bold text-muted small"><?= $no++; ?></td>
                                <td>
                                    <div class="small fw-semibold text-dark"><?= date('d/m/Y', strtotime($k['created_at'])); ?></div>
                                    <div class="text-muted font-monospace" style="font-size:.75rem;"><?= date('H:i', strtotime($k['created_at'])); ?> WIB</div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2.5">
                                        <div style="width:36px;height:36px;background:rgba(13,148,136,.1);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;color:#0d9488;font-weight:700;font-size:.82rem;">
                                            <?= strtoupper(substr($k['nama_pengirim'],0,1)); ?>
                                        </div>
                                        <span class="fw-bold text-dark small"><?= htmlspecialchars($k['nama_pengirim']); ?></span>
                                    </div>
                                </td>
                                <td class="small">
                                    <div class="text-dark"><i class="fas fa-envelope me-1.5 text-muted"></i><?= htmlspecialchars($k['email_hp']); ?></div>
                                    <?php if(!empty($k['no_wa'])): ?>
                                        <a href="https://wa.me/<?= preg_replace('/^0/', '62', $k['no_wa']); ?>" target="_blank" class="text-decoration-none mt-1 d-inline-block text-success fw-semibold">
                                            <i class="fab fa-whatsapp me-1"></i><?= htmlspecialchars($k['no_wa']); ?>
                                        </a>
                                    <?php endif; ?>
                                </td>
                                <td class="small text-muted" style="max-width:280px;">
                                    <?= htmlspecialchars(mb_strimwidth($k['pesan'], 0, 85, '...')); ?>
                                </td>
                                <td class="text-center">
                                    <?php if($k['status'] == 'Belum Dijawab'): ?>
                                        <span class="badge rounded-pill bg-warning text-dark px-3 py-1.5 fw-semibold small">
                                            <i class="fas fa-clock me-1"></i>Belum Dijawab
                                        </span>
                                    <?php else: ?>
                                        <span class="badge rounded-pill bg-success px-3 py-1.5 fw-semibold small">
                                            <i class="fas fa-check-double me-1"></i>Sudah Dijawab
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex align-items-center justify-content-center gap-1.5">
                                        <button class="btn btn-sm btn-outline-primary rounded-circle p-1" style="width:34px;height:34px;display:inline-flex;align-items:center;justify-content:center;" data-bs-toggle="modal" data-bs-target="#modalJawab<?= $k['id']; ?>" title="Balas Konsultasi">
                                            <i class="fas fa-reply"></i>
                                        </button>
                                        <a href="<?= base_url('adminkonsultasi/hapus/'.$k['id']); ?>" class="btn btn-sm btn-outline-danger rounded-circle p-1" style="width:34px;height:34px;display:inline-flex;align-items:center;justify-content:center;"
                                           onclick="return confirm('Hapus pesan konsultasi ini?');" title="Hapus Konsultasi">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted">
                                    <i class="fas fa-comments fs-1 opacity-25 mb-3 d-block"></i>
                                    Belum ada pesan konsultasi medis dari pasien.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modals Jawab -->
<?php foreach($konsultasi as $k): ?>
<div class="modal fade" id="modalJawab<?= $k['id']; ?>" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-reply me-2" style="color:#0d9488;"></i>Balas Konsultasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('adminkonsultasi/jawab'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?= $k['id']; ?>">
                    <!-- Pesan pasien -->
                    <div class="p-4 rounded-3 mb-4" style="background:#f8fafc;border:1px solid #e2e8f0;">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div style="width:38px;height:38px;background:linear-gradient(135deg,#0d9488,#0284c7);border-radius:10px;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:.85rem;flex-shrink:0;">
                                <?= strtoupper(substr($k['nama_pengirim'],0,1)); ?>
                            </div>
                            <div>
                                <div class="fw-bold small"><?= $k['nama_pengirim']; ?></div>
                                <div style="font-size:.75rem;color:#64748b;">
                                    <?= $k['email_hp']; ?> | WA: <?= !empty($k['no_wa']) ? $k['no_wa'] : '-'; ?> &mdash; <?= date('d M Y, H:i', strtotime($k['created_at'])); ?>
                                </div>
                            </div>
                        </div>
                        <p class="mb-0 small lh-lg" style="color:#374151;"><?= nl2br(htmlspecialchars($k['pesan'])); ?></p>
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Tulis Jawaban / Balasan Medis <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="jawaban" rows="7" required
                                  placeholder="Tuliskan jawaban medis Anda di sini dengan jelas dan profesional..."><?= $k['jawaban']; ?></textarea>
                        <div class="form-text mt-2"><i class="fas fa-info-circle me-1"></i>Jawaban ini akan tersimpan sebagai arsip. Hubungi pasien secara manual melalui email/WhatsApp yang dicantumkan.</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style="border:1.5px solid #e2e8f0;border-radius:10px;font-weight:600;padding:.5rem 1.25rem;color:#64748b;" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save me-2"></i>Simpan Jawaban</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchKonsultasi');
    const filterStatus = document.getElementById('filterStatusKonsultasi');
    const rows = document.querySelectorAll('#tableKonsultasi tbody tr');

    function applyFilter() {
        const query = (searchInput ? searchInput.value : '').toLowerCase().trim();
        const status = (filterStatus ? filterStatus.value : '').toLowerCase().trim();

        rows.forEach(function(row) {
            if (row.cells.length < 5) return;

            const text = row.textContent.toLowerCase();
            const statusBadge = row.querySelector('.badge') ? row.querySelector('.badge').textContent.toLowerCase() : '';

            const matchQuery = !query || text.includes(query);
            const matchStatus = !status || statusBadge.includes(status);

            row.style.display = (matchQuery && matchStatus) ? '' : 'none';
        });
    }

    if (searchInput) searchInput.addEventListener('keyup', applyFilter);
    if (filterStatus) filterStatus.addEventListener('change', applyFilter);
});
</script>
