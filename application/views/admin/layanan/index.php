<div class="animate-reveal">
    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-3">
        <div>
            <h3 class="fw-bold mb-1" style="font-family:'Outfit',sans-serif;">Kelola Layanan Medis</h3>
            <p class="text-muted small mb-0">Tambah dan kelola daftar layanan medis puskesmas.</p>
        </div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
            <i class="fas fa-plus me-2"></i>Tambah Layanan
        </button>
    </div>

    <div class="admin-card overflow-hidden">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th style="width:5%;">#</th>
                        <th style="width:8%;">Icon</th>
                        <th style="width:25%;">Nama Layanan</th>
                        <th style="width:45%;">Deskripsi</th>
                        <th style="width:17%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($layanan as $l): ?>
                    <tr>
                        <td class="text-muted small"><?= $no++; ?></td>
                        <td>
                            <div style="width:42px;height:42px;background:rgba(13,148,136,.1);border-radius:12px;display:flex;align-items:center;justify-content:center;">
                                <i class="<?= $l['icon']; ?>" style="color:#0d9488;font-size:1.1rem;"></i>
                            </div>
                        </td>
                        <td class="fw-bold" style="color:#1e293b;"><?= $l['nama_layanan']; ?></td>
                        <td class="text-muted small"><?= $l['deskripsi']; ?></td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $l['id']; ?>">
                                    <i class="fas fa-pen me-1"></i>Edit
                                </button>
                                <a href="<?= base_url('adminlayanan/hapus/'.$l['id']); ?>" class="btn btn-danger btn-sm"
                                   onclick="return confirm('Hapus layanan ini?');">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modals Edit -->
