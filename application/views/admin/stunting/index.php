<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2">
        <div>
            <h1 class="h3 mb-1 text-gray-800 fw-bold"><?= $title; ?></h1>
            <p class="text-muted small mb-0">Pantau dan kelola riwayat pemeriksaan mandiri deteksi stunting balita.</p>
        </div>
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
                    <i class="fas fa-baby fs-5"></i>
                </div>
                <h6 class="m-0 fw-bold text-primary">Daftar Hasil Deteksi Balita (<?= count($stunting); ?> Data)</h6>
            </div>
            <div class="d-flex gap-2 flex-wrap">
                <select id="filterStatusStunting" class="form-select form-select-sm bg-light border-0" style="width: auto;">
                    <option value="">Semua Hasil</option>
                    <option value="Sangat Pendek">Sangat Pendek (Severely Stunted)</option>
                    <option value="Pendek">Pendek (Stunted)</option>
                    <option value="Normal">Normal (Cukup)</option>
                    <option value="Tinggi">Tinggi</option>
                </select>
                <div class="input-group" style="max-width: 260px;">
                    <span class="input-group-text bg-light border-0"><i class="fas fa-search text-muted small"></i></span>
                    <input type="text" id="searchStunting" class="form-control form-control-sm bg-light border-0" placeholder="Cari nama anak/ortu/alamat...">
                </div>
            </div>
        </div>

        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="tableStunting">
                    <thead>
                        <tr class="text-muted small text-uppercase" style="letter-spacing: 0.5px;">
                            <th>NO</th>
                            <th>TANGGAL CEK</th>
                            <th>NAMA ANAK</th>
                            <th>ORANG TUA</th>
                            <th>NO HP</th>
                            <th>ALAMAT DOMISILI</th>
                            <th class="text-center">L/P</th>
                            <th class="text-center">UMUR</th>
                            <th class="text-center">TINGGI</th>
                            <th class="text-center">STATUS HASIL</th>
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($stunting)): ?>
                            <?php $no = 1; foreach($stunting as $s): ?>
                            <tr>
                                <td class="fw-bold text-muted small"><?= $no++; ?></td>
                                <td class="small text-muted font-monospace">
                                    <?= date('d/m/Y H:i', strtotime($s['created_at'])); ?>
                                </td>
                                <td>
                                    <div class="fw-bold text-dark"><?= htmlspecialchars($s['nama_anak']); ?></div>
                                </td>
                                <td class="small text-muted"><?= htmlspecialchars($s['nama_ortu']); ?></td>
                                <td>
                                    <span class="small font-monospace" style="color: #000000;">
                                        <?= htmlspecialchars($s['no_hp'] ?: '-'); ?>
                                    </span>
                                </td>
                                <td>
                                    <?php if(!empty($s['alamat'])): ?>
                                        <span class="small text-dark" style="max-width:200px; display:inline-block; line-height:1.3;"><?= htmlspecialchars($s['alamat']); ?></span>
                                    <?php else: ?>
                                        <span class="text-muted small fst-italic">Belum diisi</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <span class="badge rounded-pill <?= ($s['gender'] == 'L') ? 'bg-info text-white' : 'bg-pink text-white'; ?>" style="<?= ($s['gender'] == 'P') ? 'background-color:#ec4899;' : ''; ?>">
                                        <?= $s['gender'] == 'L' ? 'Laki-laki' : 'Perempuan'; ?>
                                    </span>
                                </td>
                                <td class="text-center small font-monospace fw-semibold"><?= $s['umur_bulan']; ?> bln</td>
                                <td class="text-center small font-monospace fw-bold text-primary"><?= $s['tinggi_badan']; ?> cm</td>
                                <td class="text-center">
                                    <?php 
                                        $bg_class = 'bg-success';
                                        if(stripos($s['status_hasil'], 'Sangat Pendek') !== false) {
                                            $bg_class = 'bg-danger';
                                        } elseif(stripos($s['status_hasil'], 'Pendek') !== false) {
                                            $bg_class = 'bg-warning text-dark';
                                        } elseif(stripos($s['status_hasil'], 'Tinggi') !== false) {
                                            $bg_class = 'bg-info text-white';
                                        }
                                    ?>
                                    <span class="badge <?= $bg_class; ?> px-3 py-1.5 rounded-pill small fw-semibold">
                                        <?= htmlspecialchars($s['status_hasil']); ?>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('adminstunting/hapus/' . $s['id']); ?>" 
                                       class="btn btn-outline-danger btn-sm rounded-circle p-1" 
                                       style="width:34px; height:34px; display:inline-flex; align-items:center; justify-content:center;"
                                       title="Hapus data"
                                       onclick="return confirm('Hapus data deteksi stunting anak <?= htmlspecialchars($s['nama_anak']); ?>?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="11" class="text-center py-5 text-muted">
                                    <i class="fas fa-baby fs-1 opacity-25 mb-3 d-block"></i>
                                    Belum ada data deteksi stunting yang tercatat.
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
    const searchInput = document.getElementById('searchStunting');
    const filterStatus = document.getElementById('filterStatusStunting');
    const rows = document.querySelectorAll('#tableStunting tbody tr');

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
