<style>
    .btn-gender {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 2px solid #e2e8f0 !important;
        font-weight: 700 !important;
        position: relative;
        font-family: 'Outfit', sans-serif;
        background: #fff !important;
        color: #64748b !important;
    }
    .btn-gender:hover {
        border-color: #cbd5e1 !important;
        transform: translateY(-2px);
    }
    .btn-gender-boy:hover { 
        color: #0284c7 !important; 
        border-color: #38bdf8 !important;
        background: #f0f9ff !important; 
    }
    .btn-check:checked + .btn-gender-boy {
        background: linear-gradient(135deg, #0284c7, #0369a1) !important;
        color: #fff !important; 
        border-color: #0284c7 !important;
        box-shadow: 0 10px 20px rgba(2, 132, 199, 0.25) !important;
    }
    .btn-gender-girl:hover { 
        color: #f43f5e !important; 
        border-color: #fda4af !important;
        background: #fff1f2 !important; 
    }
    .btn-check:checked + .btn-gender-girl {
        background: linear-gradient(135deg, #f43f5e, #e11d48) !important;
        color: #fff !important; 
        border-color: #f43f5e !important;
        box-shadow: 0 10px 20px rgba(244, 63, 94, 0.25) !important;
    }
</style>

<!-- Hero Section -->
<section class="py-5 text-center text-lg-start position-relative overflow-hidden" style="background: linear-gradient(135deg, rgba(13,148,136,.06) 0%, rgba(2,132,199,.06) 100%); border-bottom: 1px solid rgba(226,232,240,.7);">
    <div class="container py-4">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <div class="d-inline-flex align-items-center gap-2 px-3 py-1.5 rounded-pill mb-3" style="background: rgba(13,148,136,.12); color: var(--primary); font-size: 0.85rem; font-weight: 700;">
                    <i class="fas fa-baby"></i> Layanan Digital Puskesmas
                </div>
                <h1 class="display-6 fw-bold mb-2" style="font-family: 'Outfit', sans-serif; color: #0f172a; letter-spacing: -0.8px;">
                    Deteksi Dini Stunting Balita
                </h1>
                <p class="text-muted mb-0 lead" style="font-size: 1rem; max-width: 650px;">
                    Pemeriksaan status gizi dan tinggi badan balita (0-60 bulan) berbasis kurva baku <strong>WHO Child Growth Standards</strong> secara mandiri, cepat, dan akurat.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <?php if($this->session->userdata('user_logged_in')): ?>
                <a href="<?= base_url('deteksi/riwayat'); ?>" class="btn btn-outline-primary rounded-pill px-4 py-2.5 fw-bold shadow-sm" style="font-size: 0.9rem;">
                    <i class="fas fa-chart-line me-1.5"></i> Riwayat &amp; Grafik Balita
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background: #f8fafc; min-height: 75vh;">
    <div class="container pb-4">
        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mb-4 rounded-4" role="alert">
                <i class="fas fa-check-circle me-2"></i><?= $this->session->flashdata('success'); ?>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 mb-4 rounded-4" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i><?= $this->session->flashdata('error'); ?>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="bg-white rounded-5 shadow-sm overflow-hidden border" style="border-color: #e2e8f0 !important;">
                    <div class="row g-0">
                        <!-- Form Side -->
                        <div class="col-lg-5 p-4 p-md-5" style="background: #fcfcfd; border-right: 1px solid #f1f5f9;">
                            <div class="d-flex align-items-center gap-3 mb-4 pb-2 border-bottom">
                                <div style="width:44px;height:44px;background:rgba(13,148,136,.1);border-radius:12px;display:flex;align-items:center;justify-content:center;color:var(--primary);font-size:1.15rem;">
                                    <i class="fas fa-clipboard-user"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-0" style="font-family:'Outfit',sans-serif; color: #1e293b;">Data Pengukuran Anak</h5>
                                    <small class="text-muted" style="font-size: 0.78rem;">Masukkan data anak secara teliti</small>
                                </div>
                            </div>
                            
                            <form action="<?= base_url('deteksi/stunting'); ?>" method="post">
                                <div class="mb-3.5">
                                    <label class="form-label fw-bold small text-muted mb-1.5">Nama Lengkap Anak <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control rounded-3" style="padding: 0.75rem 1rem;" name="nama_anak" value="<?= isset($input) ? htmlspecialchars($input['nama_anak']) : ''; ?>" placeholder="Nama lengkap balita" required>
                                </div>
                                
                                <div class="mb-3.5">
                                    <label class="form-label fw-bold small text-muted mb-1.5">Nama Orang Tua (Ayah / Ibu) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control rounded-3" style="padding: 0.75rem 1rem;" name="nama_ortu" value="<?= isset($input) ? htmlspecialchars($input['nama_ortu']) : htmlspecialchars($user['nama_lengkap'] ?? ''); ?>" placeholder="Nama orang tua" required>
                                </div>

                                <div class="mb-3.5">
                                    <label class="form-label fw-bold small text-muted mb-1.5">Nomor HP / WhatsApp <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control rounded-3" style="padding: 0.75rem 1rem;" name="no_hp" value="<?= isset($input) ? htmlspecialchars($input['no_hp']) : htmlspecialchars($user['no_hp'] ?? ''); ?>" placeholder="Contoh: 081234567890" required>
                                </div>

                                <div class="mb-3.5">
                                    <label class="form-label fw-bold small text-muted mb-1.5">Alamat Domisili</label>
                                    <textarea class="form-control rounded-3" name="alamat" rows="2" placeholder="Alamat tinggal / RT / RW / Kelurahan"><?= isset($input) ? htmlspecialchars($input['alamat']) : htmlspecialchars($user['alamat'] ?? ''); ?></textarea>
                                </div>

                                <div class="mb-3.5">
                                    <label class="form-label fw-bold small text-muted mb-2">Jenis Kelamin <span class="text-danger">*</span></label>
                                    <div class="d-flex gap-2.5">
                                        <input type="radio" class="btn-check" name="gender" id="boy" value="L" <?= (!isset($input) || $input['gender'] == 'L') ? 'checked' : ''; ?>>
                                        <label class="btn btn-gender btn-gender-boy w-100 py-2.5 rounded-3" for="boy">
                                            <i class="fas fa-child me-1.5"></i> Laki-laki
                                        </label>

                                        <input type="radio" class="btn-check" name="gender" id="girl" value="P" <?= (isset($input) && $input['gender'] == 'P') ? 'checked' : ''; ?>>
                                        <label class="btn btn-gender btn-gender-girl w-100 py-2.5 rounded-3" for="girl">
                                            <i class="fas fa-child-dress me-1.5"></i> Perempuan
                                        </label>
                                    </div>
                                </div>

                                <div class="row g-2.5 mb-3.5">
                                    <div class="col-6">
                                        <label class="form-label fw-bold small text-muted mb-1.5">Umur (Bulan) <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="number" class="form-control rounded-start-3" style="padding: 0.75rem 0.9rem;" name="umur" value="<?= isset($input) ? $input['umur'] : '12'; ?>" min="0" max="60" required>
                                            <span class="input-group-text bg-light text-muted fw-bold small">BLN</span>
                                        </div>
                                        <small class="text-muted" style="font-size: 11px;">Rentang 0 - 60 bln</small>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label fw-bold small text-muted mb-1.5">Tinggi Badan <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="number" step="0.1" class="form-control rounded-start-3" style="padding: 0.75rem 0.9rem;" name="tinggi" value="<?= isset($input) ? $input['tinggi'] : ''; ?>" placeholder="0.0" required>
                                            <span class="input-group-text bg-light text-muted fw-bold small">CM</span>
                                        </div>
                                        <small class="text-muted" style="font-size: 11px;">Gunakan titik (.)</small>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold small text-muted mb-1.5">Berat Badan (Opsional)</label>
                                    <div class="input-group">
                                        <input type="number" step="0.1" class="form-control rounded-start-3" style="padding: 0.75rem 0.9rem;" name="berat" value="<?= isset($input['berat']) ? $input['berat'] : ''; ?>" placeholder="0.0">
                                        <span class="input-group-text bg-light text-muted fw-bold small">KG</span>
                                    </div>
                                </div>

                                <button type="submit" name="hitung" value="1" class="btn btn-primary w-100 py-3 rounded-pill fw-bold shadow-sm" style="font-family:'Outfit',sans-serif; font-size:0.95rem; letter-spacing:0.5px;">
                                    <i class="fas fa-magnifying-glass-chart me-1.5"></i> Analisis Status Gizi Sekarang
                                </button>
                            </form>
                        </div>

                        <!-- Result Side -->
                        <div class="col-lg-7 p-4 p-md-5 d-flex flex-column justify-content-center bg-white">
                            <?php if($hasil): ?>
                                <div class="reveal reveal-zoom">
                                    <div class="text-center mb-4">
                                        <div class="badge bg-<?= $hasil['label']; ?> px-4 py-2.5 mb-3 rounded-pill shadow-sm" style="font-size:1rem; text-transform:uppercase; letter-spacing:1px; font-family:'Outfit',sans-serif;">
                                            <i class="fas fa-shield-heart me-1.5"></i> <?= $hasil['status']; ?>
                                        </div>
                                        <div>
                                            <h3 class="fw-bold mb-1 text-dark" style="font-family:'Outfit',sans-serif;"><?= htmlspecialchars($input['nama_anak']); ?></h3>
                                            <p class="text-muted small mb-0">Orang Tua: <strong><?= htmlspecialchars($input['nama_ortu']); ?></strong> &bull; Umur: <strong><?= $input['umur']; ?> Bulan</strong> &bull; TB: <strong><?= $input['tinggi']; ?> cm</strong></p>
                                        </div>
                                    </div>

                                    <div class="p-4 rounded-4 border-start border-4 border-<?= $hasil['label']; ?> mb-4 shadow-sm" style="background:rgba(var(--bs-<?= $hasil['label']; ?>-rgb), .04);">
                                        <p class="mb-0 text-dark lh-base fs-6 fw-medium"><?= $hasil['pesan']; ?></p>
                                    </div>

                                    <div class="row g-3 mb-4">
                                        <div class="col-sm-6">
                                            <div class="p-3.5 bg-light rounded-4 text-center border">
                                                <div class="small text-muted fw-bold text-uppercase mb-1" style="font-size:11px; letter-spacing:0.5px;">Klasifikasi WHO</div>
                                                <div class="fw-bold fs-5 text-<?= $hasil['label']; ?>"><?= $hasil['status']; ?></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="p-3.5 bg-light rounded-4 text-center border">
                                                <div class="small text-muted fw-bold text-uppercase mb-1" style="font-size:11px; letter-spacing:0.5px;">Selisih Median Standar</div>
                                                <div class="fw-bold fs-5 text-dark"><?= ($hasil['z_score'] >= 0) ? '+'.$hasil['z_score'] : $hasil['z_score']; ?> cm</div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Rekomendasi Gizi -->
                                    <div class="mb-4">
                                        <h6 class="fw-bold mb-3 text-dark" style="font-family:'Outfit',sans-serif;">
                                            <i class="fas fa-utensils text-primary me-2"></i>Rekomendasi Tindakan &amp; Asupan Gizi:
                                        </h6>
                                        <div class="d-flex flex-column gap-2">
                                            <?php foreach($hasil['rekomendasi'] as $rek): ?>
                                                <div class="d-flex align-items-start gap-2.5 p-3 rounded-3" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                                                    <i class="fas fa-check-circle text-success mt-1"></i>
                                                    <span class="small text-dark fw-medium lh-base"><?= $rek; ?></span>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                    <?php if($hasil['label'] == 'warning' || $hasil['label'] == 'danger'): ?>
                                    <div class="p-3.5 rounded-4 bg-white border border-danger border-opacity-25 d-flex align-items-center gap-3 shadow-sm">
                                        <div class="bg-danger bg-opacity-10 text-danger p-3 rounded-circle flex-shrink-0" style="width:52px;height:52px;display:flex;align-items:center;justify-content:center;font-size:1.3rem;">
                                            <i class="fas fa-user-doctor"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="fw-bold mb-1 text-danger">Perlu Konsultasi Lanjutan</h6>
                                            <p class="small text-muted mb-0">Disarankan berkonsultasi dengan dokter gizi / Poli KIA Puskesmas.</p>
                                        </div>
                                        <a href="<?= base_url('layananonline/konsultasi'); ?>" class="btn btn-danger btn-sm rounded-pill px-3 py-1.5 fw-bold text-white flex-shrink-0">
                                            Konsultasi Medis
                                        </a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            <?php else: ?>
                                <div class="text-center py-5">
                                    <div class="mb-4 d-inline-flex p-4 rounded-circle" style="background:rgba(13,148,136,.06);">
                                        <i class="fas fa-baby-carriage fa-4x text-primary opacity-50"></i>
                                    </div>
                                    <h4 class="fw-bold mb-2 text-dark" style="font-family:'Outfit',sans-serif;">Mulai Deteksi Tumbuh Kembang</h4>
                                    <p class="text-muted mx-auto mb-4" style="max-width:380px; font-size:0.9rem;">
                                        Lengkapi data balita pada formulir di sebelah kiri untuk melihat evaluasi kurva tinggi badan terhadap standar WHO secara otomatis.
                                    </p>
                                    <div class="d-flex justify-content-center gap-3 flex-wrap text-muted small">
                                        <span><i class="fas fa-shield-check text-success me-1"></i> Sesuai Baku WHO</span>
                                        <span><i class="fas fa-bolt text-warning me-1"></i> Analisis Instan</span>
                                        <span><i class="fas fa-database text-info me-1"></i> Tersimpan Otomatis</span>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Informasi Panduan -->
                <div class="mt-4 p-4 p-md-5 rounded-4 bg-white shadow-sm border" style="border-color:#e2e8f0;">
                    <div class="d-flex align-items-center gap-2.5 mb-3">
                        <i class="fas fa-circle-info text-primary fs-5"></i>
                        <h6 class="fw-bold mb-0 text-dark" style="font-family:'Outfit',sans-serif;">Informasi &amp; Catatan Medis</h6>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="p-3 rounded-3 bg-light border small text-muted">
                                <strong class="text-dark d-block mb-1"><i class="fas fa-chart-simple text-success me-1"></i> Standar Pertumbuhan WHO:</strong>
                                Perhitungan mengacu pada standar baku PB/U (Panjang Badan menurut Umur) atau TB/U (Tinggi Badan menurut Umur) World Health Organization untuk anak usia 0 sampai 5 tahun.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 rounded-3 bg-light border small text-muted">
                                <strong class="text-dark d-block mb-1"><i class="fas fa-triangle-exclamation text-warning me-1"></i> Penafian Medis:</strong>
                                Hasil deteksi online ini adalah skrining awal untuk deteksi dini. Apabila hasil menunjukkan indikasi pendek/sangat pendek, segera kunjungi Posyandu atau Poli KIA Puskesmas untuk evaluasi lebih lanjut.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
