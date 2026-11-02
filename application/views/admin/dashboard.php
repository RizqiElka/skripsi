<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800 fw-bold">Overview Dashboard</h1>
            <p class="text-muted small mb-0">Selamat datang kembali di Pusat Manajemen Sistem Informasi Puskesmas.</p>
        </div>
    </div>

    <!-- Stats Cards Row 1 -->
    <div class="row g-3 mb-4">
        <!-- Total Users -->
        <div class="col-xl-3 col-md-6">
            <a href="<?= base_url('adminuser'); ?>" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100 p-3 card-hover-stat" style="border-left: 4px solid var(--primary) !important; border-radius: 16px; background: #ffffff; transition: transform .2s, box-shadow .2s;">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="letter-spacing: .5px; font-size: 11px;">Data User Terdaftar</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $total_users; ?></div>
                            <small class="text-muted" style="font-size: 11px;">Masyarakat &amp; Pasien</small>
                        </div>
                        <div class="d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; border-radius: 12px; background: rgba(14, 165, 233, 0.12); color: #0284c7; flex-shrink: 0;">
                            <i class="fas fa-users" style="font-size: 1.25rem;"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Pengaduan Masyarakat -->
        <div class="col-xl-3 col-md-6">
            <a href="<?= base_url('adminpengaduan'); ?>" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100 p-3 card-hover-stat" style="border-left: 4px solid #f59e0b !important; border-radius: 16px; background: #ffffff; transition: transform .2s, box-shadow .2s;">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" style="letter-spacing: .5px; font-size: 11px;">Pengaduan Masuk</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $total_pengaduan; ?></div>
                            <small class="text-warning fw-semibold" style="font-size: 11px;"><?= $pengaduan_menunggu; ?> Menunggu Tindak Lanjut</small>
                        </div>
                        <div class="d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; border-radius: 12px; background: rgba(245, 158, 11, 0.12); color: #d97706; flex-shrink: 0;">
                            <i class="fas fa-bullhorn" style="font-size: 1.25rem;"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Pengajuan UHC -->
        <div class="col-xl-3 col-md-6">
            <a href="<?= base_url('uhc/admin_list'); ?>" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100 p-3 card-hover-stat" style="border-left: 4px solid #10b981 !important; border-radius: 16px; background: #ffffff; transition: transform .2s, box-shadow .2s;">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1" style="letter-spacing: .5px; font-size: 11px;">Usulan UHC</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800"><?= isset($total_uhc) ? $total_uhc : 0; ?></div>
                            <small class="text-muted" style="font-size: 11px;"><?= isset($uhc_today) ? $uhc_today : 0; ?> Diajukan hari ini</small>
                        </div>
                        <div class="d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; border-radius: 12px; background: rgba(16, 185, 129, 0.12); color: #059669; flex-shrink: 0;">
                            <i class="fas fa-hand-holding-medical" style="font-size: 1.25rem;"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Reaktivasi Dinsos -->
        <div class="col-xl-3 col-md-6">
            <a href="<?= base_url('reaktivasi/admin_list'); ?>" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100 p-3 card-hover-stat" style="border-left: 4px solid #0284c7 !important; border-radius: 16px; background: #ffffff; transition: transform .2s, box-shadow .2s;">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1" style="letter-spacing: .5px; font-size: 11px;">Reaktivasi Dinsos</div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800"><?= isset($total_reaktivasi) ? $total_reaktivasi : 0; ?></div>
                            <small class="text-muted" style="font-size: 11px;"><?= isset($reaktivasi_today) ? $reaktivasi_today : 0; ?> Diajukan hari ini</small>
                        </div>
                        <div class="d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; border-radius: 12px; background: rgba(99, 102, 241, 0.12); color: #4f46e5; flex-shrink: 0;">
                            <i class="fas fa-rotate" style="font-size: 1.25rem;"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- MAIN SECTION: Data User Terdaftar di Dashboard Admin -->
    <div class="row g-4 mb-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 20px;">
                <div class="card-header bg-transparent border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-2">
                        <div class="d-flex align-items-center justify-content-center rounded-3 text-primary" style="width: 36px; height: 36px; background: rgba(14, 165, 233, 0.12);">
                            <i class="fas fa-users fs-5"></i>
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
                                            <span class="badge bg-light border font-monospace" style="font-size: 11px; color: #000000 !important; font-weight: 600;">
                                                <?= htmlspecialchars($u['nik']); ?>
                                            </span>
                                        </td>
                                        <td class="small font-monospace" style="color: #000000;">
                                            <?= htmlspecialchars($u['no_hp'] ?: '-'); ?>
                                        </td>
                                        <td class="small text-muted" style="font-size: 11px;">
                                            <?= date('d/m/Y H:i', strtotime($u['created_at'])); ?>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-inline-flex gap-1">
                                                <button type="button" class="btn btn-sm btn-outline-primary p-1 px-2 rounded-pill" title="Edit user" data-bs-toggle="modal" data-bs-target="#modalEditDashUser<?= $u['id']; ?>">
                                                    <i class="fas fa-pencil" style="font-size: 11px;"></i>
                                                </button>
                                                <a href="<?= base_url('adminuser/reset_password/' . $u['id']); ?>" class="btn btn-sm btn-outline-warning p-1 px-2 rounded-pill" title="Reset password" onclick="return confirm('Reset password akun <?= htmlspecialchars($u['nama_lengkap']); ?> menjadi 123456?');">
                                                    <i class="fas fa-key" style="font-size: 11px;"></i>
                                                </a>
                                                <a href="<?= base_url('adminuser/delete/' . $u['id']); ?>" class="btn btn-sm btn-outline-danger p-1 px-2 rounded-pill" title="Hapus user" onclick="return confirm('Hapus user <?= htmlspecialchars($u['nama_lengkap']); ?>?');">
                                                    <i class="fas fa-trash" style="font-size: 11px;"></i>
                                                </a>
                                            </div>
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

<!-- Modal Edit User dari Dashboard -->
<?php if(!empty($recent_users)): ?>
    <?php foreach($recent_users as $u): ?>
    <div class="modal fade text-start" id="modalEditDashUser<?= $u['id']; ?>" tabindex="-1" aria-labelledby="modalEditDashUserLabel<?= $u['id']; ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius:20px;">
                <form action="<?= base_url('adminuser/edit/' . $u['id']); ?>" method="post">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold" id="modalEditDashUserLabel<?= $u['id']; ?>">Ubah Data Pengguna</h5>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label small fw-bold">NIK (16 Digit) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nik" value="<?= htmlspecialchars($u['nik']); ?>" required maxlength="16" pattern="[0-9]{16}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nama_lengkap" value="<?= htmlspecialchars($u['nama_lengkap']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Nomor HP <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="no_hp" value="<?= htmlspecialchars($u['no_hp']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Alamat Lengkap Domisili</label>
                            <textarea class="form-control" name="alamat" rows="2.5" placeholder="Masukkan alamat lengkap RT/RW, Kelurahan, Kecamatan..."><?= htmlspecialchars($u['alamat'] ?? ''); ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Role Akses</label>
                            <select class="form-select" name="role">
                                <option value="pasien" <?= ($u['role'] == 'pasien') ? 'selected' : ''; ?>>Pasien / Masyarakat</option>
                                <option value="admin" <?= ($u['role'] == 'admin') ? 'selected' : ''; ?>>Administrator</option>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label class="form-label small fw-bold">Ganti Password (Kosongkan bila tidak diubah)</label>
                            <input type="password" class="form-control" name="password" placeholder="Password baru...">
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-light rounded-pill px-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
<?php endif; ?>

