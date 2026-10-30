<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AlurPelayanan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Profil_model');
        $this->load->model('Layanan_model');
    }

    public function index() {
        $data['title'] = 'Alur Pelayanan Pasien - Puskesmas';
        $data['profil'] = $this->Profil_model->get_profil();
        $data['layanan'] = $this->Layanan_model->get_all();

        $this->load->view('templates/header', $data);
        $this->load->view('alur_pelayanan/index', $data);
        $this->load->view('templates/footer');
    }

    // Poin 1: Halaman Tersendiri Alur Poli (Poli Gigi, Poli Umum, Anak, KIA, Imunisasi, P2P, Ruang Obat)
    public function poli() {
        $data['title'] = 'Alur Pelayanan Poli Medis - Puskesmas';
        $data['profil'] = $this->Profil_model->get_profil();
        $data['layanan'] = $this->Layanan_model->get_all();

        $this->load->view('templates/header', $data);
        $this->load->view('alur_pelayanan/poli', $data);
        $this->load->view('templates/footer');
    }
}
