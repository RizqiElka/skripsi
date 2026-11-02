<style>
    .profil-hero {
        background: linear-gradient(135deg, rgba(13,148,136,.08) 0%, rgba(2,132,199,.08) 100%);
        border-radius: 24px;
        border: 1px solid rgba(226,232,240,.8);
    }
    .profil-tab .nav-link {
        color: #64748b;
        border-radius: 12px !important;
        font-weight: 700;
        transition: all 0.25s ease;
        padding: 0.65rem 1.25rem;
        font-family: 'Outfit', sans-serif;
        font-size: .85rem;
        border: 1px solid transparent;
    }
    .profil-tab .nav-link:hover {
        color: var(--primary);
        background: rgba(13,148,136,.06);
    }
    .profil-tab .nav-link.active {
        background: linear-gradient(135deg, var(--primary), #0284c7) !important;
        color: #fff !important;
        box-shadow: 0 8px 18px rgba(13,148,136,.25) !important;
    }
    .info-tile {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 0.85rem 1rem;
        transition: all 0.2s ease;
    }
    .info-tile:hover {
        border-color: #0d9488;
        background: #f0fdfa;
        transform: translateY(-1px);
    }
    .stat-badge-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 1rem 1.2rem;
        transition: all 0.25s ease;
    }
    .stat-badge-card:hover {
        border-color: #cbd5e1;
        box-shadow: 0 10px 25px rgba(0,0,0,.04);
        transform: translateY(-2px);
    }
    .table-custom thead th {
        font-size: .75rem;
        font-weight: 700;
        letter-spacing: 0.6px;
        color: #64748b;
        border-bottom: 1.5px solid #e2e8f0 !important;
        padding: 0.85rem 1rem;
        background: #f8fafc;
    }
    .table-custom tbody td {
        padding: 0.95rem 1rem;
        font-size: .84rem;
        color: #1e293b;
        border-bottom: 1px solid #f1f5f9 !important;
    }
</style>

