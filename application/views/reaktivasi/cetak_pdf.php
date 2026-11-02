<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #1e293b;
            background: #f8fafc;
            padding: 20px;
        }
        .print-container {
            max-width: 1050px;
            margin: auto;
            background: #ffffff;
            padding: 35px 45px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.06);
            border-radius: 12px;
        }
        .kop-surat {
            border-bottom: 3px double #000000;
            padding-bottom: 12px;
            margin-bottom: 25px;
        }
        .table-custom {
            width: 100%;
            border-collapse: collapse;
            font-size: 11px;
        }
        .table-custom th, .table-custom td {
            border: 1px solid #cbd5e1;
            padding: 7px 8px;
            vertical-align: middle;
        }
        .table-custom th {
            background-color: #f1f5f9;
            font-weight: 700;
            text-align: center;
            color: #0f172a;
        }
        .nik-text {
            color: #000000 !important;
            font-family: monospace;
            font-weight: 600;
        }
        @media print {
            body {
                background: #ffffff !important;
                padding: 0 !important;
            }
            .print-container {
                box-shadow: none !important;
                padding: 0 !important;
                max-width: 100% !important;
            }
            .no-print {
                display: none !important;
            }
            @page {
                size: landscape;
                margin: 12mm;
            }
        }
    </style>
</head>
<body>

<div class="print-container">
    <!-- Tombol Aksi Cetak -->
    <div class="d-flex justify-content-between align-items-center mb-4 no-print p-3 bg-light rounded-3 border">
        <div>
            <h6 class="fw-bold mb-0 text-dark"><i class="fas fa-file-pdf text-danger me-2"></i> Pratinjau Cetak / Ekspor PDF</h6>
            <small class="text-muted">Klik tombol di samping untuk mencetak atau memilih "Save as PDF" di dialog browser.</small>
        </div>
        <div class="d-flex gap-2">
            <button onclick="window.print()" class="btn btn-primary btn-sm px-4 rounded-pill fw-bold">
                <i class="fas fa-print me-1"></i> Cetak / Simpan PDF
            </button>
            <button onclick="window.close()" class="btn btn-outline-secondary btn-sm px-3 rounded-pill">
                Tutup
            </button>
        </div>
    </div>

    <!-- Kop Puskesmas -->
    <div class="kop-surat text-center position-relative">
        <h4 class="fw-bold mb-1" style="letter-spacing: 0.5px;">PEMERINTAH DAERAH KABUPATEN / KOTA</h4>
        <h3 class="fw-bold mb-1" style="letter-spacing: 1px; color: #0f172a;">
            <?= strtoupper(!empty($profil['nama_puskesmas']) ? $profil['nama_puskesmas'] : 'PUSAT KESEHATAN MASYARAKAT'); ?>
        </h3>
        <p class="mb-0 text-muted small" style="line-height: 1.4;">
            <?= !empty($profil['alamat']) ? $profil['alamat'] : 'Jl. Kesehatan No. 1'; ?> 
            <?php if(!empty($profil['telepon'])): ?> | Telp: <?= $profil['telepon']; ?><?php endif; ?>
        </p>
    </div>

    <!-- Judul Dokumen -->
    <div class="text-center mb-4">
        <h5 class="fw-bold mb-1 text-uppercase text-decoration-underline" style="color: #0f172a;">LAPORAN DATA PENGAJUAN REAKTIVASI BPJS / DINSOS</h5>
        <div class="text-muted small">Periode: Keseluruhan | Tanggal Unduh: <?= date('d F Y, H:i'); ?> WIB</div>
    </div>

    <!-- Tabel Data -->
    <table class="table-custom mb-4">
        <thead>
            <tr>
                <th style="width: 35px;">NO</th>
                <th>TGL PENGAJUAN</th>
                <th>NIK</th>
                <th>NAMA PEMOHON</th>
                <th>NO HP</th>
                <th>KETERANGAN / ALASAN</th>
                <th>STATUS</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($pengajuan)): ?>
                <?php $no = 1; foreach($pengajuan as $p): ?>
                <tr>
                    <td class="text-center fw-bold"><?= $no++; ?></td>
                    <td class="text-center"><?= date('d/m/Y', strtotime($p['created_at'])); ?></td>
                    <td class="nik-text"><?= htmlspecialchars($p['nik']); ?></td>
                    <td class="fw-bold"><?= htmlspecialchars(!empty($p['nama_user']) ? $p['nama_user'] : '-'); ?></td>
                    <td class="font-monospace"><?= htmlspecialchars($p['no_hp']); ?></td>
                    <td><?= htmlspecialchars($p['keterangan'] ?: '-'); ?></td>
                    <td class="text-center fw-bold">
                        <span class="badge <?= ($p['status'] == 'Selesai') ? 'bg-success' : (($p['status'] == 'Ditolak') ? 'bg-danger' : 'bg-warning text-dark'); ?>" style="font-size: 10px;">
                            <?= $p['status']; ?>
                        </span>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center py-4 text-muted">Belum ada data pengajuan reaktivasi.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Tanda Tangan / Verifikasi -->
    <div class="d-flex justify-content-between mt-5 pt-3" style="font-size: 12px;">
        <div style="width: 35%;">
            <p class="mb-5">Mengetahui,<br><strong>Kepala Puskesmas</strong></p>
            <p class="mt-5 mb-0 fw-bold">( .................................................... )</p>
            <span class="text-muted small">NIP. ...................................................</span>
        </div>
        <div style="width: 35%; text-align: right;">
            <p class="mb-5">Dicetak pada: <?= date('d M Y'); ?><br><strong>Petugas Pelayanan / Admin</strong></p>
            <p class="mt-5 mb-0 fw-bold">( <?= $this->session->userdata('nama_lengkap') ?: 'Petugas Pelayanan'; ?> )</p>
            <span class="text-muted small">Sistem Informasi Puskesmas</span>
        </div>
    </div>
</div>

</body>
</html>
