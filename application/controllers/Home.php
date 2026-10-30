<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Profil_model');
        $this->load->model('Artikel_model');
        $this->load->model('Layanan_model');
        $this->load->model('Peringatan_model');
        $this->load->model('Wilayah_model');
    }

    public function index() {
        $data['title']          = 'Beranda';
        $data['profil']         = $this->Profil_model->get_profil();
        $data['layanan']        = array_slice($this->Layanan_model->get_all(), 0, 4);
        $data['peringatan']     = $this->Peringatan_model->get_active();
        $data['wilayah']        = $this->Wilayah_model->get_all();
        // Logika Status Buka/Tutup Otomatis
        date_default_timezone_set('Asia/Jakarta');
        $day = date('N'); // 1 (Mon) - 7 (Sun)
        $time = date('H:i');
        $is_open = false;

        if ($day >= 1 && $day <= 5) { // Sen - Jum: 08:00 - 14:00
            if ($time >= '08:00' && $time < '14:00') $is_open = true;
        } elseif ($day == 6) { // Sab: 08:00 - 12:00
            if ($time >= '08:00' && $time < '12:00') $is_open = true;
        }
        
        $data['is_open'] = $is_open;
        $data['artikel_terbaru'] = $this->Artikel_model->get_latest(3); // Ambil 3 artikel terbaru

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }
}
