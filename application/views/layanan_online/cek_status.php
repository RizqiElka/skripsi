
<div class="container mb-5 pb-5" style="margin-top:40px;position:relative;z-index:3;">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            
            <a href="<?= base_url('layananonline'); ?>" class="btn btn-light mb-4 rounded-pill px-4 py-2 text-primary fw-bold reveal reveal-left shadow-sm">
                <i class="fas fa-arrow-left me-2"></i> Kembali ke Menu
            </a>

            <div class="card border-0 shadow-lg p-5 reveal reveal-bottom" style="border-radius: 32px;">
                <div class="text-center mb-5">
                    <div class="bg-primary bg-opacity-10 p-4 rounded-circle mx-auto mb-4" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-search text-primary fs-2"></i>
                    </div>
                    <h2 class="fw-bold mb-2">Cek Status Antrean</h2>
                    <p class="text-muted">Masukkan NIK atau Kode Registrasi Anda.</p>
                </div>

                <form action="<?= base_url('layananonline/cek_status'); ?>" method="post" class="mb-4">
                    <div class="input-group input-group-lg shadow-sm rounded-4 overflow-hidden border">
                        <input type="text" name="keyword" class="form-control border-0 px-4" placeholder="Contoh: 3201... atau REG-..." required>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fas fa-search me-2"></i>Cari
                        </button>
                    </div>
                </form>

                <?php if($this->session->flashdata('error_cek')): ?>
                    <div class="alert alert-danger rounded-4 border-0 shadow-sm mb-0">
                        <i class="fas fa-exclamation-circle me-2"></i> <?= $this->session->flashdata('error_cek'); ?>
                    </div>
                <?php endif; ?>

                <?php if($hasil): ?>
                    <div class="mt-4 p-4 rounded-4 border border-primary border-opacity-25 bg-primary bg-opacity-10 animate-reveal">
                        <div class="text-center mb-4">
                            <span class="text-uppercase small fw-bold text-muted tracking-widest d-block mb-2">Nomor Antrean Anda</span>
                            <h1 class="display-1 fw-bold text-primary mb-0">#<?= $hasil['no_antrean']; ?></h1>
                            <span class="badge bg-success px-3 py-2 mt-2"><?= $hasil['status']; ?></span>
                        </div>
                        
                        <div class="row g-3 small">
                            <div class="col-5 text-muted">Kode Registrasi</div>
                            <div class="col-7 fw-bold"><?= $hasil['no_pendaftaran']; ?></div>
                            
                            <div class="col-5 text-muted">Nama Pasien</div>
                            <div class="col-7 fw-bold"><?= $hasil['nama_pasien']; ?></div>
                            
                            <div class="col-5 text-muted">Poli Tujuan</div>
                            <div class="col-7 fw-bold"><?= $hasil['poli_tujuan']; ?></div>
                            
                            <div class="col-5 text-muted">Tanggal Kunjungan</div>
                            <div class="col-7 fw-bold text-primary"><?= date('d M Y', strtotime($hasil['tanggal_kunjungan'])); ?></div>
                        </div>

                        <hr class="my-4 opacity-10">
                        <p class="text-center text-muted small mb-0">
                            <i class="fas fa-info-circle me-1"></i> Silakan tunjukkan halaman ini ke petugas loket saat kedatangan.
                        </p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
