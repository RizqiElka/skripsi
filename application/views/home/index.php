
<!-- ===== PROFIL SECTION & ALERTS ===== -->
<div class="container pb-5 mb-4" id="profil" style="margin-top:-70px;position:relative;z-index:3;">
    
    <!-- Peringatan Kesehatan (Dynamic Styles) -->
    <?php if(!empty($peringatan)): ?>
    <div class="mb-4">
        <?php foreach($peringatan as $p): ?>
        <?php 
            // Default: Warning (Kuning)
            $icon = 'fa-exclamation-triangle';
            $bg_color = '#fffbeb'; 
            $icon_bg = 'rgba(245, 158, 11, 0.15)';
            $accent_color = '#d97706';
            $title_color = '#92400e';
            
            if($p['tipe'] == 'danger') { 
                $icon = 'fa-biohazard'; 
                $bg_color = '#fef2f2'; 
                $icon_bg = 'rgba(239, 68, 68, 0.15)';
                $accent_color = '#dc2626';
                $title_color = '#991b1b';
            } elseif($p['tipe'] == 'info') { 
                $icon = 'fa-info-circle'; 
                $bg_color = '#f0f9ff'; 
                $icon_bg = 'rgba(14, 165, 233, 0.15)';
                $accent_color = '#0284c7';
                $title_color = '#075985';
            }
        ?>
        <div class="alert d-flex align-items-center gap-4 p-4 border-0 shadow-2xl reveal mb-3" 
             style="border-radius:28px; background: <?= $bg_color; ?>; border-left: 6px solid <?= $accent_color; ?> !important;">
            <div style="width:64px;height:64px;background:<?= $icon_bg; ?>;border-radius:20px;display:flex;align-items:center;justify-content:center;font-size:1.8rem;flex-shrink:0;color:<?= $accent_color; ?>;">
                <i class="fas <?= $icon; ?>"></i>
            </div>
            <div class="flex-grow-1">
                <h5 class="fw-bold mb-1" style="font-family:'Outfit',sans-serif; color:<?= $title_color; ?>;"><?= $p['judul']; ?></h5>
                <p class="mb-0 small" style="line-height:1.6; color: rgba(0,0,0,0.65);"><?= nl2br($p['pesan']); ?></p>
            </div>
            <button type="button" class="btn-close ms-auto shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <div class="row g-4 align-items-stretch">
        <div class="col-lg-8">
            <div class="info-card-base h-100 p-5 reveal reveal-left">
                <div class="d-flex align-items-center gap-4 mb-5">
                    <div style="width:64px;height:64px;background:var(--primary-light);border-radius:20px;display:flex;align-items:center;justify-content:center;font-size:1.8rem;color:var(--primary);">
                        <i class="fas fa-award"></i>
                    </div>
                    <div>
                        <div class="section-label"><i class="fas fa-star-of-life"></i> Identitas Kami</div>
                        <h2 class="fw-bold mb-0 mt-1" style="font-size:2.2rem; letter-spacing:-1px;">Membangun Masa Depan Sehat</h2>
                    </div>
                </div>
                <div class="row g-4 mb-5 stagger-parent">
                    <div class="col-md-5">
                        <div class="p-4 rounded-4 h-100 reveal reveal-zoom" style="background:linear-gradient(135deg,rgba(13,148,136,.06),rgba(2,132,199,.06));border:1.5px solid rgba(13,148,136,.12);">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div style="width:32px;height:32px;background:var(--primary);border-radius:10px;display:flex;align-items:center;justify-content:center;"><i class="fas fa-eye text-white" style="font-size:.8rem;"></i></div>
                                <h5 class="fw-bold text-primary mb-0" style="font-family:'Outfit',sans-serif;">Visi Kami</h5>
                            </div>
                            <p class="mb-0 small lh-lg text-dark fw-medium"><?= nl2br($profil['visi']); ?></p>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="p-4 rounded-4 h-100 reveal reveal-zoom" style="background:#f8fafc;border:1.5px solid #e2e8f0; --delay:1;">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div style="width:32px;height:32px;background:#0284c7;border-radius:10px;display:flex;align-items:center;justify-content:center;"><i class="fas fa-list-check text-white" style="font-size:.8rem;"></i></div>
                                <h5 class="fw-bold mb-0" style="font-family:'Outfit',sans-serif;color:#1e293b;">Misi Strategis</h5>
                            </div>
                            <p class="text-muted small lh-lg mb-0"><?= nl2br($profil['misi']); ?></p>
                        </div>
                    </div>
                </div>
                <hr style="border-color:#f1f5f9;margin:2rem 0;">
                <div class="reveal">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div style="width:42px;height:42px;background:rgba(2,132,199,.1);border-radius:14px;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="fas fa-history text-secondary"></i></div>
                        <h4 class="fw-bold mb-0" style="font-size:1.3rem;">Sejarah Singkat</h4>
                    </div>
                    <p class="text-muted lh-lg small mb-0"><?= nl2br($profil['sejarah']); ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="h-100 d-flex flex-column gap-4">
                <div class="info-card-base flex-grow-1 p-5 reveal reveal-right" style="background:linear-gradient(165deg, var(--primary), var(--primary-dark));">
                    <div style="width:60px;height:60px;background:rgba(255,255,255,.15);border:1px solid rgba(255,255,255,.2);border-radius:20px;display:flex;align-items:center;justify-content:center;margin-bottom:1.5rem;font-size:1.6rem;color:#fff;"><i class="fas fa-clock"></i></div>
                    <h4 class="fw-bold text-white mb-4" style="font-family:'Outfit',sans-serif;font-size:1.6rem;">Jam Pelayanan</h4>
                    <div class="rounded-4 p-4 text-white small lh-lg" style="background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.15); font-size:.95rem;"><?= nl2br($profil['jam_operasional']); ?></div>
                    <?php if($is_open): ?>
                        <div class="d-inline-flex align-items-center gap-3 mt-4 px-4 py-2 rounded-pill" style="background:rgba(74,222,128,.2);border:1px solid rgba(74,222,128,.3);">
                            <span style="width:10px;height:10px;background:#4ade80;border-radius:50%;display:inline-block;animation: pulse-glow 2s infinite;"></span>
                            <small class="text-white fw-bold">Buka Sekarang</small>
                        </div>
                    <?php else: ?>
                        <div class="d-inline-flex align-items-center gap-3 mt-4 px-4 py-2 rounded-pill" style="background:rgba(239,68,68,.2);border:1px solid rgba(239,68,68,.3);">
                            <span style="width:10px;height:10px;background:#f87171;border-radius:50%;display:inline-block;"></span>
                            <small class="text-white fw-bold">Sudah Tutup</small>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="info-card-base p-5 reveal reveal-right" style="--delay:1;">
                    <div style="width:60px;height:60px;background:rgba(2,132,199,.1);border-radius:20px;display:flex;align-items:center;justify-content:center;margin-bottom:1.5rem;font-size:1.6rem;color:#0284c7;"><i class="fas fa-headset"></i></div>
                    <h4 class="fw-bold mb-4" style="font-family:'Outfit',sans-serif;font-size:1.6rem;">Hubungi Kami</h4>
                    <div class="d-flex flex-column gap-4">
                        <div class="d-flex align-items-start gap-3">
                            <div style="width:36px;height:36px;background:var(--primary-light);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;color:var(--primary);"><i class="fas fa-map-pin" style="font-size:.9rem;"></i></div>
                            <div>
                                <div style="font-size:.75rem;color:#94a3b8;font-weight:700;text-transform:uppercase;letter-spacing:1px;">Alamat Kantor</div>
                                <div class="small fw-semibold mt-1" style="color:#1e293b;"><?= $profil['alamat']; ?></div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3">
                            <div style="width:36px;height:36px;background:var(--primary-light);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;color:var(--primary);"><i class="fas fa-phone-alt" style="font-size:.9rem;"></i></div>
                            <div>
                                <div style="font-size:.75rem;color:#94a3b8;font-weight:700;text-transform:uppercase;letter-spacing:1px;">Layanan Telepon</div>
                                <div class="fw-bold mt-1" style="font-size:1.15rem;color:var(--primary);"><?= $profil['telepon']; ?></div>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url('layananonline'); ?>" class="btn btn-primary w-100 mt-4 shadow-sm"><i class="fas fa-wifi me-2"></i>Layanan Digital</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===== WHY CHOOSE US ===== -->
