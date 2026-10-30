<div class="container mb-5 pb-5" style="margin-top:35px;position:relative;z-index:3;">

    <!-- Intro Header -->
    <div class="text-center mb-5">
        <span class="section-label"><i class="fas fa-bullhorn me-1"></i> Layanan Pengaduan &amp; Aspirasi</span>
        <h2 class="display-6 fw-bold mt-2">Alur &amp; Kanal Pengaduan Masyarakat</h2>
        <p class="text-muted mx-auto" style="max-width: 680px;">
            Kami mendengar dan menghargai setiap masukan Anda. Puskesmas menyediakan kanal pengaduan baik secara <strong>Online</strong> maupun <strong>Offline</strong> demi peningkatan mutu pelayanan yang berkelanjutan.
        </p>
        <div class="section-divider"></div>
    </div>

    <!-- ===== SECTION 1: PERBANDINGAN ALUR ONLINE VS OFFLINE ===== -->
    <div class="row g-4 mb-5 stagger-parent">

    <!-- ===== SECTION 1: PILIHAN JALUR PENGADUAN (ONLINE / OFFLINE) ===== -->
    <div class="row g-4 mb-4 stagger-parent">

        <!-- KANAL A: ONLINE (Form & WhatsApp) -->
        <div class="col-lg-6 reveal reveal-left">
            <div class="card border-0 shadow-sm p-4 p-md-5 h-100" style="border-radius:28px; background:linear-gradient(145deg, #ffffff 0%, #f0fdfa 100%); border: 2px solid rgba(13,148,136,.2) !important;">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="p-3 rounded-4 bg-primary text-white shadow-sm" style="width:54px;height:54px;display:flex;align-items:center;justify-content:center;">
                        <i class="fas fa-globe fs-3"></i>
                    </div>
                    <div>
                        <span class="badge bg-primary bg-opacity-10 text-primary fw-bold px-3 py-1 rounded-pill mb-1">Jalur A</span>
                        <h4 class="fw-bold mb-0 text-dark" style="font-family:'Outfit',sans-serif;">Pengaduan Online</h4>
                    </div>
                </div>

                <p class="text-muted small mb-4">
                    Sampaikan laporan, keluhan, atau saran perbaikan secara digital dari mana saja tanpa perlu hadir langsung:
                </p>

                <div class="d-flex flex-column gap-3 mb-4">
                    <div class="d-flex align-items-start gap-3 p-3 bg-white rounded-3 shadow-xs border">
                        <div class="badge bg-primary rounded-circle p-2" style="width:28px;height:28px;display:flex;align-items:center;justify-content:center;">1</div>
                        <div>
                            <div class="fw-bold text-dark small">Formulir Pengaduan Digital</div>
                            <small class="text-muted">Kirim rincian keluhan lewat formulir sistem Puskesmas dengan nomor registrasi aduan.</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-start gap-3 p-3 bg-white rounded-3 shadow-xs border">
                        <div class="badge bg-success text-white rounded-circle p-2" style="width:28px;height:28px;display:flex;align-items:center;justify-content:center;"><i class="fab fa-whatsapp"></i></div>
                        <div>
                            <div class="fw-bold text-dark small">Chat Langsung WhatsApp Hotline</div>
                            <small class="text-muted">Nomor WhatsApp Resmi: <?= $profil['telepon'] ?? '(021) 123-456'; ?> (Respons Cepat Petugas Pengaduan).</small>
                        </div>
                    </div>
                </div>

                <div class="mt-auto pt-2 d-flex flex-column gap-2">
                    <button type="button" class="btn btn-primary w-100 rounded-pill py-2.5 fw-bold shadow-sm" id="btnPilihOnline" onclick="bukaJalurOnline()">
                        <i class="fas fa-pen-to-square me-2"></i> Pilih Jalur Online (Tampilkan Form)
                    </button>
                    <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $profil['telepon'] ?? ''); ?>" target="_blank" class="btn btn-outline-success w-100 rounded-pill py-2 fw-semibold">
                        <i class="fab fa-whatsapp me-2"></i> Chat WhatsApp Customer Care
                    </a>
                </div>
            </div>
        </div>

        <!-- KANAL B: OFFLINE (Datang Langsung, Lokasi & Jam Layanan) -->
        <div class="col-lg-6 reveal reveal-right">
            <div class="card border-0 shadow-sm p-4 p-md-5 h-100" style="border-radius:28px; background:linear-gradient(145deg, #ffffff 0%, #fffbeb 100%); border: 2px solid rgba(245,158,11,.25) !important;">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="p-3 rounded-4 bg-warning text-dark shadow-sm" style="width:54px;height:54px;display:flex;align-items:center;justify-content:center;">
                        <i class="fas fa-handshake fs-3"></i>
                    </div>
                    <div>
                        <span class="badge bg-warning bg-opacity-25 text-dark fw-bold px-3 py-1 rounded-pill mb-1">Jalur B</span>
                        <h4 class="fw-bold mb-0 text-dark" style="font-family:'Outfit',sans-serif;">Pengaduan Offline</h4>
                    </div>
                </div>

                <p class="text-muted small mb-4">
                    Sampaikan keluhan secara tatap muka atau melalui sarana fisik saat berkunjung ke gedung Puskesmas:
                </p>

                <div class="d-flex flex-column gap-3 mb-4">
                    <div class="d-flex align-items-start gap-3 p-3 bg-white rounded-3 shadow-xs border">
                        <div class="badge bg-warning text-dark rounded-circle p-2" style="width:28px;height:28px;display:flex;align-items:center;justify-content:center;"><i class="fas fa-location-dot"></i></div>
                        <div>
                            <div class="fw-bold text-dark small">Lokasi Layanan Pengaduan</div>
                            <small class="text-muted"><strong>Meja Informasi &amp; Customer Care</strong> di Lobi Utama Lantai 1 Puskesmas (Depan Loket Pendaftaran).</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-start gap-3 p-3 bg-white rounded-3 shadow-xs border">
                        <div class="badge bg-warning text-dark rounded-circle p-2" style="width:28px;height:28px;display:flex;align-items:center;justify-content:center;"><i class="fas fa-clock"></i></div>
                        <div>
                            <div class="fw-bold text-dark small">Jam Operasional Layanan Offline</div>
                            <small class="text-muted">
                                <strong>Senin – Kamis:</strong> 08.00 – 14.30 WIB<br>
                                <strong>Jumat:</strong> 08.00 – 11.30 WIB<br>
                                <strong>Sabtu:</strong> 08.00 – 12.30 WIB
                            </small>
                        </div>
                    </div>
                    <div class="d-flex align-items-start gap-3 p-3 bg-white rounded-3 shadow-xs border">
                        <div class="badge bg-warning text-dark rounded-circle p-2" style="width:28px;height:28px;display:flex;align-items:center;justify-content:center;"><i class="fas fa-box-archive"></i></div>
                        <div>
                            <div class="fw-bold text-dark small">Kotak Saran &amp; Pengaduan 24 Jam</div>
                            <small class="text-muted">Tersedia di dekat Ruang Farmasi dan Ruang Tunggu Poli. Kertas dan pulpen telah disediakan.</small>
                        </div>
                    </div>
                </div>

                <div class="mt-auto pt-2">
                    <div class="p-3 rounded-3 text-center" style="background:rgba(245,158,11,.1); border:1px dashed rgba(245,158,11,.4);">
                        <span class="small fw-semibold text-dark"><i class="fas fa-circle-check text-success me-1"></i> Petugas informasi siap membantu mengisi formulir aduan fisik bagi lansia dan disabilitas.</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- ===== SECTION 2: TAHAPAN & SLA PENANGANAN ===== -->
    <div class="card border-0 shadow-sm p-4 p-md-5 mb-5 reveal reveal-bottom" style="border-radius:28px;">
        <div class="text-center mb-4">
            <span class="badge bg-primary bg-opacity-10 text-primary fw-bold px-3 py-1 rounded-pill mb-2">Service Level Agreement (SLA)</span>
            <h4 class="fw-bold mb-1" style="font-family:'Outfit',sans-serif;">Tahapan Penanganan Pengaduan (Maks. 3 Hari Kerja)</h4>
            <p class="text-muted small">Puskesmas memiliki SOP resmi dalam merespons dan menyelesaikan setiap aspirasi masyarakat.</p>
        </div>

        <div class="row g-3 text-center">
            <div class="col-md-4">
                <div class="p-4 rounded-4 bg-light border h-100">
                    <div class="badge bg-primary rounded-pill px-3 py-1 mb-3">Hari ke-1 (1x24 Jam)</div>
                    <div class="rounded-circle bg-white shadow-sm mx-auto mb-3 d-flex align-items-center justify-content-center text-primary" style="width:50px;height:50px;">
                        <i class="fas fa-inbox fs-4"></i>
                    </div>
                    <h6 class="fw-bold mb-2">Penerimaan &amp; Registrasi</h6>
                    <p class="text-muted small mb-0">Petugas mencatat pengaduan, memverifikasi identitas pelapor, dan memberikan nomor tanda terima aduan.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 rounded-4 bg-light border h-100">
                    <div class="badge bg-primary rounded-pill px-3 py-1 mb-3">Hari ke-2</div>
                    <div class="rounded-circle bg-white shadow-sm mx-auto mb-3 d-flex align-items-center justify-content-center text-primary" style="width:50px;height:50px;">
                        <i class="fas fa-magnifying-glass-chart fs-4"></i>
                    </div>
                    <h6 class="fw-bold mb-2">Investigasi &amp; Klarifikasi</h6>
                    <p class="text-muted small mb-0">Tim Manajemen Mutu melakukan telaah kasus, konfirmasi ke unit terkait/nakes bersangkutan, dan merumuskan solusi.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 rounded-4 bg-light border h-100">
                    <div class="badge bg-success rounded-pill px-3 py-1 mb-3">Hari ke-3</div>
                    <div class="rounded-circle bg-white shadow-sm mx-auto mb-3 d-flex align-items-center justify-content-center text-success" style="width:50px;height:50px;">
                        <i class="fas fa-check-double fs-4"></i>
                    </div>
                    <h6 class="fw-bold mb-2">Tindak Lanjut &amp; Solusi</h6>
                    <p class="text-muted small mb-0">Perbaikan dilakukan dan petugas mengonfirmasikan hasil penyelesaian secara langsung kepada pelapor via telepon/WhatsApp.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== SECTION 3: FORMULIR PENGADUAN ONLINE (TIDAK TAMPIL LANGSUNG, HANYA MUNCUL JIKA MEMILIH JALUR ONLINE - REVISI POIN 1) ===== -->
    <div class="card border-0 shadow-sm p-4 p-md-5 mb-5 <?= validation_errors() ? '' : 'd-none'; ?>" id="formPengaduanWrapper" style="border-radius:28px; scroll-margin-top: 100px;">
        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
            <div>
                <span class="badge bg-primary bg-opacity-10 text-primary fw-bold px-3 py-1 rounded-pill mb-1">Jalur Online Terpilih</span>
                <h3 class="fw-bold mb-0 text-dark" style="font-family:'Outfit',sans-serif;">Formulir Pengaduan Masyarakat Online</h3>
            </div>
            <button type="button" class="btn btn-outline-secondary btn-sm rounded-pill px-3" onclick="tutupJalurOnline()">
                <i class="fas fa-times me-1"></i> Sembunyikan Form
            </button>
        </div>
        <div class="row g-4">
            <div class="col-lg-5">
                <span class="badge bg-primary bg-opacity-10 text-primary fw-bold px-3 py-1 rounded-pill mb-2">Kirim Aduan Online</span>
                <h3 class="fw-bold mb-3" style="font-family:'Outfit',sans-serif;">Formulir Pengaduan Masyarakat</h3>
                <p class="text-muted small lh-lg mb-4">
                    Silakan isi formulir di samping dengan informasi yang benar. Identitas dan kerahasiaan data pelapor dijamin keamanannya oleh Tim Manajemen Mutu Puskesmas.
                </p>

                <div class="p-3 rounded-4 bg-light border mb-4">
                    <div class="d-flex align-items-center gap-3">
                        <i class="fas fa-user-shield text-primary fs-3"></i>
                        <div class="small">
                            <strong>Jaminan Perlindungan Pelapor:</strong> Laporan Anda dilindungi asas kerahasiaan dan digunakan murni untuk perbaikan layanan.
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-3">
                    <div class="p-2 rounded-3 bg-success bg-opacity-10 text-success"><i class="fab fa-whatsapp fs-4"></i></div>
                    <div>
                        <div class="small text-muted">WhatsApp Hotline Aduan:</div>
                        <div class="fw-bold text-dark"><?= $profil['telepon'] ?? '(021) 123-456'; ?></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <!-- Flash messages -->
                <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i><?= $this->session->flashdata('success'); ?>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i><?= $this->session->flashdata('error'); ?>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('pengaduan/kirim'); ?>" method="post">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Nama Lengkap Pelapor <span class="text-danger">*</span></label>
                            <input type="text" name="nama_pelapor" class="form-control" placeholder="Nama Anda" value="<?= set_value('nama_pelapor'); ?>" required>
                            <?= form_error('nama_pelapor', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Nomor HP / WhatsApp <span class="text-danger">*</span></label>
                            <input type="tel" name="no_hp" class="form-control" placeholder="Contoh: 08123456789" value="<?= set_value('no_hp'); ?>" required>
                            <?= form_error('no_hp', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold">NIK (KTP) <small class="text-muted">(Opsional)</small></label>
                            <input type="text" name="nik" class="form-control" maxlength="16" placeholder="16 digit NIK jika ada" value="<?= set_value('nik'); ?>">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Email <small class="text-muted">(Opsional)</small></label>
                            <input type="email" name="email" class="form-control" placeholder="alamat@email.com" value="<?= set_value('email'); ?>">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Kategori Pengaduan <span class="text-danger">*</span></label>
                            <select name="kategori" class="form-select" required>
                                <option value="">-- Pilih Kategori --</option>
                                <option value="Pelayanan Medis / Dokter" <?= set_select('kategori', 'Pelayanan Medis / Dokter'); ?>>Pelayanan Medis / Dokter</option>
                                <option value="Sikap & Perilaku Petugas" <?= set_select('kategori', 'Sikap & Perilaku Petugas'); ?>>Sikap &amp; Perilaku Petugas</option>
                                <option value="Waktu Tunggu Layanan" <?= set_select('kategori', 'Waktu Tunggu Layanan'); ?>>Waktu Tunggu Layanan</option>
                                <option value="Ketersediaan Obat / Farmasi" <?= set_select('kategori', 'Ketersediaan Obat / Farmasi'); ?>>Ketersediaan Obat / Farmasi</option>
                                <option value="Kebersihan & Fasilitas Gedung" <?= set_select('kategori', 'Kebersihan & Fasilitas Gedung'); ?>>Kebersihan &amp; Fasilitas Gedung</option>
                                <option value="Biaya / Tarif" <?= set_select('kategori', 'Biaya / Tarif'); ?>>Biaya / Tarif</option>
                                <option value="Lainnya" <?= set_select('kategori', 'Lainnya'); ?>>Lainnya</option>
                            </select>
                            <?= form_error('kategori', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Lokasi / Ruang Layanan Terkait <span class="text-danger">*</span></label>
                            <select name="lokasi_layanan" class="form-select" required>
                                <option value="">-- Pilih Ruang Layanan --</option>
                                <option value="Loket Pendaftaran">Loket Pendaftaran</option>
                                <option value="Poli Umum">Poli Umum</option>
                                <option value="Poli Anak (MTBS)">Poli Anak (MTBS)</option>
                                <option value="Poli Gigi & Mulut">Poli Gigi &amp; Mulut</option>
                                <option value="Poli Ibu Hamil (KIA)">Poli Ibu Hamil (KIA)</option>
                                <option value="Poli Imunisasi">Poli Imunisasi</option>
                                <option value="Poli P2P">Poli P2P</option>
                                <option value="Ruang Obat (Farmasi)">Ruang Obat (Farmasi)</option>
                                <option value="Laboratorium">Laboratorium</option>
                                <option value="Ruang Tindakan / IGD">Ruang Tindakan / IGD</option>
                                <option value="Toilet / Parkir / Fasilitas Umum">Toilet / Parkir / Fasilitas Umum</option>
                            </select>
                            <?= form_error('lokasi_layanan', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Tanggal Kejadian</label>
                            <input type="date" name="tanggal_kejadian" class="form-control" value="<?= set_value('tanggal_kejadian', date('Y-m-d')); ?>">
                        </div>

                        <div class="col-12">
                            <label class="form-label small fw-bold">Uraian / Isi Pengaduan <span class="text-danger">*</span></label>
                            <textarea name="isi_pengaduan" class="form-control" rows="4" placeholder="Ceritakan kronologi, kendala, atau saran perbaikan Anda secara rinci..." required><?= set_value('isi_pengaduan'); ?></textarea>
                            <?= form_error('isi_pengaduan', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="col-12 pt-2">
                            <button type="submit" class="btn btn-primary px-5 py-3 rounded-pill fw-bold shadow-sm">
                                <i class="fas fa-paper-plane me-2"></i> Kirim Laporan Pengaduan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<script>
function bukaJalurOnline() {
    const wrap = document.getElementById('formPengaduanWrapper');
    wrap.classList.remove('d-none');
    wrap.scrollIntoView({ behavior: 'smooth', block: 'start' });
}

function tutupJalurOnline() {
    const wrap = document.getElementById('formPengaduanWrapper');
    wrap.classList.add('d-none');
    window.scrollTo({ top: 0, behavior: 'smooth' });
}
</script>
