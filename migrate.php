<?php
$conn = new mysqli('localhost', 'root', '', 'puskesmas2');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$queries = [
    // Pendaftaran
    "ALTER TABLE pendaftaran ADD COLUMN id_layanan INT(11) NULL AFTER alamat",
    "UPDATE pendaftaran p JOIN layanan l ON p.poli_tujuan = l.nama_layanan SET p.id_layanan = l.id",
    "ALTER TABLE pendaftaran DROP COLUMN poli_tujuan",
    "ALTER TABLE pendaftaran ADD CONSTRAINT fk_pendaftaran_layanan FOREIGN KEY (id_layanan) REFERENCES layanan(id) ON DELETE SET NULL ON UPDATE CASCADE",

    // Reminder
    "ALTER TABLE reminder ADD COLUMN id_layanan INT(11) NULL AFTER tanggal_kontrol",
    "UPDATE reminder r JOIN layanan l ON r.poli_tujuan = l.nama_layanan SET r.id_layanan = l.id",
    "ALTER TABLE reminder DROP COLUMN poli_tujuan",
    "ALTER TABLE reminder ADD CONSTRAINT fk_reminder_layanan FOREIGN KEY (id_layanan) REFERENCES layanan(id) ON DELETE SET NULL ON UPDATE CASCADE",

    // Tenaga Medis
    "ALTER TABLE tenaga_medis ADD COLUMN id_layanan INT(11) NULL AFTER jabatan",
    "ALTER TABLE tenaga_medis ADD CONSTRAINT fk_tenaga_layanan FOREIGN KEY (id_layanan) REFERENCES layanan(id) ON DELETE SET NULL ON UPDATE CASCADE",

    // Artikel
    "ALTER TABLE artikel ADD COLUMN id_admin INT(11) NULL AFTER gambar",
    "ALTER TABLE artikel ADD CONSTRAINT fk_artikel_admin FOREIGN KEY (id_admin) REFERENCES admin(id) ON DELETE SET NULL ON UPDATE CASCADE",

    // Konsultasi
    "ALTER TABLE konsultasi ADD COLUMN id_admin INT(11) NULL AFTER jawaban",
    "ALTER TABLE konsultasi ADD CONSTRAINT fk_konsultasi_admin FOREIGN KEY (id_admin) REFERENCES admin(id) ON DELETE SET NULL ON UPDATE CASCADE",

    // Peringatan
    "ALTER TABLE peringatan ADD COLUMN id_admin INT(11) NULL AFTER tipe",
    "ALTER TABLE peringatan ADD CONSTRAINT fk_peringatan_admin FOREIGN KEY (id_admin) REFERENCES admin(id) ON DELETE SET NULL ON UPDATE CASCADE",

    // Stunting
    "ALTER TABLE stunting_results ADD COLUMN id_wilayah INT(11) NULL AFTER nama_ortu",
    "ALTER TABLE stunting_results ADD CONSTRAINT fk_stunting_wilayah FOREIGN KEY (id_wilayah) REFERENCES wilayah(id) ON DELETE SET NULL ON UPDATE CASCADE"
];

foreach ($queries as $query) {
    try {
        if ($conn->query($query) === TRUE) {
            echo "Success: " . substr($query, 0, 50) . "...\n";
        } else {
            echo "Failed: " . $conn->error . " - " . substr($query, 0, 50) . "...\n";
        }
    } catch (Exception $e) {
        echo "Exception: " . $e->getMessage() . " - " . substr($query, 0, 50) . "...\n";
    }
}

$conn->close();
?>
