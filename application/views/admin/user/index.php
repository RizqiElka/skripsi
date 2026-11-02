<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2">
        <div>
            <h1 class="h3 mb-1 text-gray-800 fw-bold">Data Pengguna / Pasien</h1>
            <p class="text-muted small mb-0">Kelola data seluruh akun masyarakat dan pasien yang terdaftar di sistem Puskesmas.</p>
        </div>
        <div class="d-flex gap-2">
            <button type="button" class="btn btn-primary btn-sm rounded-pill px-3 fw-bold" data-bs-toggle="modal" data-bs-target="#modalTambahUser">
                <i class="fas fa-user-plus me-1"></i> Tambah Pengguna Baru
            </button>
        </div>
    </div>

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

    <div class="card border-0 shadow-sm" style="border-radius:20px;">
        <div class="card-header bg-transparent border-0 pt-4 px-4 d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div class="d-flex align-items-center gap-2">
                <div class="bg-primary bg-opacity-10 p-2 rounded-3 text-primary">
                    <i class="fas fa-users fs-5"></i>
                </div>
                <h6 class="m-0 fw-bold text-primary">Daftar Pengguna Terdaftar (<?= count($users); ?> User)</h6>
            </div>
            <div class="input-group" style="max-width: 280px;">
                <span class="input-group-text bg-light border-0"><i class="fas fa-search text-muted small"></i></span>
                <input type="text" id="searchUser" class="form-control form-control-sm bg-light border-0" placeholder="Cari nama, NIK, alamat...">
            </div>
        </div>

        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table align-middle" id="tableUsers">
                    <thead>
                        <tr class="text-muted small">
                            <th>NO</th>
                            <th>NAMA LENGKAP</th>
                            <th>NIK (KTP)</th>
                            <th>NOMOR HP</th>
                            <th>ALAMAT DOMISILI</th>
                            <th>ROLE</th>
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($users)): ?>
                            <?php $no = 1; foreach($users as $u): ?>
                            <tr>
                                <td class="fw-bold text-muted small"><?= $no++; ?></td>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <?php 
                                        $avatar_src = (!empty($u['foto']) && $u['foto'] != 'default_avatar.png' && file_exists('./assets/uploads/avatars/' . $u['foto'])) 
                                            ? base_url('assets/uploads/avatars/' . $u['foto']) 
                                            : null;
                                        ?>
                                        <?php if($avatar_src): ?>
                                            <img src="<?= $avatar_src; ?>" alt="Foto" class="rounded-circle object-fit-cover shadow-sm" style="width: 38px; height: 38px; border: 2px solid #e2e8f0;">
                                        <?php else: ?>
                                            <div class="rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 38px; height: 38px; font-size: .85rem; border: 2px solid rgba(13,148,136,.15);">
                                                <?= strtoupper(substr($u['nama_lengkap'], 0, 1)); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div>
                                            <div class="fw-bold text-dark"><?= htmlspecialchars($u['nama_lengkap']); ?></div>
                                            <small class="text-muted">Username: <?= htmlspecialchars($u['username']); ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-light border font-monospace px-2 py-1" style="color: #000000 !important; font-weight: 600;">
                                        <i class="fas fa-id-card text-muted me-1"></i><?= htmlspecialchars($u['nik']); ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="small font-monospace" style="color: #000000;">
                                        <?= htmlspecialchars($u['no_hp'] ?: '-'); ?>
                                    </span>
                                </td>
                                <td>
                                    <?php if(!empty($u['alamat'])): ?>
                                        <span class="small text-dark" style="max-width:200px; display:inline-block; line-height:1.3;"><?= htmlspecialchars($u['alamat']); ?></span>
                                    <?php else: ?>
                                        <span class="text-muted small fst-italic">Belum diisi</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="badge rounded-pill <?= ($u['role'] == 'admin') ? 'bg-danger' : 'bg-primary'; ?> px-3 py-1">
                                        <?= ucfirst($u['role'] ?: 'pasien'); ?>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-light rounded-circle shadow-none p-1" style="width:32px;height:32px;" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-vertical text-muted"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm" style="border-radius:12px; font-size:.85rem;">
                                            <li>
                                                <button type="button" class="dropdown-item py-2" data-bs-toggle="modal" data-bs-target="#modalEditUser<?= $u['id']; ?>">
                                                    <i class="fas fa-pen-to-square text-primary me-2"></i> Edit Data
                                                </button>
                                            </li>
                                            <li>
                                                <a class="dropdown-item py-2" href="<?= base_url('adminuser/reset_password/' . $u['id']); ?>" onclick="return confirm('Reset password akun <?= htmlspecialchars($u['nama_lengkap']); ?> menjadi 123456?');">
                                                    <i class="fas fa-key text-warning me-2"></i> Reset Password (123456)
                                                </a>
                                            </li>
                                            <li><hr class="dropdown-divider my-1"></li>
                                            <li>
                                                <a class="dropdown-item py-2 text-danger" href="<?= base_url('adminuser/delete/' . $u['id']); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus user <?= htmlspecialchars($u['nama_lengkap']); ?>? Data terkait akun ini mungkin terpengaruh.');">
                                                    <i class="fas fa-trash me-2"></i> Hapus User
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted">
                                    <i class="fas fa-users-slash fs-1 opacity-25 mb-3 d-block"></i>
                                    Belum ada data pengguna / pasien terdaftar di sistem.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modals Edit User (Ditempatkan di luar table-responsive agar tidak bug/tertutup backdrop) -->
