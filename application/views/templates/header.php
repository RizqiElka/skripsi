<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title . ' — Puskesmas' : 'Sistem Informasi Puskesmas'; ?></title>
    <meta name="description" content="Sistem Informasi Puskesmas - Pelayanan kesehatan profesional, modern, dan terpercaya.">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* ===== DESIGN TOKENS ===== */
        :root {
            /* Font Size Scale Tokens (Konsisten: 12px support, 13px body, 14px label/title) */
            --fs-support:    12px;
            --fs-body:       13px;
            --fs-title:      14px;

            --primary:       #0d9488;
            --primary-dark:  #0f766e;
            --primary-light: #ccfbf1;
            --secondary:     #0284c7;
            --accent:        #f43f5e;
            --dark:          #0f172a;
            --body-bg:       #f8fafc;
            --surface:       #ffffff;
            --border:        #cbd5e1;
            --text-main:     #1e293b;
            --text-muted:    #475569;
            --shadow-sm:     0 1px 3px rgba(0,0,0,.08), 0 1px 3px rgba(0,0,0,.06);
            --shadow-md:     0 5px 18px rgba(0,0,0,.1);
            --shadow-lg:     0 12px 32px rgba(0,0,0,.10);
            --shadow-glow:   0 8px 24px rgba(13,148,136,.25);
            --radius-sm:     8px;
            --radius-md:     12px;
            --radius-lg:     16px;
            --radius-xl:     24px;
            --transition:    all .3s cubic-bezier(.4,0,.2,1);
        }

        /* ===== RESET / BASE ===== */
        *, *::before, *::after { box-sizing: border-box; }

        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; border: 2px solid #f1f5f9; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--body-bg);
            color: var(--text-main);
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
            line-height: 1.5;
            font-size: var(--fs-body);
        }

        .text-support { font-size: var(--fs-support) !important; }
        .text-content { font-size: var(--fs-body) !important; }
        .text-title-sm { font-size: var(--fs-title) !important; }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Outfit', sans-serif;
            color: var(--dark);
            line-height: 1.2;
            font-weight: 700;
        }

        /* ===== DYNAMIC REVEAL SYSTEM ===== */
        .reveal {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity .6s ease-out, transform .6s cubic-bezier(.2, .8, .2, 1);
            will-change: opacity, transform;
        }
        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }
        .reveal-left { transform: translateX(-20px); }
        .reveal-right { transform: translateX(20px); }
        .reveal-zoom { transform: scale(0.97); }
        
        .reveal.active {
            transform: translate(0) scale(1);
        }

        /* Staggered children */
        .stagger-parent .reveal { transition-delay: calc(var(--delay, 0) * 0.08s); }

        /* ===== NAVBAR ===== */
        #mainNavbar {
            background: transparent;
            transition: var(--transition);
            padding: 0.8rem 0;
            z-index: 1050;
        }

        #mainNavbar.scrolled {
            background: rgba(255,255,255,.85);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            box-shadow: 0 5px 20px rgba(0,0,0,.03);
            padding: .5rem 0;
            border-bottom: 1px solid rgba(255,255,255,.3);
        }

        .navbar-brand {
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            font-size: 1.3rem;
            letter-spacing: -0.6px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--dark) !important;
        }

        .brand-icon {
            width: 36px; height: 36px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: var(--radius-sm);
            display: flex; align-items: center; justify-content: center;
            color: #fff;
            font-size: 1rem;
            box-shadow: var(--shadow-glow);
            flex-shrink: 0;
            transition: var(--transition);
        }
        .navbar-brand:hover .brand-icon { transform: rotate(-5deg) scale(1.02); }

        .nav-link {
            font-family: 'Outfit', sans-serif;
            font-weight: 600;
            font-size: .88rem;
            color: var(--text-main) !important;
            padding: .5rem 1rem !important;
            border-radius: var(--radius-sm);
            transition: var(--transition);
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 4px; left: 50%;
            width: 0; height: 2px;
            background: var(--primary);
            border-radius: 2px;
            transition: var(--transition);
            transform: translateX(-50%);
        }

        .nav-link:hover::after,
        .nav-link.active::after { width: 18px; }

        .nav-link:hover,
        .nav-link.active {
            color: var(--primary) !important;
            background: rgba(13,148,136,.08);
        }

        /* ===== DROPDOWN SUBMENU SUPPORT ===== */
        .dropdown-submenu {
            position: relative;
        }
        .dropdown-submenu > .dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -6px;
            margin-left: 2px;
            display: none;
        }
        .dropdown-submenu:hover > .dropdown-menu {
            display: block;
        }
        @media (max-width: 991.98px) {
            .dropdown-submenu > .dropdown-menu {
                position: static;
                left: auto;
                margin-left: 1rem;
                display: block;
                box-shadow: none !important;
                border: none !important;
                padding-left: .5rem;
            }
        }

        /* ===== BUTTONS ===== */
        .btn-premium {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #fff !important;
            border: none;
            border-radius: var(--radius-md);
            padding: .5rem 1.25rem;
            font-weight: 700;
            font-family: 'Outfit', sans-serif;
            font-size: .85rem;
            box-shadow: var(--shadow-glow);
            transition: var(--transition);
            display: inline-flex; align-items: center; gap: 6px;
            position: relative; overflow: hidden;
        }
        .btn-premium::before {
            content: '';
            position: absolute; top: 0; left: -100%; width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,.2), transparent);
            transition: .5s;
        }
        .btn-premium:hover::before { left: 100%; }
        .btn-premium:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(13,148,136,.25);
            color: #fff !important;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark)) !important;
            border: none !important;
            border-radius: var(--radius-sm) !important;
            font-weight: 600 !important;
            font-family: 'Outfit', sans-serif;
            box-shadow: var(--shadow-glow);
            transition: var(--transition);
            padding: .45rem 1.1rem !important;
            font-size: .85rem !important;
        }
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(13,148,136,.25) !important;
        }

        .btn-outline-primary {
            color: var(--primary) !important;
            border: 1.5px solid var(--primary) !important;
            border-radius: var(--radius-sm) !important;
            font-weight: 700;
            transition: var(--transition);
            padding: .4rem 1rem !important;
            font-size: .85rem !important;
        }
        .btn-outline-primary:hover {
            background: var(--primary) !important;
            color: #fff !important;
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(13,148,136,.15);
        }

        /* ===== CARDS & GLASS ===== */
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
        }

        .card {
            border: 1px solid var(--border) !important;
            border-radius: var(--radius-lg) !important;
            box-shadow: var(--shadow-sm);
            background: var(--surface);
            transition: var(--transition);
            overflow: hidden;
        }
        .card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
            border-color: rgba(13,148,136,.1) !important;
        }

        /* ===== FORMS ===== */
        .form-control, .form-select {
            border-radius: var(--radius-sm) !important;
            border: 1.2px solid var(--border) !important;
            padding: .5rem .8rem;
            font-size: .85rem;
            transition: var(--transition);
            background: #fff;
            color: var(--text-main);
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--primary) !important;
            box-shadow: 0 0 0 3px rgba(13,148,136,.1) !important;
        } }

        /* ===== HERO TEMPLATE ===== */
        .hero-creative {
            position: relative;
            background: url('<?= base_url('assets/img/hero-bg.png'); ?>') center/cover no-repeat;
            padding: 140px 0 100px;
            margin-top: -85px;
            overflow: hidden;
        }
        .hero-overlay {
            position: absolute; inset: 0;
            background: linear-gradient(135deg, rgba(15,23,42,0.95) 0%, rgba(13,148,136,0.85) 60%, rgba(2,132,199,0.7) 100%);
        }
        .hero-content { position: relative; z-index: 2; }
        .hero-creative::after {
            content: '';
            position: absolute; bottom: -1px; left: 0; right: 0;
            height: 100px; background: var(--body-bg);
            clip-path: polygon(0 100%, 100% 100%, 100% 0);
        }

        /* ===== SECTION HEADER ===== */
        .section-label {
            display: inline-flex; align-items: center; gap: 8px;
            background: rgba(13,148,136,.14);
            color: var(--primary-dark);
            border: 1px solid rgba(13,148,136,.3);
            border-radius: 50px;
            padding: .4rem 1.2rem;
            font-size: .75rem;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }
        .section-divider {
            width: 60px; height: 5px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            border-radius: 10px;
            margin: 1rem auto 0;
        }

        /* ===== FOOTER ===== */
        .footer-premium {
            background: #0f172a;
            color: #94a3b8;
            padding: 80px 0 40px;
            position: relative;
        }
        .footer-premium::before {
            content: '';
            position: absolute; top: 0; left: 0; right: 0; height: 1px;
            background: linear-gradient(90deg, transparent, rgba(13,148,136,.3), transparent);
        }

        .hero-page-section {
            padding: 130px 0 80px;
        }

        /* ===== RESPONSIVE MEDIA QUERIES ===== */

        /* === Tablet (max-width: 991px) === */
        @media (max-width: 991.98px) {
            .hero-creative { padding: 110px 0 70px; }
            .hero-page-section { padding: 110px 0 70px; }
            .navbar-brand { font-size: 1.15rem; gap: 8px; }
            .brand-icon { width: 32px; height: 32px; font-size: .9rem; }
            .footer-premium { padding: 50px 0 30px; }
        }

        /* === Mobile Large (max-width: 767px) === */
        @media (max-width: 767.98px) {
            body { font-size: .84rem; }

            .hero-creative { padding: 100px 0 60px; margin-top: -70px; }
            .hero-creative::after { height: 50px; }
            .hero-page-section { padding: 95px 0 55px; }

            .card { border-radius: 14px !important; }
            .card:hover { transform: translateY(-2px); }

            .btn-premium { padding: .45rem 1rem; font-size: .82rem; }
            .btn-primary { padding: .42rem .9rem !important; font-size: .82rem !important; }
            .btn-outline-primary { padding: .38rem .85rem !important; font-size: .82rem !important; }

            .form-control, .form-select { padding: .48rem .75rem; font-size: .84rem; }

            .section-label { font-size: .68rem; padding: .35rem 1rem; }

            .footer-premium { padding: 40px 0 24px; }

            /* Profil page sidebar stacks on top */
            .info-box-item { padding: .6rem .75rem; font-size: .78rem; }
        }

        /* === Mobile Small (max-width: 575px) === */
        @media (max-width: 575.98px) {
            body { font-size: .82rem; line-height: 1.45; }

            h1 { font-size: 1.5rem !important; }
            h2 { font-size: 1.25rem !important; }
            h3 { font-size: 1.1rem !important; }
            h4 { font-size: 1rem !important; }
            h5 { font-size: .95rem !important; }
            h6 { font-size: .88rem !important; }

            .container { padding-left: 16px; padding-right: 16px; }

            .hero-creative { padding: 90px 0 50px; margin-top: -60px; }
            .hero-creative::after { height: 35px; }
            .hero-page-section { padding: 85px 0 45px; }

            .navbar-brand { font-size: 1.05rem; gap: 6px; }
            .brand-icon { width: 30px; height: 30px; font-size: .85rem; }
            .nav-link { font-size: .84rem; padding: .4rem .75rem !important; }

            .card { border-radius: 12px !important; }
            .card:hover { transform: none; box-shadow: var(--shadow-sm); }

            .btn-premium { padding: .42rem .85rem; font-size: .8rem; gap: 5px; border-radius: 10px; }
            .btn-primary { padding: .4rem .8rem !important; font-size: .8rem !important; border-radius: 8px !important; }
            .btn-outline-primary { padding: .35rem .75rem !important; font-size: .8rem !important; border-radius: 8px !important; }

            .form-control, .form-select { padding: .45rem .7rem; font-size: .82rem; border-radius: 8px !important; }

            .section-label { font-size: .65rem; padding: .3rem .8rem; letter-spacing: .5px; }
            .section-divider { width: 40px; height: 3px; }

            .footer-premium { padding: 30px 0 20px; }

            /* Stepper responsive: scroll horizontal */
            .d-flex.justify-content-between.position-relative { overflow-x: auto; padding-bottom: .5rem; gap: .5rem; }
            .d-flex.justify-content-between.position-relative > div { min-width: 72px; flex-shrink: 0; }

            /* Table responsive text */
            .table { font-size: .78rem !important; }
            .table th, .table td { padding: .6rem .5rem !important; white-space: nowrap; }

            /* Profil page adjustments */
            .info-box-item { padding: .55rem .7rem; font-size: .76rem; border-radius: 10px; }

            /* Detail page adjustments */
            .table-borderless td { font-size: .8rem !important; padding: .5rem .25rem !important; }
        }
    </style>
