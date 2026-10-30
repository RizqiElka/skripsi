

<div class="container mb-5 pb-5" style="margin-top:40px;position:relative;z-index:3;">

    <!-- Section Label -->
    <div class="text-center mb-5">
        <div class="section-label mx-auto" style="display:inline-flex;"><i class="fas fa-briefcase-medical"></i> Pilihan Layanan</div>
        <h2 class="fw-bold mt-2" style="font-family:'Outfit',sans-serif;font-size:2.4rem; letter-spacing:-1px;">Layanan Medis Kami</h2>
        <div class="section-divider"></div>
    </div>

    <div class="row g-4 mb-5 stagger-parent">
        <?php foreach($layanan as $index => $l) : ?>
        <div class="col-md-4 reveal reveal-zoom" style="--delay:<?= $index; ?>;">
            <div class="card h-100 text-center p-5 border-0 shadow-sm" style="border-radius:28px !important;">
                <div class="card-body p-1">
                    <div class="layanan-icon-wrap mx-auto mb-4">
                        <i class="<?= $l['icon']; ?> fa-2xl"></i>
                    </div>
                    <h5 class="card-title fw-bold mb-3" style="font-family:'Outfit',sans-serif; font-size:1.2rem;"><?= $l['nama_layanan']; ?></h5>
                    <p class="card-text text-muted small lh-lg mb-0"><?= $l['deskripsi']; ?></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Fasilitas -->
    <div class="text-center my-5 pt-5">
        <div class="section-label mx-auto" style="display:inline-flex;background:rgba(2,132,199,.1);color:#0284c7;border-color:rgba(2,132,199,.2);">
            <i class="fas fa-building-circle-check"></i> Penunjang Medis
        </div>
        <h2 class="fw-bold mt-2" style="font-family:'Outfit',sans-serif;font-size:2.4rem; letter-spacing:-1px;">Fasilitas Tersedia</h2>
        <div class="section-divider" style="background:linear-gradient(90deg,#0284c7,#0ea5e9);"></div>
    </div>

    <div class="row g-4 justify-content-center stagger-parent">
        <?php foreach($fasilitas as $index => $f) : ?>
        <div class="col-lg-6 reveal reveal-left" style="--delay:<?= $index; ?>;">
            <div class="card border-0 shadow-sm hover-up" style="border-radius:24px !important;">
                <div class="card-body p-4 d-flex align-items-center gap-4">
                    <div style="width:60px;height:60px;background:linear-gradient(135deg,var(--primary),#0284c7);border-radius:18px;display:flex;align-items:center;justify-content:center;flex-shrink:0;box-shadow:0 8px 20px rgba(13,148,136,.2);">
                        <i class="fas fa-check-double text-white"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1" style="font-family:'Outfit',sans-serif;color:#1e293b;"><?= $f['nama_fasilitas']; ?></h5>
                        <p class="text-muted mb-0 small lh-lg"><?= $f['deskripsi']; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
.layanan-icon-wrap {
    width: 90px; height: 90px;
    background: var(--primary-light);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    color: var(--primary);
    transition: all .4s cubic-bezier(.4, 0, .2, 1);
}
.card:hover .layanan-icon-wrap {
    background: var(--primary);
    color: #fff;
    transform: scale(1.15) rotate(10deg);
    box-shadow: 0 10px 25px rgba(13,148,136,.3);
}
</style>
