<div class="container mb-5 pb-5" style="margin-top:40px;position:relative;z-index:3;">
    <div class="row g-4 justify-content-center">
        <div class="col-lg-10">
            <div class="text-center mb-5">
                <span class="section-label">Digital Portal</span>
                <h2 class="display-6 fw-bold">Pilih Layanan Online</h2>
                <p class="text-muted">Akses berbagai layanan kesehatan digital kami dengan mudah dan cepat tanpa antre.</p>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- Usulan UHC -->
                <div class="col-md-6 col-lg-3">
                    <a href="<?= base_url('uhc'); ?>" class="text-decoration-none">
                        <div class="card border-0 shadow-sm p-4 text-center h-100 reveal reveal-bottom">
                            <div class="bg-success bg-opacity-10 p-3 rounded-4 mb-3 mx-auto" style="width: 72px; height: 72px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-hand-holding-medical text-success fs-2"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Usulan UHC</h5>
                            <p class="text-muted small mb-0">Pengajuan jaminan kesehatan Universal Health Coverage secara online.</p>
                        </div>
                    </a>
                </div>

                <!-- Reaktivasi Dinsos -->
                <div class="col-md-6 col-lg-3">
                    <a href="<?= base_url('reaktivasi'); ?>" class="text-decoration-none">
                        <div class="card border-0 shadow-sm p-4 text-center h-100 reveal reveal-bottom" style="--delay:1;">
                            <div class="bg-warning bg-opacity-10 p-3 rounded-4 mb-3 mx-auto" style="width: 72px; height: 72px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-rotate text-warning fs-2"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Reaktivasi Dinsos</h5>
                            <p class="text-muted small mb-0">Pengajuan reaktivasi status bantuan Dinas Sosial secara online.</p>
                        </div>
                    </a>
                </div>

                <!-- Reminder -->
                <div class="col-md-6 col-lg-3">
                    <a href="<?= base_url('layananonline/reminder'); ?>" class="text-decoration-none">
                        <div class="card border-0 shadow-sm p-4 text-center h-100 reveal reveal-bottom" style="--delay:2;">
                            <div class="bg-info bg-opacity-10 p-3 rounded-4 mb-3 mx-auto" style="width: 72px; height: 72px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-clock-rotate-left text-info fs-2"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Reminder</h5>
                            <p class="text-muted small mb-0">Atur pengingat otomatis untuk jadwal kontrol rutin Anda.</p>
                        </div>
                    </a>
                </div>

                <!-- Konsultasi -->
                <div class="col-md-6 col-lg-3">
                    <a href="<?= base_url('layananonline/konsultasi'); ?>" class="text-decoration-none">
                        <div class="card border-0 shadow-sm p-4 text-center h-100 reveal reveal-bottom" style="--delay:3;">
                            <div class="bg-primary bg-opacity-10 p-3 rounded-4 mb-3 mx-auto" style="width: 72px; height: 72px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-comments-medical text-primary fs-2"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Konsultasi</h5>
                            <p class="text-muted small mb-0">Sampaikan keluhan kesehatan Anda langsung ke tim medis.</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Callout Alur Pendaftaran & Poli -->
            <div class="card border-0 shadow-sm p-4 p-md-5 mt-5 reveal reveal-bottom" style="border-radius:24px; background:linear-gradient(135deg, #0d9488 0%, #0369a1 100%); color:#fff;">
                <div class="row align-items-center g-4">
                    <div class="col-lg-8">
                        <span class="badge bg-white text-primary fw-bold px-3 py-2 rounded-pill mb-3">Informasi Pelayanan Pasien</span>
                        <h3 class="fw-bold mb-2" style="font-family:'Outfit',sans-serif;">Ingin Berobat ke Puskesmas?</h3>
                        <p class="mb-0 text-white-50" style="font-size:.95rem; line-height:1.6;">
                            Pendaftaran berobat dilakukan langsung di Loket Pendaftaran Puskesmas. Pelajari alur pendaftaran, persyaratan berkas (KTP/BPJS), serta alur pelayanan di setiap Poli (Poli Anak, Gigi, Ibu Hamil, Imunisasi, P2P, Umum, &amp; Ruang Obat).
                        </p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a href="<?= base_url('alurpelayanan'); ?>" class="btn btn-light px-4 py-3 rounded-pill fw-bold shadow" style="color:var(--primary); font-family:'Outfit',sans-serif;">
                            <i class="fas fa-diagram-project me-2"></i> Buka Alur Pelayanan
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
