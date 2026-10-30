<style>
    .btn-gender {
        transition: var(--transition);
        border-width: 2.5px !important;
        font-weight: 800 !important;
        position: relative;
        font-family: 'Outfit', sans-serif;
    }
    .btn-gender-boy { color: #0284c7 !important; border-color: #0284c7 !important; background: transparent !important; }
    .btn-gender-boy:hover { background: rgba(2, 132, 199, 0.05) !important; transform: translateY(-3px); }
    .btn-check:checked + .btn-gender-boy {
        background: linear-gradient(135deg, #0284c7, #0369a1) !important;
        color: #fff !important; border-color: #0284c7 !important;
        box-shadow: 0 10px 25px rgba(2, 132, 199, 0.3) !important;
    }
    .btn-gender-girl { color: #f43f5e !important; border-color: #f43f5e !important; background: transparent !important; }
    .btn-gender-girl:hover { background: rgba(244, 63, 94, 0.05) !important; transform: translateY(-3px); }
    .btn-check:checked + .btn-gender-girl {
        background: linear-gradient(135deg, #f43f5e, #e11d48) !important;
        color: #fff !important; border-color: #f43f5e !important;
        box-shadow: 0 10px 25px rgba(244, 63, 94, 0.3) !important;
    }
</style>

<section class="py-5" style="background: linear-gradient(160deg, #f8fafc 0%, #f1f5f9 100%); min-height: 80vh;">
    <div class="container py-5">

        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="bg-white rounded-5 shadow-2xl overflow-hidden border-0 reveal reveal-zoom">
                    <div class="row g-0">
                        <!-- Form Side -->
                        <div class="col-md-5 p-5" style="background:#f8fafc; border-right: 1px solid #f1f5f9;">
                            <div class="d-flex align-items-center gap-3 mb-5">
                                <div style="width:48px;height:48px;background:var(--primary-light);border-radius:14px;display:flex;align-items:center;justify-content:center;color:var(--primary);font-size:1.2rem;"><i class="fas fa-clipboard-list"></i></div>
                                <h4 class="fw-bold mb-0" style="font-family:'Outfit',sans-serif; letter-spacing:-0.5px;">Input Data Anak</h4>
                            </div>
                            
                            <form action="<?= base_url('deteksi/stunting'); ?>" method="post">
                                <div class="mb-4">
                                    <label class="form-label fw-bold small text-uppercase text-muted mb-2" style="letter-spacing:1px;">Nama Anak</label>
                                    <input type="text" class="form-control form-control-lg rounded-4 bg-white" name="nama_anak" value="<?= isset($input) ? $input['nama_anak'] : ''; ?>" placeholder="Masukkan Nama Lengkap Anak" required>
                                </div>
                                
                                <div class="mb-4">
                                    <label class="form-label fw-bold small text-uppercase text-muted mb-2" style="letter-spacing:1px;">Nama Orang Tua</label>
                                    <input type="text" class="form-control form-control-lg rounded-4 bg-white" name="nama_ortu" value="<?= isset($input) ? $input['nama_ortu'] : ''; ?>" placeholder="Masukkan Nama Ayah/Ibu" required>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold small text-uppercase text-muted mb-3" style="letter-spacing:1px;">Jenis Kelamin</label>
                                    <div class="d-flex gap-3">
                                        <input type="radio" class="btn-check" name="gender" id="boy" value="L" <?= (!isset($input) || $input['gender'] == 'L') ? 'checked' : ''; ?>>
                                        <label class="btn btn-gender btn-gender-boy w-100 py-3 rounded-4 shadow-sm" for="boy">
                                            <i class="fas fa-child mb-2 fa-lg"></i><br>Laki-laki
                                        </label>

                                        <input type="radio" class="btn-check" name="gender" id="girl" value="P" <?= (isset($input) && $input['gender'] == 'P') ? 'checked' : ''; ?>>
                                        <label class="btn btn-gender btn-gender-girl w-100 py-3 rounded-4 shadow-sm" for="girl">
                                            <i class="fas fa-child-dress mb-2 fa-lg"></i><br>Perempuan
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold small text-uppercase text-muted mb-3" style="letter-spacing:1px;">Umur (Bulan)</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control form-control-lg rounded-start-4 border-end-0 bg-white" name="umur" value="<?= isset($input) ? $input['umur'] : '12'; ?>" min="0" max="60" required>
                                        <span class="input-group-text bg-white border-start-0 rounded-end-4 text-muted fw-bold small">BLN</span>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold small text-uppercase text-muted mb-2" style="letter-spacing:1px;">Tinggi / Panjang Badan <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="number" step="0.1" class="form-control form-control-lg rounded-start-4 border-end-0 bg-white" name="tinggi" value="<?= isset($input) ? $input['tinggi'] : ''; ?>" placeholder="0.0" required>
                                        <span class="input-group-text bg-white border-start-0 rounded-end-4 text-muted fw-bold small">CM</span>
                                    </div>
                                </div>

                                <div class="mb-5">
                                    <label class="form-label fw-bold small text-uppercase text-muted mb-2" style="letter-spacing:1px;">Berat Badan (Opsional)</label>
                                    <div class="input-group">
                                        <input type="number" step="0.1" class="form-control form-control-lg rounded-start-4 border-end-0 bg-white" name="berat" value="<?= isset($input['berat']) ? $input['berat'] : ''; ?>" placeholder="0.0">
                                        <span class="input-group-text bg-white border-start-0 rounded-end-4 text-muted fw-bold small">KG</span>
                                    </div>
                                </div>

                                <button type="submit" name="hitung" value="1" class="btn btn-primary w-100 py-3.5 rounded-4 fw-bold shadow-lg mb-3" style="background: linear-gradient(135deg, var(--primary), #0284c7); border:none; font-family:'Outfit',sans-serif; font-size:1rem; letter-spacing:1px;">
                                    <i class="fas fa-magnifying-glass-chart me-2"></i> ANALISIS STATUS GIZI
                                </button>

                                <?php if($this->session->userdata('user_logged_in')): ?>
                                    <a href="<?= base_url('deteksi/riwayat'); ?>" class="btn btn-light border w-100 py-2.5 rounded-4 fw-bold text-muted small">
                                        <i class="fas fa-chart-line text-primary me-1.5"></i> Lihat Riwayat &amp; Grafik Pertumbuhan Anak
                                    </a>
                                <?php endif; ?>
                            </form>
                        </div>

                        <!-- Result Side -->
                        <div class="col-md-7 p-5 d-flex flex-column justify-content-center bg-white">
                            <?php if($hasil): ?>
                                <div class="reveal reveal-zoom">
                                    <div class="text-center mb-5">
                                        <div class="badge bg-<?= $hasil['label']; ?> px-5 py-3 mb-4 rounded-pill shadow-lg" style="font-size:1.1rem; text-transform:uppercase; letter-spacing:2px; font-family:'Outfit',sans-serif;">
                                            <?= $hasil['status']; ?>
                                        </div>
                                        <div class="mb-3">
                                            <h4 class="fw-bold mb-0"><?= $input['nama_anak']; ?></h4>
                                            <p class="text-muted small">Putra/Putri dari: <?= $input['nama_ortu']; ?></p>
                                        </div>
                                        <h2 class="fw-bold display-6" style="color:#1e293b; font-family:'Outfit',sans-serif; letter-spacing:-1px;">Ringkasan Hasil</h2>
                                    </div>

                                    <div class="p-5 rounded-5 border-start border-5 border-<?= $hasil['label']; ?> mb-5 shadow-sm" style="background:rgba(var(--bs-<?= $hasil['label']; ?>-rgb), .03);">
                                        <p class="mb-0 text-dark lh-lg fs-5 fw-medium"><?= $hasil['pesan']; ?></p>
                                    </div>

                                    <div class="row g-4 mb-5">
                                        <div class="col-sm-6">
                                            <div class="p-4 bg-light rounded-4 text-center border-0" style="background:#f8fafc !important;">
                                                <div class="small text-muted fw-bold text-uppercase mb-2" style="letter-spacing:1px;">Kategori WHO</div>
                                                <div class="fw-bold fs-5 text-<?= $hasil['label']; ?>"><?= $hasil['status']; ?></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="p-4 bg-light rounded-4 text-center border-0" style="background:#f8fafc !important;">
                                                <div class="small text-muted fw-bold text-uppercase mb-2" style="letter-spacing:1px;">Selisih Median</div>
                                                <div class="fw-bold fs-5 text-dark"><?= ($hasil['z_score'] >= 0) ? '+'.$hasil['z_score'] : $hasil['z_score']; ?> cm</div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Rekomendasi Gizi -->
                                    <div class="mb-5">
                                        <h5 class="fw-bold mb-4" style="font-family:'Outfit',sans-serif;"><i class="fas fa-bowl-food text-primary me-2"></i>Rekomendasi Tindakan & Gizi:</h5>
                                        <div class="d-flex flex-column gap-3">
                                            <?php foreach($hasil['rekomendasi'] as $rek): ?>
                                                <div class="d-flex align-items-center gap-3 p-3 rounded-4" style="background: #f8fafc; border: 1px solid #f1f5f9;">
                                                    <i class="fas fa-check-circle text-success"></i>
                                                    <span class="small fw-medium text-dark"><?= $rek; ?></span>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                    <?php if($hasil['label'] == 'warning' || $hasil['label'] == 'danger'): ?>
                                    <div class="p-4 rounded-4 bg-white border-2 d-flex align-items-center gap-4 shadow-sm" style="border-style:dashed !important; border-color:rgba(var(--bs-<?= $hasil['label']; ?>-rgb), .3) !important;">
                                        <div class="bg-<?= $hasil['label']; ?> text-white p-4 rounded-circle shadow-lg flex-shrink-0" style="width:70px;height:70px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;">
                                            <i class="fas fa-stethoscope"></i>
                                        </div>
                                        <div>
                                            <h5 class="fw-bold mb-1" style="font-family:'Outfit',sans-serif;">Konsultasi Medis Segera</h5>
                                            <p class="small text-muted mb-0">Segera hubungi layanan online kami untuk konsultasi gizi.</p>
                                            <a href="<?= base_url('layananonline'); ?>" class="btn btn-<?= $hasil['label']; ?> btn-sm mt-2 rounded-pill text-white px-3 fw-bold">Mulai Konsultasi</a>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            <?php else: ?>
                                <div class="text-center py-5">
                                    <div class="mb-5 d-inline-block p-5 rounded-circle" style="background:#f8fafc;">
                                        <i class="fas fa-baby-carriage fa-5x text-muted opacity-20"></i>
                                    </div>
                                    <h3 class="fw-bold mb-3" style="font-family:'Outfit',sans-serif;">Siap Melakukan Deteksi?</h3>
                                    <p class="text-muted mx-auto" style="max-width:350px;">Lengkapi formulir di samping untuk menganalisis status pertumbuhan anak Anda secara real-time.</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="mt-5 p-5 rounded-5 bg-white shadow-sm border-0 reveal reveal-bottom">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div style="width:40px;height:40px;background:var(--primary-light);border-radius:12px;display:flex;align-items:center;justify-content:center;color:var(--primary);"><i class="fas fa-info-circle"></i></div>
                        <h5 class="fw-bold mb-0" style="font-family:'Outfit',sans-serif;">Informasi Penting</h5>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="d-flex gap-3 mb-3">
                                <i class="fas fa-check-circle text-success mt-1"></i>
                                <p class="small text-muted mb-0"><strong>Basis Data:</strong> Menggunakan dataset <strong>WHO Child Growth Standards</strong> terbaru.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex gap-3 mb-3">
                                <i class="fas fa-exclamation-triangle text-warning mt-1"></i>
                                <p class="small text-muted mb-0"><strong>Penyangkalan:</strong> Hasil ini adalah <em>screening</em> awal. Diagnosis final tetap ada di tangan petugas medis.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