</head>
<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-expand-lg sticky-top" id="mainNavbar">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url(); ?>">
            <div class="brand-icon">
                <i class="fas fa-hospital-alt"></i>
            </div>
            <span>PUSKESMAS</span>
        </a>

        <button class="navbar-toggler border-0 shadow-none p-1" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#offcanvasNav"
                aria-label="Toggle navigation">
            <span class="d-flex flex-column gap-1" style="width:24px;">
                <span class="d-block rounded" style="height:2.5px;background:var(--dark);transition:var(--transition);"></span>
                <span class="d-block rounded" style="height:2.5px;background:var(--dark);width:75%;transition:var(--transition);"></span>
                <span class="d-block rounded" style="height:2.5px;background:var(--dark);width:50%;transition:var(--transition);"></span>
            </span>
        </button>

        <!-- Desktop nav (Text-only tanpa icon sesuai Revisi Poin 10) -->
        <div class="collapse navbar-collapse d-none d-lg-flex justify-content-end ms-4">
            <ul class="navbar-nav align-items-center gap-1">
                <li class="nav-item">
                    <a class="nav-link <?= ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'home') ? 'active' : ''; ?>" href="<?= base_url(); ?>">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($this->uri->segment(1) == 'layanan') ? 'active' : ''; ?>" href="<?= base_url('layanan'); ?>">Layanan</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= in_array($this->uri->segment(1), ['layananonline','uhc','reaktivasi']) && !in_array($this->uri->segment(2), ['riwayat','detail']) ? 'active' : ''; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Layanan Digital
                    </a>
                    <ul class="dropdown-menu border-0 shadow-lg" style="border-radius:14px; padding:.4rem; font-size:var(--fs-body);">
                        <li><a class="dropdown-item rounded-3 py-2 px-3 <?= ($this->uri->segment(1) == 'layananonline' && $this->uri->segment(2) == '') ? 'active' : ''; ?>" href="<?= base_url('layananonline'); ?>">Semua Layanan Digital</a></li>
                        <li><a class="dropdown-item rounded-3 py-2 px-3 <?= ($this->uri->segment(1) == 'uhc' && $this->uri->segment(2) != 'riwayat') ? 'active' : ''; ?>" href="<?= base_url('uhc'); ?>">Pengajuan UHC</a></li>
                        <li><a class="dropdown-item rounded-3 py-2 px-3 <?= ($this->uri->segment(1) == 'reaktivasi' && $this->uri->segment(2) != 'riwayat') ? 'active' : ''; ?>" href="<?= base_url('reaktivasi'); ?>">Reaktivasi Dinsos</a></li>
                        <li><a class="dropdown-item rounded-3 py-2 px-3 <?= ($this->uri->segment(1) == 'layananonline' && $this->uri->segment(2) == 'reminder') ? 'active' : ''; ?>" href="<?= base_url('layananonline/reminder'); ?>">Reminder Jadwal</a></li>
                        <li><a class="dropdown-item rounded-3 py-2 px-3 <?= ($this->uri->segment(1) == 'layananonline' && $this->uri->segment(2) == 'konsultasi') ? 'active' : ''; ?>" href="<?= base_url('layananonline/konsultasi'); ?>">Konsultasi Online</a></li>
                    </ul>
                </li>

                <!-- Poin 1: NAVBAR INFORMASI PUBLIK (Dropdown: Alur Pelayanan, Alur Poli + Submenu Jenis Poli Dinamis, Biaya dan Tarif, Pengaduan) -->
                <?php 
                    $ci =& get_instance();
                    $ci->load->model('Layanan_model');
                    $daftar_poli_db = $ci->Layanan_model->get_all();
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= in_array($this->uri->segment(1), ['alurpelayanan','tarif','pengaduan']) ? 'active' : ''; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Informasi Publik
                    </a>
                    <ul class="dropdown-menu border-0 shadow-lg" style="border-radius:14px; padding:.4rem; font-size:var(--fs-body);">
                        <li><a class="dropdown-item rounded-3 py-2 px-3 <?= ($this->uri->segment(1) == 'alurpelayanan' && $this->uri->segment(2) != 'poli') ? 'active' : ''; ?>" href="<?= base_url('alurpelayanan'); ?>">Alur Pelayanan</a></li>
                        
                        <!-- Dropdown Alur Poli dengan Sub-dropdown Jenis-Jenis Poli -->
                        <li class="dropdown-submenu">
                            <a class="dropdown-item rounded-3 py-2 px-3 d-flex justify-content-between align-items-center <?= ($this->uri->segment(1) == 'alurpelayanan' && $this->uri->segment(2) == 'poli') ? 'active' : ''; ?>" href="<?= base_url('alurpelayanan/poli'); ?>">
                                <span>Alur Poli</span>
                                <i class="fas fa-chevron-right ms-2 text-muted" style="font-size:0.7rem;"></i>
                            </a>
                            <ul class="dropdown-menu border-0 shadow-lg" style="border-radius:14px; padding:.4rem; font-size:var(--fs-body); min-width:210px;">
                                <li><a class="dropdown-item rounded-3 py-2 px-3 fw-semibold text-primary" href="<?= base_url('alurpelayanan/poli'); ?>">Semua Ruang Poli</a></li>
                                <li><hr class="dropdown-divider my-1"></li>
                                <?php if(!empty($daftar_poli_db)): ?>
                                    <?php foreach($daftar_poli_db as $poli_item): ?>
                                    <li>
                                        <a class="dropdown-item rounded-3 py-2 px-3" href="<?= base_url('alurpelayanan/poli?poli='.urlencode($poli_item['nama_layanan'])); ?>">
                                            <?= htmlspecialchars($poli_item['nama_layanan']); ?>
                                        </a>
                                    </li>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <li><a class="dropdown-item rounded-3 py-2 px-3" href="<?= base_url('alurpelayanan/poli?poli=Poli+Umum'); ?>">Poli Umum</a></li>
                                    <li><a class="dropdown-item rounded-3 py-2 px-3" href="<?= base_url('alurpelayanan/poli?poli=Poli+Gigi'); ?>">Poli Gigi</a></li>
                                    <li><a class="dropdown-item rounded-3 py-2 px-3" href="<?= base_url('alurpelayanan/poli?poli=KIA'); ?>">Poli KIA / Ibu Hamil</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>

                        <li><a class="dropdown-item rounded-3 py-2 px-3 <?= ($this->uri->segment(1) == 'tarif') ? 'active' : ''; ?>" href="<?= base_url('tarif'); ?>">Biaya dan Tarif</a></li>
                        <li><a class="dropdown-item rounded-3 py-2 px-3 <?= ($this->uri->segment(1) == 'pengaduan') ? 'active' : ''; ?>" href="<?= base_url('pengaduan'); ?>">Pengaduan</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($this->uri->segment(1) == 'deteksi') ? 'active' : ''; ?>" href="<?= base_url('deteksi/stunting'); ?>">Deteksi Stunting</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($this->uri->segment(1) == 'artikel') ? 'active' : ''; ?>" href="<?= base_url('artikel'); ?>">Artikel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($this->uri->segment(1) == 'tenaga') ? 'active' : ''; ?>" href="<?= base_url('tenaga'); ?>">Tenaga Medis</a>
                </li>

                <!-- Poin 2: NAVBAR RIWAYAT UHC & REAKTIVASI (HANYA MUNCUL JIKA SUDAH LOGIN) -->
                <?php if($this->session->userdata('user_logged_in')): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= in_array($this->uri->segment(1), ['uhc','reaktivasi']) && in_array($this->uri->segment(2), ['riwayat','detail']) ? 'active' : ''; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:var(--primary)!important; font-weight:700;">
                        Riwayat UHC &amp; Reaktivasi
                    </a>
                    <ul class="dropdown-menu border-0 shadow-lg" style="border-radius:14px; padding:.4rem; font-size:var(--fs-body);">
                        <li><a class="dropdown-item rounded-3 py-2 px-3" href="<?= base_url('uhc/riwayat'); ?>">Riwayat Pengajuan UHC</a></li>
                        <li><a class="dropdown-item rounded-3 py-2 px-3" href="<?= base_url('reaktivasi/riwayat'); ?>">Riwayat Reaktivasi Dinsos</a></li>
                        <li><hr class="dropdown-divider my-1"></li>
                        <li><a class="dropdown-item rounded-3 py-2 px-3" href="<?= base_url('deteksi/riwayat'); ?>">Riwayat Deteksi Stunting</a></li>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if($this->session->userdata('admin_logged_in')): ?>
                <li class="nav-item dropdown ms-2">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" style="background:rgba(13,148,136,.12);border-radius:12px;font-weight:600;color:var(--primary)!important;">
                        Admin (<?= $this->session->userdata('nama_lengkap') ?: 'Admin'; ?>)
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg" style="border-radius:14px; padding:.4rem; font-size:var(--fs-body);">
                        <li><a class="dropdown-item rounded-3 py-2 px-3" href="<?= base_url('dashboard'); ?>">Dashboard Admin</a></li>
                        <li><a class="dropdown-item rounded-3 py-2 px-3" href="<?= base_url('adminuser'); ?>">Data Pengguna</a></li>
                        <li><hr class="dropdown-divider my-1"></li>
                        <li><a class="dropdown-item rounded-3 py-2 px-3 text-danger" href="<?= base_url('auth/logout'); ?>">Logout</a></li>
                    </ul>
                </li>
                <?php elseif($this->session->userdata('user_logged_in')): ?>
                <li class="nav-item dropdown ms-2">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" style="background:rgba(13,148,136,.1);border-radius:12px;">
                        <?= $this->session->userdata('user_nama'); ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg" style="border-radius:14px; padding:.4rem; font-size:var(--fs-body);">
                        <li><a class="dropdown-item rounded-3 py-2 px-3" href="<?= base_url('auth/profil'); ?>">Profil &amp; Berkas Saya</a></li>
                        <li><a class="dropdown-item rounded-3 py-2 px-3" href="<?= base_url('deteksi/riwayat'); ?>">Riwayat Deteksi Stunting</a></li>
                        <li><hr class="dropdown-divider my-1"></li>
                        <li><a class="dropdown-item rounded-3 py-2 px-3 text-danger" href="<?= base_url('auth/logout_user'); ?>">Logout</a></li>
                    </ul>
                </li>
                <?php else: ?>
                <li class="nav-item ms-2">
                    <a class="btn btn-premium px-3 py-2" href="<?= base_url('auth/login'); ?>" style="font-size:var(--fs-body);">
                        Masuk
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- ===== OFFCANVAS (MOBILE) - Text-Only Nav ===== -->
<div class="offcanvas offcanvas-start border-0 shadow-lg" tabindex="-1" id="offcanvasNav" style="max-width:300px;">
    <div class="offcanvas-header">
        <div class="d-flex align-items-center gap-2">
            <span class="fw-bold fs-5" style="font-family:'Outfit',sans-serif;color:var(--dark);">PUSKESMAS</span>
        </div>
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body py-3 px-3">
        <ul class="navbar-nav gap-1" style="font-size:var(--fs-body);">
            <li class="nav-item">
                <a class="nav-link <?= ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'home') ? 'active' : ''; ?>" href="<?= base_url(); ?>">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= ($this->uri->segment(1) == 'layanan') ? 'active' : ''; ?>" href="<?= base_url('layanan'); ?>">Layanan</a>
            </li>
            
            <li class="nav-item">
                <span class="text-muted fw-bold text-uppercase px-3 py-1 d-block" style="font-size:var(--fs-support);">Layanan Digital</span>
            </li>
            <li class="nav-item ps-2">
                <a class="nav-link <?= ($this->uri->segment(1) == 'layananonline' && $this->uri->segment(2) == '') ? 'active' : ''; ?>" href="<?= base_url('layananonline'); ?>">Portal Layanan Digital</a>
            </li>
            <li class="nav-item ps-2">
                <a class="nav-link <?= ($this->uri->segment(1) == 'uhc' && $this->uri->segment(2) != 'riwayat') ? 'active' : ''; ?>" href="<?= base_url('uhc'); ?>">Pengajuan UHC</a>
            </li>
            <li class="nav-item ps-2">
                <a class="nav-link <?= ($this->uri->segment(1) == 'reaktivasi' && $this->uri->segment(2) != 'riwayat') ? 'active' : ''; ?>" href="<?= base_url('reaktivasi'); ?>">Reaktivasi Dinsos</a>
            </li>
            <li class="nav-item ps-2">
                <a class="nav-link <?= ($this->uri->segment(1) == 'layananonline' && $this->uri->segment(2) == 'reminder') ? 'active' : ''; ?>" href="<?= base_url('layananonline/reminder'); ?>">Reminder Jadwal</a>
            </li>
            <li class="nav-item ps-2">
                <a class="nav-link <?= ($this->uri->segment(1) == 'layananonline' && $this->uri->segment(2) == 'konsultasi') ? 'active' : ''; ?>" href="<?= base_url('layananonline/konsultasi'); ?>">Konsultasi Medis</a>
            </li>
            
            <li class="nav-item">
                <span class="text-muted fw-bold text-uppercase px-3 py-1 d-block" style="font-size:var(--fs-support);">Informasi Publik</span>
            </li>
            <li class="nav-item ps-2">
                <a class="nav-link <?= ($this->uri->segment(1) == 'alurpelayanan' && $this->uri->segment(2) != 'poli') ? 'active' : ''; ?>" href="<?= base_url('alurpelayanan'); ?>">Alur Pelayanan</a>
            </li>
            <li class="nav-item ps-2">
                <a class="nav-link <?= ($this->uri->segment(1) == 'alurpelayanan' && $this->uri->segment(2) == 'poli') ? 'active' : ''; ?>" href="<?= base_url('alurpelayanan/poli'); ?>">Alur Poli</a>
                <!-- Submenu Jenis Poli di Mobile -->
                <div class="ps-3 border-start ms-2 my-1">
                    <?php if(!empty($daftar_poli_db)): ?>
                        <?php foreach($daftar_poli_db as $poli_item): ?>
                        <a class="nav-link py-1 text-muted" style="font-size:0.8rem;" href="<?= base_url('alurpelayanan/poli?poli='.urlencode($poli_item['nama_layanan'])); ?>">
                            &bull; <?= htmlspecialchars($poli_item['nama_layanan']); ?>
                        </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </li>
            <li class="nav-item ps-2">
                <a class="nav-link <?= ($this->uri->segment(1) == 'tarif') ? 'active' : ''; ?>" href="<?= base_url('tarif'); ?>">Biaya dan Tarif</a>
            </li>
            <li class="nav-item ps-2">
                <a class="nav-link <?= ($this->uri->segment(1) == 'pengaduan') ? 'active' : ''; ?>" href="<?= base_url('pengaduan'); ?>">Pengaduan</a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?= ($this->uri->segment(1) == 'deteksi') ? 'active' : ''; ?>" href="<?= base_url('deteksi/stunting'); ?>">Deteksi Stunting</a>
            </li>

            <?php if($this->session->userdata('user_logged_in')): ?>
            <li class="nav-item">
                <span class="text-primary fw-bold text-uppercase px-3 py-1 d-block" style="font-size:var(--fs-support);">Riwayat Akun</span>
            </li>
            <li class="nav-item ps-2">
                <a class="nav-link" href="<?= base_url('uhc/riwayat'); ?>">Riwayat UHC</a>
            </li>
            <li class="nav-item ps-2">
                <a class="nav-link" href="<?= base_url('reaktivasi/riwayat'); ?>">Riwayat Reaktivasi</a>
            </li>
            <li class="nav-item ps-2">
                <a class="nav-link" href="<?= base_url('deteksi/riwayat'); ?>">Riwayat Deteksi Stunting</a>
            </li>
            <?php endif; ?>

            <li class="nav-item">
                <a class="nav-link <?= ($this->uri->segment(1) == 'artikel') ? 'active' : ''; ?>" href="<?= base_url('artikel'); ?>">Artikel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= ($this->uri->segment(1) == 'tenaga') ? 'active' : ''; ?>" href="<?= base_url('tenaga'); ?>">Tenaga Medis</a>
            </li>
        </ul>
        <hr class="my-3" style="border-color:var(--border);">
        <?php if($this->session->userdata('admin_logged_in')): ?>
        <div class="mb-3 p-2 rounded-3" style="background:rgba(13,148,136,.12); font-size:var(--fs-body);">
            <span class="fw-bold">Admin: <?= $this->session->userdata('nama_lengkap') ?: 'Admin'; ?></span>
        </div>
        <a class="btn btn-primary w-100 justify-content-center mb-2 rounded-3" href="<?= base_url('dashboard'); ?>">
            Buka Dashboard
        </a>
        <a class="btn btn-danger w-100 justify-content-center mb-2 rounded-3" href="<?= base_url('auth/logout'); ?>">
            Logout
        </a>
        <?php elseif($this->session->userdata('user_logged_in')): ?>
        <div class="mb-3 p-2 rounded-3" style="background:rgba(13,148,136,.08); font-size:var(--fs-body);">
            <span class="fw-bold"><?= $this->session->userdata('user_nama'); ?></span>
        </div>
        <a class="btn btn-danger w-100 justify-content-center mb-2 rounded-3" href="<?= base_url('auth/logout_user'); ?>">
            Logout
        </a>
        <?php else: ?>
        <a class="btn btn-premium w-100 justify-content-center mb-2" href="<?= base_url('auth/login'); ?>">
            Masuk / Login
        </a>
        <?php endif; ?>
    </div>