<section class="py-5 my-5" style="background:linear-gradient(165deg, #f0fdfa 0%, #e6fffa 100%); border-top: 1px solid rgba(13,148,136,0.1); border-bottom: 1px solid rgba(13,148,136,0.1);">
    <div class="container py-5">
        <div class="text-center mb-5 reveal">
            <div class="section-label mx-auto">
                <i class="fas fa-shield-heart"></i> Kenapa Harus Kami?
            </div>
            <h2 class="fw-bold text-dark mt-3" style="font-family:'Outfit',sans-serif;font-size:2.8rem; letter-spacing:-1px;">Keunggulan Layanan Kami</h2>
            <p class="text-muted mt-3 mx-auto" style="max-width:600px; font-size:1.1rem;">Komitmen kami adalah memberikan standar kualitas kesehatan terbaik bagi setiap lapisan masyarakat.</p>
        </div>
        <div class="row g-4 stagger-parent">
            <div class="col-md-3 col-sm-6 reveal reveal-zoom">
                <div class="why-card text-center h-100" style="background:rgba(255,255,255,0.7); border:1px solid rgba(13,148,136,0.1);">
                    <div class="why-icon-wrap"><i class="fas fa-user-nurse"></i></div>
                    <h5 class="fw-bold text-dark mb-3" style="font-family:'Outfit',sans-serif;">Tenaga Profesional</h5>
                    <p class="small text-muted" style="line-height:1.8;">Didukung oleh tim medis berpengalaman, bersertifikasi, dan berdedikasi tinggi.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 reveal reveal-zoom" style="--delay:1;">
                <div class="why-card text-center h-100" style="background:rgba(255,255,255,0.7); border:1px solid rgba(13,148,136,0.1);">
                    <div class="why-icon-wrap"><i class="fas fa-microscope"></i></div>
                    <h5 class="fw-bold text-dark mb-3" style="font-family:'Outfit',sans-serif;">Peralatan Modern</h5>
                    <p class="small text-muted" style="line-height:1.8;">Diagnosis lebih akurat dengan dukungan fasilitas medis berteknologi mutakhir.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 reveal reveal-zoom" style="--delay:2;">
                <div class="why-card text-center h-100" style="background:rgba(255,255,255,0.7); border:1px solid rgba(13,148,136,0.1);">
                    <div class="why-icon-wrap"><i class="fas fa-hand-holding-heart"></i></div>
                    <h5 class="fw-bold text-dark mb-3" style="font-family:'Outfit',sans-serif;">Inklusivitas BPJS</h5>
                    <p class="small text-muted" style="line-height:1.8;">Layanan terbuka bagi pengguna BPJS maupun pasien umum tanpa diskriminasi.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 reveal reveal-zoom" style="--delay:3;">
                <div class="why-card text-center h-100" style="background:rgba(255,255,255,0.7); border:1px solid rgba(13,148,136,0.1);">
                    <div class="why-icon-wrap"><i class="fas fa-laptop-medical"></i></div>
                    <h5 class="fw-bold text-dark mb-3" style="font-family:'Outfit',sans-serif;">Sistem Terintegrasi</h5>
                    <p class="small text-muted" style="line-height:1.8;">Kemudahan akses layanan melalui platform digital yang modern dan efisien.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== WILAYAH KERJA ===== -->
