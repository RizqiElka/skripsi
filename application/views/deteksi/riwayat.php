<!-- Load Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

<div class="container mb-5 pb-5" style="margin-top: 35px; position: relative; z-index: 3;">

    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
        <div>
            <span class="badge bg-primary bg-opacity-10 text-primary fw-bold px-3 py-1 rounded-pill mb-1">Riwayat Akun Keluarga</span>
            <h3 class="fw-bold mb-0 text-dark" style="font-family:'Outfit',sans-serif;">Riwayat Perkembangan &amp; Deteksi Stunting</h3>
            <p class="text-muted small mb-0">Catatan berkala tinggi badan, berat badan, serta status gizi tumbuh kembang anak dari waktu ke waktu.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="<?= base_url('deteksi/stunting'); ?>" class="btn btn-primary rounded-pill px-4 py-2 fw-semibold" style="font-size:var(--fs-body);">
                <i class="fas fa-plus me-1.5"></i> Cek Deteksi Baru
            </a>
            <a href="<?= base_url('auth/profil'); ?>" class="btn btn-outline-secondary rounded-pill px-3 py-2 fw-semibold" style="font-size:var(--fs-body);">
                Profil Saya
            </a>
        </div>
    </div>

    <!-- ===== GRAFIK PERKEMBANGAN DARI WAKTU KE WAKTU ===== -->
    <div class="card border-0 shadow-sm p-4 p-md-5 mb-5 reveal reveal-bottom" style="border-radius:24px;">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
            <div>
                <h5 class="fw-bold mb-1" style="font-family:'Outfit',sans-serif; color:var(--dark);">Grafik Tren Pertumbuhan (Tinggi &amp; Berat Badan)</h5>
                <p class="text-muted small mb-0">Pantau apakah kondisi pertumbuhan anak membaik secara konsisten setiap bulan.</p>
            </div>
            <?php if(!empty($riwayat_asc)): ?>
                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-3 py-2 rounded-pill small">
                    <?= count($riwayat_asc); ?> Data Pengecekan Tersimpan
                </span>
            <?php endif; ?>
        </div>

        <?php if(!empty($riwayat_asc)): ?>
            <div style="position: relative; height: 340px; width: 100%;">
                <canvas id="growthChart"></canvas>
            </div>
        <?php else: ?>
            <div class="text-center py-5 text-muted">
                <i class="fas fa-chart-line fs-1 opacity-25 mb-3 d-block"></i>
                <h6 class="fw-bold text-dark">Belum ada riwayat pengecekan tersimpan</h6>
                <p class="small text-muted mb-3">Lakukan pengecekan deteksi dini stunting pertama Anda agar grafik pertumbuhan dapat ditampilkan.</p>
                <a href="<?= base_url('deteksi/stunting'); ?>" class="btn btn-primary btn-sm rounded-pill px-4 py-2">
                    Mulai Deteksi Sekarang
                </a>
            </div>
        <?php endif; ?>
    </div>

    <!-- ===== TABEL RIWAYAT TERURUT PER TANGGAL ===== -->
    <div class="card border-0 shadow-sm p-4 p-md-5 reveal reveal-bottom" style="border-radius:24px;">
        <div class="d-flex align-items-center gap-2 mb-4">
            <div class="p-2 bg-primary bg-opacity-10 rounded-3 text-primary"><i class="fas fa-clock-rotate-left fs-5"></i></div>
            <h5 class="fw-bold mb-0" style="font-family:'Outfit',sans-serif; color:var(--dark);">Tabel Catatan Pemeriksaan (Terurut per Tanggal)</h5>
        </div>

        <?php if(!empty($riwayat)): ?>
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr class="text-muted small">
                            <th>TANGGAL PENGECEKAN</th>
                            <th>NAMA ANAK</th>
                            <th>GENDER</th>
                            <th>USIA</th>
                            <th>TINGGI BADAN</th>
                            <th>BERAT BADAN</th>
                            <th>Z-SCORE</th>
                            <th>HASIL STATUS GIZI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($riwayat as $r): ?>
                        <tr>
                            <td class="small fw-semibold text-dark">
                                <i class="far fa-calendar-alt text-primary me-1.5"></i>
                                <?= date('d M Y, H:i', strtotime($r['created_at'])); ?>
                            </td>
                            <td>
                                <strong class="text-dark"><?= htmlspecialchars($r['nama_anak'] ?: 'Anak'); ?></strong>
                                <?php if(!empty($r['nama_ortu'])): ?>
                                    <div class="text-muted" style="font-size:var(--fs-support);">Ortu: <?= htmlspecialchars($r['nama_ortu']); ?></div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge rounded-pill <?= ($r['gender'] == 'L') ? 'bg-info bg-opacity-10 text-info' : 'bg-danger bg-opacity-10 text-danger'; ?> px-2.5 py-1">
                                    <?= ($r['gender'] == 'L') ? 'Laki-laki' : 'Perempuan'; ?>
                                </span>
                            </td>
                            <td class="small"><?= (int)$r['umur_bulan']; ?> Bulan</td>
                            <td class="fw-bold small text-primary"><?= (float)$r['tinggi_badan']; ?> cm</td>
                            <td class="small text-muted"><?= $r['berat_badan'] ? (float)$r['berat_badan'] . ' kg' : '-'; ?></td>
                            <td class="font-monospace small"><?= $r['z_score'] !== null ? number_format($r['z_score'], 2) : '-'; ?> SD</td>
                            <td>
                                <?php
                                    $st = strtolower($r['status_hasil'] ?: '');
                                    $badge = 'bg-success';
                                    if(strpos($st, 'sangat pendek') !== false || strpos($st, 'severely') !== false) {
                                        $badge = 'bg-danger';
                                    } elseif(strpos($st, 'pendek') !== false || strpos($st, 'stunted') !== false) {
                                        $badge = 'bg-warning text-dark';
                                    } elseif(strpos($st, 'tinggi') !== false) {
                                        $badge = 'bg-info';
                                    }
                                ?>
                                <span class="badge <?= $badge; ?> rounded-pill px-3 py-1.5 fw-semibold" style="font-size:var(--fs-support);">
                                    <?= htmlspecialchars($r['status_hasil']); ?>
                                </span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-muted small mb-0">Belum ada riwayat pengecekan yang tercatat.</p>
        <?php endif; ?>
    </div>

