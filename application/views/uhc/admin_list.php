
<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2">
        <div>
            <h1 class="h3 mb-1 text-gray-800 fw-bold"><?= $title; ?></h1>
            <p class="text-muted small mb-0">Kelola dan pantau seluruh berkas usulan jaminan Universal Health Coverage (UHC) warga.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="<?= base_url('uhc/admin_export_excel'); ?>" class="btn btn-success btn-sm rounded-pill px-3 shadow-sm fw-semibold">
                <i class="fas fa-file-excel me-1.5"></i> Ekspor Excel
            </a>
            <a href="<?= base_url('uhc/admin_export_pdf'); ?>" target="_blank" class="btn btn-danger btn-sm rounded-pill px-3 shadow-sm fw-semibold">
                <i class="fas fa-file-pdf me-1.5"></i> Ekspor PDF
            </a>
        </div>
    </div>



    <div class="card shadow-sm border-0 mb-4" style="border-radius: 20px;">
        <div class="card-header bg-transparent border-0 pt-4 px-4 d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div class="d-flex align-items-center gap-2">
                <div class="bg-primary bg-opacity-10 p-2 rounded-3 text-primary">
                    <i class="fas fa-hand-holding-medical fs-5"></i>
                </div>
                <h6 class="m-0 fw-bold text-primary">Daftar Berkas Masuk (<?= count($pengajuan); ?> Pengajuan)</h6>
            </div>
            <div class="d-flex gap-2 flex-wrap">
                <select id="filterStatusUhc" class="form-select form-select-sm bg-light border-0" style="width: auto;">
                    <option value="">Semua Status</option>
                    <option value="Diajukan">Diajukan</option>
                    <option value="Diverifikasi Admin">Diverifikasi Admin</option>
                    <option value="Sedang Diproses">Sedang Diproses</option>
                    <option value="Selesai">Selesai</option>
                    <option value="Ditolak">Ditolak</option>
                </select>
                <div class="input-group" style="max-width: 260px;">
                    <span class="input-group-text bg-light border-0"><i class="fas fa-search text-muted small"></i></span>
                    <input type="text" id="searchUhc" class="form-control form-control-sm bg-light border-0" placeholder="Cari NIK, nama, diagnosa...">
                </div>
            </div>
        </div>
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="tableUhc">
                    <thead>
                        <tr class="text-muted small text-uppercase" style="letter-spacing: 0.5px;">
                            <th>NO</th>
                            <th>TANGGAL PENGAJUAN</th>
                            <th>NIK</th>
                            <th>NAMA LENGKAP</th>
                            <th>NO KK</th>
                            <th>NO HP</th>
                            <th class="text-center">STATUS</th>
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($pengajuan)): ?>
                            <?php $no = 1; foreach($pengajuan as $p): ?>
                            <tr>
                                <td class="fw-bold text-muted small"><?= $no++; ?></td>
                                <td class="small text-muted">
                                    <?= date('d/m/Y H:i', strtotime($p['created_at'])); ?>
                                </td>
                                <td>
                                    <span class="font-monospace fw-semibold" style="color: #000000 !important; background: rgba(0,0,0,0.04); padding: 3px 8px; border-radius: 6px; border: 1px solid #e2e8f0;">
                                        <?= htmlspecialchars($p['nik']); ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="fw-bold text-dark"><?= htmlspecialchars($p['nama_lengkap']); ?></div>
                                    <small class="text-muted" style="font-size: 11px;">Diag: <?= htmlspecialchars($p['diagnosa'] ?: '-'); ?></small>
                                </td>
                                <td class="font-monospace small text-muted"><?= htmlspecialchars($p['no_kk']); ?></td>
                                <td class="font-monospace small" style="color: #000000;"><?= htmlspecialchars($p['no_hp']); ?></td>
                                <td class="text-center">
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
                                    <span class="badge <?= $badge_class; ?> px-3 py-1.5 rounded-pill small fw-semibold"><?= $p['status']; ?></span>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('uhc/admin_detail/' . $p['id']); ?>" class="btn btn-sm btn-outline-primary rounded-circle p-1" style="width:34px; height:34px; display:inline-flex; align-items:center; justify-content:center;" title="Lihat Detail Berkas">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center py-5 text-muted">
                                    <i class="fas fa-inbox fs-2 opacity-25 mb-2 d-block"></i>
                                    Belum ada data pengajuan usulan UHC.
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
    const searchInput = document.getElementById('searchUhc');
    const filterStatus = document.getElementById('filterStatusUhc');
    const rows = document.querySelectorAll('#tableUhc tbody tr');

    function applyFilter() {
        const query = (searchInput ? searchInput.value : '').toLowerCase().trim();
        const status = (filterStatus ? filterStatus.value : '').toLowerCase().trim();

        rows.forEach(function(row) {
            // Lewati jika row empty message
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