<section class="py-5" style="background:#f8fafc;position:relative;overflow:hidden;">
    <div class="container py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-5 reveal reveal-left">
                <div class="section-label"><i class="fas fa-map-location-dot"></i> Cakupan Wilayah</div>
                <h2 class="fw-bold mt-3 mb-4" style="font-family:'Outfit',sans-serif;font-size:2.6rem; letter-spacing:-1.5px;">Wilayah Kerja Kami</h2>
                <p class="text-muted lh-lg mb-5" style="font-size:1.05rem;">Sebagai pusat kesehatan masyarakat, kami bertanggung jawab melayani berbagai desa di Kecamatan Rowosari dengan sepenuh hati.</p>
                <div class="row g-3 stagger-parent">
                    <?php if(!empty($wilayah)): ?>
                    <?php foreach($wilayah as $i => $w): ?>
                    <div class="col-6 reveal reveal-zoom" style="--delay:<?= $i; ?>">
                        <div class="d-flex align-items-center gap-3 p-3 bg-white border border-light rounded-pill shadow-sm hover-up">
                            <i class="fas fa-check-circle text-success" style="font-size:1.1rem;"></i>
                            <span class="small fw-bold text-dark"><?= $w['nama_desa']; ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-7 reveal reveal-right">
                <div class="position-relative">
                    <div class="p-3 bg-white shadow-2xl rounded-4 border border-light">
                        <?php if(!empty($profil['gambar_wilayah'])): ?>
                            <img src="<?= base_url('assets/uploads/'.$profil['gambar_wilayah']); ?>" 
                                 class="rounded-4 w-100" alt="Wilayah Kerja" style="height:480px;object-fit:cover;">
                        <?php else: ?>
                            <img src="https://images.unsplash.com/photo-1526772662000-3f88f10405ff?auto=format&fit=crop&w=1200&q=80" 
                                 class="rounded-4 w-100" alt="Peta Wilayah" style="height:480px;object-fit:cover;">
                        <?php endif; ?>
                        <div class="position-absolute bottom-0 start-0 p-5 w-100">
                             <div class="p-4 rounded-4 backdrop-blur-xl text-white shadow-2xl" style="background:rgba(13,148,136,.9);">
                                 <div class="d-flex align-items-center gap-2 mb-2">
                                     <i class="fas fa-hospital-user fa-lg"></i>
                                     <span class="fw-bold text-uppercase tracking-widest small">Melayani Sepenuh Hati</span>
                                 </div>
                                 <p class="mb-0 small opacity-90 fw-medium">Kami berkomitmen mewujudkan masyarakat Rowosari yang sehat, mandiri, dan berkeadilan melalui pelayanan prima.</p>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== LAYANAN UNGGULAN ===== -->
