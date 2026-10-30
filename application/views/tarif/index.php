<div class="container mb-5 pb-5" style="margin-top:35px;position:relative;z-index:3;">

    <!-- Intro Header -->
    <div class="text-center mb-5">
        <span class="section-label"><i class="fas fa-hand-holding-dollar me-1"></i> Transparansi Tarif Publik</span>
        <h2 class="display-6 fw-bold mt-2">Daftar Biaya &amp; Tarif Layanan</h2>
        <p class="text-muted mx-auto" style="max-width: 680px;">
            Puskesmas menjamin kepastian tarif pelayanan kesehatan sesuai peraturan daerah yang berlaku, transparan, dan tanpa pungutan liar.
        </p>
        <div class="section-divider"></div>
    </div>

    <!-- Banner BPJS Gratis -->
    <div class="card border-0 shadow-sm p-4 p-md-5 mb-5 reveal reveal-bottom" style="border-radius:28px; background:linear-gradient(135deg, #0d9488 0%, #0369a1 100%); color:#fff;">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-3" style="background:rgba(255,255,255,.2); font-size:.85rem; font-weight:700;">
                    <i class="fas fa-shield-heart text-warning"></i> Jaminan Kesehatan Nasional
                </div>
                <h3 class="fw-bold mb-2" style="font-family:'Outfit',sans-serif;">Peserta BPJS Kesehatan / KIS / UHC: GRATIS 100%</h3>
                <p class="mb-0 text-white-50" style="font-size:1rem; line-height:1.6;">
                    Seluruh peserta aktif BPJS Kesehatan (Faskes Tingkat Pertama Puskesmas), KIS, maupun UHC <strong>TIDAK DIKENAKAN BIAYA APAPUN</strong> untuk pemeriksaan dokter, tindakan medis dasar, pemeriksaan lab rutin, dan obat-obatan sesuai formularium nasional.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <div class="p-3 rounded-4 bg-white bg-opacity-10 border border-white border-opacity-25 text-center d-inline-block">
                    <div class="display-5 fw-bold text-white mb-0" style="font-family:'Outfit',sans-serif;">Rp 0,-</div>
                    <small class="text-white-50 fw-semibold text-uppercase" style="letter-spacing:1px;">Untuk Peserta BPJS</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Tarif Pasien Umum (Non-BPJS) -->
    <div class="card border-0 shadow-sm p-4 p-md-5 mb-5 reveal reveal-bottom" style="border-radius:28px;">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
            <div>
                <span class="badge bg-primary bg-opacity-10 text-primary fw-bold px-3 py-1 rounded-pill mb-1">Pasien Umum / Non-BPJS</span>
                <h4 class="fw-bold mb-0" style="font-family:'Outfit',sans-serif;">Tarif Retribusi Pelayanan Kesehatan</h4>
            </div>
            <div class="input-group" style="max-width:320px;">
                <span class="input-group-text bg-light border-0"><i class="fas fa-search text-muted small"></i></span>
                <input type="text" id="searchTarif" class="form-control form-control-sm bg-light border-0" placeholder="Cari nama tindakan/layanan...">
            </div>
        </div>

        <!-- Table of Tarifs -->
        <div class="table-responsive">
            <table class="table align-middle" id="tableTarif">
                <thead>
                    <tr class="text-muted small">
                        <th style="width: 5%;">NO</th>
                        <th style="width: 25%;">KATEGORI LAYANAN</th>
                        <th style="width: 45%;">NAMA TINDAKAN / PEMERIKSAAN</th>
                        <th style="width: 25%;" class="text-end">TARIF RETRIBUSI</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Pendaftaran & Poli Umum -->
                    <tr>
                        <td class="text-muted small fw-bold">1</td>
                        <td><span class="badge bg-primary bg-opacity-10 text-primary px-3 py-1 rounded-pill">Loket &amp; Pemeriksaan</span></td>
                        <td>
                            <div class="fw-bold text-dark">Pendaftaran &amp; Pemeriksaan Dokter Umum</div>
                            <small class="text-muted">Termasuk rekam medis dan konsultasi dokter di Poli Umum / MTBS</small>
                        </td>
                        <td class="text-end fw-bold text-primary fs-6">Rp 10.000</td>
                    </tr>

                    <!-- Poli Gigi -->
                    <tr>
                        <td class="text-muted small fw-bold">2</td>
                        <td><span class="badge bg-info bg-opacity-10 text-info px-3 py-1 rounded-pill">Poli Gigi &amp; Mulut</span></td>
                        <td>
                            <div class="fw-bold text-dark">Pemeriksaan Klinis &amp; Odontogram Gigi</div>
                            <small class="text-muted">Pemeriksaan kondisi gigi dan jaringan mulut</small>
                        </td>
                        <td class="text-end fw-bold text-primary fs-6">Rp 10.000</td>
                    </tr>
                    <tr>
                        <td class="text-muted small fw-bold">3</td>
                        <td><span class="badge bg-info bg-opacity-10 text-info px-3 py-1 rounded-pill">Poli Gigi &amp; Mulut</span></td>
                        <td>
                            <div class="fw-bold text-dark">Pencabutan Gigi Susu (Anak)</div>
                            <small class="text-muted">Termasuk anestesi topikal/lokal per gigi</small>
                        </td>
                        <td class="text-end fw-bold text-primary fs-6">Rp 20.000</td>
                    </tr>
                    <tr>
                        <td class="text-muted small fw-bold">4</td>
                        <td><span class="badge bg-info bg-opacity-10 text-info px-3 py-1 rounded-pill">Poli Gigi &amp; Mulut</span></td>
                        <td>
                            <div class="fw-bold text-dark">Pencabutan Gigi Tetap / Dewasa</div>
                            <small class="text-muted">Pencabutan gigi permanen tanpa komplikasi</small>
                        </td>
                        <td class="text-end fw-bold text-primary fs-6">Rp 30.000</td>
                    </tr>
                    <tr>
                        <td class="text-muted small fw-bold">5</td>
                        <td><span class="badge bg-info bg-opacity-10 text-info px-3 py-1 rounded-pill">Poli Gigi &amp; Mulut</span></td>
                        <td>
                            <div class="fw-bold text-dark">Penambalan Gigi (Fuji / Glass Ionomer)</div>
                            <small class="text-muted">Penambalan estetis bahan GIC per gigi</small>
                        </td>
                        <td class="text-end fw-bold text-primary fs-6">Rp 35.000</td>
                    </tr>
                    <tr>
                        <td class="text-muted small fw-bold">6</td>
                        <td><span class="badge bg-info bg-opacity-10 text-info px-3 py-1 rounded-pill">Poli Gigi &amp; Mulut</span></td>
                        <td>
                            <div class="fw-bold text-dark">Pembersihan Karang Gigi (Scaling Ringan)</div>
                            <small class="text-muted">Pembersihan kalkulus per regio rahang</small>
                        </td>
                        <td class="text-end fw-bold text-primary fs-6">Rp 40.000</td>
                    </tr>

                    <!-- Poli KIA & Ibu Hamil -->
                    <tr>
                        <td class="text-muted small fw-bold">7</td>
                        <td><span class="badge bg-danger bg-opacity-10 text-danger px-3 py-1 rounded-pill">Poli KIA &amp; Bumil</span></td>
                        <td>
                            <div class="fw-bold text-dark">Pemeriksaan Kehamilan (ANC Terpadu 10T)</div>
                            <small class="text-muted">Pemeriksaan rutin bidan dan dokter, TFU, DJJ, dan buku KIA</small>
                        </td>
                        <td class="text-end fw-bold text-primary fs-6">Rp 20.000</td>
                    </tr>
                    <tr>
                        <td class="text-muted small fw-bold">8</td>
                        <td><span class="badge bg-danger bg-opacity-10 text-danger px-3 py-1 rounded-pill">Poli KIA &amp; Bumil</span></td>
                        <td>
                            <div class="fw-bold text-dark">Pelayanan KB Suntik (1 Bulan / 3 Bulan)</div>
                            <small class="text-muted">Termasuk spuit dan obat kontrasepsi</small>
                        </td>
                        <td class="text-end fw-bold text-primary fs-6">Rp 25.000</td>
                    </tr>
                    <tr>
                        <td class="text-muted small fw-bold">9</td>
                        <td><span class="badge bg-danger bg-opacity-10 text-danger px-3 py-1 rounded-pill">Poli KIA &amp; Bumil</span></td>
                        <td>
                            <div class="fw-bold text-dark">Pemasangan / Pelepasan IUD / Implan</div>
                            <small class="text-muted">Tindakan kontrasepsi jangka panjang oleh bidan tersertifikasi</small>
                        </td>
                        <td class="text-end fw-bold text-primary fs-6">Rp 50.000</td>
                    </tr>

                    <!-- Tindakan Medis & Rawat Luka -->
                    <tr>
                        <td class="text-muted small fw-bold">10</td>
                        <td><span class="badge bg-warning bg-opacity-10 text-warning px-3 py-1 rounded-pill">Tindakan Medis</span></td>
                        <td>
                            <div class="fw-bold text-dark">Rawat Luka Ringan &amp; Ganti Verban</div>
                            <small class="text-muted">Pembersihan luka lecet / jahit steril</small>
                        </td>
                        <td class="text-end fw-bold text-primary fs-6">Rp 15.000</td>
                    </tr>
                    <tr>
                        <td class="text-muted small fw-bold">11</td>
                        <td><span class="badge bg-warning bg-opacity-10 text-warning px-3 py-1 rounded-pill">Tindakan Medis</span></td>
                        <td>
                            <div class="fw-bold text-dark">Penjahitan Luka (Hecting 1–3 Jahitan)</div>
                            <small class="text-muted">Termasuk anestesi lokal lidokain dan benang bedah</small>
                        </td>
                        <td class="text-end fw-bold text-primary fs-6">Rp 30.000</td>
                    </tr>
                    <tr>
                        <td class="text-muted small fw-bold">12</td>
                        <td><span class="badge bg-warning bg-opacity-10 text-warning px-3 py-1 rounded-pill">Tindakan Medis</span></td>
                        <td>
                            <div class="fw-bold text-dark">Nebulisasi (Uap Sesak Napas)</div>
                            <small class="text-muted">Termasuk cairan obat bronkodilator dan sungkup nebulizer</small>
                        </td>
                        <td class="text-end fw-bold text-primary fs-6">Rp 25.000</td>
                    </tr>

                    <!-- Laboratorium Sederhana -->
                    <tr>
                        <td class="text-muted small fw-bold">13</td>
                        <td><span class="badge bg-success bg-opacity-10 text-success px-3 py-1 rounded-pill">Laboratorium</span></td>
                        <td>
                            <div class="fw-bold text-dark">Pemeriksaan Gula Darah Sewaktu (GDS) / Puasa</div>
                            <small class="text-muted">Metode strip POCT / kapiler darah</small>
                        </td>
                        <td class="text-end fw-bold text-primary fs-6">Rp 15.000</td>
                    </tr>
                    <tr>
                        <td class="text-muted small fw-bold">14</td>
                        <td><span class="badge bg-success bg-opacity-10 text-success px-3 py-1 rounded-pill">Laboratorium</span></td>
                        <td>
                            <div class="fw-bold text-dark">Pemeriksaan Kolesterol Total</div>
                            <small class="text-muted">Metode strip kapiler POCT</small>
                        </td>
                        <td class="text-end fw-bold text-primary fs-6">Rp 25.000</td>
                    </tr>
                    <tr>
                        <td class="text-muted small fw-bold">15</td>
                        <td><span class="badge bg-success bg-opacity-10 text-success px-3 py-1 rounded-pill">Laboratorium</span></td>
                        <td>
                            <div class="fw-bold text-dark">Pemeriksaan Asam Urat (Uric Acid)</div>
                            <small class="text-muted">Metode strip kapiler POCT</small>
                        </td>
                        <td class="text-end fw-bold text-primary fs-6">Rp 20.000</td>
                    </tr>
                    <tr>
                        <td class="text-muted small fw-bold">16</td>
                        <td><span class="badge bg-success bg-opacity-10 text-success px-3 py-1 rounded-pill">Laboratorium</span></td>
                        <td>
                            <div class="fw-bold text-dark">Pemeriksaan Golongan Darah &amp; Rhesus</div>
                            <small class="text-muted">Reagen aglutinasi ABO</small>
                        </td>
                        <td class="text-end fw-bold text-primary fs-6">Rp 10.000</td>
                    </tr>
                    <tr>
                        <td class="text-muted small fw-bold">17</td>
                        <td><span class="badge bg-success bg-opacity-10 text-success px-3 py-1 rounded-pill">Laboratorium</span></td>
                        <td>
                            <div class="fw-bold text-dark">Pemeriksaan Urin Lengkap (10 Parameter)</div>
                            <small class="text-muted">Pemeriksaan protein, reduksi, eritrosit, leukosit urin</small>
                        </td>
                        <td class="text-end fw-bold text-primary fs-6">Rp 20.000</td>
                    </tr>

                    <!-- Surat Keterangan Dokter -->
                    <tr>
                        <td class="text-muted small fw-bold">18</td>
                        <td><span class="badge bg-secondary bg-opacity-10 text-secondary px-3 py-1 rounded-pill">Administrasi Medis</span></td>
                        <td>
                            <div class="fw-bold text-dark">Surat Keterangan Dokter (KIR Dokter / Sehat)</div>
                            <small class="text-muted">Pemeriksaan fisik umum untuk melamar pekerjaan / studi</small>
                        </td>
                        <td class="text-end fw-bold text-primary fs-6">Rp 20.000</td>
                    </tr>
                    <tr>
                        <td class="text-muted small fw-bold">19</td>
                        <td><span class="badge bg-secondary bg-opacity-10 text-secondary px-3 py-1 rounded-pill">Administrasi Medis</span></td>
                        <td>
                            <div class="fw-bold text-dark">Pemeriksaan Buta Warna (Tes Ishihara)</div>
                            <small class="text-muted">Pemeriksaan persepsi warna dengan lembar keterangan resmi</small>
                        </td>
                        <td class="text-end fw-bold text-primary fs-6">Rp 15.000</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Ketentuan Pembayaran Box -->
        <div class="mt-4 p-4 rounded-4" style="background:#f8fafc; border:1px solid #e2e8f0;">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="d-flex align-items-start gap-2">
                        <i class="fas fa-cash-register text-success mt-1"></i>
                        <div class="small">
                            <strong>Pembayaran Resmi:</strong> Seluruh pembayaran retribusi hanya dilakukan di <strong>Loket Kasir Resmi Puskesmas</strong>. Petugas akan memberikan kuitansi / bukti bayar berstempel.
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex align-items-start gap-2">
                        <i class="fas fa-hand-holding-heart text-danger mt-1"></i>
                        <div class="small">
                            <strong>Bebas Pungli:</strong> Tidak ada pungutan lain di luar tabel tarif resmi di atas. Jika menemukan indikasi pungli, laporkan segera ke kanal pengaduan kami.
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Hubungi / Pengaduan Callout -->
    <div class="card border-0 shadow-sm p-4 text-center rounded-4" style="background:#f0fdfa;">
        <h5 class="fw-bold mb-2">Memerlukan Informasi Lebih Lanjut Mengenai Tarif?</h5>
        <p class="text-muted small mb-3">Silakan hubungi petugas loket informasi atau gunakan layanan pesan kami.</p>
        <div class="d-flex justify-content-center gap-2">
            <a href="<?= base_url('pengaduan'); ?>" class="btn btn-outline-primary btn-sm rounded-pill px-4 fw-bold">
                <i class="fas fa-bullhorn me-1"></i> Layanan Pengaduan
            </a>
            <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $profil['telepon'] ?? ''); ?>" target="_blank" class="btn btn-success btn-sm rounded-pill px-4 fw-bold">
                <i class="fab fa-whatsapp me-1"></i> WhatsApp Hotline
            </a>
        </div>
    </div>

</div>

<script>
document.getElementById('searchTarif').addEventListener('keyup', function() {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll('#tableTarif tbody tr');
    rows.forEach(function(row) {
        let text = row.textContent.toLowerCase();
        row.style.display = text.includes(filter) ? '' : 'none';
    });
});
</script>
