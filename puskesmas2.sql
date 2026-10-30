CREATE DATABASE IF NOT EXISTS puskesmas2;
USE puskesmas2;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `admin` (`username`, `password`, `nama_lengkap`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator Puskesmas'); -- password: admin (MD5)

CREATE TABLE `profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_puskesmas` varchar(100) NOT NULL,
  `sejarah` text,
  `visi` text,
  `misi` text,
  `jam_operasional` text,
  `alamat` text,
  `telepon` varchar(20),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `profil` (`nama_puskesmas`, `sejarah`, `visi`, `misi`, `jam_operasional`, `alamat`, `telepon`) VALUES
('Puskesmas Sehat Selalu', 'Berdiri sejak tahun 1990 untuk melayani masyarakat.', 'Menjadi pusat pelayanan kesehatan primer terbaik.', '1. Memberikan pelayanan ramah.\n2. Menyediakan fasilitas memadai.', 'Senin-Jumat: 08:00 - 14:00\nSabtu: 08:00 - 12:00', 'Jl. Kesehatan No. 123, Kota Bahagia', '081234567890');

CREATE TABLE `layanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_layanan` varchar(100) NOT NULL,
  `deskripsi` text,
  `icon` varchar(50) DEFAULT 'fas fa-stethoscope',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `layanan` (`nama_layanan`, `deskripsi`) VALUES
('Poli Umum', 'Pelayanan pemeriksaan kesehatan umum.'),
('Poli Gigi', 'Pemeriksaan dan perawatan gigi.'),
('KIA / KB', 'Kesehatan Ibu Anak dan Keluarga Berencana.');

CREATE TABLE `fasilitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_fasilitas` varchar(100) NOT NULL,
  `deskripsi` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `tenaga_medis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT 'default.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) DEFAULT 'default_artikel.jpg',
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `reminder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pasien` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tanggal_kontrol` date NOT NULL,
  `poli_tujuan` varchar(50) NOT NULL,
  `keterangan` text,
  `status` enum('Menunggu','Diingatkan') DEFAULT 'Menunggu',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `konsultasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengirim` varchar(100) NOT NULL,
  `email_hp` varchar(100) NOT NULL,
  `no_wa` varchar(20) DEFAULT NULL,
  `pesan` text NOT NULL,
  `jawaban` text,
  `status` enum('Belum Dijawab','Sudah Dijawab') DEFAULT 'Belum Dijawab',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
