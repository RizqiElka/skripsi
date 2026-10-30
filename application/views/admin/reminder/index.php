<div class="animate-reveal">
    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-3">
        <div>
            <h3 class="fw-bold mb-1" style="font-family:'Outfit',sans-serif;">Kelola Reminder Kontrol</h3>
            <p class="text-muted small mb-0">Pantau dan tindaklanjuti jadwal kontrol pasien.</p>
        </div>
        <?php
        $menunggu = 0;
        foreach($reminder as $r) { if($r['status'] == 'Menunggu') $menunggu++; }
        if($menunggu > 0): ?>
        <div class="d-flex align-items-center gap-2 px-3 py-2 rounded-3"
             style="background:rgba(245,158,11,.1);border:1px solid rgba(245,158,11,.25);">
            <i class="fas fa-clock" style="color:#f59e0b;"></i>
            <span class="fw-bold small" style="color:#92400e;"><?= $menunggu; ?> reminder menunggu tindakan</span>
        </div>
        <?php endif; ?>
    </div>

    <div class="admin-card overflow-hidden">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th style="width:4%;">#</th>
                        <th style="width:13%;">Tgl Daftar</th>
                        <th style="width:18%;">Nama Pasien</th>
                        <th style="width:14%;">No WA</th>
                        <th style="width:14%;">Tgl Kontrol</th>
                        <th style="width:13%;">Poli Tujuan</th>
                        <th style="width:10%;">Status</th>
                        <th style="width:14%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($reminder as $r): ?>
                    <tr>
                        <td class="text-muted small"><?= $no++; ?></td>
                        <td>
                            <div class="small fw-semibold" style="color:#374151;"><?= date('d M Y', strtotime($r['created_at'])); ?></div>
                            <div style="font-size:.72rem;color:#94a3b8;"><?= date('H:i', strtotime($r['created_at'])); ?> WIB</div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div style="width:34px;height:34px;background:rgba(13,148,136,.1);border-radius:9px;display:flex;align-items:center;justify-content:center;flex-shrink:0;color:#0d9488;font-weight:700;font-size:.8rem;">
                                    <?= strtoupper(substr($r['nama_pasien'],0,1)); ?>
                                </div>
                                <span class="fw-bold small" style="color:#1e293b;"><?= $r['nama_pasien']; ?></span>
                            </div>
                        </td>
                        <td>
                            <a href="https://wa.me/<?= preg_replace('/^0/', '62', $r['no_hp']); ?>"
                               target="_blank"
                               class="d-flex align-items-center gap-1 text-decoration-none"
                               style="color:#059669;font-weight:600;font-size:.83rem;">
                                <i class="fab fa-whatsapp"></i> <?= $r['no_hp']; ?>
                            </a>
                        </td>
                        <td>
                            <span class="badge rounded-pill" style="background:rgba(2,132,199,.1);color:#0284c7;border:1px solid rgba(2,132,199,.2);padding:.35rem .85rem;font-size:.78rem;">
                                <?= date('d M Y', strtotime($r['tanggal_kontrol'])); ?>
                            </span>
                        </td>
                        <td class="small fw-semibold" style="color:#374151;"><?= $r['poli_tujuan']; ?></td>
                        <td>
                            <?php if($r['status'] == 'Menunggu'): ?>
                                <span class="badge rounded-pill" style="background:rgba(245,158,11,.12);color:#92400e;border:1px solid rgba(245,158,11,.3);padding:.35rem .75rem;font-size:.72rem;">
                                    <i class="fas fa-hourglass-half me-1"></i>Menunggu
                                </span>
                            <?php else: ?>
                                <span class="badge rounded-pill" style="background:rgba(16,185,129,.1);color:#065f46;border:1px solid rgba(16,185,129,.2);padding:.35rem .75rem;font-size:.72rem;">
                                    <i class="fas fa-check-circle me-1"></i>Selesai
                                </span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="d-flex flex-column gap-1">
                                <?php if($r['status'] == 'Menunggu'): ?>
                                <a href="<?= base_url('adminreminder/update_status/'.$r['id']); ?>"
                                   class="btn btn-success btn-sm"
                                   onclick="return confirm('Tandai sudah diingatkan?');"
                                   style="font-size:.76rem;">
                                    <i class="fas fa-check me-1"></i>Sudah
                                </a>
                                <?php endif; ?>
                                <a href="<?= base_url('adminreminder/hapus/'.$r['id']); ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Hapus data reminder ini?');"
                                   style="font-size:.76rem;">
                                    <i class="fas fa-trash-alt me-1"></i>Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
