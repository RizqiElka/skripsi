<!-- Breadcrumb & Back -->
<div style="background:#fff;border-bottom:1px solid #f1f5f9;padding:1rem 0; position:relative; z-index:10;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0" style="font-size:.82rem; font-weight:600;">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>" class="text-decoration-none text-muted hover-primary">Beranda</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('artikel'); ?>" class="text-decoration-none text-muted hover-primary">Artikel</a></li>
                <li class="breadcrumb-item active text-primary" aria-current="page"><?= substr(htmlspecialchars($artikel['judul']), 0, 40); ?>…</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container py-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <!-- Article Header -->
            <div class="mb-5 reveal">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="section-label" style="display:inline-flex; margin-bottom:0;">
                        <i class="fas fa-newspaper me-2"></i> Edukasi Kesehatan
                    </div>
                    <div class="h-px bg-light flex-grow-1"></div>
                </div>
                
                <h1 class="display-5 fw-bold mb-4" style="font-family:'Outfit',sans-serif; color:#0f172a; letter-spacing:-1.5px; line-height:1.2;">
                    <?= htmlspecialchars($artikel['judul']); ?>
                </h1>
                
                <div class="d-flex align-items-center gap-4 flex-wrap pb-4" style="border-bottom:1px solid #f1f5f9;">
                    <div class="d-flex align-items-center gap-3">
                        <div style="width:45px;height:45px;background:#f8fafc;border-radius:50%;display:flex;align-items:center;justify-content:center; border:1px solid #e2e8f0;">
                            <i class="fas fa-calendar-alt text-primary"></i>
                        </div>
                        <div>
                            <div class="small text-muted fw-bold text-uppercase" style="font-size:.65rem; letter-spacing:1px;">Tanggal Terbit</div>
                            <div class="fw-bold small text-dark"><?= date('d F Y', strtotime($artikel['tanggal'])); ?></div>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center gap-3">
                        <div style="width:45px;height:45px;background:#f8fafc;border-radius:50%;display:flex;align-items:center;justify-content:center; border:1px solid #e2e8f0;">
                            <i class="fas fa-user-doctor text-primary"></i>
                        </div>
                        <div>
                            <div class="small text-muted fw-bold text-uppercase" style="font-size:.65rem; letter-spacing:1px;">Penulis</div>
                            <div class="fw-bold small text-dark">Tim Medis Puskesmas</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Featured Image -->
            <div class="mb-5 reveal reveal-zoom">
                <div class="position-relative overflow-hidden shadow-2xl" style="border-radius:32px;">
                    <img src="<?= base_url('assets/uploads/artikel/' . $artikel['gambar']); ?>"
                         class="w-100 d-block"
                         alt="<?= htmlspecialchars($artikel['judul']); ?>"
                         style="max-height:500px;object-fit:cover;"
                         onerror="this.src='https://images.unsplash.com/photo-1576671081837-49000212a370?w=1200&q=80'">
                    <div class="position-absolute bottom-0 start-0 w-100 p-4" style="background:linear-gradient(to top, rgba(0,0,0,0.4), transparent);">
                    </div>
                </div>
            </div>

            <!-- Article Content -->
            <div class="artikel-detail-content reveal">
                <div class="content-body" style="font-family:'Outfit', sans-serif; font-weight:400;">
                    <?= $artikel['isi']; ?>
                </div>
            </div>

            <!-- Share / Back -->
            <div class="reveal mt-5 pt-5" style="border-top:1px solid #f1f5f9;">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-4">
                    <a href="<?= base_url('artikel'); ?>"
                       class="btn btn-premium-outline px-4 py-3">
                        <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar
                    </a>
                    
                    <div class="d-flex align-items-center gap-3">
                        <span class="small text-muted fw-bold text-uppercase" style="letter-spacing:1px;">Bagikan:</span>
                        <div class="d-flex gap-2">
                            <a href="https://wa.me/?text=<?= urlencode($artikel['judul'] . ' ' . current_url()); ?>"
                               target="_blank"
                               class="share-btn-premium" style="--color:#25d366;" aria-label="WhatsApp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(current_url()); ?>"
                               target="_blank"
                               class="share-btn-premium" style="--color:#1877f2;" aria-label="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?text=<?= urlencode($artikel['judul']); ?>&url=<?= urlencode(current_url()); ?>"
                               target="_blank"
                               class="share-btn-premium" style="--color:#1da1f2;" aria-label="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
.hover-primary:hover { color: var(--primary) !important; }
.h-px { height: 1px; }

.artikel-detail-content {
    font-size: 1.15rem;
    line-height: 2;
    color: #334155;
}
.artikel-detail-content h2,
.artikel-detail-content h3,
.artikel-detail-content h4 {
    font-family: 'Outfit', sans-serif;
    font-weight: 800;
    color: #0f172a;
    margin-top: 2.5rem;
    margin-bottom: 1.25rem;
    letter-spacing: -1px;
}
.artikel-detail-content p { margin-bottom: 1.5rem; }
.artikel-detail-content img { border-radius: 24px; max-width: 100%; margin: 2rem 0; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
.artikel-detail-content ul, .artikel-detail-content ol { padding-left: 1.5rem; margin-bottom: 1.5rem; }
.artikel-detail-content li { margin-bottom: .6rem; }
.artikel-detail-content blockquote {
    border-left: 5px solid var(--primary);
    background: #f8fafc;
    padding: 2rem 2.5rem;
    border-radius: 0 24px 24px 0;
    font-style: italic;
    color: #0f172a;
    margin: 2.5rem 0;
    font-size: 1.25rem;
    font-weight: 500;
}

.share-btn-premium {
    width: 45px; height: 45px;
    border-radius: 14px;
    background: #fff;
    color: var(--color);
    border: 1px solid #f1f5f9;
    display: flex; align-items: center; justify-content: center;
    text-decoration: none;
    font-size: 1.1rem;
    transition: all .4s cubic-bezier(.4, 0, .2, 1);
}
.share-btn-premium:hover { 
    background: var(--color); 
    color: #fff; 
    border-color: var(--color); 
    transform: translateY(-5px); 
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

.btn-premium-outline {
    border: 2px solid #e2e8f0;
    color: #64748b;
    border-radius: 16px;
    font-weight: 800;
    font-family: 'Outfit', sans-serif;
    font-size: .9rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all .3s ease;
    background: #fff;
}
.btn-premium-outline:hover {
    border-color: var(--primary);
    color: var(--primary);
    background: #f0fdfa;
    transform: translateX(-5px);
}
</style>
