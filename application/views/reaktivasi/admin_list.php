
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success animate-reveal"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>
    <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-danger animate-reveal"><?= $this->session->flashdata('error'); ?></div>
    <?php endif; ?>

    <div class="card shadow border-0 mb-4" style="border-radius: 16px;">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>NIK</th>
                            <th>No HP</th>
                            <th class="text-center">Status</th>
                            <th>Keterangan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($pengajuan)): ?>
                            <?php $no = 1; foreach($pengajuan as $p): ?>
                            <tr>
                                <td class="fw-bold"><?= $no++; ?></td>
                                <td><?= date('d/m/Y H:i', strtotime($p['created_at'])); ?></td>
                                <td><code><?= $p['nik']; ?></code></td>
                                <td><?= $p['no_hp']; ?></td>
                                <td class="text-center">
                                    <?php
                                    $badge_map = [
                                        'Diajukan' => 'bg-warning text-dark',
                                        'Diverifikasi Admin' => 'bg-info text-white',
                                        'Sedang Diproses' => 'bg-primary',
                                        'Menunggu Persetujuan' => 'bg-secondary',
                                        'Selesai' => 'bg-success',
                                        'Ditolak' => 'bg-danger'
                                    ];
                                    $badge_class = isset($badge_map[$p['status']]) ? $badge_map[$p['status']] : 'bg-secondary';
                                    ?>
                                    <span class="badge <?= $badge_class; ?> px-3 py-2 rounded-pill"><?= $p['status']; ?></span>
                                </td>
                                <td class="small text-muted"><?= $p['keterangan'] ?: '-'; ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('reaktivasi/admin_detail/' . $p['id']); ?>" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">
                                    <i class="fas fa-inbox me-2"></i> Belum ada data pengajuan Reaktivasi.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
