<!-- ===== FOOTER ===== -->
<footer class="footer-premium mt-auto">
    <div class="container">
        <div class="row g-5">
            <!-- Brand & Info -->
            <div class="col-lg-5 reveal reveal-left">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="brand-icon flex-shrink-0" style="width:48px;height:48px;font-size:1.2rem;background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.1);box-shadow:none;">
                        <i class="fas fa-hospital-alt text-primary"></i>
                    </div>
                    <div>
                        <div class="text-white fw-bold fs-5" style="font-family:'Outfit',sans-serif;line-height:1.1;letter-spacing:-0.5px;">PUSKESMAS</div>
                        <div class="small" style="color:#64748b;font-size:.75rem;">Sistem Informasi Kesehatan</div>
                    </div>
                </div>
                <p class="mb-4 lh-lg" style="max-width:400px;font-size:.92rem;opacity:.7;">
                    Berdedikasi untuk memberikan pelayanan kesehatan yang berkualitas, modern, dan terjangkau bagi seluruh lapisan masyarakat. Kami hadir untuk mewujudkan komunitas yang sehat dan mandiri melalui integrasi teknologi medis terkini.
                </p>
                <div class="d-flex gap-3">
                    <a href="#" class="footer-social-btn" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="footer-social-btn" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $profil['telepon'] ?? ''); ?>" class="footer-social-btn" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    <?php if(isset($profil['email']) && !empty($profil['email'])): ?>
                    <a href="mailto:<?= $profil['email']; ?>" class="footer-social-btn" aria-label="Email"><i class="far fa-envelope"></i></a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Navegasi -->
            <div class="col-lg-3 col-6 reveal" style="--delay:1;">
                <h6 class="text-white fw-bold mb-4" style="font-family:'Outfit',sans-serif;letter-spacing:.5px;">Navigasi</h6>
                <ul class="list-unstyled d-flex flex-column gap-3">
                    <li><a href="<?= base_url(); ?>" class="footer-link"><i class="fas fa-chevron-right me-2" style="font-size:.65rem;color:var(--primary);"></i>Beranda</a></li>
                    <li><a href="<?= base_url('alurpelayanan'); ?>" class="footer-link"><i class="fas fa-chevron-right me-2" style="font-size:.65rem;color:var(--primary);"></i>Alur Pelayanan &amp; Poli</a></li>
                    <li><a href="<?= base_url('tarif'); ?>" class="footer-link"><i class="fas fa-chevron-right me-2" style="font-size:.65rem;color:var(--primary);"></i>Biaya &amp; Tarif</a></li>
                    <li><a href="<?= base_url('pengaduan'); ?>" class="footer-link"><i class="fas fa-chevron-right me-2" style="font-size:.65rem;color:var(--primary);"></i>Alur Pengaduan</a></li>
                    <li><a href="<?= base_url('layanan'); ?>" class="footer-link"><i class="fas fa-chevron-right me-2" style="font-size:.65rem;color:var(--primary);"></i>Layanan Medis</a></li>
                    <li><a href="<?= base_url('layananonline'); ?>" class="footer-link"><i class="fas fa-chevron-right me-2" style="font-size:.65rem;color:var(--primary);"></i>Layanan Digital</a></li>
                </ul>
            </div>

            <!-- Kontak -->
            <div class="col-lg-4 col-6 reveal reveal-right" style="--delay:2;">
                <h6 class="text-white fw-bold mb-4" style="font-family:'Outfit',sans-serif;letter-spacing:.5px;">Hubungi Kami</h6>
                <div class="d-flex flex-column gap-4" style="font-size:.88rem;">
                    <div class="d-flex align-items-start gap-3">
                        <div class="footer-contact-icon"><i class="fas fa-phone-alt"></i></div>
                        <div>
                            <div style="color:#64748b;font-size:.75rem;margin-bottom:2px;font-weight:600;text-transform:uppercase;">Telepon / Hotline</div>
                            <div class="text-white fw-bold"><?= $profil['telepon'] ?? '(021) 123-456'; ?></div>
                        </div>
                    </div>
                    <div class="d-flex align-items-start gap-3">
                        <div class="footer-contact-icon"><i class="fas fa-envelope"></i></div>
                        <div>
                            <div style="color:#64748b;font-size:.75rem;margin-bottom:2px;font-weight:600;text-transform:uppercase;">Email Resmi</div>
                            <div class="text-white fw-semibold"><?= !empty($profil['email']) ? $profil['email'] : 'puskesmas@email.com'; ?></div>
                        </div>
                    </div>
                    <div class="d-flex align-items-start gap-3">
                        <div class="footer-contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div>
                            <div style="color:#64748b;font-size:.75rem;margin-bottom:2px;font-weight:600;text-transform:uppercase;">Alamat</div>
                            <div class="text-white fw-semibold" style="line-height:1.5;"><?= $profil['alamat'] ?? 'Alamat belum diatur di admin.'; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="footer-divider my-5">
        <div class="row align-items-center reveal reveal-zoom">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <p class="mb-0 small" style="opacity:.5;">
                    &copy; <?= date('Y'); ?> <span class="fw-bold text-white">Sistem Informasi Puskesmas</span>. Hak Cipta Dilindungi.
                </p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <div class="d-flex justify-content-center justify-content-md-end gap-4">
                    <a href="#" class="footer-link d-inline" style="font-size:.8rem;opacity:.5;">Kebijakan Privasi</a>
                    <a href="#" class="footer-link d-inline" style="font-size:.8rem;opacity:.5;">Syarat & Ketentuan</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
