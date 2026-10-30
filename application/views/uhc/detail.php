
<div class="container mb-5 pb-5" style="margin-top:30px;position:relative;z-index:3;">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <!-- Top Header -->
            <div class="d-flex align-items-center gap-3 mb-4">
                <a href="<?= base_url('auth/profil'); ?>" class="btn btn-light border rounded-pill px-3 py-1.5 text-dark fw-semibold shadow-sm" style="font-size:.85rem;">
                    <i class="fas fa-chevron-left me-1.5" style="font-size:.75rem;"></i> Kembali
                </a>
                <div>
                    <h4 class="fw-bold mb-0.5" style="font-family:'Outfit',sans-serif; color:var(--dark);"><i class="fas fa-hand-holding-medical text-success me-2"></i>Detail Usulan UHC</h4>
                    <p class="text-muted small mb-0">Pantau status progress dan data pengajuan UHC Anda.</p>
                </div>
            </div>

            <?php
            $p = $pengajuan;
            $steps = [
                'Diajukan' => 1,
                'Diverifikasi Admin' => 2,
                'Sedang Diproses' => 3,
                'Menunggu Persetujuan' => 4,
                'Selesai' => 5
            ];
            $current_step = isset($steps[$p['status']]) ? $steps[$p['status']] : 1;
            $is_rejected = ($p['status'] == 'Ditolak');
            ?>

            <!-- Card Tracking Progress -->
            <div class="card border-0 shadow-sm p-4 p-md-4.5 mb-4" style="border-radius: 24px;">
                <h6 class="fw-bold mb-3.5" style="color:var(--dark);"><i class="fas fa-location-dot text-success me-2"></i>Tracking Progress</h6>

                <!-- Tahap Saat Ini Box -->
                <div class="p-3 rounded-3 mb-4" style="background:#f0fdf4; border:1px solid #dcfce7;">
                    <div class="text-muted small fw-semibold mb-0.5" style="font-size:.75rem;">Tahap Saat Ini</div>
                    <div class="h5 fw-bold mb-0 <?= $is_rejected ? 'text-danger' : 'text-success'; ?>" style="font-family:'Outfit',sans-serif;">
                        <?= $p['status']; ?>
                    </div>
                </div>

                <!-- Stepper Progress (5 Step) -->
                <?php if(!$is_rejected): ?>
                <div class="position-relative my-4 px-2 px-md-4">
                    <!-- Progress bar line -->
                    <div class="position-absolute top-50 start-0 end-0 translate-middle-y" style="height:3px; background:#e2e8f0; z-index:1; margin:0 30px;"></div>
                    <div class="position-absolute top-50 start-0 translate-middle-y" style="height:3px; background:#16a34a; z-index:1; margin-left:30px; width: <?= (($current_step - 1) / 4) * 85; ?>%;"></div>

                    <div class="d-flex justify-content-between position-relative" style="z-index:2;">
                        <?php
                        $step_list = [
                            1 => 'Diajukan',
                            2 => 'Diverifikasi Admin',
                            3 => 'Sedang Diproses',
                            4 => 'Menunggu Persetujuan',
                            5 => 'Selesai'
                        ];
                        foreach($step_list as $step_num => $step_name):
                            $active = ($current_step >= $step_num);
                        ?>
                        <div class="text-center" style="width:90px;">
                            <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2 fw-bold text-white shadow-sm"
                                 style="width:34px; height:34px; font-size:.85rem; background: <?= $active ? '#16a34a' : '#cbd5e1'; ?>; transition:all .3s;">
                                <?= $step_num; ?>
                            </div>
                            <div class="small fw-semibold <?= $active ? 'text-dark' : 'text-muted'; ?>" style="font-size:.72rem; line-height:1.2;">
                                <?= $step_name; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Status Banner Card -->
                <?php
                $banner_config = [
                    'Diajukan' => [
                        'bg' => '#fffbeb', 'border' => '#fef08a', 'icon_bg' => '#f59e0b', 'icon' => 'fa-paper-plane',
                        'title' => 'Pengajuan Berhasil Dikirim!',
                        'desc' => 'Pengajuan Usulan UHC Anda telah tersimpan. Saat ini menunggu verifikasi kelengkapan dokumen oleh petugas admin.'
                    ],
                    'Diverifikasi Admin' => [
                        'bg' => '#f0f9ff', 'border' => '#bae6fd', 'icon_bg' => '#0284c7', 'icon' => 'fa-user-check',
                        'title' => 'Pengajuan Telah Diverifikasi Admin!',
                        'desc' => 'Dokumen persyaratan Anda telah diverifikasi dan dinyatakan lengkap oleh admin.'
                    ],
                    'Sedang Diproses' => [
                        'bg' => '#f0fdfa', 'border' => '#ccfbf1', 'icon_bg' => '#0d9488', 'icon' => 'fa-spinner fa-spin',
                        'title' => 'Pengajuan Sedang Diproses!',
                        'desc' => 'Pengajuan Anda sedang diproses oleh tim medis dan instansi terkait.'
                    ],
                    'Menunggu Persetujuan' => [
                        'bg' => '#f5f3ff', 'border' => '#ddd6fe', 'icon_bg' => '#6366f1', 'icon' => 'fa-hourglass-half',
                        'title' => 'Menunggu Persetujuan Akhir!',
                        'desc' => 'Pengajuan Anda telah disetujui di tingkat awal dan kini menunggu validasi final.'
                    ],
                    'Selesai' => [
                        'bg' => '#f0fdf4', 'border' => '#dcfce7', 'icon_bg' => '#16a34a', 'icon' => 'fa-check',
                        'title' => 'Pengajuan Berhasil Disetujui!',
                        'desc' => 'Pengajuan Usulan UHC Anda telah <strong>disetujui dan sudah aktif</strong>. Silakan cek Aplikasi JKN Mobile untuk konfirmasi kepesertaan BPJS Kesehatan Anda.'
                    ],
                    'Ditolak' => [
                        'bg' => '#fef2f2', 'border' => '#fecaca', 'icon_bg' => '#ef4444', 'icon' => 'fa-xmark',
                        'title' => 'Pengajuan Ditolak',
                        'desc' => 'Mohon maaf, pengajuan UHC Anda ditolak.<br><strong>Catatan:</strong> ' . ($p['keterangan'] ?: 'Silakan periksa kembali kelengkapan dokumen Anda.')
                    ]
                ];
                $conf = isset($banner_config[$p['status']]) ? $banner_config[$p['status']] : $banner_config['Diajukan'];
                ?>

                <div class="p-4 rounded-4 text-center mt-4" style="background: <?= $conf['bg']; ?>; border:1px solid <?= $conf['border']; ?>;">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm text-white"
                         style="width:48px; height:48px; background: <?= $conf['icon_bg']; ?>; font-size:1.3rem;">
                        <i class="fas <?= $conf['icon']; ?>"></i>
                    </div>

                    <h5 class="fw-bold text-dark mb-1.5" style="font-family:'Outfit',sans-serif;"><?= $conf['title']; ?></h5>
                    <p class="text-muted small mx-auto mb-2" style="max-width:550px; font-size:.82rem; line-height:1.5;"><?= $conf['desc']; ?></p>

                    <?php if($p['status'] == 'Selesai'): ?>
                        <a href="https://play.google.com/store/apps/details?id=app.bpjs.mobile" target="_blank" class="btn btn-light border rounded-pill px-3 py-1.5 fw-semibold text-success shadow-sm d-inline-flex align-items-center gap-2 mt-2" style="font-size:.8rem;">
                            <i class="fas fa-mobile-screen fs-6"></i>
                            <div class="text-start" style="line-height:1.1;">
                                <div style="font-size:.65rem;" class="text-muted">JKN Mobile</div>
                                <div style="font-size:.78rem;">Cek status kepesertaan Anda</div>
                            </div>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Bottom Cards: Data Usulan & Catatan Aktivitas -->
            <div class="row g-4">
                <!-- Data Usulan Anda -->
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm p-4 h-100" style="border-radius: 24px;">
                        <h6 class="fw-bold mb-3" style="color:var(--dark);"><i class="fas fa-id-card text-success me-2"></i>Data Usulan Anda</h6>
                        
                        <div class="table-responsive">
                            <table class="table table-borderless align-middle mb-0" style="font-size:.85rem;">
                                <tbody>
                                    <tr>
                                        <td class="text-muted py-2" style="width:130px; font-size:.8rem;">Pengaju</td>
                                        <td class="fw-bold py-2"><?= $p['nama_lengkap']; ?></td>
                                    </tr>
                                    <tr style="border-top:1px solid #f1f5f9;">
                                        <td class="text-muted py-2" style="font-size:.8rem;">NIK</td>
                                        <td class="fw-bold py-2"><code><?= $p['nik']; ?></code></td>
                                    </tr>
                                    <tr style="border-top:1px solid #f1f5f9;">
                                        <td class="text-muted py-2" style="font-size:.8rem;">Nomor HP / WA</td>
                                        <td class="fw-bold py-2"><?= $p['no_hp']; ?></td>
                                    </tr>
                                    <tr style="border-top:1px solid #f1f5f9;">
                                        <td class="text-muted py-2" style="font-size:.8rem;">Keterangan</td>
                                        <td class="fw-semibold py-2"><?= $p['keterangan'] ?: '-'; ?></td>
                                    </tr>
                                    <tr style="border-top:1px solid #f1f5f9;">
                                        <td class="text-muted py-2" style="font-size:.8rem;">Berkas Lampiran</td>
                                        <td class="py-2">
                                            <div class="d-flex flex-wrap gap-2">
                                                <?php if(!empty($p['bukti_sakit'])): ?>
                                                    <a href="<?= base_url('uploads/uhc/' . $p['bukti_sakit']); ?>" target="_blank" class="btn btn-sm rounded-pill px-2.5 py-1.5 fw-semibold text-decoration-none" style="background:#dcfce7; color:#15803d; border:1px solid #bbf7d0; font-size:.78rem;">
                                                        <i class="fas fa-file-lines me-1" style="color:#16a34a;"></i> Surat Keterangan
                                                    </a>
                                                <?php endif; ?>
                                                <?php if(!empty($p['bukti_desil'])): ?>
                                                    <a href="<?= base_url('uploads/uhc/' . $p['bukti_desil']); ?>" target="_blank" class="btn btn-sm rounded-pill px-2.5 py-1.5 fw-semibold text-decoration-none" style="background:#e0f2fe; color:#0369a1; border:1px solid #bae6fd; font-size:.78rem;">
                                                        <i class="fas fa-file-invoice me-1" style="color:#0284c7;"></i> Bukti Desil
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Catatan Aktivitas -->
                <div class="col-lg-5">
                    <div class="card border-0 shadow-sm p-4 h-100" style="border-radius: 24px;">
                        <h6 class="fw-bold mb-4" style="color:var(--dark);"><i class="fas fa-clock text-success me-2"></i>Catatan Aktivitas</h6>

                        <div class="position-relative ps-3" style="border-left: 2px dashed #cbd5e1; margin-left: 10px; font-size:.82rem;">
                            <!-- Status Terakhir -->
                            <div class="position-relative mb-4">
                                <div class="position-absolute" style="left:-25px; top:3px; width:12px; height:12px; background:#16a34a; border-radius:50%; border:2px solid #fff; box-shadow:0 0 0 1.5px #16a34a; z-index: 2;"></div>
                                <div class="ms-2">
                                    <div class="d-flex justify-content-between align-items-center mb-0.5">
                                        <div class="fw-bold text-dark" style="font-size:.85rem;"><?= $p['status']; ?></div>
                                        <div class="text-muted" style="font-size:.65rem;"><i class="far fa-clock me-1"></i><?= date('d M Y H.i', strtotime($p['created_at'])); ?></div>
                                    </div>
                                    <div class="text-muted" style="font-size:.78rem; line-height: 1.4;"><?= $p['keterangan'] ?: 'Status telah diperbarui oleh sistem.'; ?></div>
                                </div>
                            </div>

                            <!-- Diajukan (Awal) -->
                            <div class="position-relative">
                                <div class="position-absolute" style="left:-25px; top:3px; width:12px; height:12px; background:#3b82f6; border-radius:50%; border:2px solid #fff; box-shadow:0 0 0 1.5px #3b82f6; z-index: 2;"></div>
                                <div class="ms-2">
                                    <div class="d-flex justify-content-between align-items-center mb-0.5">
                                        <div class="fw-bold text-dark" style="font-size:.85rem;">Diajukan</div>
                                        <div class="text-muted" style="font-size:.65rem;"><i class="far fa-clock me-1"></i><?= date('d M Y H.i', strtotime($p['created_at'])); ?></div>
                                    </div>
                                    <div class="text-muted" style="font-size:.78rem; line-height: 1.4;">Usulan UHC berhasil dikirim oleh pengguna.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
