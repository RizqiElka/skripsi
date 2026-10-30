<div class="animate-reveal">
    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-3">
        <div>
            <h3 class="fw-bold mb-1" style="font-family:'Outfit',sans-serif;">Kelola Konsultasi Medis</h3>
            <p class="text-muted small mb-0">Balas dan kelola pesan konsultasi dari pasien.</p>
        </div>
        <?php
        $belum = 0;
        foreach($konsultasi as $k) { if($k['status'] == 'Belum Dijawab') $belum++; }
        if($belum > 0): ?>
        <div class="d-flex align-items-center gap-2 px-3 py-2 rounded-3"
             style="background:rgba(245,158,11,.1);border:1px solid rgba(245,158,11,.25);">
            <i class="fas fa-bell" style="color:#f59e0b;"></i>
            <span class="fw-bold small" style="color:#92400e;"><?= $belum; ?> pesan belum dijawab</span>
        </div>
        <?php endif; ?>
    </div>

    <div class="admin-card overflow-hidden">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th style="width:4%;">#</th>
                        <th style="width:13%;">Waktu</th>
                        <th style="width:16%;">Pengirim</th>
                        <th style="width:17%;">Kontak</th>
                        <th style="width:28%;">Keluhan</th>
                        <th style="width:10%;">Status</th>
                        <th style="width:12%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($konsultasi as $k): ?>
                    <tr>
                        <td class="text-muted small"><?= $no++; ?></td>
                        <td>
                            <div class="small fw-semibold" style="color:#374151;"><?= date('d M Y', strtotime($k['created_at'])); ?></div>
                            <div style="font-size:.72rem;color:#94a3b8;"><?= date('H:i', strtotime($k['created_at'])); ?> WIB</div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div style="width:34px;height:34px;background:linear-gradient(135deg,#0d9488,#0284c7);border-radius:9px;display:flex;align-items:center;justify-content:center;flex-shrink:0;color:#fff;font-weight:700;font-size:.78rem;">
                                    <?= strtoupper(substr($k['nama_pengirim'],0,1)); ?>
                                </div>
                                <span class="fw-bold small"><?= $k['nama_pengirim']; ?></span>
                            </div>
                        </td>
                        <td class="small text-muted">
                            <div><i class="fas fa-envelope me-1"></i><?= $k['email_hp']; ?></div>
                            <div class="mt-1"><i class="fab fa-whatsapp me-1 text-success"></i><?= !empty($k['no_wa']) ? $k['no_wa'] : '-'; ?></div>
                        </td>
                        <td class="small text-muted"><?= substr($k['pesan'],0,70); ?>…</td>
                        <td>
                            <?php if($k['status'] == 'Belum Dijawab'): ?>
                                <span class="badge rounded-pill" style="background:rgba(245,158,11,.12);color:#92400e;border:1px solid rgba(245,158,11,.25);padding:.35rem .75rem;font-size:.72rem;">
                                    <i class="fas fa-clock me-1"></i>Baru
                                </span>
                            <?php else: ?>
                                <span class="badge rounded-pill" style="background:rgba(16,185,129,.1);color:#065f46;border:1px solid rgba(16,185,129,.2);padding:.35rem .75rem;font-size:.72rem;">
                                    <i class="fas fa-check-double me-1"></i>Dijawab
                                </span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalJawab<?= $k['id']; ?>">
                                    <i class="fas fa-reply me-1"></i>Balas
                                </button>
                                <a href="<?= base_url('adminkonsultasi/hapus/'.$k['id']); ?>" class="btn btn-danger btn-sm"
                                   onclick="return confirm('Hapus pesan ini?');" title="Hapus">
                                    <i class="fas fa-trash-alt"></i>
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

<!-- Modals Jawab -->
<?php foreach($konsultasi as $k): ?>
<div class="modal fade" id="modalJawab<?= $k['id']; ?>" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-reply me-2" style="color:#0d9488;"></i>Balas Konsultasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('adminkonsultasi/jawab'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?= $k['id']; ?>">
                    <!-- Pesan pasien -->
                    <div class="p-4 rounded-3 mb-4" style="background:#f8fafc;border:1px solid #e2e8f0;">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div style="width:38px;height:38px;background:linear-gradient(135deg,#0d9488,#0284c7);border-radius:10px;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:.85rem;flex-shrink:0;">
                                <?= strtoupper(substr($k['nama_pengirim'],0,1)); ?>
                            </div>
                            <div>
                                <div class="fw-bold small"><?= $k['nama_pengirim']; ?></div>
                                <div style="font-size:.75rem;color:#64748b;">
                                    <?= $k['email_hp']; ?> | WA: <?= !empty($k['no_wa']) ? $k['no_wa'] : '-'; ?> &mdash; <?= date('d M Y, H:i', strtotime($k['created_at'])); ?>
                                </div>
                            </div>
                        </div>
                        <p class="mb-0 small lh-lg" style="color:#374151;"><?= nl2br(htmlspecialchars($k['pesan'])); ?></p>
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Tulis Jawaban / Balasan Medis <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="jawaban" rows="7" required
                                  placeholder="Tuliskan jawaban medis Anda di sini dengan jelas dan profesional..."><?= $k['jawaban']; ?></textarea>
                        <div class="form-text mt-2"><i class="fas fa-info-circle me-1"></i>Jawaban ini akan tersimpan sebagai arsip. Hubungi pasien secara manual melalui email/WhatsApp yang dicantumkan.</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style="border:1.5px solid #e2e8f0;border-radius:10px;font-weight:600;padding:.5rem 1.25rem;color:#64748b;" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save me-2"></i>Simpan Jawaban</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>
