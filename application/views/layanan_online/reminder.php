
<div class="container mb-5 pb-5" style="margin-top:40px;position:relative;z-index:3;">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <a href="<?= base_url('layananonline'); ?>" class="btn btn-light mb-4 rounded-pill px-4 py-2 text-info fw-bold reveal reveal-left shadow-sm">
                <i class="fas fa-arrow-left me-2"></i> Kembali ke Menu
            </a>

            <!-- Flash Messages -->
            <?php if($this->session->flashdata('success_reminder')): ?>
                <div class="alert d-flex align-items-center gap-4 mb-5 reveal reveal-zoom shadow-2xl"
                     role="alert" style="background:#fff;border-left:5px solid #0ea5e9; border-radius:24px; padding:2rem;">
                    <div style="width:60px;height:60px;background:#e0f2fe;border-radius:18px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.8rem;color:#0ea5e9;">
                        <i class="fas fa-clock-rotate-left"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1" style="color:#1e293b; font-family:'Outfit',sans-serif;">Reminder Aktif!</h5>
                        <p class="mb-0 text-muted small"><?= $this->session->flashdata('success_reminder'); ?></p>
                    </div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <div class="card border-0 shadow-lg p-5 reveal reveal-bottom" style="border-radius: 32px;">
                <div class="d-flex align-items-center gap-4 mb-5">
                    <div class="bg-info bg-opacity-10 p-4 rounded-4">
                        <i class="fas fa-clock-rotate-left text-info fs-2"></i>
                    </div>
                    <div>
                        <h2 class="fw-bold mb-1">Reminder Jadwal Kontrol</h2>
                        <p class="text-muted mb-0">Jangan lewatkan jadwal kontrol rutin Anda dengan pengingat otomatis.</p>
                    </div>
                </div>

                <form action="<?= base_url('layananonline/proses_reminder'); ?>" method="post">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-uppercase mb-2">Nama Pasien</label>
                            <input type="text" class="form-control form-control-lg" name="nama_pasien" required placeholder="Nama Lengkap Pasien">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-uppercase mb-2">Nomor WhatsApp</label>
                            <input type="text" class="form-control form-control-lg" name="no_hp" required placeholder="08xxxxxxxxxx">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-uppercase mb-2">Tanggal Kontrol</label>
                            <input type="date" class="form-control form-control-lg" name="tanggal_kontrol" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-uppercase mb-2">Poli Tujuan</label>
                            <select class="form-select form-select-lg" name="id_layanan" required>
                                <option value="" disabled selected>Pilih Poliklinik</option>
                                <?php foreach($layanan as $l): ?>
                                <option value="<?= htmlspecialchars($l['id']) ?>"><?= htmlspecialchars($l['nama_layanan']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold small text-uppercase mb-2">Keterangan (Opsional)</label>
                            <textarea class="form-control" name="keterangan" rows="3" placeholder="Misal: Kontrol pasca operasi, cek gula darah, dll..."></textarea>
                        </div>
                        <div class="col-12 text-end pt-3">
                            <button type="submit" class="btn px-5 py-3 w-100 w-md-auto text-white shadow-lg" style="background: linear-gradient(135deg, #0ea5e9, #0284c7); border: none; border-radius: 18px; font-weight: 700;">
                                <i class="fas fa-bell me-2"></i> Aktifkan Pengingat
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
