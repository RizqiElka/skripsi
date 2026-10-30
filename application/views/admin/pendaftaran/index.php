
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Filter Data</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('adminpendaftaran'); ?>" method="get" class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Pilih Poli</label>
                    <select name="id_layanan" class="form-control">
                        <option value="">— Semua Poli —</option>
                        <?php foreach($layanan as $l): ?>
                        <option value="<?= $l['id']; ?>" <?= ($filter_poli == $l['id']) ? 'selected' : ''; ?>>
                            <?= $l['nama_layanan']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Pilih Tanggal Kunjungan</label>
                    <input type="date" name="tanggal" class="form-control" value="<?= $filter_tanggal; ?>">
                </div>
                <div class="col-md-4 d-flex align-items-end gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-filter"></i> Filter
                    </button>
                    <a href="<?= base_url('adminpendaftaran'); ?>" class="btn btn-secondary text-white">
                        <i class="fas fa-undo"></i> Reset
                    </a>
                </div>
            </form>
        </div>
    </div>

    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success animate-reveal"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <div class="card shadow border-0 mb-4" style="border-radius: 16px;">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No. Antrean</th>
                            <th>Kode Reg</th>
                            <th>NIK</th>
                            <th>Nama Pasien</th>
                            <th>Poli Tujuan</th>
                            <th>Tgl Kunjungan</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($pendaftaran)): ?>
                            <?php foreach($pendaftaran as $p): ?>
                            <tr>
                                <td class="text-center">
                                    <span class="badge bg-primary rounded-pill px-3 py-2" style="font-size: 0.9rem;">#<?= $p['no_antrean']; ?></span>
                                </td>
                                <td><code class="fw-bold text-primary"><?= $p['no_pendaftaran']; ?></code></td>
                                <td><?= $p['nik']; ?></td>
                                <td class="fw-bold"><?= $p['nama_pasien']; ?></td>
                                <td><?= $p['nama_layanan']; ?></td>
                                <td><?= date('d/m/Y', strtotime($p['tanggal_kunjungan'])); ?></td>
                                <td class="text-center">
                                    <span class="badge bg-success px-3 py-2"><?= $p['status']; ?></span>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('adminpendaftaran/hapus/' . $p['id']); ?>" 
                                       class="btn btn-danger btn-sm" 
                                       onclick="return confirm('Hapus data ini?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada data pendaftaran ditemukan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