<?php foreach($layanan as $l): ?>
<div class="modal fade" id="modalEdit<?= $l['id']; ?>" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-pen me-2 text-primary"></i>Edit Layanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('adminlayanan/update'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?= $l['id']; ?>">
                    <div class="mb-3">
                        <label class="form-label">Nama Layanan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama_layanan" value="<?= $l['nama_layanan']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">FontAwesome Icon Class <span class="text-danger">*</span></label>
                        <div class="d-flex align-items-center gap-1 mb-2">
                            <input type="text" class="form-control" id="iconInputEdit<?= $l['id']; ?>" name="icon" value="<?= $l['icon']; ?>" required placeholder="Ketik atau pilih icon di bawah">
                            <div class="icon-preview-box" id="iconPreviewEdit<?= $l['id']; ?>"><i class="<?= $l['icon']; ?>"></i></div>
                        </div>
                        <div class="icon-picker-grid" id="iconPickerEdit<?= $l['id']; ?>"></div>
                        <div class="form-text mt-1"><i class="fas fa-circle-info me-1"></i>Pilih cepat di atas atau ketik class kustom. Cari lebih banyak di <a href="https://fontawesome.com/icons" target="_blank">fontawesome.com</a></div>
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="deskripsi" rows="3" required><?= $l['deskripsi']; ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style="border:1.5px solid #e2e8f0;border-radius:10px;font-weight:600;padding:.5rem 1.25rem;color:#64748b;" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save me-2"></i>Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-plus me-2 text-primary"></i>Tambah Layanan Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('adminlayanan/tambah'); ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Layanan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nama_layanan" required placeholder="Contoh: Poli Umum">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">FontAwesome Icon Class <span class="text-danger">*</span></label>
                        <div class="d-flex align-items-center gap-1 mb-2">
                            <input type="text" class="form-control" id="iconInputTambah" name="icon" value="fas fa-stethoscope" required placeholder="Ketik atau pilih icon di bawah">
                            <div class="icon-preview-box" id="iconPreviewTambah"><i class="fas fa-stethoscope"></i></div>
                        </div>
                        <div class="icon-picker-grid" id="iconPickerTambah"></div>
                        <div class="form-text mt-1"><i class="fas fa-circle-info me-1"></i>Pilih cepat di atas atau ketik class kustom. Cari lebih banyak di <a href="https://fontawesome.com/icons" target="_blank">fontawesome.com</a></div>
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="deskripsi" rows="3" required placeholder="Deskripsi layanan..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style="border:1.5px solid #e2e8f0;border-radius:10px;font-weight:600;padding:.5rem 1.25rem;color:#64748b;" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4"><i class="fas fa-plus me-2"></i>Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ===== ICON PICKER SCRIPT & STYLES ===== -->
<style>
.icon-picker-grid { display: flex; flex-wrap: wrap; gap: 6px; margin-top: 8px; }
.icon-pill {
    border: 1.5px solid #e2e8f0; border-radius: 8px; padding: 6px 10px;
    cursor: pointer; font-size: .78rem; background: #f8fafc;
    display: flex; align-items: center; gap: 6px;
    transition: all .15s; white-space: nowrap; color: #334155;
}
.icon-pill:hover { border-color: #0d9488; background: #f0fdfa; color: #0d9488; }
.icon-pill.selected { border-color: #0d9488; background: #0d9488; color: #fff; }
.icon-preview-box {
    width: 44px; height: 44px; border-radius: 10px;
    background: rgba(13,148,136,.1); display: flex; align-items: center;
    justify-content: center; color: #0d9488; font-size: 1.2rem; flex-shrink: 0;
    border: 1.5px solid #ccfbf1; margin-left: 8px;
}
</style>

<script>
var ICON_PRESETS = [
    { label: 'Stetoskop', cls: 'fas fa-stethoscope' },
    { label: 'Gigi', cls: 'fas fa-tooth' },
    { label: 'Ibu & Anak', cls: 'fas fa-baby' },
    { label: 'Obat', cls: 'fas fa-pills' },
    { label: 'Jantung', cls: 'fas fa-heart-pulse' },
    { label: 'Lab', cls: 'fas fa-vials' },
    { label: 'Mata', cls: 'fas fa-eye' },
    { label: 'Tulang', cls: 'fas fa-bone' },
    { label: 'Paru', cls: 'fas fa-lungs' },
    { label: 'Bedah', cls: 'fas fa-scalpel' },
    { label: 'Ambulans', cls: 'fas fa-truck-medical' },
    { label: 'Klinik', cls: 'fas fa-hospital' },
    { label: 'Vaksin', cls: 'fas fa-syringe' },
    { label: 'Rekam Medis', cls: 'fas fa-file-medical' },
    { label: 'Konsultasi', cls: 'fas fa-comment-medical' },
    { label: 'Gizi', cls: 'fas fa-apple-whole' }
];

function buildIconPicker(containerId, inputId, previewId) {
    var container = document.getElementById(containerId);
    var input = document.getElementById(inputId);
    if (!container || !input) return;

    ICON_PRESETS.forEach(function(ico) {
        var pill = document.createElement('span');
        pill.className = 'icon-pill' + (input.value === ico.cls ? ' selected' : '');
        pill.innerHTML = '<i class="' + ico.cls + '"></i>' + ico.label;
        pill.addEventListener('click', function() {
            input.value = ico.cls;
            updatePreview(previewId, ico.cls);
            container.querySelectorAll('.icon-pill').forEach(function(p) { p.classList.remove('selected'); });
            pill.classList.add('selected');
        });
        container.appendChild(pill);
    });

    input.addEventListener('input', function() {
        updatePreview(previewId, input.value);
        container.querySelectorAll('.icon-pill').forEach(function(p) { p.classList.remove('selected'); });
    });
}

function updatePreview(previewId, cls) {
    var box = document.getElementById(previewId);
    if (!box) return;
    box.innerHTML = '<i class="' + cls + '"></i>';
}

document.addEventListener('DOMContentLoaded', function() {
    buildIconPicker('iconPickerTambah', 'iconInputTambah', 'iconPreviewTambah');
    updatePreview('iconPreviewTambah', document.getElementById('iconInputTambah').value);

    <?php foreach($layanan as $l): ?>
    buildIconPicker('iconPickerEdit<?= $l['id']; ?>', 'iconInputEdit<?= $l['id']; ?>', 'iconPreviewEdit<?= $l['id']; ?>');
    updatePreview('iconPreviewEdit<?= $l['id']; ?>', document.getElementById('iconInputEdit<?= $l['id']; ?>').value);
    <?php endforeach; ?>
});
</script>
