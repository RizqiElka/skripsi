
<div class="container mb-5 pb-5" style="margin-top:40px;position:relative;z-index:3;">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <a href="<?= base_url('layananonline'); ?>" class="btn btn-light mb-4 rounded-pill px-4 py-2 text-primary fw-bold reveal reveal-left shadow-sm">
                <i class="fas fa-arrow-left me-2"></i> Kembali ke Menu
            </a>

            <!-- Success Card (Hides form) -->
            <?php if($success = $this->session->flashdata('success_pendaftaran')): ?>
                <div class="card border-0 shadow-2xl p-5 reveal reveal-zoom text-center" style="border-radius: 40px; border-top: 10px solid var(--primary) !important;">
                    <div class="bg-primary bg-opacity-10 p-4 rounded-circle mx-auto mb-4" style="width: 100px; height: 100px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-check-circle text-primary display-4"></i>
                    </div>
                    <h2 class="fw-bold mb-2">Pendaftaran Berhasil!</h2>
                    <p class="text-muted mb-5">Silakan simpan atau screenshot nomor antrean Anda di bawah ini.</p>

                    <div class="p-5 rounded-5 mb-5" style="background: linear-gradient(135deg, var(--primary), var(--primary-dark)); color: #fff; box-shadow: 0 20px 40px rgba(13, 148, 136, 0.3);">
                        <span class="text-uppercase small fw-bold tracking-widest opacity-75 d-block mb-3">Nomor Antrean Anda</span>
                        <h1 class="display-1 fw-bold mb-0" style="font-family:'Outfit',sans-serif; letter-spacing: -2px;">#<?= $success['no_antrean']; ?></h1>
                        <hr class="my-4 opacity-25">
                        <div class="row g-3 text-start small">
                            <div class="col-6 opacity-75">Nama Pasien</div>
                            <div class="col-6 fw-bold"><?= $success['nama']; ?></div>
                            <div class="col-6 opacity-75">Poli Tujuan</div>
                            <div class="col-6 fw-bold"><?= $success['poli']; ?></div>
                            <div class="col-6 opacity-75">Kode Registrasi</div>
                            <div class="col-6 fw-bold"><?= $success['no_reg']; ?></div>
                            <div class="col-6 opacity-75">Tgl Kunjungan</div>
                            <div class="col-6 fw-bold"><?= date('d F Y', strtotime($success['tanggal'])); ?></div>
                        </div>
                    </div>

                    <div class="d-grid gap-3">
                        <button onclick="window.print()" class="btn btn-light rounded-4 py-3 fw-bold shadow-sm">
                            <i class="fas fa-print me-2"></i> Cetak / Simpan PDF
                        </button>
                        <a href="<?= base_url('layananonline'); ?>" class="btn btn-premium rounded-4 py-3 fw-bold">
                            Kembali ke Layanan Digital
                        </a>
                    </div>
                    
                    <p class="text-muted small mt-4">
                        <i class="fas fa-info-circle me-1"></i> Harap datang 15 menit sebelum waktu pelayanan dengan membawa KTP/Kartu BPJS.
                    </p>
                </div>

            <?php else: ?>
                <!-- Registration Form (Hidden on success) -->
                
                <?php if($this->session->flashdata('error_pendaftaran')): ?>
                    <div class="alert d-flex align-items-center gap-4 mb-5 reveal reveal-zoom shadow-2xl"
                         role="alert" style="background:#fff;border-left:5px solid #ef4444; border-radius:24px; padding:2rem;">
                        <div style="width:60px;height:60px;background:#fee2e2;border-radius:18px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.8rem;color:#ef4444;">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1" style="color:#1e293b; font-family:'Outfit',sans-serif;">Terjadi Kesalahan</h5>
                            <p class="mb-0 text-muted small"><?= $this->session->flashdata('error_pendaftaran'); ?></p>
                        </div>
                        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <div class="card border-0 shadow-lg p-5 reveal reveal-bottom" style="border-radius: 32px;">
                    <div class="d-flex align-items-center gap-4 mb-5">
                        <div class="bg-primary bg-opacity-10 p-4 rounded-4">
                            <i class="fas fa-file-medical text-primary fs-2"></i>
                        </div>
                        <div>
                            <h2 class="fw-bold mb-1">Formulir Pendaftaran</h2>
                            <p class="text-muted mb-0">Lengkapi data di bawah untuk mendapatkan nomor antrean online.</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-3 mb-5 p-4 rounded-4" style="background:#f0fdfa; border:1px solid #ccfbf1;">
                        <i class="fas fa-info-circle text-primary fs-4"></i>
                        <p class="text-muted mb-0 small lh-lg">Pastikan NIK dan data yang dimasukkan sesuai dengan KTP untuk memudahkan verifikasi data oleh petugas loket kami.</p>
                    </div>

                    <form action="<?= base_url('layananonline/proses_pendaftaran'); ?>" method="post">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-uppercase mb-2">Nomor NIK (16 Digit)</label>
                                <input type="text" class="form-control form-control-lg" name="nik" required placeholder="Contoh: 3201xxxxxxxxxxxx">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-uppercase mb-2">Nama Pasien</label>
                                <input type="text" class="form-control form-control-lg" name="nama_pasien" required placeholder="Sesuai KTP">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold small text-uppercase mb-2">Tanggal Lahir</label>
                                <input type="date" class="form-control form-control-lg" name="tanggal_lahir" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold small text-uppercase mb-2">Poli Tujuan</label>
                                <select class="form-select form-select-lg" name="id_layanan" required>
                                    <option value="" disabled selected>Pilih Poliklinik</option>
                                    <?php foreach($layanan as $l): ?>
                                    <option value="<?= htmlspecialchars($l['id']) ?>"><?= htmlspecialchars($l['nama_layanan']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold small text-uppercase mb-2">Tanggal Kunjungan</label>
                                <input type="date" class="form-control form-control-lg" name="tanggal_kunjungan" required min="<?= date('Y-m-d'); ?>">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold small text-uppercase mb-2">Alamat Domisili</label>
                                <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat lengkap saat ini..."></textarea>
                            </div>
                            <div class="col-12 text-end pt-3">
                                <button type="submit" class="btn btn-premium px-5 py-3 w-100 w-md-auto">
                                    <i class="fas fa-paper-plane me-2"></i>Kirim Pendaftaran Online
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
