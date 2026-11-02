<style>
    .riwayat-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
    }
    .table-riwayat thead th {
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        color: #64748b;
        background: #f8fafc;
        border-bottom: 1.5px solid #e2e8f0 !important;
        padding: 0.75rem 1rem;
    }
    .table-riwayat tbody td {
        font-size: 0.84rem;
        color: #1e293b;
        padding: 0.85rem 1rem;
        border-bottom: 1px solid #f1f5f9 !important;
        vertical-align: middle;
    }
</style>

<div class="container mb-5 pb-4" style="margin-top:25px;position:relative;z-index:3;">
    <div class="row justify-content-center">
        <div class="col-lg-11 col-xl-10">

            <!-- Breadcrumb & Back Action -->
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                <a href="<?= base_url('auth/profil'); ?>" class="btn btn-sm btn-light border rounded-pill px-3 py-1.5 text-muted fw-bold shadow-sm d-inline-flex align-items-center gap-1.5" style="font-size:0.8rem; background:#fff;">
                    <i class="fas fa-arrow-left text-primary"></i> Kembali ke Profil
                </a>
                <a href="<?= base_url('uhc'); ?>" class="btn btn-sm btn-primary rounded-pill px-3.5 py-1.5 fw-bold shadow-sm d-inline-flex align-items-center gap-1.5" style="font-size:0.8rem;">
                    <i class="fas fa-plus"></i> Usulan Baru
                </a>
            </div>

            <!-- Flash Success -->
            <?php if($this->session->flashdata('success_uhc')): ?>
                <div class="alert d-flex align-items-center gap-3 mb-3" style="background:#f0fdf4; border:1px solid #bbf7d0; border-radius:14px; padding:0.85rem 1.25rem;">
                    <i class="fas fa-check-circle text-success fs-5"></i>
                    <div class="small fw-semibold" style="color:#14532d;"><?= $this->session->flashdata('success_uhc'); ?></div>
                </div>
            <?php endif; ?>

            <!-- Main Content Card -->
            <div class="riwayat-card shadow-sm p-4 p-md-4 mb-4">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4 pb-3 border-bottom">
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-3 d-flex align-items-center justify-content-center" style="width:48px; height:48px; background:rgba(13,148,136,.1); color:var(--primary); font-size:1.3rem;">
                            <i class="fas fa-hand-holding-medical"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-0 text-dark" style="font-family:'Outfit',sans-serif; letter-spacing:-0.3px;">
                                Riwayat Pengajuan UHC
                            </h4>
                            <p class="text-muted small mb-0">Pantau seluruh status dan disposisi berkas Usulan UHC Anda</p>
                        </div>
                    </div>
                    <div>
                        <span class="badge rounded-pill px-3 py-1.5 fw-semibold" style="background:#f1f5f9; color:#475569; font-size:0.78rem;">
                            Total: <?= count($pengajuan); ?> Pengajuan
                        </span>
                    </div>
                </div>

                <?php if(empty($pengajuan)): ?>
                    <div class="text-center py-5">
                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width:64px; height:64px; background:rgba(13,148,136,.06); color:var(--primary);">
                            <i class="fas fa-folder-open fs-3 opacity-50"></i>
                        </div>
                        <h6 class="text-dark fw-bold mb-1">Belum Ada Pengajuan UHC</h6>
                        <p class="text-muted small mb-3">Anda belum memiliki riwayat usulan Universal Health Coverage.</p>
                        <a href="<?= base_url('uhc'); ?>" class="btn btn-sm btn-primary rounded-pill px-3.5 py-2 fw-bold">
                            <i class="fas fa-plus me-1"></i> Buat Usulan UHC Sekarang
                        </a>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-riwayat table-hover align-middle mb-0">
                            <thead>
                                <tr class="text-uppercase">
                                    <th style="width: 50px;">No</th>
                                    <th>Tanggal</th>
                                    <th>NIK</th>
                                    <th>Nama Lengkap</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                    <th class="text-center" style="width: 100px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($pengajuan as $p): ?>
                                <tr>
                                    <td class="fw-bold text-muted"><?= $no++; ?></td>
                                    <td><?= date('d M Y', strtotime($p['created_at'])); ?></td>
                                    <td><span class="font-monospace fw-semibold text-dark"><?= $p['nik']; ?></span></td>
                                    <td class="fw-semibold text-dark"><?= $p['nama_lengkap']; ?></td>
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
                                        $badge_class = isset($badge_map[$p['status']]) ? $badge_map[$p['status']] : 'bg-secondary text-white';
                                        ?>
                                        <span class="badge <?= $badge_class; ?> px-2.5 py-1.5 rounded-pill fw-medium" style="font-size:0.72rem;"><?= $p['status']; ?></span>
                                    </td>
                                    <td class="small text-muted"><?= $p['keterangan'] ?: '-'; ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('uhc/detail/' . $p['id']); ?>" class="btn btn-sm d-inline-flex align-items-center gap-1 text-decoration-none" style="background:#f0fdfa; color:var(--primary-dark); border:1px solid #ccfbf1; border-radius:8px; font-size:.75rem; padding:.32rem .75rem; font-weight:600; transition:all .2s ease;">
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
