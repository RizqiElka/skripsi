<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminPendaftaran extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('auth/login');
        }
        $this->load->model('Pendaftaran_model');
        $this->load->model('Layanan_model');
    }

    public function index() {
        $id_layanan = $this->input->get('id_layanan');
        $tanggal = $this->input->get('tanggal');

        $data['title'] = 'Data Pendaftaran Online';
        $data['pendaftaran'] = $this->Pendaftaran_model->get_filtered($id_layanan, $tanggal);
        $data['layanan'] = $this->Layanan_model->get_all();
        $data['filter_poli'] = $id_layanan;
        $data['filter_tanggal'] = $tanggal;

        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/pendaftaran/index', $data);
        $this->load->view('templates/admin_footer');
    }

    public function hapus($id) {
        $this->db->where('id', $id);
        $this->db->delete('pendaftaran');
        $this->session->set_flashdata('success', 'Data pendaftaran berhasil dihapus.');
        redirect('adminpendaftaran');
    }
}
