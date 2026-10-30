<div class="container mb-5 pb-5" style="margin-top: 40px; position: relative; z-index: 3;">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-8">

            <div class="card border-0 shadow-sm p-4 p-md-5 reveal reveal-zoom" style="border-radius: 24px; background: #fff;">
                <div class="text-center mb-4">
                    <div class="p-3 rounded-4 bg-primary bg-opacity-10 d-inline-flex mb-3 text-primary" style="width: 58px; height: 58px; align-items:center; justify-content:center;">
                        <i class="fas fa-key fs-4"></i>
                    </div>
                    <h4 class="fw-bold mb-1" style="font-family:'Outfit',sans-serif; color:var(--dark);">Lupa Kata Sandi</h4>
                    <p class="text-muted small mb-0" style="font-size:var(--fs-support);">
                        Masukkan NIK dan Nomor HP terdaftar Anda untuk memverifikasi identitas dan mengatur ulang kata sandi.
                    </p>
                </div>

                <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger d-flex align-items-center gap-2 mb-3 rounded-3" style="font-size:var(--fs-support);">
                        <i class="fas fa-circle-exclamation fs-5 flex-shrink-0"></i>
                        <div><?= $this->session->flashdata('error'); ?></div>
                    </div>
                <?php endif; ?>

                <?php if(validation_errors()): ?>
                    <div class="alert alert-danger d-flex align-items-center gap-2 mb-3 rounded-3" style="font-size:var(--fs-support);">
                        <i class="fas fa-triangle-exclamation fs-5 flex-shrink-0"></i>
                        <div><?= validation_errors(); ?></div>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('auth/forgot_password'); ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small mb-1" style="font-size:var(--fs-support);">NIK (16 Digit) <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fas fa-id-card text-muted"></i></span>
                            <input type="text" class="form-control border-start-0" name="nik" required placeholder="Contoh: 3201xxxxxxxxxxxx" maxlength="16" pattern="[0-9]{16}" value="<?= set_value('nik'); ?>" autofocus>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold small mb-1" style="font-size:var(--fs-support);">Nomor HP Terdaftar <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fas fa-phone text-muted"></i></span>
                            <input type="tel" class="form-control border-start-0" name="no_hp" required placeholder="Contoh: 081234567890" value="<?= set_value('no_hp'); ?>">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2.5 rounded-3 fw-bold mb-3 shadow-sm" style="font-size:var(--fs-body);">
                        Verifikasi Akun <i class="fas fa-arrow-right ms-1"></i>
                    </button>

                    <div class="text-center">
                        <a href="<?= base_url('auth/login'); ?>" class="btn btn-light border w-100 py-2 rounded-3 text-muted fw-semibold" style="font-size:var(--fs-support);">
                            <i class="fas fa-arrow-left me-1"></i> Ingat Kata Sandi? Masuk
                        </a>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
