
<div class="container mb-5 pb-5" style="margin-top:40px;position:relative;z-index:3;">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <a href="<?= base_url('layananonline'); ?>" class="btn btn-light mb-4 rounded-pill px-4 py-2 text-success fw-bold reveal reveal-left shadow-sm">
                <i class="fas fa-arrow-left me-2"></i> Kembali ke Menu
            </a>

            <!-- Flash Messages -->
            <?php if($this->session->flashdata('success_konsultasi')): ?>
                <div class="alert d-flex align-items-center gap-4 mb-5 reveal reveal-zoom shadow-2xl"
                     role="alert" style="background:#fff;border-left:5px solid #10b981; border-radius:24px; padding:2rem;">
                    <div style="width:60px;height:60px;background:#dcfce7;border-radius:18px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.8rem;color:#10b981;">
                        <i class="fas fa-paper-plane"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1" style="color:#1e293b; font-family:'Outfit',sans-serif;">Pesan Terkirim!</h5>
                        <p class="mb-0 text-muted small"><?= $this->session->flashdata('success_konsultasi'); ?></p>
                    </div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <div class="card border-0 shadow-lg p-5 reveal reveal-bottom" style="border-radius: 32px;">
                <div class="d-flex align-items-center gap-4 mb-5">
                    <div class="bg-success bg-opacity-10 p-4 rounded-4">
                        <i class="fas fa-comment-medical text-success fs-2"></i>
                    </div>
                    <div>
                        <h2 class="fw-bold mb-1">Konsultasi Medis Online</h2>
                        <p class="text-muted mb-0">Sampaikan keluhan kesehatan Anda secara privat kepada tim ahli kami.</p>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-3 mb-5 p-4 rounded-4" style="background:#f0fdf4; border:1px solid #dcfce7;">
                    <i class="fas fa-shield-halved text-success fs-4"></i>
                    <p class="text-muted mb-0 small lh-lg"><strong>Privasi Terjamin:</strong> Data dan percakapan medis Anda dienkripsi dan hanya dapat diakses oleh tim medis resmi Puskesmas.</p>
                </div>

                <form action="<?= base_url('layananonline/proses_konsultasi'); ?>" method="post">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-uppercase mb-2">Nama Lengkap</label>
                            <input type="text" class="form-control form-control-lg" name="nama_pengirim" required placeholder="Nama Anda">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-uppercase mb-2">Nomor WhatsApp</label>
                            <input type="text" class="form-control form-control-lg" name="no_wa" required placeholder="08xxxxxxxxxx">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold small text-uppercase mb-2">Email Pasien</label>
                            <input type="email" class="form-control form-control-lg" name="email_hp" required placeholder="email@contoh.com">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold small text-uppercase mb-2">Deskripsi Keluhan</label>
                            <textarea class="form-control" name="pesan" rows="5" required placeholder="Jelaskan gejala dan keluhan Anda secara detail..."></textarea>
                        </div>
                        <div class="col-12 text-end pt-3">
                            <button type="submit" class="btn px-5 py-3 w-100 w-md-auto text-white shadow-lg" style="background: linear-gradient(135deg, #10b981, #059669); border: none; border-radius: 18px; font-weight: 700;">
                                <i class="fas fa-paper-plane me-2"></i> Kirim Konsultasi
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
