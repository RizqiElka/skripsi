<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminFasilitas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('auth/login');
        }
        $this->load->model('Fasilitas_model');
    }

    public function index() {
        $data['title'] = 'Kelola Fasilitas';
        $data['fasilitas'] = $this->Fasilitas_model->get_all();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/fasilitas/index', $data);
        $this->load->view('templates/admin_footer');
    }

    public function tambah() {
        $data = [
            'nama_fasilitas' => $this->input->post('nama_fasilitas', true),
            'deskripsi' => $this->input->post('deskripsi', true)
        ];
        $this->Fasilitas_model->insert($data);
        $this->session->set_flashdata('success', 'Fasilitas berhasil ditambahkan!');
        redirect('adminfasilitas');
    }

    public function update() {
        $id = $this->input->post('id');
        $data = [
            'nama_fasilitas' => $this->input->post('nama_fasilitas', true),
            'deskripsi' => $this->input->post('deskripsi', true)
        ];
        $this->Fasilitas_model->update($id, $data);
        $this->session->set_flashdata('success', 'Fasilitas berhasil diupdate!');
        redirect('adminfasilitas');
    }

    public function hapus($id) {
        $this->Fasilitas_model->delete($id);
        $this->session->set_flashdata('success', 'Fasilitas berhasil dihapus!');
        redirect('adminfasilitas');
    }
}
