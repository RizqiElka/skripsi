<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminKonsultasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('auth/login');
        }
        $this->load->model('Konsultasi_model');
    }

    public function index() {
        $data['title'] = 'Kelola Konsultasi Medis';
        $data['konsultasi'] = $this->Konsultasi_model->get_all();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/konsultasi/index', $data);
        $this->load->view('templates/admin_footer');
    }

    public function jawab() {
        $id = $this->input->post('id');
        $jawaban = $this->input->post('jawaban', true);
        
        $this->Konsultasi_model->jawab($id, $jawaban);
        $this->session->set_flashdata('success', 'Jawaban berhasil dikirim/disimpan!');
        redirect('adminkonsultasi');
    }

    public function hapus($id) {
        $this->Konsultasi_model->delete($id);
        $this->session->set_flashdata('success', 'Data konsultasi berhasil dihapus!');
        redirect('adminkonsultasi');
    }
}
