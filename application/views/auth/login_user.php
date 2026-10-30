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
        <div class="col-lg-5 col-md-8 col-sm-10">

            <div class="card border-0 auth-card reveal reveal-zoom">
                <!-- Logo -->
                <div class="text-center mb-4">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-4 d-inline-flex mb-3" style="width:56px; height:56px; align-items:center; justify-content:center;">
                        <i class="fas fa-user-shield text-primary fs-4"></i>
                    </div>
                    <h5 class="fw-bold mb-1" style="font-family:'Outfit',sans-serif; color:var(--dark);">Login Masyarakat</h5>
                    <p class="text-muted small mb-0" style="font-size:.8rem;">Masuk ke portal layanan kesehatan digital Anda.</p>
                </div>

                <!-- Flash Messages -->
                <?php if($this->session->flashdata('success')): ?>
                    <div class="custom-alert custom-alert-success mb-3">
                        <i class="fas fa-check-circle text-success" style="font-size:1rem;"></i>
                        <div><?= $this->session->flashdata('success'); ?></div>
                    </div>
                <?php endif; ?>

                <?php if($this->session->flashdata('error')): ?>
                    <div class="custom-alert custom-alert-danger mb-3">
                        <i class="fas fa-exclamation-circle text-danger" style="font-size:1rem;"></i>
                        <div><?= $this->session->flashdata('error'); ?></div>
                    </div>
                <?php endif; ?>

                <!-- Form -->
                <form action="<?= base_url('auth/login_user'); ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label fw-semibold mb-1.5" style="font-size:.78rem; color:#475569;">Username</label>
                        <div class="auth-input-group">
                            <i class="fas fa-user auth-input-icon"></i>
                            <input type="text" class="auth-input-field" name="username" required placeholder="Masukkan username" value="<?= set_value('username'); ?>">
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-1.5">
                            <label class="form-label fw-semibold mb-0" style="font-size:.78rem; color:#475569;">Password</label>
                        </div>
                        <div class="auth-input-group">
                            <i class="fas fa-lock auth-input-icon"></i>
                            <input type="password" class="auth-input-field" name="password" id="pwField" required placeholder="••••••••">
                            <button type="button" class="auth-pw-toggle" onclick="togglePw()" title="Tampilkan Password">
                                <i class="fas fa-eye" id="pwIcon"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-premium w-100 py-2.5 mb-2.5" style="border-radius:12px; font-size:.9rem;">
                        <i class="fas fa-right-to-bracket me-2"></i> Masuk ke Akun
                    </button>

                    <a href="<?= base_url('layananonline'); ?>" class="btn btn-light border w-100 py-2 rounded-3 fw-semibold text-muted" style="font-size:.82rem; border-radius:12px !important;">
                        <i class="fas fa-chevron-left me-1.5" style="font-size:.7rem;"></i> Kembali
                    </a>
                </form>

                <div class="text-center mt-4 pt-2">
                    <p class="text-muted small mb-0" style="font-size:.8rem;">
                        Belum memiliki akun? <a href="<?= base_url('auth/register'); ?>" class="fw-bold text-decoration-none" style="color:var(--primary);">Daftar Sekarang</a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
function togglePw() {
    const f = document.getElementById('pwField');
    const i = document.getElementById('pwIcon');
    if (f.type === 'password') {
        f.type = 'text';
        i.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        f.type = 'password';
        i.classList.replace('fa-eye-slash', 'fa-eye');
    }
}
</script>
