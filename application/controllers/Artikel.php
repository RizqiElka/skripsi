<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Artikel_model');
        $this->load->model('Profil_model');
    }

    public function index() {
        $data['title'] = 'Artikel & Berita - Puskesmas';
        $data['profil'] = $this->Profil_model->get_profil();
        $data['artikel'] = $this->Artikel_model->get_all();
        
        $this->load->view('templates/header', $data);
        $this->load->view('artikel/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($slug) {
        $data['artikel'] = $this->Artikel_model->get_by_slug($slug);
        
        if(empty($data['artikel'])) {
            show_404();
        }

        $data['title'] = $data['artikel']['judul'] . ' - Puskesmas';
        $data['profil'] = $this->Profil_model->get_profil();
        
        $this->load->view('templates/header', $data);
        $this->load->view('artikel/detail', $data);
        $this->load->view('templates/footer');
    }
}
