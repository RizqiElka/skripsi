<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminPeringatan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('auth/login');
        }
        $this->load->model('Peringatan_model');
    }

    public function index() {
        $data['title'] = 'Kelola Peringatan Kesehatan';
        $data['peringatan'] = $this->Peringatan_model->get_all();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/peringatan/index', $data);
        $this->load->view('templates/admin_footer');
    }

    public function tambah() {
        $data = [
            'judul' => $this->input->post('judul', true),
            'pesan' => $this->input->post('pesan', true),
            'tipe'  => $this->input->post('tipe', true),
            'is_active' => 1
        ];
        $this->Peringatan_model->insert($data);
        $this->session->set_flashdata('success', 'Peringatan berhasil ditambahkan!');
        redirect('adminperingatan');
    }

    public function update() {
        $id = $this->input->post('id');
        $data = [
            'judul' => $this->input->post('judul', true),
            'pesan' => $this->input->post('pesan', true),
            'tipe'  => $this->input->post('tipe', true),
            'is_active' => $this->input->post('is_active')
        ];
        $this->Peringatan_model->update($id, $data);
        $this->session->set_flashdata('success', 'Peringatan berhasil diupdate!');
        redirect('adminperingatan');
    }

    public function hapus($id) {
        $this->Peringatan_model->delete($id);
        $this->session->set_flashdata('success', 'Peringatan berhasil dihapus!');
        redirect('adminperingatan');
    }
}
