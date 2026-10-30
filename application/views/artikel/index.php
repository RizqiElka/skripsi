

<div class="container mb-5 pb-5" style="margin-top:40px;position:relative;z-index:3;">
    <div class="text-center mb-5">
        <div class="section-label mx-auto" style="display:inline-flex;"><i class="fas fa-rss"></i> Update Terbaru</div>
        <h2 class="fw-bold mt-2" style="font-family:'Outfit',sans-serif;font-size:2.4rem; letter-spacing:-1px;">Artikel Pilihan</h2>
        <div class="section-divider"></div>
    </div>

    <?php if(empty($artikel)): ?>
    <div class="text-center py-5 reveal reveal-zoom">
        <div style="width:100px;height:100px;background:#f1f5f9;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1.5rem;font-size:2.5rem;color:#cbd5e1;">
            <i class="fas fa-newspaper"></i>
        </div>
        <h4 class="text-dark fw-bold">Belum Ada Artikel</h4>
        <p class="text-muted small">Artikel kesehatan akan segera kami publikasikan. Terus pantau halaman ini!</p>
    </div>
    <?php else: ?>
    <div class="row g-4 stagger-parent">
        <?php foreach($artikel as $index => $a) : ?>
        <div class="col-md-4 reveal reveal-zoom" style="--delay:<?= $index; ?>;">
            <article class="artikel-card h-100 shadow-sm">
                <div class="artikel-img-wrap">
                    <img src="<?= base_url('assets/uploads/artikel/' . $a['gambar']); ?>"
                         alt="<?= htmlspecialchars($a['judul']); ?>"
                         class="artikel-img"
                         onerror="this.src='https://images.unsplash.com/photo-1576671081837-49000212a370?w=800&q=80'">
                    <div class="artikel-date-badge shadow">
                        <i class="fas fa-calendar-alt me-2 text-primary"></i>
                        <?= date('d M Y', strtotime($a['tanggal'])); ?>
                    </div>
                </div>
                <div class="artikel-body p-4">
                    <h5 class="artikel-title mb-3"><?= htmlspecialchars($a['judul']); ?></h5>
                    <p class="artikel-excerpt mb-4"><?= substr(strip_tags($a['isi']), 0, 120); ?>…</p>
                    <a href="<?= base_url('artikel/detail/' . $a['slug']); ?>" class="artikel-readmore mt-auto">
                        Baca Selengkapnya <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </article>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>

<style>
.artikel-card {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 24px;
    overflow: hidden;
    display: flex; flex-direction: column;
    transition: all .4s cubic-bezier(.4, 0, .2, 1);
}
.artikel-card:hover { transform: translateY(-10px); box-shadow: 0 25px 50px rgba(0,0,0,.08) !important; border-color: var(--primary-light); }
.artikel-img-wrap { position: relative; overflow: hidden; height: 220px; }
.artikel-img { width: 100%; height: 100%; object-fit: cover; transition: transform .6s ease; }
.artikel-card:hover .artikel-img { transform: scale(1.08); }
.artikel-date-badge {
    position: absolute; bottom: 16px; left: 16px;
    background: rgba(255,255,255,0.95);
    backdrop-filter: blur(10px);
    color: #0f172a;
    font-size: .75rem; font-weight: 800;
    padding: 6px 16px;
    border-radius: 50px;
    border: 1px solid #e2e8f0;
}
.artikel-title {
    font-family: 'Outfit', sans-serif;
    font-weight: 700; font-size: 1.1rem;
    color: #1e293b; line-height: 1.4;
    display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;
}
.artikel-excerpt { font-size: .88rem; color: #64748b; line-height: 1.7; }
.artikel-readmore {
    display: inline-flex; align-items: center;
    color: var(--primary);
    font-weight: 800; font-size: .85rem;
    text-decoration: none;
    padding-top: 1rem;
    border-top: 1px solid #f1f5f9;
    transition: all .3s ease;
    font-family: 'Outfit', sans-serif;
}
.artikel-readmore:hover { color: var(--primary-dark); letter-spacing: 0.5px; }
</style>
