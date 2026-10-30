
<div class="container mb-5 pb-5" style="margin-top:30px;position:relative;z-index:3;">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <a href="<?= base_url('layananonline'); ?>" class="btn btn-light border mb-3 rounded-pill px-3 py-1.5 text-dark fw-semibold shadow-sm" style="font-size:.85rem;">
                <i class="fas fa-arrow-left me-1.5" style="font-size:.75rem;"></i> Kembali ke Menu
            </a>

            <!-- Alert Success -->
            <?php if($this->session->flashdata('success_uhc')): ?>
                <div class="alert d-flex align-items-center gap-3 mb-4 reveal reveal-zoom" style="background:#f0fdf4; border:1px solid #bbf7d0; border-radius:16px; padding:1rem 1.25rem;">
                    <i class="fas fa-check-circle text-success fs-5"></i>
                    <div class="small fw-semibold" style="color:#14532d;"><?= $this->session->flashdata('success_uhc'); ?></div>
                </div>
            <?php endif; ?>

            <!-- Alert Error -->
            <?php if($this->session->flashdata('error_uhc')): ?>
                <div class="alert d-flex align-items-start gap-3 mb-4 reveal reveal-zoom" style="background:#fff; border-left:4px solid #ef4444; border-radius:16px; padding:1rem 1.25rem; box-shadow:var(--shadow-sm);">
                    <i class="fas fa-exclamation-circle text-danger fs-5 mt-0.5"></i>
                    <div>
                        <h6 class="fw-bold mb-0.5" style="color:#1e293b; font-size:.9rem;">Terjadi Kesalahan</h6>
                        <p class="mb-0 text-muted small"><?= $this->session->flashdata('error_uhc'); ?></p>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Form Card -->
            <div class="card border-0 shadow-sm p-4 p-md-4.5 reveal reveal-bottom" style="border-radius: 24px;">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="p-3 rounded-3" style="background:rgba(13,148,136,.1); color:var(--primary);">
                        <i class="fas fa-hand-holding-medical fs-4"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-0.5" style="font-family:'Outfit',sans-serif; color:var(--dark);">Formulir Usulan UHC</h4>
                        <p class="text-muted small mb-0">Isi data berikut untuk mengajukan permohonan Universal Health Coverage.</p>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-2.5 mb-4 p-3 rounded-3" style="background:#f0fdfa; border:1px solid #ccfbf1;">
                    <i class="fas fa-circle-info text-primary fs-5"></i>
                    <p class="text-muted mb-0 small" style="line-height:1.5;">Pastikan data yang dimasukkan sesuai dokumen resmi. Ukuran berkas maksimal 2MB (format: PDF, JPG, PNG).</p>
                </div>

                <form action="<?= base_url('uhc/proses'); ?>" method="post" enctype="multipart/form-data">
                    <div class="row g-3">
                        <!-- Data Pribadi -->
                        <div class="col-12">
                            <h6 class="fw-bold mb-0" style="color:var(--dark);"><i class="fas fa-user-circle text-primary me-2"></i>Data Pribadi</h6>
                            <hr class="mt-2 mb-1" style="border-color:#e2e8f0;">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold small mb-1">NIK (16 Digit) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nik" required placeholder="3201xxxxxxxxxxxx" maxlength="16" value="<?= $this->session->userdata('user_nik'); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small mb-1">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nama_lengkap" required placeholder="Sesuai KTP" value="<?= $this->session->userdata('user_nama'); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small mb-1">Nomor KK (16 Digit) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="no_kk" required placeholder="3201xxxxxxxxxxxx" maxlength="16">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small mb-1">Nomor HP / WhatsApp <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="no_hp" required placeholder="08xxxxxxxxxx" value="<?= $this->session->userdata('user_hp'); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold small mb-1">Email Aktif <span class="text-danger">*</span></label>
                            <input type="email" class="form-control req-field" name="email" id="uhc_email" required placeholder="nama@email.com">
                            <div class="form-text small text-muted" style="font-size:var(--fs-support);">Digunakan untuk menerima lembar persetujuan jaminan.</div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold small mb-1">Diagnosa Medis / Keluhan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control req-field" name="diagnosa" id="uhc_diagnosa" required placeholder="Contoh: Demam Berdarah / Hipertensi">
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold small mb-1">Alamat Lengkap Domisili <span class="text-danger">*</span></label>
                            <textarea class="form-control req-field" name="alamat" id="uhc_alamat" rows="2" required placeholder="Alamat lengkap domisili saat ini..."></textarea>
                        </div>

                        <!-- Upload Dokumen (Poin 7: Surat Keterangan, Kartu Keluarga, Bukti Desil) -->
                        <div class="col-12 mt-3">
                            <h6 class="fw-bold mb-0" style="color:var(--dark);"><i class="fas fa-file-upload text-primary me-2"></i>Upload Dokumen Persyaratan</h6>
                            <hr class="mt-2 mb-1" style="border-color:#e2e8f0;">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold small mb-1">Surat Keterangan Rawat/Sakit <span class="text-danger">*</span></label>
                            <input type="file" class="form-control req-file" name="bukti_sakit" id="uhc_surat" required accept=".pdf,.jpg,.jpeg,.png">
                            <div class="form-text text-muted" style="font-size:var(--fs-support);">Maks. 2MB (.pdf, .jpg, .png)</div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small mb-1">Kartu Keluarga (KK) <span class="text-danger">*</span></label>
                            <input type="file" class="form-control req-file" name="bukti_kk" id="uhc_kk" required accept=".pdf,.jpg,.jpeg,.png">
                            <div class="form-text text-muted" style="font-size:var(--fs-support);">Scan/Foto KK asli maks. 2MB</div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold small mb-1">Bukti Desil (DTKS/SKTM) <span class="text-danger">*</span></label>
                            <input type="file" class="form-control req-file" name="bukti_desil" id="uhc_desil" required accept=".pdf,.jpg,.jpeg,.png">
                            <div class="form-text text-muted" style="font-size:var(--fs-support);">Surat SKTM / bukti desil 1-5</div>
                        </div>

                        <div class="col-12 mt-2">
                            <label class="form-label fw-semibold small mb-1">Keterangan Tambahan <span class="text-muted">(Opsional)</span></label>
                            <textarea class="form-control" name="keterangan" rows="2" placeholder="Catatan tambahan bila ada..."></textarea>
                        </div>

                        <div class="col-12 d-flex justify-content-between align-items-center pt-3 flex-wrap gap-2">
                            <small class="text-muted" id="btnHelpText" style="font-size:var(--fs-support);">
                                <i class="fas fa-info-circle text-warning me-1"></i> Lengkapi seluruh field berbintang (<span class="text-danger">*</span>) untuk mengaktifkan tombol kirim.
                            </small>
                            <button type="submit" class="btn btn-primary px-4 py-2.5 fw-bold" id="btnSubmitUhc" disabled style="border-radius:12px; font-size:var(--fs-body);">
                                <i class="fas fa-paper-plane me-1.5"></i> Kirim Pengajuan UHC
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form[action*="uhc/proses"]');
    if (!form) return;

    const btnSubmit = document.getElementById('btnSubmitUhc');
    const helpText = document.getElementById('btnHelpText');
    const reqInputs = form.querySelectorAll('.req-field');
    const reqFiles = form.querySelectorAll('.req-file');

    function validateUhcForm() {
        let valid = true;

        // Validasi input text/email/textarea
        reqInputs.forEach(inp => {
            if (!inp.value.trim()) valid = false;
            if (inp.name === 'nik' || inp.name === 'no_kk') {
                if (inp.value.trim().length !== 16 || isNaN(inp.value.trim())) valid = false;
            }
            if (inp.type === 'email') {
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailPattern.test(inp.value.trim())) valid = false;
            }
        });

        // Validasi file upload
        reqFiles.forEach(f => {
            if (!f.files || f.files.length === 0) valid = false;
        });

        if (valid) {
            btnSubmit.removeAttribute('disabled');
            btnSubmit.classList.remove('btn-secondary');
            btnSubmit.classList.add('btn-primary');
            helpText.innerHTML = '<span class="text-success"><i class="fas fa-check-circle me-1"></i> Seluruh data dan berkas wajib telah lengkap. Siap dikirim!</span>';
        } else {
            btnSubmit.setAttribute('disabled', 'disabled');
            helpText.innerHTML = '<span class="text-muted"><i class="fas fa-info-circle text-warning me-1"></i> Lengkapi seluruh field wajib (<span class="text-danger">*</span>) dan unggah semua berkas untuk mengaktifkan tombol kirim.</span>';
        }
    }

    form.addEventListener('input', validateUhcForm);
    form.addEventListener('change', validateUhcForm);
    validateUhcForm();
});
</script>
