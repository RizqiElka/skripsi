<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2">
        <div>
            <h1 class="h3 mb-1 text-gray-800 fw-bold d-flex align-items-center">
                <i class="fas fa-clock-rotate-left text-primary me-2.5"></i>Kelola Reminder Kontrol
            </h1>
            <p class="text-muted small mb-0">Pantau dan tindaklanjuti jadwal kontrol pasien secara berkala.</p>
        </div>
        <?php
        $menunggu = 0;
        foreach($reminder as $r) { if($r['status'] == 'Menunggu') $menunggu++; }
        if($menunggu > 0): ?>
        <div class="d-flex align-items-center gap-2 px-3 py-2 rounded-pill shadow-sm"
             style="background:rgba(245,158,11,.1);border:1px solid rgba(245,158,11,.25);">
            <i class="fas fa-clock text-warning"></i>
            <span class="fw-bold small" style="color:#92400e;"><?= $menunggu; ?> reminder menunggu tindakan</span>
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
                    <i class="fas fa-calendar-check fs-5"></i>
                </div>
                <h6 class="m-0 fw-bold text-primary">Daftar Jadwal Kontrol (<?= count($reminder); ?> Data)</h6>
            </div>
            <div class="d-flex gap-2 flex-wrap">
                <select id="filterStatusReminder" class="form-select form-select-sm bg-light border-0" style="width: auto;">
                    <option value="">Semua Status</option>
                    <option value="Menunggu">Menunggu</option>
                    <option value="Diingatkan">Diingatkan / Selesai</option>
                </select>
                <div class="input-group" style="max-width: 260px;">
                    <span class="input-group-text bg-light border-0"><i class="fas fa-search text-muted small"></i></span>
                    <input type="text" id="searchReminder" class="form-control form-control-sm bg-light border-0" placeholder="Cari nama, poli, nomor HP...">
                </div>
            </div>
        </div>

        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="tableReminder">
                    <thead>
                        <tr class="text-muted small text-uppercase" style="letter-spacing: 0.5px;">
                            <th>NO</th>
                            <th>TGL DAFTAR</th>
                            <th>NAMA PASIEN</th>
                            <th>NOMOR KONTAK</th>
                            <th>TGL KONTROL</th>
                            <th>POLI TUJUAN</th>
                            <th class="text-center">STATUS</th>
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($reminder)): ?>
                            <?php $no=1; foreach($reminder as $r): ?>
                            <tr>
                                <td class="fw-bold text-muted small"><?= $no++; ?></td>
                                <td>
                                    <div class="small fw-semibold text-dark"><?= date('d/m/Y', strtotime($r['created_at'])); ?></div>
                                    <div class="text-muted font-monospace" style="font-size:.75rem;"><?= date('H:i', strtotime($r['created_at'])); ?> WIB</div>
                                </td>
                                <td>
                                    <span class="fw-bold text-dark" style="font-size:.88rem;"><?= htmlspecialchars($r['nama_pasien']); ?></span>
                                </td>
                                <td>
                                    <span class="font-monospace fw-semibold text-dark" style="letter-spacing:0.3px; font-size:.85rem;">
                                        <?= htmlspecialchars($r['no_hp']); ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge rounded-pill bg-light border text-dark font-monospace px-3 py-1.5 fw-semibold small">
                                        <i class="fas fa-calendar-day text-primary me-1"></i><?= date('d/m/Y', strtotime($r['tanggal_kontrol'])); ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge rounded-pill px-3 py-1.5 fw-bold" style="background:#ccfbf1; color:#0f766e; font-size:.82rem; border:1px solid rgba(13,148,136,.25);">
                                        <i class="fas fa-stethoscope me-1 text-primary"></i><?= htmlspecialchars($r['poli_tujuan']); ?>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <?php if($r['status'] == 'Menunggu'): ?>
                                        <span class="badge rounded-pill bg-warning text-dark px-3 py-1.5 small fw-semibold">
                                            <i class="fas fa-hourglass-half me-1"></i>Menunggu
                                        </span>
                                    <?php else: ?>
                                        <span class="badge rounded-pill bg-success px-3 py-1.5 small fw-semibold">
                                            <i class="fas fa-check-circle me-1"></i>Diingatkan
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex align-items-center justify-content-center gap-1.5">
                                        <?php if($r['status'] == 'Menunggu'): ?>
                                        <a href="<?= base_url('adminreminder/update_status/'.$r['id']); ?>"
                                           class="btn btn-outline-success btn-sm rounded-circle p-1"
                                           style="width:34px;height:34px;display:inline-flex;align-items:center;justify-content:center;"
                                           onclick="return confirm('Tandai pasien ini sudah diingatkan?');"
                                           title="Tandai Sudah Diingatkan">
                                            <i class="fas fa-check"></i>
                                        </a>
                                        <?php endif; ?>
                                        <a href="<?= base_url('adminreminder/hapus/'.$r['id']); ?>"
                                           class="btn btn-outline-danger btn-sm rounded-circle p-1"
                                           style="width:34px;height:34px;display:inline-flex;align-items:center;justify-content:center;"
                                           onclick="return confirm('Hapus data reminder ini?');"
                                           title="Hapus Reminder">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center py-5 text-muted">
                                    <i class="fas fa-bell-slash fs-1 opacity-25 mb-3 d-block"></i>
                                    Belum ada data reminder kontrol yang didaftarkan.
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
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchReminder');
    const filterStatus = document.getElementById('filterStatusReminder');
    const rows = document.querySelectorAll('#tableReminder tbody tr');

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
