<div class="container mb-5 pb-5" style="margin-top:35px;position:relative;z-index:3;">

    <!-- Intro Header -->
    <div class="text-center mb-5">
        <span class="section-label"><i class="fas fa-stethoscope me-1"></i> Standar Pelayanan Medis</span>
        <h2 class="display-6 fw-bold mt-2">Alur Pelayanan Berdasarkan Ruang Poli</h2>
        <p class="text-muted mx-auto" style="max-width: 680px;">
            Setiap ruang poli di Puskesmas memiliki alur pemeriksaan dan standar operasional khusus. Pelajari alur, sasaran tindakan, dan tata laksana pada tiap poli klinis di bawah ini.
        </p>
        <div class="section-divider"></div>
    </div>

    <!-- Poli Active Logic -->
    <?php
        $requested_poli = strtolower(trim($this->input->get('poli') ?? ''));
        $standard_names = ['poli anak', 'poli gigi', 'kia', 'ibu hamil', 'imunisasi', 'p2p', 'poli umum', 'farmasi', 'ruang obat'];
        
        // Tab mapping helper
        $is_custom_active = false;
        $active_tab_id = 'poli-anak';
        if ($requested_poli) {
            if (strpos($requested_poli, 'anak') !== false || strpos($requested_poli, 'mtbs') !== false) {
                $active_tab_id = 'poli-anak';
            } elseif (strpos($requested_poli, 'gigi') !== false) {
                $active_tab_id = 'poli-gigi';
            } elseif (strpos($requested_poli, 'kia') !== false || strpos($requested_poli, 'ibu') !== false || strpos($requested_poli, 'hamil') !== false) {
                $active_tab_id = 'poli-ibu';
            } elseif (strpos($requested_poli, 'imunisasi') !== false) {
                $active_tab_id = 'poli-imunisasi';
            } elseif (strpos($requested_poli, 'p2p') !== false) {
                $active_tab_id = 'poli-p2p';
            } elseif (strpos($requested_poli, 'umum') !== false) {
                $active_tab_id = 'poli-umum';
            } elseif (strpos($requested_poli, 'obat') !== false || strpos($requested_poli, 'farmasi') !== false) {
                $active_tab_id = 'poli-obat';
            } else {
                $active_tab_id = 'poli-custom';
            }
        }
    ?>

    <!-- Poli Tab Content -->
    <div class="tab-content" id="poliTabContent">

        <!-- 1. POLI ANAK -->
        <div class="tab-pane fade <?= ($active_tab_id == 'poli-anak') ? 'show active' : ''; ?>" id="poli-anak" role="tabpanel">
            <div class="card border-0 shadow-sm p-4 p-md-5" style="border-radius:24px;">
                <div class="row g-4 align-items-center mb-4">
                    <div class="col-md-8">
                        <div class="d-flex align-items-center gap-3">
                            <div class="p-3 rounded-4 bg-info bg-opacity-10 text-info" style="font-size:2rem;"><i class="fas fa-child"></i></div>
                            <div>
                                <h4 class="fw-bold mb-1">Alur Pelayanan Poli Anak (MTBS)</h4>
                                <p class="text-muted small mb-0">Pelayanan Manajemen Terpadu Balita Sakit (MTBS) &amp; Tumbuh Kembang Anak Usia 0–5 Tahun.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <span class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-25 px-3 py-2 rounded-pill fw-bold">Estimasi: 15–20 Menit</span>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 bg-light h-100">
                            <h6 class="fw-bold text-dark"><i class="fas fa-1 me-2 text-info"></i> Skrining Awal &amp; Antropometri</h6>
                            <p class="text-muted small mb-0">Penimbangan berat badan (BB), pengukuran tinggi/panjang badan (TB/PB), lingkar kepala, dan pengecekan suhu badan anak.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 bg-light h-100">
                            <h6 class="fw-bold text-dark"><i class="fas fa-2 me-2 text-info"></i> Anamnesis &amp; Pemeriksaan Fisik</h6>
                            <p class="text-muted small mb-0">Pemeriksaan tanda bahaya umum, batuk/kesukaran bernapas, diare, demam, masalah telinga, dan status gizi anak.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 bg-light h-100">
                            <h6 class="fw-bold text-dark"><i class="fas fa-3 me-2 text-info"></i> Tata Laksana, Resep &amp; Konseling</h6>
                            <p class="text-muted small mb-0">Pemberian resep obat sirup/tetes ke loket Farmasi, edukasi cara menyusui/MP-ASI, dan tanda bahaya kapan harus kembali.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. POLI GIGI -->
        <div class="tab-pane fade <?= ($active_tab_id == 'poli-gigi') ? 'show active' : ''; ?>" id="poli-gigi" role="tabpanel">
            <div class="card border-0 shadow-sm p-4 p-md-5" style="border-radius:24px;">
                <div class="row g-4 align-items-center mb-4">
                    <div class="col-md-8">
                        <div class="d-flex align-items-center gap-3">
                            <div class="p-3 rounded-4 bg-primary bg-opacity-10 text-primary" style="font-size:2rem;"><i class="fas fa-tooth"></i></div>
                            <div>
                                <h4 class="fw-bold mb-1">Alur Pelayanan Poli Gigi &amp; Mulut</h4>
                                <p class="text-muted small mb-0">Pemeriksaan kesehatan gigi, penambalan, pencabutan, dan pembersihan karang gigi.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3 py-2 rounded-pill fw-bold">Estimasi: 20–30 Menit</span>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 bg-light h-100">
                            <h6 class="fw-bold text-dark"><i class="fas fa-1 me-2 text-primary"></i> Anamnesis &amp; Odontogram</h6>
                            <p class="text-muted small mb-0">Dokter gigi menanyakan keluhan utama, riwayat alergi obat, dan memetakan kondisi gigi pada lembar odontogram.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 bg-light h-100">
                            <h6 class="fw-bold text-dark"><i class="fas fa-2 me-2 text-primary"></i> Tindakan Medis Gigi</h6>
                            <p class="text-muted small mb-0">Pelaksanaan tindakan klinis (penambalan gigi berlubang, pencabutan gigi susu/dewasa dengan anestesi lokal, pembersihan karang gigi).</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 bg-light h-100">
                            <h6 class="fw-bold text-dark"><i class="fas fa-3 me-2 text-primary"></i> Instruksi Pasca Tindakan &amp; Obat</h6>
                            <p class="text-muted small mb-0">Instruksi gigit tampon, penyerahan resep pereda nyeri/antibiotik ke ruang obat, dan anjuran kontrol jika diperlukan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. POLI IBU HAMIL (KIA) -->
        <div class="tab-pane fade <?= ($active_tab_id == 'poli-ibu') ? 'show active' : ''; ?>" id="poli-ibu" role="tabpanel">
            <div class="card border-0 shadow-sm p-4 p-md-5" style="border-radius:24px;">
                <div class="row g-4 align-items-center mb-4">
                    <div class="col-md-8">
                        <div class="d-flex align-items-center gap-3">
                            <div class="p-3 rounded-4 bg-danger bg-opacity-10 text-danger" style="font-size:2rem;"><i class="fas fa-person-pregnant"></i></div>
                            <div>
                                <h4 class="fw-bold mb-1">Alur Pelayanan Ibu Hamil (Poli KIA / ANC Terpadu)</h4>
                                <p class="text-muted small mb-0">Pemeriksaan antenatal care (ANC) komprehensif berstandar 10T untuk keselamatan ibu dan janin.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-3 py-2 rounded-pill fw-bold">Standar 10T Kemenkes</span>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 bg-light h-100">
                            <h6 class="fw-bold text-dark"><i class="fas fa-1 me-2 text-danger"></i> Skrining Awal &amp; Tanda Vital</h6>
                            <p class="text-muted small mb-0">Pengukuran Berat Badan (BB), Tinggi Badan (TB), Tekanan Darah (Tensi), Lingkar Lengan Atas (LiLA) untuk deteksi KEK.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 bg-light h-100">
                            <h6 class="fw-bold text-dark"><i class="fas fa-2 me-2 text-danger"></i> Pemeriksaan Kebidanan &amp; Janin</h6>
                            <p class="text-muted small mb-0">Pengukuran Tinggi Fundus Uteri (TFU), penentuan letak janin, denyut jantung janin (DJJ), USG dasar oleh dokter, dan skrining preeklamsia.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 bg-light h-100">
                            <h6 class="fw-bold text-dark"><i class="fas fa-3 me-2 text-danger"></i> Tes Laboratorium &amp; Buku KIA</h6>
                            <p class="text-muted small mb-0">Cek darah (Hb, Triple Eliminasi HIV/Sifilis/Hepatitis B), pemberian Tablet Tambah Darah (TTD), serta pencatatan lengkap Buku KIA.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. POLI IMUNISASI -->
        <div class="tab-pane fade <?= ($active_tab_id == 'poli-imunisasi') ? 'show active' : ''; ?>" id="poli-imunisasi" role="tabpanel">
            <div class="card border-0 shadow-sm p-4 p-md-5" style="border-radius:24px;">
                <div class="row g-4 align-items-center mb-4">
                    <div class="col-md-8">
                        <div class="d-flex align-items-center gap-3">
                            <div class="p-3 rounded-4 bg-success bg-opacity-10 text-success" style="font-size:2rem;"><i class="fas fa-syringe"></i></div>
                            <div>
                                <h4 class="fw-bold mb-1">Alur Pelayanan Poli Imunisasi</h4>
                                <p class="text-muted small mb-0">Pemberian vaksin kekebalan tubuh bagi bayi, balita, dan calon pengantin (Catin).</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-3 py-2 rounded-pill fw-bold">Imunisasi Lengkap</span>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 bg-light h-100">
                            <h6 class="fw-bold text-dark"><i class="fas fa-1 me-2 text-success"></i> Verifikasi Jadwal &amp; Buku KIA</h6>
                            <p class="text-muted small mb-0">Petugas memeriksa riwayat vaksin yang sudah diterima dan menentukan vaksin yang dijadwalkan pada hari kunjungan.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 bg-light h-100">
                            <h6 class="fw-bold text-dark"><i class="fas fa-2 me-2 text-success"></i> Skrining Suhu &amp; Kelayakan</h6>
                            <p class="text-muted small mb-0">Pemeriksaan suhu tubuh dan kondisi klinis bayi. Bayi harus dalam kondisi sehat tanpa demam tinggi.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 bg-light h-100">
                            <h6 class="fw-bold text-dark"><i class="fas fa-3 me-2 text-success"></i> Penyuntikan &amp; Observasi KIPI</h6>
                            <p class="text-muted small mb-0">Penyuntikan vaksin steril sesuai SOP cold chain, pencatatan di kartu imunisasi, serta edukasi penanganan demam pasca imunisasi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 5. POLI P2P -->
        <div class="tab-pane fade <?= ($active_tab_id == 'poli-p2p') ? 'show active' : ''; ?>" id="poli-p2p" role="tabpanel">
            <div class="card border-0 shadow-sm p-4 p-md-5" style="border-radius:24px;">
                <div class="row g-4 align-items-center mb-4">
                    <div class="col-md-8">
                        <div class="d-flex align-items-center gap-3">
                            <div class="p-3 rounded-4 bg-warning bg-opacity-10 text-warning" style="font-size:2rem;"><i class="fas fa-shield-virus"></i></div>
                            <div>
                                <h4 class="fw-bold mb-1">Alur Pelayanan Poli P2P (Pencegahan &amp; Pengendalian Penyakit)</h4>
                                <p class="text-muted small mb-0">Pelayanan penanganan penyakit menular: TB Paru (Pojok DOTS), HIV/AIDS, Kusta, DBD, Malaria, dan Rabies.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <span class="badge bg-warning bg-opacity-10 text-dark border border-warning px-3 py-2 rounded-pill fw-bold">Pojok DOTS &amp; VCT</span>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 bg-light h-100">
                            <h6 class="fw-bold text-dark"><i class="fas fa-1 me-2 text-warning"></i> Skrining Gejala Batuk / Kontak</h6>
                            <p class="text-muted small mb-0">Pasien dengan batuk berdahak &gt; 2 minggu atau kontak erat diarahkan ke ruang tunggu berventilasi khusus.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 bg-light h-100">
                            <h6 class="fw-bold text-dark"><i class="fas fa-2 me-2 text-warning"></i> Pemeriksaan Diagnostik (TCM / Sputum)</h6>
                            <p class="text-muted small mb-0">Pengambilan sampel dahak untuk Tes Cepat Molekuler (TCM TB) atau skrining darah VCT HIV dengan pendampingan konselor.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 bg-light h-100">
                            <h6 class="fw-bold text-dark"><i class="fas fa-3 me-2 text-warning"></i> Paket Obat (OAT) &amp; Edukasi PMO</h6>
                            <p class="text-muted small mb-0">Pemberian Obat Anti Tuberkulosis (OAT) gratis dari program pemerintah dan penetapan Pengawas Menelan Obat (PMO).</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 6. POLI UMUM -->
        <div class="tab-pane fade <?= ($active_tab_id == 'poli-umum') ? 'show active' : ''; ?>" id="poli-umum" role="tabpanel">
            <div class="card border-0 shadow-sm p-4 p-md-5" style="border-radius:24px;">
                <div class="row g-4 align-items-center mb-4">
                    <div class="col-md-8">
                        <div class="d-flex align-items-center gap-3">
                            <div class="p-3 rounded-4 bg-primary bg-opacity-10 text-primary" style="font-size:2rem;"><i class="fas fa-stethoscope"></i></div>
                            <div>
                                <h4 class="fw-bold mb-1">Alur Pelayanan Poli Umum</h4>
                                <p class="text-muted small mb-0">Pelayanan kuratif dan preventif bagi pasien dewasa, lansia, dan penyakit umum non-gawat darurat.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3 py-2 rounded-pill fw-bold">Pelayanan Utama</span>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 bg-light h-100">
                            <h6 class="fw-bold text-dark"><i class="fas fa-1 me-2 text-primary"></i> Tanda Vital &amp; Triage</h6>
                            <p class="text-muted small mb-0">Pemeriksaan tensi darah, nadi, suhu tubuh, dan identifikasi keluhan awal pasien sebelum masuk ruang periksa dokter.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 bg-light h-100">
                            <h6 class="fw-bold text-dark"><i class="fas fa-2 me-2 text-primary"></i> Konsultasi &amp; Pemeriksaan Dokter</h6>
                            <p class="text-muted small mb-0">Pemeriksaan fisik oleh dokter umum, penegakan diagnosis penyakit, serta perujukan laboratorium sederhana jika diindikasikan.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 bg-light h-100">
                            <h6 class="fw-bold text-dark"><i class="fas fa-3 me-2 text-primary"></i> Terapi Obat atau Rujukan FKRTL</h6>
                            <p class="text-muted small mb-0">Penulisan resep obat rawat jalan atau penerbitan surat rujukan berjenjang ke Rumah Sakit jika memerlukan dokter spesialis.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 7. ALUR RUANG OBAT (FARMASI) -->
        <div class="tab-pane fade <?= ($active_tab_id == 'poli-obat') ? 'show active' : ''; ?>" id="poli-obat" role="tabpanel">
            <div class="card border-0 shadow-sm p-4 p-md-5" style="border-radius:24px;">
                <div class="row g-4 align-items-center mb-4">
                    <div class="col-md-8">
                        <div class="d-flex align-items-center gap-3">
                            <div class="p-3 rounded-4 bg-success bg-opacity-10 text-success" style="font-size:2rem;"><i class="fas fa-pills"></i></div>
                            <div>
                                <h4 class="fw-bold mb-1">Alur Pelayanan Ruang Obat (Farmasi)</h4>
                                <p class="text-muted small mb-0">Proses telaah resep, penyiapan/peracikan obat, dan pemberian Pelayanan Informasi Obat (PIO).</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-3 py-2 rounded-pill fw-bold">Standar Pelayanan Kefarmasian</span>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-3">
                        <div class="p-3 border rounded-3 bg-light h-100 text-center">
                            <div class="badge bg-success rounded-pill px-3 py-1 mb-2">Tahap 1</div>
                            <h6 class="fw-bold text-dark mb-1">Penerimaan Resep</h6>
                            <p class="text-muted small mb-0">Pasien meletakkan lembar resep dari dokter pada baki antrean loket farmasi.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 border rounded-3 bg-light h-100 text-center">
                            <div class="badge bg-success rounded-pill px-3 py-1 mb-2">Tahap 2</div>
                            <h6 class="fw-bold text-dark mb-1">Telaah Resep</h6>
                            <p class="text-muted small mb-0">Apoteker memverifikasi kejelasan nama pasien, dosis obat, aturan pakai, dan interaksi obat.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 border rounded-3 bg-light h-100 text-center">
                            <div class="badge bg-success rounded-pill px-3 py-1 mb-2">Tahap 3</div>
                            <h6 class="fw-bold text-dark mb-1">Peracikan &amp; Etiket</h6>
                            <p class="text-muted small mb-0">Petugas menyiapkan obat dan menempelkan etiket (putih untuk obat minum, biru untuk obat luar).</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 border rounded-3 bg-light h-100 text-center">
                            <div class="badge bg-success rounded-pill px-3 py-1 mb-2">Tahap 4</div>
                            <h6 class="fw-bold text-dark mb-1">Penyerahan &amp; PIO</h6>
                            <p class="text-muted small mb-0">Verifikasi identitas pasien saat dipanggil serta penjelasan lengkap aturan konsumsi obat.</p>
                        </div>
                    </div>
                </div>

                <div class="mt-4 p-3 rounded-4 bg-success bg-opacity-10 border border-success border-opacity-25 text-success small">
                    <i class="fas fa-check-circle me-1 fw-bold"></i> Seluruh obat standar formularium Puskesmas diberikan secara <strong>GRATIS</strong> untuk peserta BPJS Kesehatan / KIS / UHC.
                </div>
            </div>
        </div>

        <!-- 8. DYNAMIC POLI DARI ADMIN (JIKA DITAMBAHKAN OLEH ADMIN) -->
        <?php 
            if(!empty($layanan)):
                foreach($layanan as $l):
                    $is_standard = false;
                    foreach($standard_names as $s) {
                        if(strpos(strtolower($l['nama_layanan']), $s) !== false) {
                            $is_standard = true; break;
                        }
                    }
                    if(!$is_standard):
                        $custom_tab_id = 'poli-layanan-' . $l['id'];
                        $is_this_active = ($active_tab_id == 'poli-custom' && strpos(strtolower($l['nama_layanan']), $requested_poli) !== false);
        ?>
        <div class="tab-pane fade <?= $is_this_active ? 'show active' : ''; ?>" id="<?= $custom_tab_id; ?>" role="tabpanel">
            <div class="card border-0 shadow-sm p-4 p-md-5" style="border-radius:24px;">
                <div class="row g-4 align-items-center mb-4">
                    <div class="col-md-8">
                        <div class="d-flex align-items-center gap-3">
                            <div class="p-3 rounded-4 bg-primary bg-opacity-10 text-primary" style="font-size:2rem;">
                                <i class="<?= $l['icon'] ?: 'fas fa-stethoscope'; ?>"></i>
                            </div>
                            <div>
                                <h4 class="fw-bold mb-1">Alur Pelayanan <?= htmlspecialchars($l['nama_layanan']); ?></h4>
                                <p class="text-muted small mb-0"><?= htmlspecialchars($l['deskripsi'] ?: 'Standar operasional prosedur pemeriksaan klinis ruang poli.'); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3 py-2 rounded-pill fw-bold">Poli Layanan Khusus</span>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 bg-light h-100">
                            <h6 class="fw-bold text-dark"><i class="fas fa-1 me-2 text-primary"></i> Pendaftaran &amp; Rekam Medis</h6>
                            <p class="text-muted small mb-0">Pasien mendaftar di loket, berkas rekam medis didistribusikan langsung ke ruang <?= htmlspecialchars($l['nama_layanan']); ?>.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 bg-light h-100">
                            <h6 class="fw-bold text-dark"><i class="fas fa-2 me-2 text-primary"></i> Pemeriksaan &amp; Konsultasi Dokter</h6>
                            <p class="text-muted small mb-0">Pemeriksaan kondisi klinis, diagnosa oleh tenaga medis ahli, dan penentuan tindakan medis terarah.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 bg-light h-100">
                            <h6 class="fw-bold text-dark"><i class="fas fa-3 me-2 text-primary"></i> Terapi &amp; Pengambilan Obat</h6>
                            <p class="text-muted small mb-0">Tindakan medis lanjutan, penyerahan resep ke loket farmasi puskesmas, dan edukasi perawatan mandiri.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
                    endif;
                endforeach;
            endif;
        ?>

    </div>

    <!-- Navigasi Terkait -->
    <div class="d-flex justify-content-between align-items-center mt-5 pt-3">
        <a href="<?= base_url('alurpelayanan'); ?>" class="btn btn-outline-secondary rounded-pill px-4 py-2 fw-semibold" style="font-size:var(--fs-body);">
            <i class="fas fa-arrow-left me-2"></i> Lihat Alur Pendaftaran Pasien
        </a>
        <a href="<?= base_url('tarif'); ?>" class="btn btn-primary rounded-pill px-4 py-2 fw-semibold" style="font-size:var(--fs-body);">
            Lihat Biaya &amp; Tarif <i class="fas fa-arrow-right ms-2"></i>
        </a>
    </div>

</div>
