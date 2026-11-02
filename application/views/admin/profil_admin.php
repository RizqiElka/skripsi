<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php
$av = (!empty($admin['foto']) && $admin['foto'] != 'default_avatar.png' && file_exists('./assets/uploads/avatars/' . $admin['foto']))
    ? base_url('assets/uploads/avatars/' . $admin['foto'])
    : '';
?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h4 mb-1 fw-bold" style="font-family:'Outfit',sans-serif;">Profil Admin</h1>
            <p class="text-muted small mb-0">Kelola informasi akun dan foto profil administrator.</p>
        </div>
    </div>

    <div class="row g-4 justify-content-center">
        <!-- Card Profil -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm p-4 text-center" style="border-radius: 20px;">
                <div class="position-relative d-inline-block mx-auto mb-3">
                    <?php if($av): ?>
                        <img id="adminAvatarDisplay" src="<?= $av; ?>" class="rounded-circle shadow-sm" style="width:96px; height:96px; object-fit:cover; border:4px solid #e0f2fe;" alt="Foto Admin">
                    <?php else: ?>
                        <div id="adminAvatarDisplay" class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold shadow-sm mx-auto" style="width:96px; height:96px; background: linear-gradient(135deg, #0ea5e9, #6366f1); font-size:2.2rem; border:4px solid #e0f2fe;">
                            <?= strtoupper(substr($admin['nama_lengkap'] ?? 'A', 0, 1)); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <h5 class="fw-bold mb-0" style="font-family:'Outfit',sans-serif;"><?= $admin['nama_lengkap'] ?? '-'; ?></h5>
                <span class="badge bg-primary bg-opacity-10 text-primary mt-1 px-3 py-1 rounded-pill" style="font-size:.75rem;">
                    <i class="fas fa-shield-alt me-1"></i> Administrator
                </span>
                <div class="mt-3 text-muted small">
                    <i class="fas fa-user me-1"></i> @<?= $admin['username'] ?? '-'; ?>
                </div>
            </div>
        </div>

        <!-- Form Edit Profil -->
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm p-4" style="border-radius: 20px;">
                <h6 class="fw-bold mb-4" style="font-family:'Outfit',sans-serif;">
                    <i class="fas fa-pencil text-primary me-2"></i>Edit Profil & Ganti Foto
                </h6>
                <form action="<?= base_url('dashboard/update_profil'); ?>" method="post" enctype="multipart/form-data">

                    <!-- Foto Upload Section -->
                    <div class="mb-4 p-3 rounded-3" style="background:#f8fafc; border:1px dashed #cbd5e1;">
                        <label class="form-label small fw-bold mb-2">Foto Profil</label>
                        <div class="d-flex align-items-center gap-3">
                            <?php if($av): ?>
                                <img id="adminAvatarPreview" src="<?= $av; ?>" class="rounded-circle" style="width:60px; height:60px; object-fit:cover; border:2px solid #bae6fd;" alt="Preview">
                            <?php else: ?>
                                <div id="adminAvatarPreview" class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold" style="width:60px; height:60px; background: linear-gradient(135deg, #0ea5e9, #6366f1); font-size:1.3rem; flex-shrink:0;">
                                    <?= strtoupper(substr($admin['nama_lengkap'] ?? 'A', 0, 1)); ?>
                                </div>
                            <?php endif; ?>
                            <div class="flex-grow-1">
                                <input type="file" class="form-control form-control-sm" name="foto" id="fotoAdminInput" accept="image/*" onchange="previewAdminFoto(this)">
                                <div class="text-muted mt-1" style="font-size:.72rem;">Format: JPG, PNG, GIF, WEBP. Maks. 2MB.</div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nama_lengkap" value="<?= htmlspecialchars($admin['nama_lengkap'] ?? ''); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Username <span class="text-muted fw-normal">(opsional)</span></label>
                            <input type="text" class="form-control" name="username" value="<?= htmlspecialchars($admin['username'] ?? ''); ?>" placeholder="Kosongkan jika tidak diubah">
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Ganti Password <span class="text-muted fw-normal">(kosongkan jika tidak diubah)</span></label>
                            <input type="password" class="form-control" name="password" placeholder="Password baru minimal 5 karakter...">
                        </div>
                    </div>

                    <div class="mt-4 d-flex gap-2 justify-content-end">
                        <a href="<?= base_url('dashboard'); ?>" class="btn btn-light rounded-pill px-4">Batal</a>
                        <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold">
                            <i class="fas fa-save me-1"></i>Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function previewAdminFoto(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var preview = document.getElementById('adminAvatarPreview');
            var display = document.getElementById('adminAvatarDisplay');
            if (preview.tagName === 'IMG') {
                preview.src = e.target.result;
            } else {
                var img = document.createElement('img');
                img.id = 'adminAvatarPreview';
                img.src = e.target.result;
                img.className = 'rounded-circle';
                img.style.cssText = 'width:60px; height:60px; object-fit:cover; border:2px solid #bae6fd; flex-shrink:0;';
                preview.parentNode.replaceChild(img, preview);
            }
            if (display && display.tagName === 'IMG') {
                display.src = e.target.result;
            } else if (display) {
                var imgD = document.createElement('img');
                imgD.id = 'adminAvatarDisplay';
                imgD.src = e.target.result;
                imgD.className = 'rounded-circle shadow-sm';
                imgD.style.cssText = 'width:96px; height:96px; object-fit:cover; border:4px solid #e0f2fe;';
                display.parentNode.replaceChild(imgD, display);
            }
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
