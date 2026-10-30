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
            <a href="<?= base_url('dashboard'); ?>" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                <i class="fas fa-arrow-left me-1"></i> Kembali ke Dashboard
            </a>
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
                            <th>NOMOR HP / WA</th>
                            <th>ALAMAT DOMISILI</th>
                            <th>ROLE</th>
                            <th>TANGGAL DAFTAR</th>
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
                                        <div class="rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center fw-bold" style="width: 38px; height: 38px; font-size: .85rem;">
                                            <?= strtoupper(substr($u['nama_lengkap'], 0, 1)); ?>
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark"><?= htmlspecialchars($u['nama_lengkap']); ?></div>
                                            <small class="text-muted">Username: <?= htmlspecialchars($u['username']); ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border font-monospace px-2 py-1">
                                        <i class="fas fa-id-card text-muted me-1"></i><?= htmlspecialchars($u['nik']); ?>
                                    </span>
                                </td>
                                <td>
                                    <?php if(!empty($u['no_hp'])): ?>
                                        <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $u['no_hp']); ?>" target="_blank" class="text-decoration-none small text-success fw-semibold">
                                            <i class="fab fa-whatsapp me-1"></i><?= htmlspecialchars($u['no_hp']); ?>
                                        </a>
                                    <?php else: ?>
                                        <span class="text-muted small">-</span>
                                    <?php endif; ?>
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
                                <td class="small text-muted">
                                    <i class="far fa-calendar-alt me-1"></i>
                                    <?= date('d M Y', strtotime($u['created_at'])); ?>
                                </td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-light rounded-circle shadow-none p-1" style="width:32px;height:32px;" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-vertical text-muted"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm" style="border-radius:12px; font-size:.85rem;">
                                            <li>
                                                <button type="button" class="dropdown-item py-2" data-bs-toggle="modal" data-bs-target="#modalEditUser<?= $u['id']; ?>">
                                                    <i class="fas fa-pen-to-square text-primary me-2"></i> Edit Data &amp; Alamat
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

                                    <!-- Modal Edit User -->
                                    <div class="modal fade text-start" id="modalEditUser<?= $u['id']; ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content border-0 shadow-lg" style="border-radius:20px;">
                                                <form action="<?= base_url('adminuser/edit/' . $u['id']); ?>" method="post">
                                                    <div class="modal-header border-0 pb-0">
                                                        <h5 class="modal-title fw-bold">Ubah Data Pengguna</h5>
                                                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body p-4">
                                                        <div class="mb-3">
                                                            <label class="form-label small fw-bold">NIK (16 Digit) <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="nik" value="<?= htmlspecialchars($u['nik']); ?>" required maxlength="16">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label small fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="nama_lengkap" value="<?= htmlspecialchars($u['nama_lengkap']); ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label small fw-bold">Nomor HP / WA <span class="text-danger">*</span></label>
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
                                    <!-- End Modal Edit -->

                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center py-5 text-muted">
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

<!-- Modal Tambah User -->
<div class="modal fade" id="modalTambahUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:20px;">
            <form action="<?= base_url('adminuser/tambah'); ?>" method="post">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold">Tambah Pengguna Baru</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
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
