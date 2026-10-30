<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarif extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Profil_model');
    }

    public function index() {
        $data['title'] = 'Biaya & Tarif Layanan - Puskesmas';
        $data['profil'] = $this->Profil_model->get_profil();

        $this->load->view('templates/header', $data);
        $this->load->view('tarif/index', $data);
        $this->load->view('templates/footer');
    }
}
