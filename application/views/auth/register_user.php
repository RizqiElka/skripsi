<style>
    /* Styling Khusus Auth (Login & Register) */
    .auth-container {
        margin-top: 40px;
        position: relative;
        z-index: 3;
    }
    .auth-card {
        background: #ffffff;
        border: 1px solid rgba(226, 232, 240, 0.8) !important;
        border-radius: 20px !important;
        box-shadow: 0 15px 35px -10px rgba(15, 23, 42, 0.06) !important;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        padding: 2.5rem 2rem !important;
    }
    .auth-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 20px 40px -15px rgba(15, 23, 42, 0.1) !important;
    }
    .auth-input-group {
        position: relative;
        display: flex;
        align-items: center;
    }
    .auth-input-icon {
        position: absolute;
        left: 16px;
        color: #94a3b8;
        font-size: 0.9rem;
        pointer-events: none;
        transition: color 0.2s ease;
        z-index: 10;
    }
    .auth-input-field {
        width: 100%;
        height: 46px;
        padding: 0 16px 0 46px;
        background: #f8fafc;
        border: 1.5px solid #e2e8f0 !important;
        border-radius: 12px !important;
        font-size: 0.88rem;
        color: #0f172a;
        outline: none;
        transition: all 0.2s ease;
    }
    .auth-input-field:focus {
        background: #ffffff;
        border-color: var(--primary) !important;
        box-shadow: 0 0 0 4px rgba(13, 148, 136, 0.1) !important;
    }
    .auth-input-group:focus-within .auth-input-icon {
        color: var(--primary);
    }
    .auth-pw-toggle {
        position: absolute;
        right: 12px;
        background: none;
        border: none;
        color: #94a3b8;
        cursor: pointer;
        font-size: 0.9rem;
        padding: 6px;
        z-index: 10;
        transition: color 0.2s ease;
    }
    .auth-pw-toggle:hover {
        color: var(--primary);
    }
    /* Alert styling */
    .custom-alert {
        border-radius: 12px;
        padding: 0.75rem 1rem;
        font-size: 0.8rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 1.25rem;
    }
    .custom-alert-success {
        background-color: #f0fdf4;
        border: 1px solid #bbf7d0;
        color: #14532d;
    }
    .custom-alert-danger {
        background-color: #fef2f2;
        border: 1px solid #fecaca;
        border-left: 4px solid #ef4444;
        color: #b91c1c;
    }
</style>