.footer-social-btn {
    width: 40px; height: 40px;
    display: flex; align-items: center; justify-content: center;
    border-radius: 12px;
    background: rgba(255,255,255,.04);
    border: 1px solid rgba(255,255,255,.08);
    color: #94a3b8;
    text-decoration: none;
    font-size: 1rem;
    transition: var(--transition);
}
.footer-social-btn:hover {
    background: var(--primary);
    border-color: var(--primary);
    color: #fff;
    transform: translateY(-5px) rotate(8deg);
    box-shadow: 0 10px 20px rgba(13,148,136,.3);
}
.footer-link {
    color: #94a3b8;
    text-decoration: none;
    font-size: .9rem;
    transition: var(--transition);
    display: inline-block;
}
.footer-link:hover {
    color: var(--primary);
    transform: translateX(6px);
}
.footer-contact-icon {
    width: 38px; height: 38px;
    background: rgba(13,148,136,.08);
    border: 1px solid rgba(13,148,136,.12);
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    color: var(--primary);
    flex-shrink: 0;
    font-size: .9rem;
}
.footer-divider { border-color: rgba(255,255,255,.05); }
</style>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Navbar scroll effect & Scroll Reveal Logic
    (function() {
        // Navbar
        var nav = document.getElementById('mainNavbar');
        if (nav) {
            function onScroll() {
                nav.classList.toggle('scrolled', window.pageYOffset > 50);
            }
            window.addEventListener('scroll', onScroll, { passive: true });
            onScroll();
        }

        // Scroll Reveal Intersection Observer
        const revealCallback = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        };

        const revealObserver = new IntersectionObserver(revealCallback, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        // Tunggu DOM selesai dimuat
        const initReveal = () => {
            const reveals = document.querySelectorAll('.reveal');
            reveals.forEach(el => {
                // Cek apakah sudah di dalam viewport saat load
                const rect = el.getBoundingClientRect();
                if (rect.top < window.innerHeight && rect.bottom > 0) {
                    el.classList.add('active');
                }
                revealObserver.observe(el);
            });
        };

        // Initialize Toasts (Poin 8)
        const toastElList = document.querySelectorAll('.toast');
        toastElList.forEach(function (toastEl) {
            const toast = new bootstrap.Toast(toastEl, { delay: 5000 });
            toast.show();
        });

        // Dropdown Submenu click behavior for mobile/touch
        document.querySelectorAll('.dropdown-submenu > a').forEach(function(element) {
            element.addEventListener('click', function(e) {
                if (window.innerWidth < 992) {
                    var nextEl = this.nextElementSibling;
                    if (nextEl && nextEl.classList.contains('dropdown-menu')) {
                        e.preventDefault();
                        e.stopPropagation();
                        if (nextEl.style.display === 'block') {
                            nextEl.style.display = 'none';
                        } else {
                            nextEl.style.display = 'block';
                        }
                    }
                }
            });
        });

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initReveal);
        } else {
            initReveal();
        }
    })();
</script>
</body>
</html>