<section class="py-5 my-5">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <div class="section-label mx-auto"><i class="fas fa-stethoscope"></i> Poli & Layanan</div>
            <h2 class="fw-bold mt-3" style="font-family:'Outfit',sans-serif;font-size:2.8rem; letter-spacing:-1.5px;">Layanan Kesehatan Utama</h2>
            <div class="section-divider"></div>
        </div>
        <div class="row g-4 justify-content-center mb-5 stagger-parent">
            <?php
            $colors = ['#0d9488', '#0284c7', '#7c3aed', '#dc2626', '#f59e0b', '#10b981'];
            foreach($layanan as $i => $lu): 
                $color = $colors[$i % count($colors)];
            ?>
            <div class="col-sm-6 col-lg-3 reveal reveal-zoom" style="--delay:<?= $i; ?>;">
                <div class="layanan-home-card text-center p-5">
                    <div class="layanan-home-icon mx-auto mb-4" style="background:<?= $color; ?>12;border:2px solid <?= $color ?>20;">
                        <i class="<?= empty($lu['icon']) ? 'fas fa-stethoscope' : $lu['icon']; ?> fa-2xl" style="color:<?= $color; ?>;"></i>
                    </div>
                    <h5 class="fw-bold mb-3" style="font-family:'Outfit',sans-serif;font-size:1.15rem;"><?= $lu['nama_layanan']; ?></h5>
                    <p class="text-muted small mb-0 lh-lg"><?= $lu['deskripsi']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center reveal">
            <a href="<?= base_url('layanan'); ?>" class="btn btn-outline-primary btn-lg px-5 shadow-sm" style="border-radius:18px;">
                Lihat Seluruh Layanan <i class="fas fa-arrow-right ms-3"></i>
            </a>
        </div>
    </div>
</section>

