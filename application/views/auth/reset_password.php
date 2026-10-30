<div class="container mb-5 pb-5" style="margin-top: 40px; position: relative; z-index: 3;">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-8">

            <div class="card border-0 shadow-sm p-4 p-md-5 reveal reveal-zoom" style="border-radius: 24px; background: #fff;">
                <div class="text-center mb-4">
                    <div class="p-3 rounded-4 bg-success bg-opacity-10 d-inline-flex mb-3 text-success" style="width: 58px; height: 58px; align-items:center; justify-content:center;">
                        <i class="fas fa-lock-open fs-4"></i>
                    </div>
                    <h4 class="fw-bold mb-1" style="font-family:'Outfit',sans-serif; color:var(--dark);">Setel Kata Sandi Baru</h4>
                    <p class="text-muted small mb-0" style="font-size:var(--fs-support);">
                        Akun terverifikasi untuk <strong><?= htmlspecialchars($user_nama); ?></strong> (NIK: <?= htmlspecialchars($user_nik); ?>).
                    </p>
                </div>

                <?php if(validation_errors()): ?>
                    <div class="alert alert-danger d-flex align-items-center gap-2 mb-3 rounded-3" style="font-size:var(--fs-support);">
                        <i class="fas fa-triangle-exclamation fs-5 flex-shrink-0"></i>
                        <div><?= validation_errors(); ?></div>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('auth/reset_password'); ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small mb-1" style="font-size:var(--fs-support);">Kata Sandi Baru <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fas fa-lock text-muted"></i></span>
                            <input type="password" class="form-control border-start-0" name="new_password" id="newPw" required placeholder="Minimal 5 karakter" autofocus>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold small mb-1" style="font-size:var(--fs-support);">Ulangi Kata Sandi Baru <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fas fa-lock text-muted"></i></span>
                            <input type="password" class="form-control border-start-0" name="passconf" required placeholder="Ketik ulang kata sandi baru">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success w-100 py-2.5 rounded-3 fw-bold mb-3 shadow-sm" style="font-size:var(--fs-body);">
                        Simpan Kata Sandi Baru <i class="fas fa-check ms-1"></i>
                    </button>
                </form>

            </div>

        </div>
    </div>
</div>