<div class="container mb-5 pb-5 auth-container">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9">

            <div class="card border-0 auth-card reveal reveal-zoom">
                <!-- Logo -->
                <div class="text-center mb-4">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-4 d-inline-flex mb-3" style="width:56px; height:56px; align-items:center; justify-content:center;">
                        <i class="fas fa-user-plus text-primary fs-4"></i>
                    </div>
                    <h5 class="fw-bold mb-1" style="font-family:'Outfit',sans-serif; color:var(--dark);">Pendaftaran Akun</h5>
                    <p class="text-muted small mb-0" style="font-size:.8rem;">Buat akun untuk mengakses berbagai layanan digital kesehatan online.</p>
                </div>

                <!-- Flash Messages / Validation Errors -->
                <?php if($this->session->flashdata('error')): ?>
                    <div class="custom-alert custom-alert-danger mb-3">
                        <i class="fas fa-exclamation-circle text-danger" style="font-size:1rem;"></i>
                        <div><?= $this->session->flashdata('error'); ?></div>
                    </div>
                <?php endif; ?>

                <?php if(validation_errors()): ?>
                    <div class="custom-alert custom-alert-danger mb-3">
                        <i class="fas fa-exclamation-triangle text-danger" style="font-size:1rem;"></i>
                        <div style="font-size:.78rem; line-height:1.4;"><?= validation_errors(); ?></div>
                    </div>
                <?php endif; ?>

                <!-- Form -->
                <form action="<?= base_url('auth/register'); ?>" method="post">
                    <div class="row g-3">
                        <!-- Data Pribadi Section Header -->
                        <div class="col-12 mb-1">
                            <span class="fw-bold text-uppercase text-secondary" style="font-size:0.75rem; letter-spacing:0.8px;">Data Pribadi</span>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold mb-1.5" style="font-size:var(--fs-support); color:#475569;">NIK (16 Digit Angka) <span class="text-danger">*</span></label>
                            <div class="auth-input-group">
                                <i class="fas fa-id-card auth-input-icon"></i>
                                <input type="text" class="auth-input-field" name="nik" required placeholder="Masukkan 16 digit NIK sesuai KTP" maxlength="16" pattern="[0-9]{16}" value="<?= set_value('nik'); ?>">
                            </div>
                            <?= form_error('nik', '<small class="text-danger mt-1 d-block" style="font-size:var(--fs-support);">', '</small>'); ?>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold mb-1.5" style="font-size:var(--fs-support); color:#475569;">Nama Lengkap <span class="text-danger">*</span></label>
                            <div class="auth-input-group">
                                <i class="fas fa-user auth-input-icon"></i>
                                <input type="text" class="auth-input-field" name="nama_lengkap" required placeholder="Nama lengkap sesuai KTP" value="<?= set_value('nama_lengkap'); ?>">
                            </div>
                            <?= form_error('nama_lengkap', '<small class="text-danger mt-1 d-block" style="font-size:var(--fs-support);">', '</small>'); ?>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold mb-1.5" style="font-size:var(--fs-support); color:#475569;">Nomor HP / WhatsApp <span class="text-danger">*</span></label>
                            <div class="auth-input-group">
                                <i class="fas fa-phone auth-input-icon"></i>
                                <input type="tel" class="auth-input-field" name="no_hp" required placeholder="Contoh: 081234567890" value="<?= set_value('no_hp'); ?>">
                            </div>
                            <?= form_error('no_hp', '<small class="text-danger mt-1 d-block" style="font-size:var(--fs-support);">', '</small>'); ?>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold mb-1.5" style="font-size:var(--fs-support); color:#475569;">Kata Sandi <span class="text-danger">*</span></label>
                            <div class="auth-input-group">
                                <i class="fas fa-lock auth-input-icon"></i>
                                <input type="password" class="auth-input-field" name="password" id="pwField" required placeholder="Minimal 5 karakter">
                                <button type="button" class="auth-pw-toggle" onclick="togglePw('pwField','pwIcon')" title="Tampilkan Kata Sandi">
                                    <i class="fas fa-eye" id="pwIcon"></i>
                                </button>
                            </div>
                            <?= form_error('password', '<small class="text-danger mt-1 d-block" style="font-size:var(--fs-support);">', '</small>'); ?>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold mb-1.5" style="font-size:var(--fs-support); color:#475569;">Ulangi Kata Sandi <span class="text-danger">*</span></label>
                            <div class="auth-input-group">
                                <i class="fas fa-lock auth-input-icon"></i>
                                <input type="password" class="auth-input-field" name="passconf" id="pwConfField" required placeholder="Ulangi kata sandi">
                                <button type="button" class="auth-pw-toggle" onclick="togglePw('pwConfField','pwConfIcon')" title="Tampilkan Kata Sandi">
                                    <i class="fas fa-eye" id="pwConfIcon"></i>
                                </button>
                            </div>
                            <?= form_error('passconf', '<small class="text-danger mt-1 d-block" style="font-size:var(--fs-support);">', '</small>'); ?>
                        </div>

                        <div class="col-12 pt-3">
                            <button type="submit" class="btn btn-premium w-100 py-2.5 mb-2.5" style="border-radius:12px; font-size:var(--fs-title);">
                                <i class="fas fa-user-check me-2"></i> Daftar Akun Baru
                            </button>
                        </div>

                        <div class="col-12 text-center">
                            <a href="<?= base_url('auth/login'); ?>" class="btn btn-light border w-100 py-2 rounded-3 fw-semibold text-muted" style="font-size:var(--fs-support); border-radius:12px !important;">
                                Sudah punya akun? Masuk dengan NIK &amp; Kata Sandi
                            </a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
function togglePw(fieldId, iconId) {
    const f = document.getElementById(fieldId || 'pwField');
    const i = document.getElementById(iconId || 'pwIcon');
    if (!f || !i) return;
    if (f.type === 'password') {
        f.type = 'text';
        i.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        f.type = 'password';
        i.classList.replace('fa-eye-slash', 'fa-eye');
    }
}
</script>
