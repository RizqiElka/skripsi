<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminStunting extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $data['title'] = 'Data Hasil Deteksi Stunting';
        $this->db->order_by('created_at', 'DESC');
        $data['stunting'] = $this->db->get('stunting_results')->result_array();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/stunting/index', $data);
        $this->load->view('templates/admin_footer');
    }

    public function hapus($id) {
        $this->db->where('id', $id);
        $this->db->delete('stunting_results');
        $this->session->set_flashdata('success', 'Data hasil deteksi berhasil dihapus.');
        redirect('adminstunting');
    }
}