</div>

<!-- ===== GLOBAL TOAST NOTIFICATION CONTAINER (POJOK KANAN ATAS - REVISI POIN 8) ===== -->
<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;" id="globalToastContainer">
    <?php if($this->session->flashdata('success')): ?>
    <div class="toast show align-items-center text-white bg-success border-0 shadow-lg" role="alert" aria-live="assertive" aria-atomic="true" style="border-radius:12px; font-size:var(--fs-body);">
        <div class="d-flex">
            <div class="toast-body d-flex align-items-center gap-2">
                <i class="fas fa-check-circle fs-5"></i>
                <div>
                    <strong class="d-block" style="font-size:var(--fs-title);">Berhasil</strong>
                    <span><?= $this->session->flashdata('success'); ?></span>
                </div>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    <?php endif; ?>

    <?php if($this->session->flashdata('error')): ?>
    <div class="toast show align-items-center text-white bg-danger border-0 shadow-lg" role="alert" aria-live="assertive" aria-atomic="true" style="border-radius:12px; font-size:var(--fs-body);">
        <div class="d-flex">
            <div class="toast-body d-flex align-items-center gap-2">
                <i class="fas fa-exclamation-circle fs-5"></i>
                <div>
                    <strong class="d-block" style="font-size:var(--fs-title);">Terjadi Kesalahan</strong>
                    <span><?= $this->session->flashdata('error'); ?></span>
                </div>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    <?php endif; ?>

    <?php if($this->session->flashdata('warning')): ?>
    <div class="toast show align-items-center text-dark bg-warning border-0 shadow-lg" role="alert" aria-live="assertive" aria-atomic="true" style="border-radius:12px; font-size:var(--fs-body);">
        <div class="d-flex">
            <div class="toast-body d-flex align-items-center gap-2">
                <i class="fas fa-triangle-exclamation fs-5"></i>
                <div>
                    <strong class="d-block" style="font-size:var(--fs-title);">Perhatian</strong>
                    <span><?= $this->session->flashdata('warning'); ?></span>
                </div>
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    <?php endif; ?>
</div>

