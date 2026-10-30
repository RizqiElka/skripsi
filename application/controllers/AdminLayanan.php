<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLayanan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('auth/login');
        }
        $this->load->model('Layanan_model');
    }

    public function index() {
        $data['title'] = 'Kelola Layanan';
        $data['layanan'] = $this->Layanan_model->get_all();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/layanan/index', $data);
        $this->load->view('templates/admin_footer');
    }

    public function tambah() {
        $data = [
            'nama_layanan' => $this->input->post('nama_layanan', true),
            'deskripsi' => $this->input->post('deskripsi', true),
            'icon' => $this->input->post('icon', true)
        ];
        $this->Layanan_model->insert($data);
        $this->session->set_flashdata('success', 'Layanan berhasil ditambahkan!');
        redirect('adminlayanan');
    }

    public function update() {
        $id = $this->input->post('id');
        $data = [
            'nama_layanan' => $this->input->post('nama_layanan', true),
            'deskripsi' => $this->input->post('deskripsi', true),
            'icon' => $this->input->post('icon', true)
        ];
        $this->Layanan_model->update($id, $data);
        $this->session->set_flashdata('success', 'Layanan berhasil diupdate!');
        redirect('adminlayanan');
    }

    public function hapus($id) {
        $this->Layanan_model->delete($id);
        $this->session->set_flashdata('success', 'Layanan berhasil dihapus!');
        redirect('adminlayanan');
    }
}
