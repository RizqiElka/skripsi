<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminPengaduan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('auth/login');
        }
        $this->load->model('Pengaduan_model');
    }

    public function index() {
        $data['title'] = 'Pengaduan Masyarakat - Admin Panel';
        $data['pengaduan'] = $this->Pengaduan_model->get_all();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/pengaduan/index', $data);
        $this->load->view('templates/admin_footer');
    }

    public function update_status($id) {
        $status = $this->input->post('status');
        $tanggapan = $this->input->post('tanggapan');

        if ($this->Pengaduan_model->update_status($id, $status, $tanggapan)) {
            $this->session->set_flashdata('success', 'Status pengaduan berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui status pengaduan.');
        }
        redirect('adminpengaduan');
    }

    public function delete($id) {
        if ($this->Pengaduan_model->delete($id)) {
            $this->session->set_flashdata('success', 'Data pengaduan berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus pengaduan.');
        }
        redirect('adminpengaduan');
    }
}
