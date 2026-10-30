<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminTenaga extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('auth/login');
        }
        $this->load->model('Tenaga_model');
    }

    public function index() {
        $data['title'] = 'Kelola Tenaga Medis';
        $data['tenaga'] = $this->Tenaga_model->get_all();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/tenaga/index', $data);
        $this->load->view('templates/admin_footer');
    }

    public function tambah() {
        $nama = $this->input->post('nama', true);
        $jabatan = $this->input->post('jabatan', true);
        $foto = 'default.jpg';

        $config['upload_path'] = './assets/uploads/tenaga/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            $foto = $this->upload->data('file_name');
        }

        $data = [
            'nama' => $nama,
            'jabatan' => $jabatan,
            'foto' => $foto,
            'jadwal' => $this->input->post('jadwal', true),
            'status_kerja' => 'Aktif'
        ];
        $this->Tenaga_model->insert($data);
        $this->session->set_flashdata('success', 'Tenaga Medis berhasil ditambahkan!');
        redirect('admintenaga');
    }

    public function update() {
        $id = $this->input->post('id');
        $data = [
            'nama' => $this->input->post('nama', true),
            'jabatan' => $this->input->post('jabatan', true),
            'jadwal' => $this->input->post('jadwal', true),
            'status_kerja' => $this->input->post('status_kerja')
        ];

        $config['upload_path'] = './assets/uploads/tenaga/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            $old_data = $this->Tenaga_model->get_by_id($id);
            if ($old_data['foto'] != 'default.jpg' && file_exists('./assets/uploads/tenaga/' . $old_data['foto'])) {
                @unlink('./assets/uploads/tenaga/' . $old_data['foto']);
            }
            $data['foto'] = $this->upload->data('file_name');
        }

        $this->Tenaga_model->update($id, $data);
        $this->session->set_flashdata('success', 'Data berhasil diupdate!');
        redirect('admintenaga');
    }

    public function hapus($id) {
        $this->Tenaga_model->delete($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        redirect('admintenaga');
    }
}
