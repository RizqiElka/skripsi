
<div class="container mb-5 pb-5" style="margin-top:40px;position:relative;z-index:3;">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <a href="<?= base_url('layananonline'); ?>" class="btn btn-light mb-4 rounded-pill px-4 py-2 text-primary fw-bold reveal reveal-left shadow-sm">
                <i class="fas fa-arrow-left me-2"></i> Kembali ke Menu
            </a>

            <!-- Success -->
            <?php if($this->session->flashdata('success_reaktivasi')): ?>
                <div class="alert d-flex align-items-center gap-3 mb-4 reveal reveal-zoom" style="background:#f0fdf4; border:1px solid #bbf7d0; border-radius:20px; padding:1.2rem 1.5rem;">
                    <i class="fas fa-check-circle text-success fs-4"></i>
                    <div class="small fw-semibold" style="color:#14532d;"><?= $this->session->flashdata('success_reaktivasi'); ?></div>
                </div>
            <?php endif; ?>

            <div class="card border-0 shadow-lg p-5 reveal reveal-bottom" style="border-radius: 32px;">
                <div class="d-flex align-items-center gap-4 mb-5">
                    <div class="bg-info bg-opacity-10 p-4 rounded-4">
                        <i class="fas fa-clock-rotate-left text-info fs-2"></i>
                    </div>
                    <div>
                        <h2 class="fw-bold mb-1">Riwayat Pengajuan Reaktivasi</h2>
                        <p class="text-muted mb-0">Pantau seluruh status pengajuan Reaktivasi Dinsos Anda.</p>
                    </div>
                </div>

                <?php if(empty($pengajuan)): ?>
                    <div class="text-center py-5">
                        <div class="bg-light rounded-4 p-5 d-inline-block mb-4">
                            <i class="fas fa-inbox text-muted" style="font-size:3rem;opacity:.3;"></i>
                        </div>
                        <h5 class="text-muted fw-bold">Belum Ada Pengajuan</h5>
                        <p class="text-muted small">Anda belum pernah mengajukan Reaktivasi Dinsos.</p>
                        <a href="<?= base_url('reaktivasi'); ?>" class="btn btn-premium px-4 py-2 mt-2">
                            <i class="fas fa-plus me-2"></i> Buat Pengajuan Baru
                        </a>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>No KK</th>
                                    <th>No HP</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($pengajuan as $p): ?>
                                <tr>
                                    <td class="fw-bold"><?= $no++; ?></td>
                                    <td><?= date('d M Y', strtotime($p['created_at'])); ?></td>
                                    <td><code><?= $p['nik']; ?></code></td>
                                    <td><?= $p['no_hp']; ?></td>
                                    <td>
                                        <?php
                                        $badge_map = [
                                            'Diajukan' => 'bg-warning text-dark',
                                            'Diverifikasi Admin' => 'bg-info text-white',
                                            'Sedang Diproses' => 'bg-primary',
                                            'Menunggu Persetujuan' => 'bg-secondary',
                                            'Selesai' => 'bg-success',
                                            'Ditolak' => 'bg-danger'
                                        ];
                                        $badge_class = isset($badge_map[$p['status']]) ? $badge_map[$p['status']] : 'bg-secondary';
                                        ?>
                                        <span class="badge <?= $badge_class; ?> px-3 py-2 rounded-pill"><?= $p['status']; ?></span>
                                    </td>
                                    <td class="small text-muted"><?= $p['keterangan'] ?: '-'; ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('reaktivasi/detail/' . $p['id']); ?>" class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-bold">
                                            <i class="fas fa-eye me-1"></i> Detail
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