<!-- ===== ARTIKEL TERBARU ===== -->
<?php if(!empty($artikel_terbaru)): ?>
<section class="py-5 my-5" style="background:#fff;">
    <div class="container">
        <div class="d-flex align-items-end justify-content-between mb-5 flex-wrap gap-4 reveal">
            <div>
                <div class="section-label"><i class="fas fa-newspaper"></i> Wawasan Sehat</div>
                <h2 class="fw-bold mt-3 mb-0" style="font-family:'Outfit',sans-serif;font-size:2.8rem; letter-spacing:-1.5px;">Kegiatan & Tips Kesehatan</h2>
            </div>
            <a href="<?= base_url('artikel'); ?>" class="btn btn-outline-primary btn-lg px-4" style="border-radius:16px;">
                Jelajahi Berita <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
        <div class="row g-4 stagger-parent">
            <?php foreach($artikel_terbaru as $idx => $art): ?>
            <div class="col-md-4 reveal reveal-zoom" style="--delay:<?= $idx; ?>;">
                <article class="artikel-card-home h-100">
                    <div class="artikel-img-home-wrap">
                        <img src="<?= base_url('assets/uploads/artikel/' . $art['gambar']); ?>"
                             alt="<?= htmlspecialchars($art['judul']); ?>"
                             class="artikel-img-home"
                             onerror="this.src='https://images.unsplash.com/photo-1576671081837-49000212a370?w=800&q=80'">
                        <div class="artikel-date-badge-home shadow">
                            <i class="fas fa-calendar-alt me-2 text-primary"></i>
                            <?= date('d M Y', strtotime($art['tanggal'])); ?>
                        </div>
                    </div>
                    <div class="artikel-home-body p-4">
                        <h5 class="artikel-home-title mb-3"><?= htmlspecialchars($art['judul']); ?></h5>
                        <p class="artikel-home-excerpt mb-4"><?= substr(strip_tags($art['isi']), 0, 120); ?>…</p>
                        <a href="<?= base_url('artikel/detail/' . $art['slug']); ?>" class="artikel-home-readmore">
                            Baca Selengkapnya <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </article>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ===== CTA DIGITAL HEALTH ===== -->
<section class="py-5 my-5">
    <div class="container">
        <div class="cta-banner reveal reveal-zoom">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <div class="section-label" style="background:rgba(255,255,255,.15);color:#fff;border-color:rgba(255,255,255,.2);margin-bottom:1.5rem;">
                        <i class="fas fa-wifi"></i> Digital Healthcare
                    </div>
                    <h2 class="fw-bold text-white mb-4" style="font-family:'Outfit',sans-serif;font-size:3rem; letter-spacing:-2px; line-height:1.1;">Konsultasi Online,<br>Kapanpun & Dimanapun!</h2>
                    <p class="mb-0 fw-light text-white-50" style="font-size:1.15rem; line-height:1.8; max-width:520px;">
                        Gunakan layanan konsultasi digital dan pengingat kontrol rutin kami. Cukup akses dari rumah dan tim kami siap melayani Anda.
                    </p>
                </div>
                <div class="col-lg-5 d-flex gap-3 flex-wrap justify-content-lg-end">
                    <a href="<?= base_url('layananonline/pendaftaran'); ?>" class="btn px-5 py-4 btn-light-glass">
                        <i class="fas fa-user-pen me-3"></i>Pendaftaran Online
                    </a>
                    <a href="<?= base_url('layananonline/konsultasi'); ?>" class="btn px-5 py-4 btn-white-solid">
                        <i class="fas fa-comments-medical me-3"></i>Konsultasi Medis
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Custom helper classes */
.hover-up { transition: var(--transition); }
.hover-up:hover { transform: translateY(-5px); }
.shadow-2xl { box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15); }
.backdrop-blur-xl { backdrop-filter: blur(24px); -webkit-backdrop-filter: blur(24px); }

