<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deteksi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Profil_model');
    }

    public function stunting() {
        $data['title'] = 'Deteksi Dini Stunting (WHO Standard)';
        $data['profil'] = $this->Profil_model->get_profil();
        
        $data['hasil'] = null;
        $data['input'] = null;

        if ($this->input->post('hitung')) {
            $gender = $this->input->post('gender');
            $umur = (int)$this->input->post('umur');
            $tinggi = (float)$this->input->post('tinggi');
            $berat = $this->input->post('berat') ? (float)$this->input->post('berat') : null;
            $nama_anak = $this->input->post('nama_anak', true);
            $nama_ortu = $this->input->post('nama_ortu', true);
            
            $data['hasil'] = $this->_hitung_stunting($gender, $umur, $tinggi);
            $data['input'] = [
                'gender' => $gender, 
                'umur' => $umur, 
                'tinggi' => $tinggi,
                'berat' => $berat,
                'nama_anak' => $nama_anak,
                'nama_ortu' => $nama_ortu
            ];

            // Poin 6: Hubungkan hasil pengecekan ke akun pengguna yang sedang login
            $user_id = $this->session->userdata('user_id') ? (int)$this->session->userdata('user_id') : null;

            // Simpan ke database
            $db_data = [
                'user_id'      => $user_id,
                'nama_anak'    => $nama_anak,
                'nama_ortu'    => $nama_ortu,
                'gender'       => $gender,
                'umur_bulan'   => $umur,
                'tinggi_badan' => $tinggi,
                'berat_badan'  => $berat,
                'status_hasil' => $data['hasil']['status'],
                'z_score'      => $data['hasil']['z_score'],
                'created_at'   => date('Y-m-d H:i:s')
            ];
            $this->db->insert('stunting_results', $db_data);

            if ($user_id) {
                $this->session->set_flashdata('success', 'Hasil deteksi stunting berhasil disimpan ke riwayat akun Anda.');
            }
        }

        $this->load->view('templates/header', $data);
        $this->load->view('deteksi/stunting', $data);
        $this->load->view('templates/footer');
    }

    // Poin 6: Halaman Riwayat Deteksi Stunting Terurut Berdasarkan Tanggal dengan Grafik Perkembangan
    public function riwayat() {
        if (!$this->session->userdata('user_logged_in')) {
            $this->session->set_flashdata('error', 'Silakan masuk terlebih dahulu untuk melihat riwayat deteksi stunting.');
            redirect('auth/login');
        }

        $user_id = (int)$this->session->userdata('user_id');
        $data['title'] = 'Riwayat Deteksi Stunting — Puskesmas';
        $data['profil'] = $this->Profil_model->get_profil();

        // Ambil riwayat anak-anak milik user, terurut tanggal ASC untuk grafik, dan DESC untuk tabel
        $data['riwayat_asc'] = $this->db->where('user_id', $user_id)
                                         ->order_by('created_at', 'ASC')
                                         ->get('stunting_results')
                                         ->result_array();

        $data['riwayat'] = $this->db->where('user_id', $user_id)
                                    ->order_by('created_at', 'DESC')
                                    ->get('stunting_results')
                                    ->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('deteksi/riwayat', $data);
        $this->load->view('templates/footer');
    }

    private function _hitung_stunting($gender, $umur, $tinggi) {
        $ref_laki = [
            0 => [49.9, 46.1, 44.2],
            6 => [67.6, 63.3, 61.2],
            12 => [75.7, 71.0, 68.6],
            18 => [82.3, 76.9, 74.2],
            24 => [87.8, 81.7, 78.7],
            30 => [91.9, 85.1, 81.7],
            36 => [96.1, 88.7, 85.0],
            42 => [99.9, 91.9, 87.9],
            48 => [103.3, 94.9, 90.7],
            54 => [106.7, 97.8, 93.3],
            60 => [110.0, 100.7, 96.1]
        ];

        $ref_perempuan = [
            0 => [49.1, 45.4, 43.6],
            6 => [65.7, 61.2, 58.9],
            12 => [74.0, 68.9, 66.3],
            18 => [80.7, 74.9, 72.0],
            24 => [86.4, 80.0, 76.8],
            30 => [90.7, 83.6, 80.1],
            36 => [95.1, 87.4, 83.6],
            42 => [99.0, 90.6, 86.4],
            48 => [102.7, 94.1, 89.8],
            54 => [106.2, 97.2, 92.7],
            60 => [109.4, 100.2, 95.6]
        ];

        $dataset = ($gender == 'L') ? $ref_laki : $ref_perempuan;
        $target_age = 0;
        foreach (array_keys($dataset) as $age) {
            if ($umur >= $age) $target_age = $age;
        }

        $median = $dataset[$target_age][0];
        $sd2 = $dataset[$target_age][1];
        $sd3 = $dataset[$target_age][2];

        if ($tinggi >= $median) {
            $status = "Tinggi Badan Normal";
            $label = "success";
            $pesan = "Pertumbuhan anak Anda sangat baik dan sesuai dengan standar WHO. Pertahankan asupan nutrisi dan pola asuh.";
        } elseif ($tinggi >= $sd2) {
            $status = "Normal (Cukup)";
            $label = "info";
            $pesan = "Tinggi badan anak masuk kategori normal, namun mendekati batas bawah (risiko rendah). Pastikan asupan gizi seimbang tetap terjaga.";
        } elseif ($tinggi >= $sd3) {
            $status = "Pendek (Stunted)";
            $label = "warning";
            $pesan = "Anak terindikasi Stunting (Pendek). Mohon segera konsultasikan ke Poli Gizi di Puskesmas untuk evaluasi lebih lanjut.";
        } else {
            $status = "Sangat Pendek (Severely Stunted)";
            $label = "danger";
            $pesan = "Anak terindikasi Stunting Berat. Ini memerlukan perhatian medis segera dari petugas kesehatan kami.";
        }

        // Menentukan Rekomendasi Gizi & Tindakan
        $rekomendasi = [];
        if ($status == "Tinggi Badan Normal") {
            $rekomendasi = [
                "Lanjutkan pemberian ASI Eksklusif (jika < 6 bulan) atau MPASI bergizi seimbang.",
                "Pantau pertumbuhan di Posyandu setiap bulan.",
                "Pastikan imunisasi dasar lengkap sesuai usia."
            ];
        } elseif ($status == "Normal (Cukup)") {
            $rekomendasi = [
                "Tingkatkan asupan Protein Hewani (Telur, Ikan, Ayam) setiap hari.",
                "Berikan variasi sayur dan buah untuk memenuhi mikronutrien.",
                "Cek kesehatan gigi dan mulut secara berkala."
            ];
        } else {
            // Untuk kategori Pendek & Sangat Pendek
            $rekomendasi = [
                "Segera kunjungi Poli Gizi/Anak di Puskesmas untuk pemeriksaan klinis.",
                "Prioritaskan asupan Protein Hewani tinggi (Double Protein).",
                "Pastikan kebersihan lingkungan (Sanitasi) untuk mencegah infeksi berulang.",
                "Konsultasikan pemberian vitamin atau suplemen tambahan kepada dokter."
            ];
        }

        return [
            'status' => $status,
            'label' => $label,
            'pesan' => $pesan,
            'rekomendasi' => $rekomendasi,
            'z_score' => round(($tinggi - $median), 2)
        ];
    }
}