<div class="container py-4 mb-4" style="position:relative;z-index:3;">
    <!-- Welcome Header Card -->
    <div class="profil-hero p-4 p-md-5 mb-4 shadow-sm reveal reveal-top">
        <div class="row align-items-center g-4">
            <div class="col-md-8 d-flex align-items-center gap-3.5 flex-wrap flex-sm-nowrap">
                <?php
                $avatar_url = (!empty($user['foto']) && $user['foto'] != 'default_avatar.png' && file_exists('./assets/uploads/avatars/' . $user['foto']))
                    ? base_url('assets/uploads/avatars/' . $user['foto'])
                    : '';
                ?>
                <div class="position-relative flex-shrink-0">
                    <?php if($avatar_url): ?>
                        <img src="<?= $avatar_url; ?>" class="rounded-circle shadow" style="width:84px; height:84px; object-fit:cover; border: 4px solid #fff;" alt="Avatar">
                    <?php else: ?>
                        <div class="rounded-circle d-flex align-items-center justify-content-center shadow text-white fw-bold" 
                             style="width:84px; height:84px; background: linear-gradient(135deg, var(--primary), var(--secondary)); font-size: 2.2rem; border: 4px solid #fff;">
                            <?= strtoupper(substr($user['nama_lengkap'], 0, 1)); ?>
                        </div>
                    <?php endif; ?>
                    <button type="button" class="btn btn-sm btn-primary rounded-circle position-absolute bottom-0 end-0 p-1 shadow-sm" style="width:28px;height:28px;display:flex;align-items:center;justify-content:center;" data-bs-toggle="modal" data-bs-target="#modalEditProfil" title="Ubah Foto">
                        <i class="fas fa-camera" style="font-size:0.7rem;"></i>
                    </button>
                </div>
                <div>
                    <div class="d-inline-flex align-items-center gap-1.5 px-3 py-1 rounded-pill mb-1.5" style="background:#ccfbf1; color:#0f766e; font-size:.72rem; font-weight:700;">
                        <i class="fas fa-circle-check"></i> Pasien Terverifikasi Sistem
                    </div>
                    <h3 class="fw-bold mb-1 text-dark" style="font-family:'Outfit',sans-serif; letter-spacing:-0.5px;">
                        <?= htmlspecialchars($user['nama_lengkap']); ?>
                    </h3>
                    <p class="text-muted small mb-0 font-monospace">
                        NIK: <strong class="text-dark"><?= htmlspecialchars($user['nik']); ?></strong> &bull; Nomor WhatsApp: <strong class="text-dark"><?= htmlspecialchars($user['no_hp']); ?></strong>
                    </p>
                </div>
            </div>
            <div class="col-md-4 text-md-end d-flex align-items-center justify-content-md-end gap-2 flex-wrap">
                <button type="button" class="btn btn-primary rounded-pill px-4 py-2.5 fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#modalEditProfil" style="font-size:.85rem;">
                    <i class="fas fa-pencil me-1.5"></i> Edit Profil
                </button>
                <a href="<?= base_url('auth/logout_user'); ?>" class="btn btn-light text-danger border-0 rounded-pill px-3 py-2.5 fw-bold shadow-sm" style="font-size:.85rem; background:#fef2f2;">
                    <i class="fas fa-right-from-bracket me-1"></i> Keluar
                </a>
            </div>
        </div>
    </div>

    <!-- Quick Stats Row -->
    <div class="row g-3 mb-4">
        <div class="col-sm-4">
            <div class="stat-badge-card d-flex align-items-center gap-3">
                <div style="width:48px;height:48px;background:rgba(13,148,136,.1);border-radius:12px;display:flex;align-items:center;justify-content:center;color:var(--primary);font-size:1.2rem;flex-shrink:0;">
                    <i class="fas fa-hand-holding-medical"></i>
                </div>
                <div>
                    <div class="text-muted small" style="font-size:0.75rem;">Usulan UHC</div>
                    <h4 class="fw-bold mb-0 text-dark"><?= count($pengajuan_uhc); ?> <small class="text-muted fw-normal" style="font-size:.8rem;">Berkas</small></h4>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="stat-badge-card d-flex align-items-center gap-3">
                <div style="width:48px;height:48px;background:rgba(2,132,199,.1);border-radius:12px;display:flex;align-items:center;justify-content:center;color:#0284c7;font-size:1.2rem;flex-shrink:0;">
                    <i class="fas fa-rotate"></i>
                </div>
                <div>
                    <div class="text-muted small" style="font-size:0.75rem;">Reaktivasi Dinsos</div>
                    <h4 class="fw-bold mb-0 text-dark"><?= count($pengajuan_reaktivasi); ?> <small class="text-muted fw-normal" style="font-size:.8rem;">Berkas</small></h4>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="stat-badge-card d-flex align-items-center gap-3">
                <div style="width:48px;height:48px;background:rgba(236,72,153,.1);border-radius:12px;display:flex;align-items:center;justify-content:center;color:#ec4899;font-size:1.2rem;flex-shrink:0;">
                    <i class="fas fa-baby"></i>
                </div>
                <div>
                    <div class="text-muted small" style="font-size:0.75rem;">Deteksi Balita</div>
                    <h4 class="fw-bold mb-0 text-dark"><?= count($riwayat_stunting ?? []); ?> <small class="text-muted fw-normal" style="font-size:.8rem;">Cek</small></h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Content Riwayat Pengajuan & Deteksi (Full Width) -->
        <div class="col-12">
            <div class="card border-0 shadow-sm p-4 p-md-5" style="border-radius: 20px;">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4 pb-2 border-bottom">
                    <div>
                        <h5 class="fw-bold mb-0 text-dark" style="font-family:'Outfit',sans-serif;">
                            <i class="fas fa-folder-tree text-primary me-2"></i>Riwayat &amp; Berkas Layanan Digital
                        </h5>
                        <small class="text-muted">Pantau status usulan jaminan dan deteksi balita Anda</small>
                    </div>
                </div>

                <!-- Custom Nav Tabs -->
                <ul class="nav nav-pills profil-tab mb-4 p-1 rounded-4 border flex-wrap gap-1" style="background:#f8fafc;" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-uhc-tab" data-bs-toggle="pill" data-bs-target="#pills-uhc" type="button" role="tab">
                            <i class="fas fa-hand-holding-medical me-1.5"></i> Usulan UHC (<?= count($pengajuan_uhc); ?>)
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-reaktivasi-tab" data-bs-toggle="pill" data-bs-target="#pills-reaktivasi" type="button" role="tab">
                            <i class="fas fa-rotate me-1.5"></i> Reaktivasi Dinsos (<?= count($pengajuan_reaktivasi); ?>)
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-stunting-tab" data-bs-toggle="pill" data-bs-target="#pills-stunting" type="button" role="tab">
                            <i class="fas fa-baby me-1.5"></i> Deteksi Balita (<?= count($riwayat_stunting ?? []); ?>)
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <!-- Tab UHC -->
                    <div class="tab-pane fade show active" id="pills-uhc" role="tabpanel">
                        <?php if(empty($pengajuan_uhc)): ?>
                            <div class="text-center py-5">
                                <div class="p-3.5 rounded-circle d-inline-flex mb-3" style="background:rgba(13,148,136,.06);">
                                    <i class="fas fa-inbox text-primary fs-2 opacity-50"></i>
                                </div>
                                <h6 class="text-muted fw-bold mb-1">Belum Ada Pengajuan UHC</h6>
                                <p class="text-muted small mb-3">Anda belum memiliki riwayat usulan Universal Health Coverage.</p>
                                <a href="<?= base_url('uhc'); ?>" class="btn btn-primary btn-sm rounded-pill px-3.5 py-2 fw-semibold">
                                    <i class="fas fa-plus me-1"></i> Buat Usulan UHC
                                </a>
                            </div>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-custom table-hover align-middle mb-0">
                                    <thead>
                                        <tr class="text-uppercase">
                                            <th style="width: 45px;">No</th>
                                            <th>Tanggal</th>
                                            <th>NIK</th>
                                            <th>Nama Pasien</th>
                                            <th>Status</th>
                                            <th class="text-center" style="width: 90px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach($pengajuan_uhc as $u): ?>
                                        <tr>
                                            <td class="fw-bold text-muted small"><?= $no++; ?></td>
                                            <td class="small text-muted font-monospace"><?= date('d/m/Y', strtotime($u['created_at'])); ?></td>
                                            <td class="fw-semibold text-dark font-monospace"><?= $u['nik']; ?></td>
                                            <td class="fw-bold text-dark"><?= htmlspecialchars($u['nama_lengkap']); ?></td>
                                            <td>
                                                <?php
                                                $badge_map = [
                                                    'Diajukan' => 'bg-warning text-dark',
                                                    'Diverifikasi Admin' => 'bg-info text-white',
                                                    'Sedang Diproses' => 'bg-primary text-white',
                                                    'Menunggu Persetujuan' => 'bg-secondary text-white',
                                                    'Selesai' => 'bg-success text-white',
                                                    'Ditolak' => 'bg-danger text-white'
                                                ];
                                                $badge_class = isset($badge_map[$u['status']]) ? $badge_map[$u['status']] : 'bg-secondary text-white';
                                                ?>
                                                <span class="badge <?= $badge_class; ?> px-2.5 py-1.5 rounded-pill fw-semibold" style="font-size:.72rem;"><?= $u['status']; ?></span>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= base_url('uhc/detail/' . $u['id']); ?>" class="btn btn-sm btn-outline-primary rounded-circle p-1" style="width:32px;height:32px;display:inline-flex;align-items:center;justify-content:center;" title="Lihat Detail Berkas">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Tab Reaktivasi -->
                    <div class="tab-pane fade" id="pills-reaktivasi" role="tabpanel">
                        <?php if(empty($pengajuan_reaktivasi)): ?>
                            <div class="text-center py-5">
                                <div class="p-3.5 rounded-circle d-inline-flex mb-3" style="background:rgba(13,148,136,.06);">
                                    <i class="fas fa-inbox text-primary fs-2 opacity-50"></i>
                                </div>
                                <h6 class="text-muted fw-bold mb-1">Belum Ada Pengajuan Reaktivasi</h6>
                                <p class="text-muted small mb-3">Anda belum memiliki riwayat pengajuan Reaktivasi Dinsos.</p>
                                <a href="<?= base_url('reaktivasi'); ?>" class="btn btn-primary btn-sm rounded-pill px-3.5 py-2 fw-semibold">
                                    <i class="fas fa-plus me-1"></i> Buat Reaktivasi Dinsos
                                </a>
                            </div>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-custom table-hover align-middle mb-0">
                                    <thead>
                                        <tr class="text-uppercase">
                                            <th style="width: 45px;">No</th>
                                            <th>Tanggal</th>
                                            <th>NIK</th>
                                            <th>Nomor HP</th>
                                            <th>Status</th>
                                            <th class="text-center" style="width: 90px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach($pengajuan_reaktivasi as $r): ?>
                                        <tr>
                                            <td class="fw-bold text-muted small"><?= $no++; ?></td>
                                            <td class="small text-muted font-monospace"><?= date('d/m/Y', strtotime($r['created_at'])); ?></td>
                                            <td class="fw-semibold text-dark font-monospace"><?= $r['nik']; ?></td>
                                            <td class="small font-monospace"><?= $r['no_hp']; ?></td>
                                            <td>
                                                <?php
                                                $badge_map = [
                                                    'Diajukan' => 'bg-warning text-dark',
                                                    'Diverifikasi Admin' => 'bg-info text-white',
                                                    'Sedang Diproses' => 'bg-primary text-white',
                                                    'Menunggu Persetujuan' => 'bg-secondary text-white',
                                                    'Selesai' => 'bg-success text-white',
                                                    'Ditolak' => 'bg-danger text-white'
                                                ];
                                                $badge_class = isset($badge_map[$r['status']]) ? $badge_map[$r['status']] : 'bg-secondary text-white';
                                                ?>
                                                <span class="badge <?= $badge_class; ?> px-2.5 py-1.5 rounded-pill fw-semibold" style="font-size:.72rem;"><?= $r['status']; ?></span>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= base_url('reaktivasi/detail/' . $r['id']); ?>" class="btn btn-sm btn-outline-primary rounded-circle p-1" style="width:32px;height:32px;display:inline-flex;align-items:center;justify-content:center;" title="Lihat Detail Berkas">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Tab Stunting -->
                    <div class="tab-pane fade" id="pills-stunting" role="tabpanel">
                        <?php if(empty($riwayat_stunting)): ?>
                            <div class="text-center py-5">
                                <div class="p-3.5 rounded-circle d-inline-flex mb-3" style="background:rgba(236,72,153,.08);">
                                    <i class="fas fa-baby text-danger fs-2 opacity-50"></i>
                                </div>
                                <h6 class="text-muted fw-bold mb-1">Belum Ada Riwayat Deteksi</h6>
                                <p class="text-muted small mb-3">Anda belum pernah melakukan deteksi pertumbuhan balita.</p>
                                <a href="<?= base_url('deteksi/stunting'); ?>" class="btn btn-primary btn-sm rounded-pill px-3.5 py-2 fw-semibold">
                                    <i class="fas fa-plus me-1"></i> Mulai Deteksi Stunting
                                </a>
                            </div>
                        <?php else: ?>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="small text-muted">Total pemeriksaan: <strong><?= count($riwayat_stunting); ?> kali</strong></span>
                                <a href="<?= base_url('deteksi/riwayat'); ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3 py-1 font-monospace" style="font-size:0.78rem;">
                                    <i class="fas fa-chart-line me-1"></i> Buka Grafik Perkembangan
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-custom table-hover align-middle mb-0">
                                    <thead>
                                        <tr class="text-uppercase">
                                            <th style="width: 45px;">No</th>
                                            <th>Tanggal</th>
                                            <th>Nama Balita</th>
                                            <th>L/P</th>
                                            <th>Umur</th>
                                            <th>TB</th>
                                            <th>Status Hasil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach($riwayat_stunting as $st): ?>
                                        <tr>
                                            <td class="fw-bold text-muted small"><?= $no++; ?></td>
                                            <td class="small text-muted font-monospace"><?= date('d/m/Y', strtotime($st['created_at'])); ?></td>
                                            <td class="fw-bold text-dark"><?= htmlspecialchars($st['nama_anak']); ?></td>
                                            <td>
                                                <span class="badge rounded-pill <?= ($st['gender'] == 'L') ? 'bg-info text-white' : 'bg-pink text-white'; ?>" style="<?= ($st['gender'] == 'P') ? 'background-color:#ec4899;' : ''; ?>">
                                                    <?= $st['gender']; ?>
                                                </span>
                                            </td>
                                            <td class="small font-monospace"><?= $st['umur_bulan']; ?> bln</td>
                                            <td class="small font-monospace fw-bold text-primary"><?= $st['tinggi_badan']; ?> cm</td>
                                            <td>
                                                <?php 
                                                    $bg_st = 'bg-success';
                                                    if(stripos($st['status_hasil'], 'Sangat Pendek') !== false) $bg_st = 'bg-danger';
                                                    elseif(stripos($st['status_hasil'], 'Pendek') !== false) $bg_st = 'bg-warning text-dark';
                                                    elseif(stripos($st['status_hasil'], 'Tinggi') !== false) $bg_st = 'bg-info text-white';
                                                ?>
                                                <span class="badge <?= $bg_st; ?> px-2.5 py-1.5 rounded-pill small fw-semibold">
                                                    <?= htmlspecialchars($st['status_hasil']); ?>
                                                </span>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<!-- ===== MODAL EDIT PROFIL ===== -->
