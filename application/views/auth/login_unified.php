<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'Login — Sistem Informasi Puskesmas'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@600;700;800;900&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --primary: #0d9488;
            --primary-dark: #0f766e;
            --secondary: #0284c7;
            --dark: #0f172a;
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background:
                linear-gradient(
                    145deg,
                    rgba(15,23,42,.92) 0%,
                    rgba(13,148,136,.82) 55%,
                    rgba(2,132,199,.70) 100%
                ),
                url('<?= base_url("assets/img/hero-bg.png"); ?>') center / cover no-repeat;
            -webkit-font-smoothing: antialiased;
            position: relative;
            padding: 1.5rem;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,.035) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,.035) 1px, transparent 1px);
            background-size: 44px 44px;
            pointer-events: none;
            z-index: 1;
        }

        .bg-circle {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            z-index: 1;
        }
        .bg-circle-1 {
            width: 600px; height: 600px;
            border: 1px solid rgba(94,234,212,.15);
            top: -150px; left: -200px;
        }
        .bg-circle-2 {
            width: 450px; height: 450px;
            border: 1px solid rgba(94,234,212,.12);
            bottom: -100px; right: -100px;
        }

        .login-card {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 480px;
            background: #ffffff;
            border-radius: 28px;
            box-shadow: 0 30px 60px -15px rgba(0, 0, 0, 0.45);
            padding: 2.75rem 2.5rem;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            animation: fadeInCard .5s ease-out forwards;
        }

        @keyframes fadeInCard {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 1.75rem;
        }
        .login-logo-ico {
            width: 48px; height: 48px;
            background: linear-gradient(135deg, #0d9488, #0284c7);
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-size: 1.25rem;
            flex-shrink: 0;
            box-shadow: 0 8px 18px rgba(13,148,136,.35);
        }
        .login-logo-txt {
            font-family: 'Outfit', sans-serif;
            font-size: 1.15rem;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.2;
            text-align: left;
        }
        .login-logo-txt small {
            display: block;
            font-weight: 600;
            font-size: .72rem;
            color: #0d9488;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .unified-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #f0fdfa;
            border: 1px solid rgba(13,148,136,.25);
            color: #0f766e;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: .75rem;
            font-weight: 700;
            margin-bottom: .85rem;
        }

        .login-header {
            text-align: center;
            margin-bottom: 1.75rem;
        }
        .login-title {
            font-family: 'Outfit', sans-serif;
            font-size: 1.75rem;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -.5px;
            line-height: 1.2;
            margin-bottom: .4rem;
        }
        .login-subtitle {
            font-size: .85rem;
            color: #64748b;
            line-height: 1.5;
        }

        .alert-custom {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 14px;
            border-radius: 12px;
            font-size: .82rem;
            font-weight: 600;
            margin-bottom: 1.25rem;
        }
        .alert-custom-danger {
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-left: 4px solid #ef4444;
            color: #b91c1c;
        }
        .alert-custom-success {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-left: 4px solid #22c55e;
            color: #15803d;
        }

        .field + .field { margin-top: 1rem; }
        .field label {
            display: block;
            font-size: .8rem;
            font-weight: 600;
            color: #334155;
            margin-bottom: 6px;
        }
        .inp-wrap { position: relative; }
        .inp-ico {
            position: absolute;
            left: 14px; top: 50%;
            transform: translateY(-50%);
            color: #94a3b8; font-size: .9rem;
            pointer-events: none;
            transition: color .2s;
        }
        .inp-wrap:focus-within .inp-ico { color: #0d9488; }

        .inp-field {
            width: 100%;
            height: 48px;
            padding: 0 44px 0 42px;
            background: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            font-size: .9rem;
            font-family: 'Inter', sans-serif;
            color: #0f172a;
            outline: none;
            transition: all .2s;
        }
        .inp-field::placeholder { color: #94a3b8; font-size: .85rem; }
        .inp-field:focus {
            background: #fff;
            border-color: #0d9488;
            box-shadow: 0 0 0 4px rgba(13,148,136,.12);
        }

        .pw-toggle {
            position: absolute;
            right: 12px; top: 50%;
            transform: translateY(-50%);
            background: none; border: none;
            color: #94a3b8; cursor: pointer;
            font-size: .9rem; padding: 6px;
            border-radius: 6px;
            transition: color .2s;
        }
        .pw-toggle:hover { color: #0d9488; }

        .btn-submit {
            position: relative;
            width: 100%;
            height: 50px;
            margin-top: 1.5rem;
            background: linear-gradient(135deg, #0d9488 0%, #0c7a70 100%);
            color: #fff;
            border: none;
            border-radius: 12px;
            font-family: 'Outfit', sans-serif;
            font-size: 1.05rem;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 6px 18px rgba(13,148,136,.35);
            transition: transform .2s, box-shadow .2s;
            display: flex; align-items: center; justify-content: center; gap: 9px;
        }
        .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 8px 22px rgba(13,148,136,.45); }
        .btn-submit:active { transform: translateY(0); }
        .btn-submit:disabled { opacity: .7; cursor: not-allowed; }

        .info-pill {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 10px 14px;
            margin-top: 1.25rem;
            font-size: .76rem;
            color: #64748b;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .reg-link-box {
            margin-top: 1.25rem;
            text-align: center;
            font-size: .84rem;
            color: #64748b;
        }
        .reg-link-box a {
            color: #0d9488;
            font-weight: 700;
            text-decoration: none;
        }
        .reg-link-box a:hover { text-decoration: underline; }

        .back-btn {
            display: flex;
            align-items: center; justify-content: center; gap: 8px;
            width: 100%; height: 44px;
            margin-top: 1rem;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            font-size: .84rem; font-weight: 600;
            color: #64748b; text-decoration: none;
            background: #fff;
            transition: all .2s;
        }
        .back-btn:hover { border-color: #0d9488; color: #0d9488; background: #f0fdfa; }

        .form-foot {
            margin-top: 1.5rem;
            text-align: center;
            font-size: .72rem;
            color: #94a3b8;
        }

        @media (max-width: 480px) {
            .login-card { padding: 2rem 1.4rem; border-radius: 20px; }
            .login-title { font-size: 1.5rem; }
        }
    </style>
</head>
<body>

    <div class="bg-circle bg-circle-1"></div>
    <div class="bg-circle bg-circle-2"></div>

    <div class="login-card">
        <!-- Logo -->
        <div class="login-logo">
            <div class="login-logo-ico"><i class="fas fa-hospital-alt"></i></div>
            <div class="login-logo-txt">
                PUSKESMAS
                <small>Sistem Informasi Layanan</small>
            </div>
        </div>

        <!-- Header -->
        <div class="login-header">
            <div class="unified-badge">
                <i class="fas fa-shield-halved"></i> Satu Pintu Masuk
            </div>
            <div class="login-title">Selamat Datang</div>
            <div class="login-subtitle">Masuk menggunakan akun Anda untuk mengakses sistem layanan Puskesmas.</div>
        </div>

        <!-- Alerts -->
        <?php if($this->session->flashdata('error')): ?>
            <div class="alert-custom alert-custom-danger" id="errAlert">
                <i class="fas fa-circle-exclamation fs-5 flex-shrink-0"></i>
                <div><?= $this->session->flashdata('error'); ?></div>
            </div>
        <?php endif; ?>

        <?php if($this->session->flashdata('success')): ?>
            <div class="alert-custom alert-custom-success">
                <i class="fas fa-circle-check fs-5 flex-shrink-0"></i>
                <div><?= $this->session->flashdata('success'); ?></div>
            </div>
        <?php endif; ?>

        <!-- Form -->
        <form action="<?= base_url('auth/login'); ?>" method="post" id="loginForm">

            <div class="field">
                <label for="username">NIK atau Username</label>
                <div class="inp-wrap">
                    <i class="fas fa-id-card inp-ico"></i>
                    <input class="inp-field" type="text" name="username" id="username"
                           placeholder="Masukkan 16 digit NIK (atau Username Admin)"
                           value="<?= set_value('username'); ?>"
                           autocomplete="username" required autofocus>
                </div>
                <?= form_error('username', '<small class="text-danger mt-1 d-block">', '</small>'); ?>
            </div>

            <div class="field">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <label for="pwField" class="mb-0">Kata Sandi</label>
                    <a href="<?= base_url('auth/forgot_password'); ?>" class="text-primary text-decoration-none small fw-semibold" style="font-size:0.78rem;">
                        Lupa Kata Sandi?
                    </a>
                </div>
                <div class="inp-wrap">
                    <i class="fas fa-lock inp-ico"></i>
                    <input class="inp-field" type="password" name="password" id="pwField"
                           placeholder="Masukkan kata sandi Anda"
                           autocomplete="current-password" required>
                    <button type="button" class="pw-toggle" onclick="togglePw()" title="Lihat kata sandi">
                        <i class="fas fa-eye" id="pwIcon"></i>
                    </button>
                </div>
                <?= form_error('password', '<small class="text-danger mt-1 d-block">', '</small>'); ?>
            </div>

            <button type="submit" class="btn-submit" id="submitBtn">
                <i class="fas fa-right-to-bracket"></i>
                <span id="btnTxt">Masuk ke Sistem</span>
            </button>

            <!-- Info Pill -->
            <div class="info-pill">
                <i class="fas fa-info-circle text-primary fs-5 flex-shrink-0"></i>
                <span>Sistem otomatis mendeteksi akses Anda sebagai <strong>Masyarakat</strong> atau <strong>Administrator</strong>.</span>
            </div>

            <!-- Register link for Masyarakat -->
            <div class="reg-link-box">
                Belum memiliki akun masyarakat?
                <a href="<?= base_url('auth/register'); ?>">Daftar di Sini</a>
            </div>

        </form>

        <a href="<?= base_url(); ?>" class="back-btn">
            <i class="fas fa-arrow-left" style="font-size:.75rem;"></i>
            Kembali ke Beranda Publik
        </a>

        <div class="form-foot">
            &copy; <?= date('Y'); ?> Sistem Informasi Puskesmas. Terintegrasi.
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

    document.getElementById('loginForm').addEventListener('submit', function () {
        const btn = document.getElementById('submitBtn');
        document.getElementById('btnTxt').textContent = 'Memverifikasi…';
        setTimeout(() => {
            btn.disabled = true;
        }, 10);
    });
</script>
</body>
</html>
