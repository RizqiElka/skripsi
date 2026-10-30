<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tenaga extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Tenaga_model');
        $this->load->model('Profil_model');
    }

    public function index() {
        $data['title'] = 'Tenaga Medis - Puskesmas';
        $data['profil'] = $this->Profil_model->get_profil();
        $data['tenaga'] = $this->Tenaga_model->get_all();
        
        $this->load->view('templates/header', $data);
        $this->load->view('tenaga/index', $data);
        $this->load->view('templates/footer');
    }
}