<div class="modal fade" id="modalEditProfil" tabindex="-1" aria-labelledby="modalEditProfilLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px;">
            <form action="<?= base_url('auth/update_profil'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header border-0 pb-0 px-4 pt-4">
                    <div>
                        <h5 class="modal-title fw-bold mb-0" id="modalEditProfilLabel" style="font-family:'Outfit',sans-serif;">
                            <i class="fas fa-user-pen text-primary me-2"></i>Edit Profil Saya
                        </h5>
                        <p class="text-muted small mb-0" style="font-size:.75rem;">Perbarui data dan foto profil Anda</p>
                    </div>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body px-4 py-3">

                    <!-- Preview Foto -->
                    <div class="text-center mb-3">
                        <div class="position-relative d-inline-block">
                            <?php
                            $av = (!empty($user['foto']) && $user['foto'] != 'default_avatar.png' && file_exists('./assets/uploads/avatars/' . $user['foto']))
                                ? base_url('assets/uploads/avatars/' . $user['foto'])
                                : '';
                            ?>
                            <?php if($av): ?>
                                <img id="avatarPreview" src="<?= $av; ?>" class="rounded-circle shadow-sm" style="width:80px; height:80px; object-fit:cover; border:3px solid #ccfbf1;" alt="Foto Profil">
                            <?php else: ?>
                                <div id="avatarPreview" class="rounded-circle d-inline-flex align-items-center justify-content-center shadow-sm text-white fw-bold" style="width:80px; height:80px; background: linear-gradient(135deg, var(--primary), var(--secondary)); font-size:1.8rem;">
                                    <?= strtoupper(substr($user['nama_lengkap'], 0, 1)); ?>
                                </div>
                            <?php endif; ?>
                            <label for="fotoInput" class="position-absolute bottom-0 end-0 btn btn-sm btn-primary rounded-circle p-1" style="width:28px; height:28px; cursor:pointer;" title="Ganti Foto">
                                <i class="fas fa-camera" style="font-size:.7rem;"></i>
                            </label>
                        </div>
                        <input type="file" id="fotoInput" name="foto" accept="image/*" class="d-none" onchange="previewFoto(this)">
                        <div class="text-muted mt-1" style="font-size:.7rem;">Klik ikon kamera untuk ganti foto (maks. 2MB)</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama_lengkap" value="<?= htmlspecialchars($user['nama_lengkap']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Nomor HP / WhatsApp <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="no_hp" value="<?= htmlspecialchars($user['no_hp']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Alamat Domisili</label>
                        <textarea class="form-control" name="alamat" rows="2" placeholder="Contoh: Jl. Mawar No.5, RT 02/RW 03, Kelurahan..."><?= htmlspecialchars($user['alamat'] ?? ''); ?></textarea>
                    </div>
                    <div class="mb-0">
                        <label class="form-label small fw-bold">Ganti Password <span class="text-muted fw-normal">(kosongkan jika tidak diubah)</span></label>
                        <input type="password" class="form-control" name="password" placeholder="Password baru minimal 5 karakter...">
                    </div>
                </div>
                <div class="modal-footer border-0 px-4 pb-4 pt-2">
                    <button type="button" class="btn btn-light rounded-pill px-3" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold">
                        <i class="fas fa-save me-1"></i>Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function previewFoto(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var preview = document.getElementById('avatarPreview');
            if (preview.tagName === 'IMG') {
                preview.src = e.target.result;
            } else {
                var img = document.createElement('img');
                img.id = 'avatarPreview';
                img.src = e.target.result;
                img.className = 'rounded-circle shadow-sm';
                img.style.cssText = 'width:80px; height:80px; object-fit:cover; border:3px solid #ccfbf1;';
                img.alt = 'Foto Profil';
                preview.parentNode.replaceChild(img, preview);
            }
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
