<div class="animate-reveal">
    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-3">
        <div>
            <h3 class="fw-bold mb-1" style="font-family:'Outfit',sans-serif;">Kelola Artikel &amp; Berita</h3>
            <p class="text-muted small mb-0">Tulis, publikasikan, dan kelola artikel kesehatan.</p>
        </div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="fas fa-plus me-2"></i>Tulis Artikel Baru
        </button>
    </div>

    <div class="admin-card overflow-hidden">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th style="width:5%;">#</th>
                        <th style="width:14%;">Tanggal</th>
                        <th style="width:35%;">Judul Artikel</th>
                        <th style="width:34%;">Cuplikan Isi</th>
                        <th style="width:12%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($artikel)): ?>
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <div style="color:#94a3b8;">
                                <i class="fas fa-newspaper fa-2x mb-2 d-block"></i>
                                <span class="small">Belum ada artikel. Klik <strong>Tulis Artikel Baru</strong> untuk mulai.</span>
                            </div>
                        </td>
                    </tr>
                    <?php else: ?>
                    <?php $no=1; foreach($artikel as $a): ?>
                    <tr>
                        <td class="text-muted small"><?= $no++; ?></td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div style="width:32px;height:32px;background:rgba(2,132,199,.1);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                    <i class="fas fa-calendar-alt" style="color:#0284c7;font-size:.7rem;"></i>
                                </div>
                                <span class="small fw-semibold"><?= date('d M Y', strtotime($a['tanggal'])); ?></span>
                            </div>
                        </td>
                        <td>
                            <div class="fw-bold" style="font-size:.9rem;color:#1e293b;line-height:1.35;"><?= htmlspecialchars($a['judul']); ?></div>
                        </td>
                        <td class="text-muted small"><?= substr(strip_tags($a['isi']), 0, 80); ?>…</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="<?= base_url('adminartikel/hapus/'.$a['id']); ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin ingin menghapus artikel \'<?= htmlspecialchars($a['judul']); ?>\'?');">
                                    <i class="fas fa-trash-alt me-1"></i>Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah Artikel -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div style="width:36px;height:36px;background:rgba(13,148,136,.1);border-radius:10px;display:flex;align-items:center;justify-content:center;">
                        <i class="fas fa-pen-to-square" style="color:#0d9488;font-size:.85rem;"></i>
                    </div>
                    <h5 class="modal-title">Tulis Artikel Baru</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('adminartikel/tambah'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Judul Artikel <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="judul" required
                               placeholder="Masukkan judul artikel yang menarik...">
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Terbit <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="tanggal" value="<?= date('Y-m-d') ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Gambar <span class="text-muted">(Opsional)</span></label>
                            <input type="file" class="form-control" name="gambar" accept="image/*">
                        </div>
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Isi Artikel <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="isi" rows="12" required
                                  placeholder="Tuliskan isi artikel di sini... Anda bisa menggunakan HTML dasar untuk formatting."></textarea>
                        <div class="form-text text-muted mt-1"><i class="fas fa-info-circle me-1"></i>Mendukung HTML dasar: &lt;b&gt;, &lt;i&gt;, &lt;ul&gt;, &lt;li&gt;, &lt;p&gt;, dll.</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style="border:1.5px solid #e2e8f0;border-radius:10px;font-weight:600;padding:.5rem 1.25rem;color:#64748b;" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-paper-plane me-2"></i>Publikasikan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
