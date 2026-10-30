

<div class="container mb-5 pb-5 position-relative" style="margin-top:40px; z-index:3;">
    <div class="text-center mb-5 reveal">
        <h2 class="fw-bold text-dark mt-2" style="font-family:'Outfit',sans-serif; font-size:2.8rem; letter-spacing:-1.5px;">Temui Dokter & Perawat Kami</h2>
        <div class="mx-auto mt-3" style="width:80px; height:5px; background:linear-gradient(90deg, var(--primary), #0ea5e9); border-radius:10px;"></div>
    </div>

    <div class="row g-4 stagger-parent justify-content-center">
        <?php foreach($tenaga as $index => $t) : ?>
        <div class="col-sm-6 col-md-4 col-lg-3 reveal reveal-zoom" style="--delay:<?= $index; ?>;">
            <div class="tenaga-card-v2 h-100 position-relative">
                <div class="card-bg-glow"></div>
                <div class="tenaga-card-inner bg-white h-100 d-flex flex-column">
                    <!-- Decor Top -->
                    <div class="tenaga-decor-top"></div>
                    
                    <div class="p-4 pt-5 flex-grow-1 d-flex flex-column align-items-center text-center">
                        <div class="tenaga-avatar-v2-wrap mb-4">
                            <div class="avatar-ring"></div>
                            <img src="<?= base_url('assets/uploads/tenaga/' . $t['foto']); ?>"
                                 class="tenaga-avatar-v2"
                                 alt="<?= $t['nama']; ?>"
                                 onerror="this.src='https://ui-avatars.com/api/?name=<?= urlencode($t['nama']) ?>&background=0d9488&color=fff&size=200&rounded=true&bold=true'">
                            
                            <?php if($t['status_kerja'] == 'Aktif'): ?>
                                <div class="status-badge-v2 bg-success border-success" title="Aktif Melayani"><i class="fas fa-check"></i></div>
                            <?php else: ?>
                                <div class="status-badge-v2 bg-danger border-danger" title="Sedang Cuti"><i class="fas fa-pause"></i></div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="tenaga-jabatan-v2 mb-3 px-3 py-1 rounded-pill fw-bold" style="font-family:'Outfit',sans-serif; font-size:.75rem; letter-spacing:1px; text-transform:uppercase;">
                            <?= $t['jabatan']; ?>
                        </div>
                        <h5 class="fw-bold mb-3 text-dark" style="font-family:'Outfit',sans-serif; font-size:1.15rem; line-height:1.4;"><?= $t['nama']; ?></h5>
                        
                        <div class="w-100 mt-auto">
                            <div class="jadwal-box p-3 rounded-4 mb-4 text-start">
                                <div class="d-flex align-items-center gap-2 mb-1" style="font-size:.7rem; color:#64748b; font-weight:700; text-transform:uppercase; letter-spacing:1px;">
                                    <i class="far fa-calendar-check text-primary"></i> Jadwal Praktik
                                </div>
                                <div class="fw-bold text-dark" style="font-size:.85rem; line-height:1.4;">
                                    <?= $t['jadwal'] ? $t['jadwal'] : 'Sesuai Janji Temu'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-footer-v2 border-top p-3 d-flex justify-content-center gap-3" style="background:#f8fafc; border-color:#f1f5f9 !important;">
                        <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', ($profil['telepon'] ?? '')); ?>" class="social-btn-v2" aria-label="WhatsApp" title="Hubungi via WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <?php if(!empty($profil['email'])): ?>
                        <a href="mailto:<?= $profil['email']; ?>" class="social-btn-v2" aria-label="Email" title="Kirim Email">
                            <i class="far fa-envelope"></i>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<style>

body { background: #f8fafc; }

/* Card Redesign */
.tenaga-card-v2 {
    border-radius: 28px;
    padding: 2px; /* For gradient border effect */
    transition: all .5s cubic-bezier(.4, 0, .2, 1);
    z-index: 1;
}
.card-bg-glow {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, var(--primary) 0%, #38bdf8 100%);
    border-radius: 28px;
    opacity: 0;
    transition: opacity .5s ease;
    z-index: -1;
    filter: blur(8px);
}
.tenaga-card-v2:hover { transform: translateY(-12px); }
.tenaga-card-v2:hover .card-bg-glow { opacity: 0.35; }

.tenaga-card-inner {
    border-radius: 26px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,.03);
    border: 1px solid #e2e8f0;
    transition: all .5s ease;
}
.tenaga-card-v2:hover .tenaga-card-inner {
    border-color: transparent;
    box-shadow: 0 20px 40px rgba(13,148,136,.1);
}

.tenaga-decor-top {
    height: 6px;
    width: 100%;
    background: linear-gradient(90deg, var(--primary), #38bdf8);
}

/* Avatar Styling */
.tenaga-avatar-v2-wrap {
    position: relative;
    width: 110px;
    height: 110px;
    margin: 0 auto;
}
.avatar-ring {
    position: absolute;
    inset: -6px;
    border-radius: 50%;
    background: conic-gradient(from 0deg, var(--primary), #38bdf8, var(--primary));
    animation: rotate 4s linear infinite;
    opacity: 0;
    transition: opacity .4s ease;
}
@keyframes rotate { 100% { transform: rotate(360deg); } }
.tenaga-card-v2:hover .avatar-ring { opacity: 1; }

.tenaga-avatar-v2 {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid #fff;
    position: relative;
    z-index: 2;
    box-shadow: 0 8px 20px rgba(0,0,0,.08);
    transition: transform .5s cubic-bezier(.4, 0, .2, 1);
}
.tenaga-card-v2:hover .tenaga-avatar-v2 { transform: scale(1.05); }

.status-badge-v2 {
    position: absolute;
    bottom: 0;
    right: 5px;
    width: 28px;
    height: 28px;
    border-radius: 50%;
    border: 3px solid #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: .75rem;
    z-index: 3;
    box-shadow: 0 4px 10px rgba(0,0,0,.1);
}

/* Labels & Boxes */
.tenaga-jabatan-v2 {
    display: inline-block;
    background: rgba(13,148,136,.08);
    color: var(--primary);
    border: 1px solid rgba(13,148,136,.15);
}

.jadwal-box {
    background: linear-gradient(145deg, #ffffff, #f8fafc);
    border: 1px solid #e2e8f0;
    border-left: 4px solid var(--primary);
    transition: all .3s ease;
}
.tenaga-card-v2:hover .jadwal-box {
    background: #fff;
    border-color: rgba(13,148,136,.2);
    box-shadow: 0 5px 15px rgba(0,0,0,.04);
}

/* Social Buttons */
.social-btn-v2 {
    width: 42px;
    height: 42px;
    border-radius: 12px;
    background: #fff;
    border: 1px solid #e2e8f0;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #64748b;
    text-decoration: none;
    font-size: 1.1rem;
    transition: all .3s cubic-bezier(.4, 0, .2, 1);
}
.social-btn-v2:hover {
    background: var(--primary);
    color: #fff;
    border-color: var(--primary);
    transform: translateY(-4px);
    box-shadow: 0 8px 15px rgba(13,148,136,.25);
}

/* Pulse animation */
@keyframes pulse-glow {
    0%,100% { box-shadow: 0 0 0 0 rgba(94,234,212,.6); }
    50%      { box-shadow: 0 0 0 10px rgba(94,234,212,0); }
}
</style>
