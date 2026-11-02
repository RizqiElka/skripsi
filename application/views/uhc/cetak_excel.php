<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Pengajuan UHC</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #000000; padding: 8px; }
        th { background-color: #0d9488; color: #ffffff; font-weight: bold; text-align: center; }
        .text-center { text-align: center; }
        .str { mso-number-format: '\@'; }
    </style>
</head>
<body>
    <div style="text-align: center; margin-bottom: 20px;">
        <h2 style="margin: 0;">PUSAT KESEHATAN MASYARAKAT (PUSKESMAS)</h2>
        <h3 style="margin: 5px 0;">LAPORAN DATA PENGAJUAN UNIVERSAL HEALTH COVERAGE (UHC)</h3>
        <p style="margin: 0; font-size: 12px;">Dicetak pada: <?= date('d/m/Y H:i:s'); ?> | Total Data: <?= count($pengajuan); ?> Berkas</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>TANGGAL PENGAJUAN</th>
                <th>NIK</th>
                <th>NAMA LENGKAP</th>
                <th>NO KK</th>
                <th>NO HP</th>
                <th>ALAMAT</th>
                <th>DIAGNOSA</th>
                <th>KETERANGAN</th>
                <th>STATUS</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($pengajuan)): ?>
                <?php $no = 1; foreach($pengajuan as $p): ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="text-center"><?= date('d/m/Y H:i', strtotime($p['created_at'])); ?></td>
                    <td class="str" style="color: #000000;"><?= $p['nik']; ?></td>
                    <td><?= $p['nama_lengkap']; ?></td>
                    <td class="str"><?= $p['no_kk']; ?></td>
                    <td class="str"><?= $p['no_hp']; ?></td>
                    <td><?= $p['alamat']; ?></td>
                    <td><?= $p['diagnosa']; ?></td>
                    <td><?= $p['keterangan'] ?: '-'; ?></td>
                    <td class="text-center"><?= $p['status']; ?></td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="10" class="text-center">Belum ada data pengajuan UHC.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