</div>

<?php if(!empty($riwayat_asc)): ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('growthChart');
    if (!ctx) return;

    <?php
        $labels = [];
        $tinggi_data = [];
        $berat_data = [];
        foreach($riwayat_asc as $item) {
            $tgl = date('d/m/y', strtotime($item['created_at'])) . ' (' . (int)$item['umur_bulan'] . ' bln)';
            $labels[] = $tgl;
            $tinggi_data[] = (float)$item['tinggi_badan'];
            $berat_data[] = $item['berat_badan'] ? (float)$item['berat_badan'] : null;
        }
    ?>

    const labels = <?= json_encode($labels); ?>;
    const tinggiData = <?= json_encode($tinggi_data); ?>;
    const beratData = <?= json_encode($berat_data); ?>;

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Tinggi Badan (cm)',
                    data: tinggiData,
                    borderColor: '#0d9488',
                    backgroundColor: 'rgba(13, 148, 136, 0.1)',
                    tension: 0.35,
                    fill: true,
                    yAxisID: 'yTinggi',
                    borderWidth: 2.5,
                    pointRadius: 5,
                    pointHoverRadius: 7
                },
                {
                    label: 'Berat Badan (kg)',
                    data: beratData,
                    borderColor: '#0284c7',
                    backgroundColor: 'rgba(2, 132, 199, 0.05)',
                    tension: 0.35,
                    borderDash: [5, 5],
                    fill: false,
                    yAxisID: 'yBerat',
                    borderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                mode: 'index',
                intersect: false
            },
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        font: { family: 'Inter', size: 12 }
                    }
                },
                tooltip: {
                    padding: 12,
                    cornerRadius: 8
                }
            },
            scales: {
                yTinggi: {
                    type: 'linear',
                    display: true,
                    position: 'left',
                    title: { display: true, text: 'Tinggi (cm)', font: { size: 11 } }
                },
                yBerat: {
                    type: 'linear',
                    display: true,
                    position: 'right',
                    title: { display: true, text: 'Berat (kg)', font: { size: 11 } },
                    grid: { drawOnChartArea: false }
                },
                x: {
                    grid: { display: false }
                }
            }
        }
    });
});
</script>
<?php endif; ?>
