<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Profil_model');
        $this->load->model('Pengaduan_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = 'Alur & Kanal Pengaduan Masyarakat - Puskesmas';
        $data['profil'] = $this->Profil_model->get_profil();

        $this->load->view('templates/header', $data);
        $this->load->view('pengaduan/index', $data);
        $this->load->view('templates/footer');
    }

    public function kirim() {
        $this->form_validation->set_rules('nama_pelapor', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama pelapor wajib diisi.'
        ]);
        $this->form_validation->set_rules('no_hp', 'Nomor HP / WhatsApp', 'required|numeric|min_length[10]', [
            'required' => 'Nomor HP/WhatsApp aktif wajib diisi untuk konfirmasi tindak lanjut.',
            'numeric'  => 'Nomor HP harus berupa angka.'
        ]);
        $this->form_validation->set_rules('kategori', 'Kategori Pengaduan', 'required', [
            'required' => 'Pilih kategori pengaduan.'
        ]);
        $this->form_validation->set_rules('lokasi_layanan', 'Lokasi / Ruang Layanan', 'required', [
            'required' => 'Pilih lokasi atau ruang poli layanan terkait.'
        ]);
        $this->form_validation->set_rules('isi_pengaduan', 'Isi Pengaduan / Keluhan', 'required|min_length[10]', [
            'required' => 'Tuliskan rincian keluhan atau aspirasi Anda.',
            'min_length' => 'Isi pengaduan minimal 10 karakter agar dapat ditindaklanjuti secara akurat.'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Alur & Kanal Pengaduan Masyarakat - Puskesmas';
            $data['profil'] = $this->Profil_model->get_profil();

            $this->load->view('templates/header', $data);
            $this->load->view('pengaduan/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data_insert = [
                'nama_pelapor'     => $this->input->post('nama_pelapor', true),
                'nik'              => $this->input->post('nik', true),
                'no_hp'            => $this->input->post('no_hp', true),
                'email'            => $this->input->post('email', true),
                'kategori'         => $this->input->post('kategori', true),
                'lokasi_layanan'   => $this->input->post('lokasi_layanan', true),
                'isi_pengaduan'    => $this->input->post('isi_pengaduan', true),
                'tanggal_kejadian' => $this->input->post('tanggal_kejadian', true) ?: date('Y-m-d'),
                'status'           => 'Menunggu'
            ];

            if ($this->Pengaduan_model->insert($data_insert)) {
                $this->session->set_flashdata('success', 'Terima kasih, laporan pengaduan Anda berhasil dikirim! Tim Mutu Puskesmas akan menindaklanjuti dalam waktu 1x24 jam.');
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan sistem saat mengirim pengaduan. Silakan coba kembali.');
            }

            redirect('pengaduan#formPengaduan');
        }
    }
}
