<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminWilayah extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('auth/login');
        }
        $this->load->model('Wilayah_model');
    }

    public function index() {
        $data['title'] = 'Kelola Wilayah Layanan';
        $data['wilayah'] = $this->Wilayah_model->get_all();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/wilayah/index', $data);
        $this->load->view('templates/admin_footer');
    }

    public function tambah() {
        $data = [
            'nama_desa' => $this->input->post('nama_desa', true),
            'kecamatan' => $this->input->post('kecamatan', true),
            'keterangan' => $this->input->post('keterangan', true)
        ];
        $this->Wilayah_model->insert($data);
        $this->session->set_flashdata('success', 'Wilayah berhasil ditambahkan!');
        redirect('adminwilayah');
    }

    public function update() {
        $id = $this->input->post('id');
        $data = [
            'nama_desa' => $this->input->post('nama_desa', true),
            'kecamatan' => $this->input->post('kecamatan', true),
            'keterangan' => $this->input->post('keterangan', true)
        ];
        $this->Wilayah_model->update($id, $data);
        $this->session->set_flashdata('success', 'Data wilayah berhasil diupdate!');
        redirect('adminwilayah');
    }

    public function hapus($id) {
        $this->Wilayah_model->delete($id);
        $this->session->set_flashdata('success', 'Wilayah berhasil dihapus!');
        redirect('adminwilayah');
    }
}