<?php
// Unified Page Hero
$page = $this->uri->segment(1);
if (empty($page)) $page = 'home';

$hero_label = '';
$hero_title = '';
$hero_desc  = '';

if ($page == 'home') {
    $hero_label = 'Pelayanan Kesehatan Terakreditasi Paripurna';
    $hero_title = isset($profil['nama_puskesmas']) ? $profil['nama_puskesmas'] : 'Puskesmas';
    $hero_desc  = 'Menghadirkan standar pelayanan medis modern dengan sentuhan empati dan teknologi digital untuk kesehatan Anda dan keluarga.';
} elseif ($page == 'layanan') {
    $hero_label = 'Layanan & Fasilitas';
    $hero_title = 'Layanan Medis <span style="color:#5eead4;"> Terpadu </span>';
    $hero_desc  = 'Kami menyediakan berbagai layanan kesehatan modern dengan fasilitas lengkap untuk memenuhi kebutuhan medis Anda dan keluarga secara optimal.';
} elseif ($page == 'alurpelayanan' && $this->uri->segment(2) == 'poli') {
    $hero_label = 'Standar Pelayanan Klinis';
    $hero_title = 'Alur Pelayanan <span style="color:#5eead4;">Ruang Poli Medis</span>';
    $hero_desc  = 'Panduan alur, sasaran, dan tindakan medis terpadu pada setiap ruang poli di Puskesmas.';
} elseif ($page == 'alurpelayanan') {
    $hero_label = 'Standar Pelayanan Publik';
    $hero_title = 'Alur Pendaftaran &amp; <span style="color:#5eead4;">Pelayanan Pasien</span>';
    $hero_desc  = 'Panduan resmi tahapan alur pendaftaran pasien dan alur berobat terpadu di Puskesmas.';
} elseif ($page == 'tarif') {
    $hero_label = 'Transparansi Tarif';
    $hero_title = 'Biaya &amp; <span style="color:#5eead4;">Tarif Layanan</span>';
    $hero_desc  = 'Informasi resmi tarif retribusi pelayanan kesehatan Puskesmas. Gratis untuk seluruh peserta aktif BPJS Kesehatan / KIS / UHC.';
} elseif ($page == 'pengaduan') {
    $hero_label = 'Layanan Aspirasi &amp; Pengaduan';
    $hero_title = 'Alur <span style="color:#5eead4;">Pengaduan</span> Masyarakat';
    $hero_desc  = 'Kanal resmi penyampaian saran, aspirasi, dan pengaduan secara online maupun offline untuk perbaikan mutu pelayanan.';
} elseif ($page == 'tenaga') {
    $hero_label = 'Tim Profesional Medis';
    $hero_title = 'Dedikasi Untuk <span style="color:#5eead4;">Kesehatan</span> Anda';
    $hero_desc  = 'Berkenalan dengan tim medis kami yang berpengalaman, bersertifikasi, dan siap memberikan pelayanan kesehatan terbaik dengan sepenuh hati.';
} elseif ($page == 'artikel') {
    if ($this->uri->segment(2) == 'detail') {
        $hero_label = 'Membaca Artikel';
        $hero_title = 'Wawasan & Info <span style="color:#5eead4;">Kesehatan</span>';
        $hero_desc  = 'Simak informasi lengkap dan edukasi kesehatan dari tim ahli kami.';
    } else {
        $hero_label = 'Pusat Edukasi Kesehatan';
        $hero_title = 'Artikel & Berita <span style="color:#5eead4;">Terbaru</span>';
        $hero_desc  = 'Dapatkan tips kesehatan, berita terkini, dan panduan gaya hidup sehat langsung dari tenaga medis profesional kami.';
    }
} elseif ($page == 'deteksi') {
    $hero_label = 'Program Prioritas Kesehatan';
    $hero_title = 'Deteksi Dini <span style="color:#5eead4;">Stunting</span>';
    $hero_desc  = 'Gunakan kalkulator pintar kami berbasis standar WHO untuk memantau status gizi dan pertumbuhan anak Anda sejak dini.';
} elseif ($page == 'layananonline' && !$this->uri->segment(2)) {
    $hero_label = 'Digital Healthcare';
    $hero_title = 'Akses Layanan <span style="color:#5eead4;">Dari Rumah</span>';
    $hero_desc  = 'Konsultasikan keluhan kesehatan Anda dan atur pengingat kontrol rutin secara online dengan mudah, cepat, dan aman.';
} elseif ($page == 'layananonline' && $this->uri->segment(2)) {
    $hero_label = 'Digital Healthcare';
    $hero_title = isset($title) ? explode(' -', $title)[0] : 'Layanan Online';
    $hero_desc  = 'Kemudahan akses kesehatan masyarakat dalam satu genggaman.';
} elseif ($page == 'uhc') {
    $hero_label = 'Layanan Digital';
    $hero_title = 'Usulan <span style="color:#5eead4;">UHC</span>';
    $hero_desc  = 'Ajukan permohonan Universal Health Coverage secara online untuk mendapatkan jaminan kesehatan.';
} elseif ($page == 'reaktivasi') {
    $hero_label = 'Layanan Digital';
    $hero_title = 'Reaktivasi <span style="color:#5eead4;">Dinas Sosial</span>';
    $hero_desc  = 'Ajukan reaktivasi layanan Dinas Sosial secara online dengan mudah dan cepat.';
} else {
    $hero_label = 'Puskesmas';
    $hero_title = isset($title) ? explode(' -', $title)[0] : 'Halaman';
    $hero_desc  = '';
}
?>

