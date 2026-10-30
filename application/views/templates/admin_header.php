<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title . ' — Admin PIDB' : 'Admin Panel — PIDB'; ?></title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@600;700;800&display=swap" rel="stylesheet">

    <style>
        /* ===== TOKENS ===== */
        :root {
            --sidebar-w:     258px;
            --sidebar-bg:    #0d1117;
            --sidebar-hover: rgba(255,255,255,.14);
            --sidebar-active-from: #0d9488;
            --sidebar-active-to:   #0284c7;
            --topbar-bg:     rgba(248,250,252,.96);
            --content-bg:    #edf2f7;
            --surface:       #ffffff;
            --primary:       #0d9488;
            --primary-dark:  #0f766e;
            --secondary:     #0284c7;
            --accent-blue:   #3b82f6;
            --danger:        #ef4444;
            --warning:       #f59e0b;
            --success:       #10b981;
            --text-main:     #1e293b;
            --text-muted:    #475569;
            --border:        #cbd5e1;
            --radius-sm:     10px;
            --radius-md:     16px;
            --radius-lg:     22px;
            --shadow-sm:     0 1px 4px rgba(0,0,0,.06);
            --shadow-md:     0 4px 16px rgba(0,0,0,.08);
            --shadow-lg:     0 12px 32px rgba(0,0,0,.10);
            --transition:    all .28s cubic-bezier(.4,0,.2,1);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 6px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

        html, body { height: 100%; overflow-x: hidden; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--content-bg);
            color: var(--text-main);
            -webkit-font-smoothing: antialiased;
            display: flex;
        }

        h1,h2,h3,h4,h5,h6 { font-family: 'Outfit', sans-serif; }

        /* ===== SIDEBAR ===== */
        .admin-sidebar {
            width: var(--sidebar-w);
            min-height: 100vh;
            height: 100%;
            background: var(--sidebar-bg);
            position: fixed;
            top: 0; left: 0;
            z-index: 1040;
            display: flex;
            flex-direction: column;
            transition: var(--transition);
            overflow-y: auto;
            overflow-x: hidden;
        }

        .sidebar-brand {
            padding: 1.6rem 1.4rem 1.2rem;
            border-bottom: 1px solid rgba(255,255,255,.06);
            display: flex; align-items: center; gap: 12px;
            flex-shrink: 0;
        }
        .sidebar-brand-icon {
            width: 40px; height: 40px;
            background: linear-gradient(135deg, var(--sidebar-active-from), var(--sidebar-active-to));
            border-radius: 11px;
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-size: 1.05rem;
            box-shadow: 0 6px 16px rgba(13,148,136,.35);
            flex-shrink: 0;
        }
        .sidebar-brand-text { line-height: 1.2; }
        .sidebar-brand-text .title {
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            font-size: .98rem;
            color: #f8fafc;
        }
        .sidebar-brand-text .sub {
            font-size: .68rem;
            color: #475569;
            letter-spacing: .5px;
            text-transform: uppercase;
        }

        .sidebar-section-label {
            padding: 1.2rem 1.4rem .35rem;
            font-size: .65rem;
            font-weight: 700;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            color: #cbd5e1;
        }

        .sidebar-link {
            display: flex; align-items: center; gap: 11px;
            padding: .65rem 1.1rem;
            margin: 2px .8rem;
            border-radius: var(--radius-sm);
            color: #cbd5e1;
            text-decoration: none;
            font-size: .875rem;
            font-weight: 500;
            transition: var(--transition);
            white-space: nowrap;
            overflow: hidden;
        }
        .sidebar-link .icon {
            width: 20px; height: 20px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
            font-size: .9rem;
        }
        .sidebar-link:hover {
            background: var(--sidebar-hover);
            color: #ffffff;
        }
        .sidebar-link.active {
            background: linear-gradient(135deg, var(--sidebar-active-from), var(--sidebar-active-to));
            color: #fff;
            box-shadow: 0 6px 16px rgba(13,148,136,.3);
            font-weight: 600;
        }

        .sidebar-logout {
            margin-top: auto;
            padding: 1rem .8rem 1.4rem;
            border-top: 1px solid rgba(255,255,255,.06);
        }
        .sidebar-logout a {
            display: flex; align-items: center; gap: 10px;
            padding: .65rem 1rem;
            border-radius: var(--radius-sm);
            color: #f87171;
            text-decoration: none;
            font-size: .875rem;
            font-weight: 500;
            background: rgba(239,68,68,.08);
            border: 1px solid rgba(239,68,68,.12);
            transition: var(--transition);
        }
        .sidebar-logout a:hover {
            background: rgba(239,68,68,.18);
            color: #fca5a5;
        }

        /* ===== MAIN AREA ===== */
        .admin-main {
            margin-left: var(--sidebar-w);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            transition: var(--transition);
        }

        /* ===== TOPBAR ===== */
        .admin-topbar {
            background: var(--topbar-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
            padding: .85rem 1.75rem;
            display: flex;
            align-items: center;
            position: sticky; top: 0;
            z-index: 1020;
            gap: 16px;
        }
        .topbar-page-title {
            font-family: 'Outfit', sans-serif;
            font-weight: 700;
            font-size: 1.05rem;
            color: var(--text-main);
        }
        .topbar-actions { margin-left: auto; display: flex; align-items: center; gap: 12px; }
        .topbar-btn {
            display: inline-flex; align-items: center; gap: 6px;
            padding: .45rem .9rem;
            background: var(--surface);
            border: 1px solid #cbd5e1;
            border-radius: var(--radius-sm);
            color: #0f172a;
            text-decoration: none;
            font-size: .83rem;
            font-weight: 600;
            transition: var(--transition);
        }
        .topbar-btn:hover { border-color: var(--primary); color: var(--primary); background: #f0fdfa; }

        .topbar-avatar {
            width: 38px; height: 38px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-size: .9rem;
            flex-shrink: 0;
            box-shadow: 0 4px 10px rgba(13,148,136,.25);
        }
        .topbar-user-name {
            font-weight: 700;
            font-size: .88rem;
            color: #0f172a;
            line-height: 1;
        }
        .topbar-user-role {
            font-size: .7rem;
            color: var(--text-muted);
        }

        /* ===== CONTENT ===== */
        .admin-content { padding: 1.75rem; flex: 1; }

        /* ===== CARDS ===== */
        .admin-card {
            background: var(--surface);
            border: 1px solid rgba(148, 163, 184, 0.45);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }

        /* ===== BUTTONS ===== */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark)) !important;
            border: none !important;
            border-radius: var(--radius-sm) !important;
            font-weight: 600 !important;
            font-family: 'Outfit', sans-serif;
            padding: .5rem 1.2rem;
            box-shadow: 0 4px 12px rgba(13,148,136,.25);
            transition: var(--transition);
        }
        .btn-primary:hover, .btn-primary:focus {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(13,148,136,.35) !important;
            background: linear-gradient(135deg, var(--primary-dark),#115e59) !important;
        }

        .btn-warning {
            background: #fffbeb !important;
            border: 1.5px solid #fde68a !important;
            color: #92400e !important;
            border-radius: var(--radius-sm) !important;
            font-weight: 600;
            transition: var(--transition);
        }
        .btn-warning:hover { background: #fef3c7 !important; transform: translateY(-1px); }

        .btn-danger {
            background: #fff1f2 !important;
            border: 1.5px solid #fecdd3 !important;
            color: #9f1239 !important;
            border-radius: var(--radius-sm) !important;
            font-weight: 600;
            transition: var(--transition);
        }
        .btn-danger:hover { background: #ffe4e6 !important; transform: translateY(-1px); }

        .btn-info {
            background: #eff6ff !important;
            border: 1.5px solid #bfdbfe !important;
            color: #1d4ed8 !important;
            border-radius: var(--radius-sm) !important;
            font-weight: 600;
            transition: var(--transition);
        }
        .btn-info:hover { background: #dbeafe !important; }
        .btn-success {
            background: linear-gradient(135deg, #10b981, #059669) !important;
            border: none !important;
            border-radius: var(--radius-sm) !important;
            font-weight: 600;
            transition: var(--transition);
        }

        /* ===== TABLE ===== */
        .table {
            border-collapse: separate !important;
            border-spacing: 0 6px;
        }
        .table thead th {
            background: transparent;
            border: none !important;
            color: var(--text-muted);
            font-size: .72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .8px;
            padding: .6rem 1rem;
        }
        .table tbody tr {
            background: var(--surface);
            box-shadow: 0 1px 4px rgba(0,0,0,.04);
            transition: var(--transition);
        }
        .table tbody tr:hover {
            transform: scale(1.005);
            box-shadow: var(--shadow-md);
        }
        .table tbody td {
            border: none !important;
            padding: .875rem 1rem;
            vertical-align: middle;
            color: var(--text-main);
        }
        .table tbody td:first-child { border-radius: 11px 0 0 11px; }
        .table tbody td:last-child  { border-radius: 0 11px 11px 0; }

        /* ===== FORMS ===== */
        .form-control, .form-select {
            border-radius: var(--radius-sm) !important;
            border: 1.5px solid var(--border) !important;
            padding: .65rem 1rem;
            font-size: .9rem;
            transition: var(--transition);
            color: var(--text-main);
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--primary) !important;
            box-shadow: 0 0 0 4px rgba(13,148,136,.12) !important;
        }
        .form-label { font-weight: 600; font-size: .85rem; margin-bottom: .4rem; color: var(--text-main); }

        /* ===== MODALS ===== */
        .modal-content {
            border: none !important;
            border-radius: var(--radius-lg) !important;
            box-shadow: 0 24px 48px rgba(0,0,0,.18) !important;
            overflow: hidden;
        }
        .modal-header {
            border-bottom: 1px solid var(--border) !important;
            padding: 1.25rem 1.5rem !important;
            background: var(--surface);
        }
        .modal-header .modal-title { font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 1.05rem; }
        .modal-footer {
            border-top: 1px solid var(--border) !important;
            padding: 1rem 1.5rem !important;
            background: #f8fafc;
        }
        .modal-body { padding: 1.5rem !important; }

        /* ===== ALERTS ===== */
        .alert-success {
            background: #f0fdf4; border: 1px solid #bbf7d0;
            color: #14532d; border-radius: var(--radius-md);
        }
        .alert-danger {
            background: #fff1f2; border: 1px solid #fecdd3;
            color: #881337; border-radius: var(--radius-md);
        }

        /* ===== ANIMATE ===== */
        @keyframes fadeUp {
            from { opacity:0; transform: translateY(20px); }
            to   { opacity:1; transform: translateY(0); }
        }
        .animate-reveal { animation: fadeUp .6s ease forwards; }

        /* ===== HELPERS ===== */
        .text-primary { color: var(--primary) !important; }
        .bg-primary   { background-color: var(--primary) !important; }

        /* ===== MOBILE ===== */
        @media (max-width: 991.98px) {
            .admin-sidebar { transform: translateX(-100%); }
            .admin-main { margin-left: 0; }
            .admin-topbar { padding: .7rem 1rem; }
            .topbar-page-title { font-size: .95rem; }
            .topbar-btn { padding: .4rem .7rem; font-size: .78rem; }
            .topbar-avatar { width: 34px; height: 34px; font-size: .8rem; }
            .topbar-user-name { font-size: .82rem; }
            .admin-content { padding: 1.25rem; }
        }

        @media (max-width: 767.98px) {
            .admin-content { padding: 1rem; }
            .admin-card { border-radius: 14px; }
            .btn-primary { padding: .42rem .9rem; font-size: .82rem; }
            .btn-warning, .btn-danger, .btn-info, .btn-success { font-size: .82rem; padding: .4rem .85rem; }
            .form-control, .form-select { padding: .5rem .8rem; font-size: .84rem; }
            .form-label { font-size: .8rem; }
            .table thead th { font-size: .68rem; padding: .5rem .6rem; }
            .table tbody td { padding: .65rem .6rem; font-size: .82rem; }
            .modal-body { padding: 1rem !important; }
            .modal-header { padding: 1rem 1.25rem !important; }
            .modal-header .modal-title { font-size: .95rem; }
        }

        @media (max-width: 575.98px) {
            body { font-size: .82rem; }
            .admin-content { padding: .75rem; }
            .admin-topbar { padding: .6rem .75rem; gap: 8px; }
            .topbar-page-title { font-size: .88rem; }
            .topbar-btn { padding: .35rem .6rem; font-size: .75rem; gap: 4px; }
            .topbar-avatar { width: 30px; height: 30px; font-size: .75rem; border-radius: 8px; }
            .topbar-user-name { font-size: .78rem; }
            .topbar-user-role { font-size: .65rem; }

            .btn-primary { padding: .38rem .75rem; font-size: .78rem; border-radius: 8px !important; }
            .btn-warning, .btn-danger, .btn-info, .btn-success { font-size: .78rem; padding: .35rem .7rem; border-radius: 8px !important; }

            .form-control, .form-select { padding: .45rem .7rem; font-size: .82rem; border-radius: 8px !important; }
            .form-label { font-size: .78rem; }

            .table thead th { font-size: .65rem; padding: .45rem .4rem; letter-spacing: .5px; }
            .table tbody td { padding: .55rem .45rem; font-size: .78rem; }
            .table tbody td:first-child { border-radius: 8px 0 0 8px; }
            .table tbody td:last-child  { border-radius: 0 8px 8px 0; }

            .admin-card { border-radius: 12px; }

            .modal-content { border-radius: 14px !important; }
            .modal-body { padding: .85rem !important; }
            .modal-header { padding: .85rem 1rem !important; }
            .modal-header .modal-title { font-size: .9rem; }
            .modal-footer { padding: .75rem 1rem !important; }

            h1 { font-size: 1.3rem; }
            h2 { font-size: 1.15rem; }
            h3 { font-size: 1.05rem; }
            h4 { font-size: .95rem; }
            h5 { font-size: .88rem; }
        }
    </style>
</head>
<body>

<!-- ===== SIDEBAR (DESKTOP) ===== -->
<aside class="admin-sidebar d-none d-lg-flex">
    <div class="sidebar-brand">
        <div class="sidebar-brand-icon">
            <i class="fas fa-hospital-alt"></i>
        </div>
        <div class="sidebar-brand-text">
            <div class="title"> Puskesmas </div>
            <div class="sub">Management System</div>
        </div>
    </div>

    <nav class="flex-grow-1 py-2">
        <div class="sidebar-section-label">Utama</div>
        <a href="<?= base_url('dashboard'); ?>" class="sidebar-link <?= ($this->uri->segment(1) == 'dashboard') ? 'active' : ''; ?>">
            <span class="icon"><i class="fas fa-gauge-high"></i></span> Dashboard
        </a>

        <div class="sidebar-section-label mt-2">Master Data</div>
        <a href="<?= base_url('adminprofil'); ?>" class="sidebar-link <?= ($this->uri->segment(1) == 'adminprofil') ? 'active' : ''; ?>">
            <span class="icon"><i class="fas fa-building-medical"></i></span> Profil Puskesmas
        </a>
        <a href="<?= base_url('adminlayanan'); ?>" class="sidebar-link <?= ($this->uri->segment(1) == 'adminlayanan') ? 'active' : ''; ?>">
            <span class="icon"><i class="fas fa-briefcase-medical"></i></span> Kelola Layanan
        </a>
        <a href="<?= base_url('adminfasilitas'); ?>" class="sidebar-link <?= ($this->uri->segment(1) == 'adminfasilitas') ? 'active' : ''; ?>">
            <span class="icon"><i class="fas fa-bed-pulse"></i></span> Kelola Fasilitas
        </a>
        <a href="<?= base_url('admintenaga'); ?>" class="sidebar-link <?= ($this->uri->segment(1) == 'admintenaga') ? 'active' : ''; ?>">
            <span class="icon"><i class="fas fa-user-doctor"></i></span> Tenaga Medis
        </a>
        <a href="<?= base_url('adminwilayah'); ?>" class="sidebar-link <?= ($this->uri->segment(1) == 'adminwilayah') ? 'active' : ''; ?>">
            <span class="icon"><i class="fas fa-map-location-dot"></i></span> Wilayah Layanan
        </a>
        <a href="<?= base_url('adminuser'); ?>" class="sidebar-link <?= ($this->uri->segment(1) == 'adminuser') ? 'active' : ''; ?>">
            <span class="icon"><i class="fas fa-users"></i></span> Data Pengguna / User
        </a>

        <div class="sidebar-section-label mt-2">Interaksi</div>
        <a href="<?= base_url('adminartikel'); ?>" class="sidebar-link <?= ($this->uri->segment(1) == 'adminartikel') ? 'active' : ''; ?>">
            <span class="icon"><i class="fas fa-newspaper"></i></span> Artikel &amp; Berita
        </a>
        <a href="<?= base_url('adminpengaduan'); ?>" class="sidebar-link <?= ($this->uri->segment(1) == 'adminpengaduan') ? 'active' : ''; ?>">
            <span class="icon"><i class="fas fa-bullhorn"></i></span> Pengaduan Masyarakat
        </a>
        <a href="<?= base_url('adminreminder'); ?>" class="sidebar-link <?= ($this->uri->segment(1) == 'adminreminder') ? 'active' : ''; ?>">
            <span class="icon"><i class="fas fa-clock-rotate-left"></i></span> Reminder Kontrol
        </a>
        <a href="<?= base_url('adminkonsultasi'); ?>" class="sidebar-link <?= ($this->uri->segment(1) == 'adminkonsultasi') ? 'active' : ''; ?>">
            <span class="icon"><i class="fas fa-comment-dots"></i></span> Konsultasi Medis
        </a>
        <a href="<?= base_url('adminperingatan'); ?>" class="sidebar-link <?= ($this->uri->segment(1) == 'adminperingatan') ? 'active' : ''; ?>">
            <span class="icon"><i class="fas fa-triangle-exclamation"></i></span> Peringatan Kesehatan
        </a>
        <a href="<?= base_url('adminstunting'); ?>" class="sidebar-link <?= ($this->uri->segment(1) == 'adminstunting') ? 'active' : ''; ?>">
            <span class="icon"><i class="fas fa-baby"></i></span> Data Stunting
        </a>

        <div class="sidebar-section-label mt-2">Layanan Digital</div>
        <a href="<?= base_url('uhc/admin_list'); ?>" class="sidebar-link <?= ($this->uri->segment(1) == 'uhc' && $this->uri->segment(2) == 'admin_list') ? 'active' : ''; ?>">
            <span class="icon"><i class="fas fa-hand-holding-medical"></i></span> Usulan UHC
        </a>
        <a href="<?= base_url('reaktivasi/admin_list'); ?>" class="sidebar-link <?= ($this->uri->segment(1) == 'reaktivasi' && $this->uri->segment(2) == 'admin_list') ? 'active' : ''; ?>">
            <span class="icon"><i class="fas fa-rotate"></i></span> Reaktivasi Dinsos
        </a>
    </nav>

    <div class="sidebar-logout">
        <a href="<?= base_url('auth/logout'); ?>">
            <i class="fas fa-right-from-bracket"></i> Keluar dari Sistem
        </a>
    </div>
</aside>

<!-- ===== MAIN WRAPPER ===== -->
<div class="admin-main">

    <!-- ===== TOPBAR ===== -->
    <header class="admin-topbar">
        <!-- Mobile toggle -->
        <button class="btn p-0 border-0 d-lg-none me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
            <i class="fas fa-bars text-muted fs-5"></i>
        </button>

        <div class="topbar-page-title d-none d-md-block">
            <?= isset($title) ? $title : 'Dashboard'; ?>
        </div>

        <div class="topbar-actions">
            <a href="<?= base_url(); ?>" target="_blank" class="topbar-btn d-none d-sm-inline-flex">
                <i class="fas fa-up-right-from-square"></i> Lihat Website
            </a>
            <div class="vr d-none d-sm-block" style="height:24px;opacity:.15;"></div>
            <div class="d-flex align-items-center gap-2">
                <div class="d-none d-sm-block text-end">
                    <div class="topbar-user-name"><?= $this->session->userdata('nama_lengkap') ?: 'Administrator'; ?></div>
                    <div class="topbar-user-role">Admin</div>
                </div>
                <div class="topbar-avatar">
                    <i class="fas fa-user"></i>
                </div>
            </div>
        </div>
    </header>

    <!-- ===== MOBILE OFFCANVAS SIDEBAR ===== -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileSidebar" style="width:280px;background:var(--sidebar-bg);">
        <div class="offcanvas-header" style="border-bottom:1px solid rgba(255,255,255,.06);">
            <div class="d-flex align-items-center gap-2">
                <div class="sidebar-brand-icon" style="width:36px;height:36px;font-size:.9rem;"><i class="fas fa-hospital-alt"></i></div>
                <span class="text-white fw-bold" style="font-family:'Outfit',sans-serif;">PIDB Admin</span>
            </div>
            <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body p-0" style="overflow-y:auto;">
            <nav class="py-3">
                <div class="sidebar-section-label">Utama</div>
                <a href="<?= base_url('dashboard'); ?>" class="sidebar-link <?= ($this->uri->segment(1) == 'dashboard') ? 'active' : ''; ?>">
                    <span class="icon"><i class="fas fa-gauge-high"></i></span> Dashboard
                </a>
                <div class="sidebar-section-label mt-2">Master Data</div>
                <a href="<?= base_url('adminprofil'); ?>" class="sidebar-link"><span class="icon"><i class="fas fa-building-medical"></i></span> Profil</a>
                <a href="<?= base_url('adminlayanan'); ?>" class="sidebar-link"><span class="icon"><i class="fas fa-briefcase-medical"></i></span> Layanan</a>
                <a href="<?= base_url('adminfasilitas'); ?>" class="sidebar-link"><span class="icon"><i class="fas fa-bed-pulse"></i></span> Fasilitas</a>
                <a href="<?= base_url('admintenaga'); ?>" class="sidebar-link"><span class="icon"><i class="fas fa-user-doctor"></i></span> Tenaga Medis</a>
                <a href="<?= base_url('adminwilayah'); ?>" class="sidebar-link"><span class="icon"><i class="fas fa-map-location-dot"></i></span> Wilayah Layanan</a>
                <a href="<?= base_url('adminuser'); ?>" class="sidebar-link"><span class="icon"><i class="fas fa-users"></i></span> Data Pengguna</a>
                <div class="sidebar-section-label mt-2">Interaksi</div>
                <a href="<?= base_url('adminartikel'); ?>" class="sidebar-link"><span class="icon"><i class="fas fa-newspaper"></i></span> Artikel</a>
                <a href="<?= base_url('adminpengaduan'); ?>" class="sidebar-link"><span class="icon"><i class="fas fa-bullhorn"></i></span> Pengaduan</a>
                <a href="<?= base_url('adminreminder'); ?>" class="sidebar-link"><span class="icon"><i class="fas fa-clock-rotate-left"></i></span> Reminder</a>
                <a href="<?= base_url('adminkonsultasi'); ?>" class="sidebar-link"><span class="icon"><i class="fas fa-comment-dots"></i></span> Konsultasi</a>
                <a href="<?= base_url('adminperingatan'); ?>" class="sidebar-link"><span class="icon"><i class="fas fa-triangle-exclamation"></i></span> Peringatan</a>
                <a href="<?= base_url('adminstunting'); ?>" class="sidebar-link"><span class="icon"><i class="fas fa-baby"></i></span> Data Stunting</a>
                <div class="sidebar-section-label mt-2">Layanan Digital</div>
                <a href="<?= base_url('uhc/admin_list'); ?>" class="sidebar-link"><span class="icon"><i class="fas fa-hand-holding-medical"></i></span> Usulan UHC</a>
                <a href="<?= base_url('reaktivasi/admin_list'); ?>" class="sidebar-link"><span class="icon"><i class="fas fa-rotate"></i></span> Reaktivasi Dinsos</a>
                <div class="p-3 mt-3">
                    <a href="<?= base_url('auth/logout'); ?>" class="d-flex align-items-center gap-2 text-danger text-decoration-none p-2 rounded-3" style="background:rgba(239,68,68,.1);font-weight:600;font-size:.88rem;">
                        <i class="fas fa-right-from-bracket"></i> Logout
                    </a>
                </div>
            </nav>
        </div>
    </div>

    <!-- Content area -->
    <div class="admin-content">
        <!-- Flash Messages -->
        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-3 mb-4 animate-reveal" role="alert">
                <div style="width:38px;height:38px;background:#dcfce7;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <i class="fas fa-check-circle text-success"></i>
                </div>
                <div>
                    <div class="fw-bold">Berhasil!</div>
                    <div class="small"><?= $this->session->flashdata('success'); ?></div>
                </div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-3 mb-4 animate-reveal" role="alert">
                <div style="width:38px;height:38px;background:#fee2e2;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <i class="fas fa-exclamation-circle text-danger"></i>
                </div>
                <div>
                    <div class="fw-bold">Terjadi Kesalahan</div>
                    <div class="small"><?= $this->session->flashdata('error'); ?></div>
                </div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

