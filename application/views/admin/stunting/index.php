
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
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
                            <th>Tanggal</th>
                            <th>Nama Anak</th>
                            <th>Nama Ortu</th>
                            <th>L/P</th>
                            <th>Umur</th>
                            <th>Tinggi</th>
                            <th>Status Hasil</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($stunting)): ?>
                            <?php foreach($stunting as $s): ?>
                            <tr>
                                <td class="small text-muted"><?= date('d/m/Y H:i', strtotime($s['created_at'])); ?></td>
                                <td class="fw-bold"><?= $s['nama_anak']; ?></td>
                                <td><?= $s['nama_ortu']; ?></td>
                                <td><?= $s['gender']; ?></td>
                                <td><?= $s['umur_bulan']; ?> bln</td>
                                <td><?= $s['tinggi_badan']; ?> cm</td>
                                <td>
                                    <?php 
                                        $bg = 'success';
                                        if(strpos($s['status_hasil'], 'Sangat Pendek') !== false) $bg = 'danger';
                                        elseif(strpos($s['status_hasil'], 'Pendek') !== false) $bg = 'warning';
                                        elseif(strpos($s['status_hasil'], 'Normal (Cukup)') !== false) $bg = 'info';
                                    ?>
                                    <span class="badge bg-<?= $bg; ?>"><?= $s['status_hasil']; ?></span>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('adminstunting/hapus/' . $s['id']); ?>" 
                                       class="btn btn-danger btn-sm" 
                                       onclick="return confirm('Hapus data ini?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center">Belum ada data deteksi stunting.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
