<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Layanan_model');
        $this->load->model('Fasilitas_model');
        $this->load->model('Profil_model');
    }

    public function index() {
        $data['title'] = 'Layanan & Fasilitas - Puskesmas';
        $data['profil'] = $this->Profil_model->get_profil();
        $data['layanan'] = $this->Layanan_model->get_all();
        $data['fasilitas'] = $this->Fasilitas_model->get_all();
        
        $this->load->view('templates/header', $data);
        $this->load->view('layanan/index', $data);
        $this->load->view('templates/footer');
    }
}
