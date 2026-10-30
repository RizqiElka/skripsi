<div class="animate-reveal">
    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-3">
        <div>
            <h3 class="fw-bold mb-1" style="font-family:'Outfit',sans-serif;">Kelola Profil Puskesmas</h3>
            <p class="text-muted small mb-0">Perbarui informasi, visi misi, dan kontak puskesmas.</p>
        </div>
    </div>

    <form action="<?= base_url('adminprofil'); ?>" method="post" enctype="multipart/form-data">
        <div class="row g-4">
            <!-- Identitas -->
            <div class="col-12">
                <div class="admin-card p-4">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div style="width:42px;height:42px;background:rgba(13,148,136,.1);border-radius:12px;display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-hospital" style="color:#0d9488;"></i>
                        </div>
                        <h5 class="fw-bold mb-0" style="font-family:'Outfit',sans-serif;">Identitas Puskesmas</h5>
                    </div>
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Nama Puskesmas <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nama_puskesmas"
                                   value="<?= $profil['nama_puskesmas']; ?>" required
                                   placeholder="Contoh: Puskesmas Kecamatan Sehat">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control" name="alamat" rows="2"
                                      placeholder="Jl. ..."><?= $profil['alamat']; ?></textarea>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Nomor Telepon / Kontak</label>
                            <input type="text" class="form-control" name="telepon"
                                   value="<?= $profil['telepon']; ?>" placeholder="(021) ...">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Jam Operasional</label>
                            <textarea class="form-control" name="jam_operasional" rows="2"
                                      placeholder="Sen-Jum: 07.30 - 14.00"><?= $profil['jam_operasional']; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Visi Misi -->
            <div class="col-12">
                <div class="admin-card p-4">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div style="width:42px;height:42px;background:rgba(2,132,199,.1);border-radius:12px;display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-bullseye" style="color:#0284c7;"></i>
                        </div>
                        <h5 class="fw-bold mb-0" style="font-family:'Outfit',sans-serif;">Visi &amp; Misi</h5>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-5">
                            <label class="form-label">Visi</label>
                            <textarea class="form-control" name="visi" rows="4"
                                      placeholder="Tuliskan pernyataan visi..."><?= $profil['visi']; ?></textarea>
                        </div>
                        <div class="col-md-7">
                            <label class="form-label">Misi</label>
                            <textarea class="form-control" name="misi" rows="4"
                                      placeholder="Tuliskan poin-poin misi..."><?= $profil['misi']; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sejarah -->
            <div class="col-12">
                <div class="admin-card p-4">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div style="width:42px;height:42px;background:rgba(124,58,237,.1);border-radius:12px;display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-timeline" style="color:#7c3aed;"></i>
                        </div>
                        <h5 class="fw-bold mb-0" style="font-family:'Outfit',sans-serif;">Sejarah Singkat</h5>
                    </div>
                    <textarea class="form-control" name="sejarah" rows="5"
                              placeholder="Tuliskan sejarah singkat puskesmas..."><?= $profil['sejarah']; ?></textarea>
                </div>
            </div>

            <!-- Gambar Wilayah -->
            <div class="col-12">
                <div class="admin-card p-4 text-white" style="background: linear-gradient(135deg, #475569 0%, #1e293b 100%);">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div style="width:42px;height:42px;background:rgba(255,255,255,.15);border-radius:12px;display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-map-location-dot" style="color:#fff;"></i>
                        </div>
                        <h5 class="fw-bold mb-0" style="font-family:'Outfit',sans-serif;">Foto Cakupan Wilayah</h5>
                    </div>
                    <div class="row align-items-center g-4">
                        <div class="col-md-4">
                            <?php if(!empty($profil['gambar_wilayah'])): ?>
                                <img src="<?= base_url('assets/uploads/'.$profil['gambar_wilayah']); ?>" class="rounded-4 w-100 shadow-lg" style="height:160px;object-fit:cover;">
                            <?php else: ?>
                                <div class="rounded-4 border-dashed d-flex align-items-center justify-content-center text-center p-4 border-2" style="border-color:rgba(255,255,255,.2);height:160px;">
                                    <div class="small opacity-50">Belum ada foto wilayah kerja.<br>Menggunakan default Unsplash.</div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label text-white opacity-75">Unggah Foto Baru</label>
                            <input type="file" class="form-control" name="gambar_wilayah" accept="image/*" style="background:rgba(255,255,255,.1);border-color:rgba(255,255,255,.2) !important;color:#fff;">
                            <p class="small mt-2 opacity-50 mb-0">Rekomendasi ukuran: 1200x800px. Foto ini akan muncul di seksi 'Cakupan Layanan' halaman depan.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="col-12 d-flex justify-content-end gap-3">
                <button type="reset" class="btn" style="border:1.5px solid #e2e8f0;border-radius:12px;font-weight:600;padding:.6rem 1.5rem;color:#64748b;">
                    <i class="fas fa-undo me-2"></i>Reset
                </button>
                <button type="submit" class="btn btn-primary px-5">
                    <i class="fas fa-save me-2"></i>Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
</div>
