<style>
    .alur-hero {
        background: linear-gradient(135deg, rgba(13,148,136,.08) 0%, rgba(2,132,199,.06) 100%);
        border-radius: 28px;
        border: 1px solid rgba(226,232,240,.8);
        position: relative;
        overflow: hidden;
    }
    .alur-hero::before {
        content: '';
        position: absolute;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(13,148,136,.12) 0%, transparent 70%);
        top: -100px;
        right: -50px;
        border-radius: 50%;
        pointer-events: none;
    }
    .timeline-step-card {
        background: #ffffff;
        border: 1.5px solid #e2e8f0;
        border-radius: 22px;
        padding: 1.75rem 1.4rem;
        height: 100%;
        position: relative;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        display: flex;
        flex-direction: column;
    }
    .timeline-step-card:hover {
        border-color: #0d9488;
        transform: translateY(-6px);
        box-shadow: 0 16px 32px rgba(13,148,136,0.12);
    }
    .step-pill-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 0.35rem 0.95rem;
        border-radius: 50rem;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.4px;
        background: rgba(13,148,136,.1);
        color: #0f766e;
        border: 1px solid rgba(13,148,136,.2);
        margin-bottom: 1rem;
        align-self: flex-start;
    }
    .step-icon-wrap {
        width: 58px;
        height: 58px;
        border-radius: 18px;
        background: linear-gradient(135deg, #f0fdfa, #ccfbf1);
        color: #0d9488;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 1.25rem;
        border: 1px solid rgba(13,148,136,.2);
        transition: all 0.3s ease;
    }
    .timeline-step-card:hover .step-icon-wrap {
        background: linear-gradient(135deg, #0d9488, #0f766e);
        color: #ffffff;
        transform: scale(1.08) rotate(-4deg);
        box-shadow: 0 8px 20px rgba(13,148,136,.3);
    }
    .flow-nav-pills .nav-link {
        font-family: 'Outfit', sans-serif;
        font-weight: 700;
        font-size: 0.9rem;
        color: #64748b;
        border-radius: 14px;
        padding: 0.75rem 1.4rem;
        transition: all 0.25s ease;
        border: 1px solid transparent;
        background: transparent;
    }
    .flow-nav-pills .nav-link:hover {
        color: var(--primary);
        background: rgba(13,148,136,.06);
    }
    .flow-nav-pills .nav-link.active {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark)) !important;
        color: #ffffff !important;
        box-shadow: 0 8px 20px rgba(13,148,136,.25);
    }
    .doc-req-box {
        background: linear-gradient(135deg, #f0fdfa 0%, #f8fafc 100%);
        border: 1.5px solid rgba(13,148,136,.2);
        border-radius: 20px;
    }
</style>

<div class="container mb-5 pb-5" style="margin-top:25px;position:relative;z-index:3;">

    <!-- Breadcrumb & Top Bar -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
        <span class="badge rounded-pill px-3 py-1.5" style="background:#ccfbf1; color:#0f766e; font-size:.75rem; font-weight:700;">
            <i class="fas fa-check-circle me-1"></i> Standar Operasional Prosedur (SOP) Resmi
        </span>
    </div>

    <!-- Hero Header -->
    <div class="alur-hero p-4 p-md-5 mb-5 shadow-sm reveal reveal-top">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-3" style="background:rgba(13,148,136,.12); color:#0f766e; font-weight:700; font-size:.78rem;">
                    <i class="fas fa-hospital-user"></i> Panduan Kunjungan &amp; Berobat Pasien
                </div>
                <h1 class="display-6 fw-bold mb-3 text-dark" style="font-family:'Outfit',sans-serif; letter-spacing:-0.5px;">
                    Alur Pelayanan Pasien Terpadu
                </h1>
                <p class="text-muted mb-4 lead" style="font-size:0.95rem; line-height:1.7; max-width:680px;">
                    Puskesmas berkomitmen menghadirkan layanan kesehatan yang tertib, cepat, dan transparan. Pelajari tata cara pendaftaran, pemeriksaan ruang poli, hingga pengambilan obat untuk kemudahan kunjungan Anda.
                </p>
                <div class="d-flex flex-wrap gap-2">
                    <a href="#tahapan-alur" class="btn btn-premium px-4 py-2.5 rounded-pill shadow-sm">
                        <i class="fas fa-route me-1.5"></i> Lihat Tahapan Alur
                    </a>
                    <a href="<?= base_url('alurpelayanan/poli'); ?>" class="btn btn-outline-primary px-4 py-2.5 rounded-pill fw-bold">
                        <i class="fas fa-stethoscope me-1.5"></i> Panduan Ruang Poli
                    </a>
                </div>
            </div>
            <div class="col-lg-4 text-center d-none d-lg-block">
                <div class="position-relative d-inline-block">
                    <div style="width:200px; height:200px; background:radial-gradient(circle, rgba(13,148,136,.15) 0%, rgba(2,132,199,.05) 70%); border-radius:50%; display:flex; align-items:center; justify-content:center; margin:auto;">
                        <div style="width:140px; height:140px; background:#fff; border-radius:50%; box-shadow:0 12px 30px rgba(13,148,136,.15); display:flex; align-items:center; justify-content:center; border:2px dashed #0d9488;">
                            <i class="fas fa-clipboard-check text-primary" style="font-size:3.5rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section: Kategori Alur (Tab Rawat Jalan, Gawat Darurat, Rujukan) -->
    <div id="tahapan-alur" class="card border-0 shadow-sm p-4 p-md-5 mb-5 reveal reveal-bottom" style="border-radius:26px;">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4 pb-3 border-bottom">
            <div>
                <span class="badge rounded-pill px-3 py-1 mb-1.5" style="background:#ccfbf1; color:#0f766e; font-weight:700; font-size:.75rem;">
                    Pilihan Jenis Kunjungan
                </span>
                <h3 class="fw-bold mb-0 text-dark" style="font-family:'Outfit',sans-serif;">
                    Tahapan Pelayanan Berdasarkan Kebutuhan
                </h3>
            </div>
            <ul class="nav nav-pills flow-nav-pills p-1 rounded-4 border gap-1" style="background:#f8fafc;" id="alurTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="rawat-jalan-tab" data-bs-toggle="pill" data-bs-target="#rawat-jalan" type="button" role="tab">
                        <i class="fas fa-person-walking me-1.5"></i> Rawat Jalan (Reguler)
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="igd-tab" data-bs-toggle="pill" data-bs-target="#igd" type="button" role="tab">
                        <i class="fas fa-truck-medical me-1.5"></i> Gawat Darurat (UGD)
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="rujukan-tab" data-bs-toggle="pill" data-bs-target="#rujukan" type="button" role="tab">
                        <i class="fas fa-file-waveform me-1.5"></i> Alur Rujukan BPJS
                    </button>
                </li>
            </ul>
        </div>

        <div class="tab-content" id="alurTabContent">
            <!-- TAB 1: RAWAT JALAN -->
            <div class="tab-pane fade show active" id="rawat-jalan" role="tabpanel">
                <p class="text-muted mb-4" style="max-width:850px;">
                    Alur standar bagi masyarakat yang berkunjung pada jam operasional kerja untuk pemeriksaan Poli Umum, Poli Gigi, Poli KIA/KB, Poli Imunisasi, Poli MTBS (Anak), dan konsultasi kesehatan:
                </p>

                <div class="row g-4 stagger-parent mb-4">
                    <!-- Step 1 -->
                    <div class="col-lg-3 col-md-6 reveal reveal-zoom">
                        <div class="timeline-step-card">
                            <span class="step-pill-badge">
                                <i class="fas fa-1"></i> Langkah Pertama
                            </span>
                            <div class="step-icon-wrap">
                                <i class="fas fa-ticket-alt"></i>
                            </div>
                            <h5 class="fw-bold mb-2 text-dark" style="font-family:'Outfit',sans-serif;">1. Antrean &amp; Skrining</h5>
                            <p class="text-muted small mb-0" style="line-height:1.6;">
                                Pasien mengambil tiket nomor antrean di mesin antrean mandiri. Petugas melakukan skrining visual awal (triage visual suhu &amp; gejala batuk).
                            </p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="col-lg-3 col-md-6 reveal reveal-zoom" style="--delay:1;">
                        <div class="timeline-step-card">
                            <span class="step-pill-badge">
                                <i class="fas fa-2"></i> Langkah Kedua
                            </span>
                            <div class="step-icon-wrap">
                                <i class="fas fa-id-card"></i>
                            </div>
                            <h5 class="fw-bold mb-2 text-dark" style="font-family:'Outfit',sans-serif;">2. Loket Pendaftaran</h5>
                            <p class="text-muted small mb-0" style="line-height:1.6;">
                                Menyerahkan berkas identitas (KTP/KK &amp; Kartu BPJS/KIS). Petugas memvalidasi data pada sistem e-Puskesmas / P-Care dan mengarahkan ke poli yang dituju.
                            </p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="col-lg-3 col-md-6 reveal reveal-zoom" style="--delay:2;">
                        <div class="timeline-step-card">
                            <span class="step-pill-badge">
                                <i class="fas fa-3"></i> Langkah Ketiga
                            </span>
                            <div class="step-icon-wrap">
                                <i class="fas fa-user-doctor"></i>
                            </div>
                            <h5 class="fw-bold mb-2 text-dark" style="font-family:'Outfit',sans-serif;">3. Pemeriksaan Poli</h5>
                            <p class="text-muted small mb-0" style="line-height:1.6;">
                                Pemeriksaan tanda vital (tensi, nadi, suhu) oleh perawat/bidan, dilanjutkan anamnesis mendalam, diagnosa, dan tindakan medis oleh dokter di ruang poli.
                            </p>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="col-lg-3 col-md-6 reveal reveal-zoom" style="--delay:3;">
                        <div class="timeline-step-card">
                            <span class="step-pill-badge" style="background:#dcfce7; color:#15803d; border-color:#bbf7d0;">
                                <i class="fas fa-check"></i> Tahap Selesai
                            </span>
                            <div class="step-icon-wrap" style="background:linear-gradient(135deg, #f0fdf4, #dcfce7); color:#16a34a; border-color:rgba(22,163,74,.2);">
                                <i class="fas fa-pills"></i>
                            </div>
                            <h5 class="fw-bold mb-2 text-dark" style="font-family:'Outfit',sans-serif;">4. Farmasi / Obat</h5>
                            <p class="text-muted small mb-0" style="line-height:1.6;">
                                Pasien menyerahkan resep ke loket Farmasi. Petugas apotek meracik obat dan memberikan Pelayanan Informasi Obat (PIO) mengenai aturan minum secara jelas.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB 2: UGD / GAWAT DARURAT -->
            <div class="tab-pane fade" id="igd" role="tabpanel">
                <div class="p-3 mb-4 rounded-3" style="background:#fef2f2; border:1px solid #fee2e2;">
                    <div class="d-flex align-items-center gap-2 text-danger fw-bold small">
                        <i class="fas fa-triangle-exclamation fs-5"></i>
                        <span>Pelayanan Unit Gawat Darurat (UGD) beroperasi 24 Jam untuk kondisi darurat medis dan kecelakaan.</span>
                    </div>
                </div>

                <div class="row g-4 stagger-parent mb-4">
                    <div class="col-lg-4 reveal reveal-zoom">
                        <div class="timeline-step-card">
                            <span class="step-pill-badge" style="background:#fee2e2; color:#b91c1c; border-color:#fca5a5;">
                                Prioritas 1
                            </span>
                            <div class="step-icon-wrap" style="background:#fff1f2; color:#e11d48; border-color:#fecdd3;">
                                <i class="fas fa-hand-holding-medical"></i>
                            </div>
                            <h5 class="fw-bold mb-2 text-dark" style="font-family:'Outfit',sans-serif;">1. Penanganan Segera (Triage)</h5>
                            <p class="text-muted small mb-0" style="line-height:1.6;">
                                Pasien gawat darurat langsung dibawa masuk ke ruang tindakan UGD tanpa menunggu antrean loket. Tim medis segera melakukan triage stabilisasi kondisi pasien.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 reveal reveal-zoom" style="--delay:1;">
                        <div class="timeline-step-card">
                            <span class="step-pill-badge">
                                Langkah 2
                            </span>
                            <div class="step-icon-wrap">
                                <i class="fas fa-clipboard-user"></i>
                            </div>
                            <h5 class="fw-bold mb-2 text-dark" style="font-family:'Outfit',sans-serif;">2. Pendaftaran oleh Pengantar</h5>
                            <p class="text-muted small mb-0" style="line-height:1.6;">
                                Sembari pasien ditangani oleh dokter jaga, pihak keluarga/pengantar mendaftarkan identitas pasien (KTP &amp; BPJS) di meja administrasi UGD.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 reveal reveal-zoom" style="--delay:2;">
                        <div class="timeline-step-card">
                            <span class="step-pill-badge" style="background:#dcfce7; color:#15803d; border-color:#bbf7d0;">
                                Hasil Akhir
                            </span>
                            <div class="step-icon-wrap" style="background:#f0fdf4; color:#16a34a; border-color:#bbf7d0;">
                                <i class="fas fa-house-medical-circle-check"></i>
                            </div>
                            <h5 class="fw-bold mb-2 text-dark" style="font-family:'Outfit',sans-serif;">3. Rawat Jalan / Rujukan Lanjut</h5>
                            <p class="text-muted small mb-0" style="line-height:1.6;">
                                Bila kondisi membaik, pasien diperbolehkan pulang dengan resep obat. Apabila memerlukan penanganan bedah/spesialistik intensif, segera dirujuk via SISRUTE ke RS rekanan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB 3: ALUR RUJUKAN -->
            <div class="tab-pane fade" id="rujukan" role="tabpanel">
                <p class="text-muted mb-4" style="max-width:850px;">
                    Bagi pasien yang memerlukan pemeriksaan lanjutan ke Fasilitas Kesehatan Rujukan Tingkat Lanjut (FKRTL / Rumah Sakit):
                </p>

                <div class="row g-4 stagger-parent mb-4">
                    <div class="col-md-4 reveal reveal-zoom">
                        <div class="timeline-step-card">
                            <span class="step-pill-badge">Tahap 1</span>
                            <div class="step-icon-wrap"><i class="fas fa-notes-medical"></i></div>
                            <h5 class="fw-bold mb-2 text-dark" style="font-family:'Outfit',sans-serif;">Indikasi Medis Dokter</h5>
                            <p class="text-muted small mb-0" style="line-height:1.6;">Dokter pemeriksa memastikan diagnosa membutuhkan pemeriksaan dokter spesialis atau sarana penunjang yang tidak tersedia di Puskesmas.</p>
                        </div>
                    </div>
                    <div class="col-md-4 reveal reveal-zoom" style="--delay:1;">
                        <div class="timeline-step-card">
                            <span class="step-pill-badge">Tahap 2</span>
                            <div class="step-icon-wrap"><i class="fas fa-laptop-medical"></i></div>
                            <h5 class="fw-bold mb-2 text-dark" style="font-family:'Outfit',sans-serif;">Penerbitan Surat Rujukan Online</h5>
                            <p class="text-muted small mb-0" style="line-height:1.6;">Petugas menerbitkan surat rujukan berjenjang sistem online (P-Care BPJS) sesuai kapasitas dan ketersediaan kuota rumah sakit tujuan.</p>
                        </div>
                    </div>
                    <div class="col-md-4 reveal reveal-zoom" style="--delay:2;">
                        <div class="timeline-step-card">
                            <span class="step-pill-badge" style="background:#dcfce7; color:#15803d; border-color:#bbf7d0;">Tahap 3</span>
                            <div class="step-icon-wrap" style="background:#f0fdf4; color:#16a34a; border-color:#bbf7d0;"><i class="fas fa-hospital"></i></div>
                            <h5 class="fw-bold mb-2 text-dark" style="font-family:'Outfit',sans-serif;">Kunjungan ke Rumah Sakit</h5>
                            <p class="text-muted small mb-0" style="line-height:1.6;">Pasien membawa lembar surat rujukan dan identitas KTP/BPJS ke loket pendaftaran rumah sakit rujukan sesuai jadwal yang telah tertera.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Persyaratan Dokumen Card -->
        <div class="doc-req-box p-4 p-md-4 mt-2">
            <div class="d-flex align-items-start gap-3">
                <div class="p-2.5 rounded-3 bg-primary text-white d-flex align-items-center justify-content-center shadow-sm" style="width:44px; height:44px; flex-shrink:0;">
                    <i class="fas fa-folder-open fs-5"></i>
                </div>
                <div class="w-100">
                    <h5 class="fw-bold text-dark mb-1" style="font-family:'Outfit',sans-serif; font-size:1rem;">
                        Dokumen yang Wajib Disiapkan Pasien:
                    </h5>
                    <p class="text-muted small mb-3">Pastikan Anda membawa dokumen berikut agar proses pendaftaran berjalan lancar tanpa kendala administrasi:</p>
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="p-3 rounded-3 bg-white border h-100">
                                <div class="d-flex align-items-center gap-2 mb-2 text-primary fw-bold" style="font-size:0.88rem;">
                                    <i class="fas fa-check-circle"></i> Pasien BPJS / KIS / UHC
                                </div>
                                <ul class="text-muted small mb-0 ps-3" style="line-height:1.7;">
                                    <li>KTP Asli / KK bagi pasien balita/anak</li>
                                    <li>Kartu BPJS Kesehatan / KIS aktif (atau tunjukkan kartu digital di aplikasi Mobile JKN)</li>
                                    <li>Buku KIA (khusus ibu hamil atau pemeriksaan balita)</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 rounded-3 bg-white border h-100">
                                <div class="d-flex align-items-center gap-2 mb-2 text-primary fw-bold" style="font-size:0.88rem;">
                                    <i class="fas fa-check-circle"></i> Pasien Umum (Non-BPJS)
                                </div>
                                <ul class="text-muted small mb-0 ps-3" style="line-height:1.7;">
                                    <li>KTP Asli / Kartu Identitas Resmi / KK</li>
                                    <li>Kartu Rekam Medis Pasien Puskesmas (bila kunjungan ulang)</li>
                                    <li>Biaya retribusi pemeriksaan sesuai peraturan daerah yang berlaku</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Banner Menuju Alur Poli Halaman Tersendiri -->
    <div class="card border-0 shadow-sm p-4 p-md-5 mb-5 reveal reveal-bottom" style="border-radius:26px; background:linear-gradient(135deg, #0d9488 0%, #0f766e 100%); color:#fff; position:relative; overflow:hidden;">
        <div class="row align-items-center g-4 position-relative" style="z-index:2;">
            <div class="col-lg-8">
                <div class="d-inline-flex align-items-center gap-1.5 px-3 py-1 rounded-pill mb-2.5" style="background:rgba(255,255,255,.18); font-size:0.75rem; font-weight:700;">
                    <i class="fas fa-stethoscope"></i> Detail Ruangan Khusus
                </div>
                <h3 class="fw-bold mb-2 text-white" style="font-family:'Outfit',sans-serif; letter-spacing:-0.4px;">
                    Alur Pelayanan Berdasarkan Ruang Poli
                </h3>
                <p class="mb-0 text-white-50" style="font-size:0.92rem; line-height:1.7; max-width:650px;">
                    Ketahui tata laksana klinis, perkiraan waktu penanganan, dan persiapan pemeriksaan khusus pada Poli Gigi, Poli Umum, Poli Anak (MTBS), Poli KIA / Ibu Hamil, Poli Imunisasi, hingga Ruang Farmasi.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="<?= base_url('alurpelayanan/poli'); ?>" class="btn btn-light rounded-pill px-4 py-2.5 fw-bold shadow-sm" style="color:var(--primary); font-size:0.88rem;">
                    Buka Halaman Alur Poli <i class="fas fa-arrow-right ms-1.5"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Bottom Actions / Quick Links Grid -->
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-4 h-100" style="border-radius:22px; background:#f0fdfa; border: 1.5px solid rgba(13,148,136,.18) !important;">
                <div class="d-flex align-items-center gap-3">
                    <div class="p-3 rounded-4 bg-primary text-white shadow-sm" style="width:52px; height:52px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <i class="fas fa-receipt fs-4"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1 text-dark" style="font-family:'Outfit',sans-serif;">Rincian Biaya &amp; Tarif?</h5>
                        <p class="text-muted small mb-2.5">Lihat daftar retribusi resmi peraturan daerah dan pembebasan biaya gratis untuk peserta BPJS aktif.</p>
                        <a href="<?= base_url('tarif'); ?>" class="btn btn-primary btn-sm rounded-pill px-3.5 py-1.5 fw-bold shadow-sm">
                            Lihat Tarif Layanan <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-4 h-100" style="border-radius:22px; background:#fffbeb; border: 1.5px solid rgba(245,158,11,.25) !important;">
                <div class="d-flex align-items-center gap-3">
                    <div class="p-3 rounded-4 bg-warning text-dark shadow-sm" style="width:52px; height:52px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <i class="fas fa-comment-dots fs-4"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1 text-dark" style="font-family:'Outfit',sans-serif;">Ada Keluhan atau Kendala?</h5>
                        <p class="text-muted small mb-2.5">Sampaikan saran, pertanyaan, atau keluhan Anda melalui form aspirasi resmi yang ditindaklanjuti tim Puskesmas.</p>
                        <a href="<?= base_url('pengaduan'); ?>" class="btn btn-warning btn-sm rounded-pill px-3.5 py-1.5 fw-bold text-dark shadow-sm">
                            Layanan Pengaduan <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

