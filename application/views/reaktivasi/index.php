
<div class="container mb-5 pb-5" style="margin-top:30px;position:relative;z-index:3;">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <a href="<?= base_url('layananonline'); ?>" class="btn btn-light border mb-3 rounded-pill px-3 py-1.5 text-dark fw-semibold shadow-sm" style="font-size:.85rem;">
                <i class="fas fa-arrow-left me-1.5" style="font-size:.75rem;"></i> Kembali ke Menu
            </a>

            <!-- Alert Success -->
            <?php if($this->session->flashdata('success_reaktivasi')): ?>
                <div class="alert d-flex align-items-center gap-3 mb-4 reveal reveal-zoom" style="background:#f0fdf4; border:1px solid #bbf7d0; border-radius:16px; padding:1rem 1.25rem;">
                    <i class="fas fa-check-circle text-success fs-5"></i>
                    <div class="small fw-semibold" style="color:#14532d;"><?= $this->session->flashdata('success_reaktivasi'); ?></div>
                </div>
            <?php endif; ?>

            <!-- Alert Error -->
            <?php if($this->session->flashdata('error_reaktivasi')): ?>
                <div class="alert d-flex align-items-start gap-3 mb-4 reveal reveal-zoom" style="background:#fff; border-left:4px solid #ef4444; border-radius:16px; padding:1rem 1.25rem; box-shadow:var(--shadow-sm);">
                    <i class="fas fa-exclamation-circle text-danger fs-5 mt-0.5"></i>
                    <div>
                        <h6 class="fw-bold mb-0.5" style="color:#1e293b; font-size:.9rem;">Terjadi Kesalahan</h6>
                        <p class="mb-0 text-muted small"><?= $this->session->flashdata('error_reaktivasi'); ?></p>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Form Card -->
            <div class="card border-0 shadow-sm p-4 p-md-4.5 reveal reveal-bottom" style="border-radius: 24px;">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="p-3 rounded-3" style="background:rgba(2,132,199,.1); color:var(--secondary);">
                        <i class="fas fa-rotate fs-4"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-0.5" style="font-family:'Outfit',sans-serif; color:var(--dark);">Formulir Reaktivasi Dinsos</h4>
                        <p class="text-muted small mb-0">Isi data berikut untuk mengajukan reaktivasi layanan Dinas Sosial.</p>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-2.5 mb-4 p-3 rounded-3" style="background:#eff6ff; border:1px solid #bfdbfe;">
                    <i class="fas fa-circle-info text-info fs-5"></i>
                    <p class="text-muted mb-0 small" style="line-height:1.5;">Pastikan dokumen yang diunggah masih berlaku. Ukuran berkas maksimal 2MB (format: PDF, JPG, PNG).</p>
                </div>

                <form action="<?= base_url('reaktivasi/proses'); ?>" method="post" enctype="multipart/form-data">
                    <div class="row g-3">
                        <!-- Data Pengajuan -->
                        <div class="col-12">
                            <h6 class="fw-bold mb-0" style="color:var(--dark);"><i class="fas fa-id-card text-info me-2"></i>Data Pengajuan</h6>
                            <hr class="mt-2 mb-1" style="border-color:#e2e8f0;">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold small mb-1">Nomor KK (16 Digit) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="no_kk" required placeholder="3201xxxxxxxxxxxx" maxlength="16">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small mb-1">Nomor HP / WhatsApp <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="no_hp" required placeholder="08xxxxxxxxxx" value="<?= $this->session->userdata('user_hp'); ?>">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold small mb-1">Keterangan Tambahan</label>
                            <textarea class="form-control" name="keterangan" rows="2.5" placeholder="Keterangan tambahan (opsional)..."></textarea>
                        </div>

                        <!-- Upload Dokumen -->
                        <div class="col-12 mt-3">
                            <h6 class="fw-bold mb-0" style="color:var(--dark);"><i class="fas fa-file-upload text-info me-2"></i>Upload Dokumen</h6>
                            <hr class="mt-2 mb-1" style="border-color:#e2e8f0;">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold small mb-1">Surat Keterangan Sakit <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="bukti_sakit" required accept=".pdf,.jpg,.jpeg,.png">
                            <div class="form-text small text-muted" style="font-size:.72rem;">Maksimal 2MB (.pdf, .jpg, .png)</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small mb-1">Kartu Keluarga (KK) <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="bukti_kk" required accept=".pdf,.jpg,.jpeg,.png">
                            <div class="form-text small text-muted" style="font-size:.72rem;">Maksimal 2MB (.pdf, .jpg, .png)</div>
                        </div>

                        <div class="col-12 text-end pt-3">
                            <button type="submit" class="btn btn-primary px-4 py-2.5 fw-bold" style="border-radius:12px; font-size:.92rem;">
                                <i class="fas fa-paper-plane me-1.5"></i> Kirim Pengajuan Reaktivasi
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
