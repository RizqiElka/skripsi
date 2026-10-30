<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800 fw-bold">Overview Dashboard</h1>
            <p class="text-muted small mb-0">Selamat datang kembali di Pusat Manajemen Sistem Informasi Puskesmas.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="<?= base_url('adminuser'); ?>" class="btn btn-primary btn-sm rounded-pill px-3 shadow-sm">
                <i class="fas fa-users me-1"></i> Kelola Data User
            </a>
            <a href="<?= base_url('adminpengaduan'); ?>" class="btn btn-warning btn-sm rounded-pill px-3 shadow-sm text-dark fw-bold">
                <i class="fas fa-bullhorn me-1"></i> Cek Pengaduan (<?= $pengaduan_menunggu; ?>)
            </a>
        </div>
    </div>

    <!-- Stats Cards Row 1 -->
    <div class="row g-4 mb-4">
        <!-- Total Users (Highlight) -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100 p-3" style="border-left: 5px solid var(--primary) !important; border-radius: 18px; background: linear-gradient(135deg, #ffffff 0%, #f0fdfa 100%);">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="letter-spacing: .5px;">Data User Terdaftar</div>
                        <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $total_users; ?></div>
                        <small class="text-muted" style="font-size: 11px;">Masyarakat &amp; Pasien</small>
                    </div>
                    <div class="bg-primary bg-opacity-10 p-3 rounded-4">
                        <i class="fas fa-users text-primary fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pengaduan Masyarakat -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100 p-3" style="border-left: 5px solid #f59e0b !important; border-radius: 18px; background: linear-gradient(135deg, #ffffff 0%, #fffbeb 100%);">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" style="letter-spacing: .5px;">Pengaduan Masuk</div>
                        <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $total_pengaduan; ?></div>
                        <small class="text-warning fw-bold" style="font-size: 11px;"><?= $pengaduan_menunggu; ?> Menunggu Tindak Lanjut</small>
                    </div>
                    <div class="bg-warning bg-opacity-10 p-3 rounded-4">
                        <i class="fas fa-bullhorn text-warning fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pengajuan UHC -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100 p-3" style="border-left: 5px solid #10b981 !important; border-radius: 18px; background: linear-gradient(135deg, #ffffff 0%, #f0fdf4 100%);">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1" style="letter-spacing: .5px;">Usulan UHC</div>
                        <div class="h3 mb-0 font-weight-bold text-gray-800"><?= isset($total_uhc) ? $total_uhc : 0; ?></div>
                        <small class="text-muted" style="font-size: 11px;"><?= isset($uhc_today) ? $uhc_today : 0; ?> Diajukan hari ini</small>
                    </div>
                    <div class="bg-success bg-opacity-10 p-3 rounded-4">
                        <i class="fas fa-hand-holding-medical text-success fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reaktivasi Dinsos -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100 p-3" style="border-left: 5px solid #0284c7 !important; border-radius: 18px; background: linear-gradient(135deg, #ffffff 0%, #f0f9ff 100%);">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1" style="letter-spacing: .5px;">Reaktivasi Dinsos</div>
                        <div class="h3 mb-0 font-weight-bold text-gray-800"><?= isset($total_reaktivasi) ? $total_reaktivasi : 0; ?></div>
                        <small class="text-muted" style="font-size: 11px;"><?= isset($reaktivasi_today) ? $reaktivasi_today : 0; ?> Diajukan hari ini</small>
                    </div>
                    <div class="bg-info bg-opacity-10 p-3 rounded-4">
                        <i class="fas fa-rotate text-info fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN SECTION: Data User Terdaftar di Dashboard Admin -->
    <div class="row g-4 mb-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 20px;">
                <div class="card-header bg-transparent border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-2">
                        <div class="bg-primary bg-opacity-10 p-2 rounded-3 text-primary">
                            <i class="fas fa-user-group fs-5"></i>
                        </div>
                        <div>
                            <h6 class="m-0 font-weight-bold text-primary">Data User / Pasien Terdaftar</h6>
                            <small class="text-muted">Daftar akun masyarakat terdaftar di sistem Puskesmas</small>
                        </div>
                    </div>
                    <a href="<?= base_url('adminuser'); ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                        Lihat Semua User <i class="fas fa-chevron-right ms-1"></i>
                    </a>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr class="text-muted small">
                                    <th>NAMA &amp; USERNAME</th>
                                    <th>NIK</th>
                                    <th>NO HP</th>
                                    <th>TGL DAFTAR</th>
                                    <th class="text-center">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($recent_users)): ?>
                                    <?php foreach($recent_users as $u): ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px; font-size: .8rem;">
                                                    <?= strtoupper(substr($u['nama_lengkap'], 0, 1)); ?>
                                                </div>
                                                <div>
                                                    <div class="fw-bold small"><?= htmlspecialchars($u['nama_lengkap']); ?></div>
                                                    <div class="text-muted" style="font-size: 11px;">@<?= htmlspecialchars($u['username']); ?></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark border font-monospace" style="font-size: 11px;">
                                                <?= htmlspecialchars($u['nik']); ?>
                                            </span>
                                        </td>
                                        <td class="small">
                                            <?= htmlspecialchars($u['no_hp'] ?: '-'); ?>
                                        </td>
                                        <td class="small text-muted" style="font-size: 11px;">
                                            <?= date('d/m/Y H:i', strtotime($u['created_at'])); ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= base_url('adminuser/reset_password/' . $u['id']); ?>" class="btn btn-sm btn-outline-warning p-1 px-2 rounded-pill" title="Reset password" onclick="return confirm('Reset password akun <?= htmlspecialchars($u['nama_lengkap']); ?> menjadi 123456?');">
                                                <i class="fas fa-key" style="font-size: 10px;"></i>
                                            </a>
                                            <a href="<?= base_url('adminuser/delete/' . $u['id']); ?>" class="btn btn-sm btn-outline-danger p-1 px-2 rounded-pill ms-1" title="Hapus user" onclick="return confirm('Hapus user <?= htmlspecialchars($u['nama_lengkap']); ?>?');">
                                                <i class="fas fa-trash" style="font-size: 10px;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-muted small">
                                            Belum ada data user terdaftar.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- SIDE COLUMN: Pengaduan Terbaru -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 20px;">
                <div class="card-header bg-transparent border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-2">
                        <div class="bg-warning bg-opacity-10 p-2 rounded-3 text-warning">
                            <i class="fas fa-bullhorn fs-5"></i>
                        </div>
                        <h6 class="m-0 font-weight-bold text-dark">Pengaduan Terbaru</h6>
                    </div>
                    <a href="<?= base_url('adminpengaduan'); ?>" class="btn btn-outline-warning btn-sm rounded-pill text-dark fw-bold px-3">
                        Semua
                    </a>
                </div>
                <div class="card-body p-4">
                    <?php if(!empty($recent_pengaduan)): ?>
                        <div class="d-flex flex-column gap-3">
                            <?php foreach($recent_pengaduan as $p): ?>
                                <div class="p-3 rounded-4 border bg-light">
                                    <div class="d-flex justify-content-between align-items-start mb-1">
                                        <div class="fw-bold small text-dark"><?= htmlspecialchars($p['nama_pelapor']); ?></div>
                                        <span class="badge rounded-pill <?= ($p['status'] == 'Selesai') ? 'bg-success' : (($p['status'] == 'Diproses') ? 'bg-info' : 'bg-warning text-dark'); ?>" style="font-size: 10px;">
                                            <?= $p['status']; ?>
                                        </span>
                                    </div>
                                    <div class="text-muted small mb-2" style="font-size: 11px;">
                                        <i class="fas fa-tag me-1 text-primary"></i> <?= htmlspecialchars($p['kategori']); ?> &bull; <?= htmlspecialchars($p['lokasi_layanan']); ?>
                                    </div>
                                    <p class="mb-0 text-dark small" style="font-size: 12px; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                        "<?= htmlspecialchars($p['isi_pengaduan']); ?>"
                                    </p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="text-center py-5 text-muted small">
                            <i class="fas fa-check-circle fs-2 text-success opacity-25 mb-2 d-block"></i>
                            Tidak ada pengaduan baru yang belum ditindaklanjuti.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