/* Why cards */
.why-card {
    background: rgba(255,255,255,.03);
    border: 1px solid rgba(255,255,255,.07);
    border-radius: 24px;
    padding: 3rem 2rem;
    transition: all .4s ease;
}
.why-card:hover { background: rgba(255,255,255,.06); transform: translateY(-10px); }
.why-icon-wrap {
    width: 72px; height: 72px;
    background: linear-gradient(135deg, rgba(13,148,136,.2), rgba(2,132,199,.2));
    border: 1px solid rgba(13,148,136,.15);
    border-radius: 20px;
    display: flex; align-items: center; justify-content: center;
    color: #5eead4;
    font-size: 1.8rem;
    margin: 0 auto 1.5rem;
    transition: all .4s ease;
}
.why-card:hover .why-icon-wrap { background: linear-gradient(135deg, var(--primary), #0284c7); transform: scale(1.1) rotate(5deg); color: #fff; }

/* Layanan home cards */
.layanan-home-card {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 28px;
    box-shadow: 0 4px 20px rgba(0,0,0,.03);
    transition: all .4s cubic-bezier(.4, 0, .2, 1);
    height: 100%;
}
.layanan-home-card:hover { transform: translateY(-12px); box-shadow: 0 25px 50px rgba(0,0,0,.08); border-color: var(--primary-light) !important; }
.layanan-home-icon {
    width: 90px; height: 90px;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    transition: all .4s ease;
}
.layanan-home-card:hover .layanan-home-icon { transform: scale(1.15) rotate(10deg); }

/* Artikel home cards */
.artikel-card-home {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,.04);
    display: flex; flex-direction: column;
    transition: all .4s ease;
}
.artikel-card-home:hover { transform: translateY(-10px); box-shadow: 0 20px 45px rgba(0,0,0,.08); }
.artikel-img-home-wrap { position: relative; overflow: hidden; height: 220px; }
.artikel-img-home { width: 100%; height: 100%; object-fit: cover; transition: transform .6s ease; }
.artikel-card-home:hover .artikel-img-home { transform: scale(1.08); }
.artikel-date-badge-home {
    position: absolute; bottom: 16px; left: 16px;
    background: rgba(255,255,255,0.95);
    backdrop-filter: blur(10px);
    color: #0f172a;
    font-size: .75rem; font-weight: 800;
    padding: 6px 16px;
    border-radius: 50px;
    border: 1px solid #e2e8f0;
}
.artikel-home-title {
    font-family: 'Outfit', sans-serif;
    font-weight: 700; font-size: 1.1rem;
    color: #1e293b; line-height: 1.4;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
}
.artikel-home-excerpt { font-size: .88rem; color: #64748b; line-height: 1.7; }
.artikel-home-readmore {
    display: inline-flex; align-items: center;
    color: var(--primary);
    font-weight: 800; font-size: .85rem;
    text-decoration: none;
    padding-top: 1rem;
    border-top: 1px solid #f1f5f9;
    transition: all .3s ease;
    font-family: 'Outfit', sans-serif;
}
.artikel-home-readmore:hover { color: var(--primary-dark); letter-spacing: 0.5px; }

/* CTA Banner */
.cta-banner {
    background: linear-gradient(135deg, #0d9488 0%, #0284c7 50%, #0ea5e9 100%);
    border-radius: 40px;
    padding: 5rem;
    position: relative;
    overflow: hidden;
    box-shadow: 0 30px 70px rgba(13,148,136,.3);
}
.cta-banner::before {
    content: ''; position: absolute; top: -50%; right: -10%;
    width: 500px; height: 500px; background: rgba(255,255,255,.06);
    border-radius: 50%;
}
.btn-white-solid {
    background: #fff; color: var(--primary); border-radius: 18px; font-weight: 800;
    font-family: 'Outfit', sans-serif; transition: var(--transition);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}
.btn-white-solid:hover { transform: translateY(-5px); background: #f8fafc; color: var(--primary-dark); }
.btn-light-glass {
    background: rgba(255,255,255,.12); color: #fff; border: 1.5px solid rgba(255,255,255,.25);
    border-radius: 18px; font-weight: 800; font-family: 'Outfit', sans-serif;
    backdrop-filter: blur(12px); transition: var(--transition);
}
.btn-light-glass:hover { background: rgba(255,255,255,.2); border-color: rgba(255,255,255,.4); transform: translateY(-5px); }

@media (max-width: 991.98px) {
    .cta-banner { padding: 3rem; text-align: center; }
    .cta-banner .justify-content-lg-end { justify-content: center !important; }
    .hero-home { padding: 140px 0 100px; }
}
</style>