<?php if(!empty($users)): ?>
    <?php foreach($users as $u): ?>
    <div class="modal fade text-start" id="modalEditUser<?= $u['id']; ?>" tabindex="-1" aria-labelledby="modalEditUserLabel<?= $u['id']; ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius:20px;">
                <form action="<?= base_url('adminuser/edit/' . $u['id']); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold" id="modalEditUserLabel<?= $u['id']; ?>">Ubah Data Pengguna</h5>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-4">
                        <!-- Preview Foto Profil Saat Ini -->
                        <div class="text-center mb-3">
                            <?php 
                            $modal_avatar = (!empty($u['foto']) && $u['foto'] != 'default_avatar.png' && file_exists('./assets/uploads/avatars/' . $u['foto'])) 
                                ? base_url('assets/uploads/avatars/' . $u['foto']) 
                                : null;
                            ?>
                            <div class="position-relative d-inline-block">
                                <?php if($modal_avatar): ?>
                                    <img src="<?= $modal_avatar; ?>" alt="Foto User" class="rounded-circle object-fit-cover shadow-sm" style="width: 80px; height: 80px; border: 3px solid #0d9488;">
                                <?php else: ?>
                                    <div class="rounded-circle bg-primary bg-opacity-10 text-primary d-inline-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 80px; height: 80px; font-size: 1.75rem; border: 3px solid #0d9488;">
                                        <?= strtoupper(substr($u['nama_lengkap'], 0, 1)); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Foto Profil (Opsional)</label>
                            <input type="file" class="form-control" name="foto" accept="image/jpeg,image/png,image/webp">
                            <small class="text-muted" style="font-size: 11px;">Format JPG/PNG/WebP, maksimal 2MB. Kosongkan jika tidak ingin mengubah foto.</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">NIK (16 Digit) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nik" value="<?= htmlspecialchars($u['nik']); ?>" required maxlength="16" pattern="[0-9]{16}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nama_lengkap" value="<?= htmlspecialchars($u['nama_lengkap']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Nomor HP <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="no_hp" value="<?= htmlspecialchars($u['no_hp']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Alamat Lengkap Domisili</label>
                            <textarea class="form-control" name="alamat" rows="2.5" placeholder="Masukkan alamat lengkap RT/RW, Kelurahan, Kecamatan..."><?= htmlspecialchars($u['alamat'] ?? ''); ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Role Akses</label>
                            <select class="form-select" name="role">
                                <option value="pasien" <?= ($u['role'] == 'pasien') ? 'selected' : ''; ?>>Pasien / Masyarakat</option>
                                <option value="admin" <?= ($u['role'] == 'admin') ? 'selected' : ''; ?>>Administrator</option>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label class="form-label small fw-bold">Ganti Password (Kosongkan bila tidak diubah)</label>
                            <input type="password" class="form-control" name="password" placeholder="Password baru...">
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-light rounded-pill px-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
<?php endif; ?>

<!-- Modal Tambah User -->
<div class="modal fade" id="modalTambahUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:20px;">
            <form action="<?= base_url('adminuser/tambah'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold">Tambah Pengguna Baru</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Foto Profil (Opsional)</label>
                        <input type="file" class="form-control" name="foto" accept="image/jpeg,image/png,image/webp">
                        <small class="text-muted" style="font-size: 11px;">Format JPG/PNG/WebP, maksimal 2MB.</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">NIK (16 Digit) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nik" required maxlength="16" placeholder="Masukkan 16 digit NIK">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama_lengkap" required placeholder="Sesuai KTP">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Nomor HP / WhatsApp <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="no_hp" required placeholder="08xxxxxxxxxx">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Alamat Lengkap Domisili</label>
                        <textarea class="form-control" name="alamat" rows="2.5" placeholder="Alamat lengkap tempat tinggal..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Password Masuk <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password" required placeholder="Minimal 5 karakter">
                    </div>
                    <div class="mb-1">
                        <label class="form-label small fw-bold">Role Akses</label>
                        <select class="form-select" name="role">
                            <option value="pasien">Pasien / Masyarakat</option>
                            <option value="admin">Administrator</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-3" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold">Simpan Pengguna</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('searchUser').addEventListener('keyup', function() {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll('#tableUsers tbody tr');
    rows.forEach(function(row) {
        let text = row.textContent.toLowerCase();
        row.style.display = text.includes(filter) ? '' : 'none';
    });
});
</script>
