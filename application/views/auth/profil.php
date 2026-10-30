
<style>
    .profil-tab .nav-link {
        color: var(--text-muted);
        border-radius: 8px !important;
        font-weight: 600;
        transition: var(--transition);
        padding: 0.5rem 1rem;
        font-family: 'Outfit', sans-serif;
        font-size: .8rem;
    }
    .profil-tab .nav-link:hover {
        color: var(--primary);
        background: rgba(13,148,136,.06);
    }
    .profil-tab .nav-link.active {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark)) !important;
        color: #fff !important;
        box-shadow: 0 3px 10px rgba(13,148,136,.15) !important;
    }
    .info-box-item {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 0.75rem 0.9rem;
        transition: var(--transition);
        font-size: .8rem;
    }
    .info-box-item:hover {
        border-color: var(--primary);
        background: #f0fdfa;
    }
    .table-custom thead th {
        font-size: .75rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        color: var(--text-muted);
        border-bottom: 1.5px solid #e2e8f0 !important;
        padding: 0.75rem 1rem;
    }
    .table-custom tbody td {
        padding: 0.85rem 1rem;
        font-size: .82rem;
        color: var(--text-main);
        border-bottom: 1px solid #f1f5f9 !important;
    }
</style>

<div class="container mb-4 pb-4" style="margin-top:20px;position:relative;z-index:3;">
    <div class="row justify-content-center g-4">
        
        <!-- Sidebar Profil -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm p-3.5 reveal reveal-left" style="border-radius: 16px;">
                <div class="text-center mb-3.5">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-2.5 shadow-sm text-white" 
                         style="width:72px; height:72px; background: linear-gradient(135deg, var(--primary), var(--secondary));">
                        <i class="fas fa-user-circle fs-1"></i>
                    </div>
                    <h5 class="fw-bold mb-1" style="font-family:'Outfit',sans-serif; color:var(--dark); font-size:1.05rem;"><?= $user['nama_lengkap']; ?></h5>
                    <span class="badge px-2.5 py-1.5 rounded-pill fw-semibold" style="background:#f0fdfa; color:var(--primary-dark); font-size:.7rem; border:1px solid #ccfbf1;">
                        <i class="fas fa-shield-halved me-1"></i> Akun Masyarakat
                    </span>
                </div>

                <div class="d-flex flex-column gap-2.5">
                    <div class="info-box-item d-flex align-items-center gap-3">
                        <div style="width:32px;height:32px;background:rgba(13,148,136,.08);border-radius:8px;display:flex;align-items:center;justify-content:center;color:var(--primary);flex-shrink:0;font-size:.85rem;">
                            <i class="fas fa-id-card"></i>
                        </div>
                        <div>
                            <div class="text-muted small" style="font-size:.68rem; margin-bottom:1px;">NIK</div>
                            <div class="fw-bold text-dark" style="font-size:.8rem; letter-spacing:0.3px;"><?= $user['nik']; ?></div>
                        </div>
                    </div>

                    <div class="info-box-item d-flex align-items-center gap-3">
                        <div style="width:32px;height:32px;background:rgba(13,148,136,.08);border-radius:8px;display:flex;align-items:center;justify-content:center;color:var(--primary);flex-shrink:0;font-size:.85rem;">
                            <i class="fas fa-user"></i>
                        </div>
                        <div>
                            <div class="text-muted small" style="font-size:.68rem; margin-bottom:1px;">Username</div>
                            <div class="fw-bold text-dark" style="font-size:.8rem;"><?= $user['username']; ?></div>
                        </div>
                    </div>

                    <div class="info-box-item d-flex align-items-center gap-3">
                        <div style="width:32px;height:32px;background:rgba(13,148,136,.08);border-radius:8px;display:flex;align-items:center;justify-content:center;color:var(--primary);flex-shrink:0;font-size:.85rem;">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>
                            <div class="text-muted small" style="font-size:.68rem; margin-bottom:1px;">Nomor HP / WhatsApp</div>
                            <div class="fw-bold text-dark" style="font-size:.8rem;"><?= $user['no_hp']; ?></div>
                        </div>
                    </div>
                </div>

                <a href="<?= base_url('auth/logout_user'); ?>" class="btn btn-danger bg-opacity-10 text-danger border-0 w-100 mt-4 rounded-3 py-2 fw-bold d-flex align-items-center justify-content-center gap-1.5" style="background:#fef2f2; color:#ef4444 !important; font-size:.82rem;">
                    <i class="fas fa-right-from-bracket"></i> Keluar Akun
                </a>
            </div>
        </div>

        <!-- Content Riwayat Pengajuan -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4 reveal reveal-right" style="border-radius: 16px;">
                <div class="mb-4">
                    <h5 class="fw-bold mb-1" style="font-family:'Outfit',sans-serif; color:var(--dark); font-size:1.1rem;">
                        <i class="fas fa-folder-open text-primary me-2"></i>Riwayat Pengajuan Saya
                    </h5>
                    <p class="text-muted small mb-0" style="font-size:.78rem;">Kelola dan pantau seluruh status pengajuan Usulan UHC dan Reaktivasi Dinsos Anda.</p>
                </div>

                <!-- Custom Nav Tabs -->
                <ul class="nav nav-pills profil-tab mb-4 p-1 rounded-3 border" style="background:#f8fafc; display:inline-flex;" id="pills-tab" role="tablist">
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
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <!-- Tab UHC -->
                    <div class="tab-pane fade show active" id="pills-uhc" role="tabpanel">
                        <?php if(empty($pengajuan_uhc)): ?>
                            <div class="text-center py-5">
                                <div class="p-3 rounded-circle d-inline-flex mb-2.5" style="background:rgba(13,148,136,.06);">
                                    <i class="fas fa-inbox text-primary fs-3 opacity-50"></i>
                                </div>
                                <h6 class="text-muted fw-bold mb-1" style="font-size:.85rem;">Belum Ada Pengajuan UHC</h6>
                                <p class="text-muted small mb-3">Anda belum memiliki riwayat pengajuan Usulan UHC.</p>
                                <a href="<?= base_url('uhc'); ?>" class="btn btn-premium btn-sm rounded-pill px-3 py-1.5" style="font-size:.78rem;">
                                    <i class="fas fa-plus me-1"></i> Buat Usulan UHC
                                </a>
                            </div>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-custom align-middle mb-0">
                                    <thead>
                                        <tr class="text-uppercase">
                                            <th style="width: 50px;">No</th>
                                            <th>Tanggal</th>
                                            <th>NIK</th>
                                            <th>Status</th>
                                            <th class="text-center" style="width: 100px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach($pengajuan_uhc as $u): ?>
                                        <tr>
                                            <td class="fw-bold"><?= $no++; ?></td>
                                            <td><?= date('d M Y', strtotime($u['created_at'])); ?></td>
                                            <td class="fw-semibold text-dark" style="letter-spacing:0.3px;"><?= $u['nik']; ?></td>
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
                                                <span class="badge <?= $badge_class; ?> px-2.5 py-1.5 rounded-pill fw-medium" style="font-size:.72rem;"><?= $u['status']; ?></span>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= base_url('uhc/detail/' . $u['id']); ?>" class="btn btn-sm d-inline-flex align-items-center gap-1 text-decoration-none" style="background:#f0fdfa; color:var(--primary-dark); border:1px solid #ccfbf1; border-radius:8px; font-size:.75rem; padding:.35rem .75rem; font-weight:600; transition:var(--transition);">
                                                    <i class="fas fa-eye" style="font-size:.75rem;"></i> Detail
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
                                <div class="p-3 rounded-circle d-inline-flex mb-2.5" style="background:rgba(13,148,136,.06);">
                                    <i class="fas fa-inbox text-primary fs-3 opacity-50"></i>
                                </div>
                                <h6 class="text-muted fw-bold mb-1" style="font-size:.85rem;">Belum Ada Pengajuan Reaktivasi</h6>
                                <p class="text-muted small mb-3">Anda belum memiliki riwayat pengajuan Reaktivasi Dinsos.</p>
                                <a href="<?= base_url('reaktivasi'); ?>" class="btn btn-premium btn-sm rounded-pill px-3 py-1.5" style="font-size:.78rem;">
                                    <i class="fas fa-plus me-1"></i> Buat Reaktivasi Dinsos
                                </a>
                            </div>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-custom align-middle mb-0">
                                    <thead>
                                        <tr class="text-uppercase">
                                            <th style="width: 50px;">No</th>
                                            <th>Tanggal</th>
                                            <th>NIK</th>
                                            <th>No HP</th>
                                            <th>Status</th>
                                            <th class="text-center" style="width: 100px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach($pengajuan_reaktivasi as $r): ?>
                                        <tr>
                                            <td class="fw-bold"><?= $no++; ?></td>
                                            <td><?= date('d M Y', strtotime($r['created_at'])); ?></td>
                                            <td class="fw-semibold text-dark" style="letter-spacing:0.3px;"><?= $r['nik']; ?></td>
                                            <td><?= $r['no_hp']; ?></td>
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
                                                <span class="badge <?= $badge_class; ?> px-2.5 py-1.5 rounded-pill fw-medium" style="font-size:.72rem;"><?= $r['status']; ?></span>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= base_url('reaktivasi/detail/' . $r['id']); ?>" class="btn btn-sm d-inline-flex align-items-center gap-1 text-decoration-none" style="background:#f0fdfa; color:var(--primary-dark); border:1px solid #ccfbf1; border-radius:8px; font-size:.75rem; padding:.35rem .75rem; font-weight:600; transition:var(--transition);">
                                                    <i class="fas fa-eye" style="font-size:.75rem;"></i> Detail
                                                </a>
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