<!-- UNIFIED PAGE HERO -->
<?php if(!in_array($page, ['auth', 'admin'])): ?>
<div class="position-relative text-center text-white hero-page-section" style="overflow:hidden; background: url('<?= base_url('assets/img/hero-bg.png'); ?>') center/cover no-repeat;">
    <!-- Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(135deg, rgba(15,23,42,0.95) 0%, rgba(13,148,136,0.85) 50%, rgba(2,132,199,0.75) 100%); z-index: 0;"></div>
    
    <div class="container hero-content reveal reveal-zoom position-relative" style="z-index: 2;">
        <?php if($hero_label): ?>
        <div class="d-inline-flex align-items-center gap-2 px-4 py-2 rounded-pill mb-4 shadow-sm" style="background:rgba(255,255,255,.1); border:1px solid rgba(255,255,255,.2); backdrop-filter:blur(12px);">
            <span class="status-dot-inner" style="background:#5eead4; width:10px; height:10px; border-radius:50%; display:inline-block; animation: pulse-glow 2s infinite;"></span>
            <span style="font-weight:700; font-size:.85rem; letter-spacing:1px; text-transform:uppercase;"><?= $hero_label; ?></span>
        </div>
        <?php endif; ?>
        
        <h1 class="display-4 fw-bold text-white mb-4" style="font-family:'Outfit',sans-serif; letter-spacing:-1.5px; text-shadow:0 10px 40px rgba(0,0,0,0.4);">
            <?= $hero_title; ?>
        </h1>
        
        <?php if($hero_desc): ?>
        <p class="lead fw-light mx-auto" style="opacity:.9; max-width:650px; line-height:1.8; font-size:1.15rem;">
            <?= $hero_desc; ?>
        </p>
        <?php endif; ?>
        
        <?php if($page == 'home'): ?>
        <div class="d-flex flex-column flex-sm-row justify-content-center gap-4 mt-5">
            <a href="#profil" class="btn btn-premium px-5 py-3 shadow-lg" style="font-size:1.05rem;">
                <i class="fas fa-circle-info"></i> Jelajahi Profil
            </a>
            <a href="<?= base_url('layanan'); ?>" class="btn btn-light rounded-4 px-5 py-3 fw-bold shadow-lg" style="color:var(--primary); font-family:'Outfit',sans-serif; font-size:1.05rem;">
                <i class="fas fa-stethoscope me-2"></i>Layanan Kami
            </a>
        </div>
        
        <!-- Stats -->
        <div class="row justify-content-center mt-5 pt-4 g-4" style="max-width:750px; margin: 0 auto;">
            <div class="col-4">
                <div class="p-3 reveal reveal-zoom" style="--delay:1; background:rgba(255,255,255,.1); backdrop-filter:blur(10px); border:1px solid rgba(255,255,255,.2); border-radius:20px;">
                    <div class="fw-bold fs-2" style="font-family:'Outfit',sans-serif; color: #5eead4;">24/7</div>
                    <div class="small fw-bold text-light" style="font-size: .75rem; letter-spacing: 0.5px; opacity:0.8;">Layanan Darurat</div>
                </div>
            </div>
            <div class="col-4">
                <div class="p-3 reveal reveal-zoom" style="--delay:2; background:rgba(255,255,255,.1); backdrop-filter:blur(10px); border:1px solid rgba(255,255,255,.2); border-radius:20px;">
                    <div class="fw-bold fs-2" style="font-family:'Outfit',sans-serif; color: #5eead4;">100%</div>
                    <div class="small fw-bold text-light" style="font-size: .75rem; letter-spacing: 0.5px; opacity:0.8;">Terakreditasi</div>
                </div>
            </div>
            <div class="col-4">
                <div class="p-3 reveal reveal-zoom" style="--delay:3; background:rgba(255,255,255,.1); backdrop-filter:blur(10px); border:1px solid rgba(255,255,255,.2); border-radius:20px;">
                    <div class="fw-bold fs-2" style="font-family:'Outfit',sans-serif; color: #5eead4;">BPJS</div>
                    <div class="small fw-bold text-light" style="font-size: .75rem; letter-spacing: 0.5px; opacity:0.8;">Diterima</div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    
    <!-- Curved Bottom -->
    <div class="position-absolute bottom-0 start-0 w-100" style="line-height: 0; transform: translateY(1px); z-index: 1;">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="width:100%; height:60px;">
            <path d="M0,120 L1440,120 L1440,40 C1080,100 360,100 0,40 Z" fill="#f8fafc"></path>
        </svg>
    </div>
</div>
<?php endif; ?>
