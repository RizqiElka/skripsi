<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminProfil extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('auth/login');
        }
        $this->load->model('Profil_model');
    }

    public function index() {
        $data['title'] = 'Kelola Profil Puskesmas';
        $data['profil'] = $this->Profil_model->get_profil();

        $this->form_validation->set_rules('nama_puskesmas', 'Nama Puskesmas', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('admin/profil/index', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $update_data = [
                'nama_puskesmas' => $this->input->post('nama_puskesmas', true),
                'sejarah' => $this->input->post('sejarah', true),
                'visi' => $this->input->post('visi', true),
                'misi' => $this->input->post('misi', true),
                'jam_operasional' => $this->input->post('jam_operasional', true),
                'alamat' => $this->input->post('alamat', true),
                'telepon' => $this->input->post('telepon', true)
            ];

            // Upload Gambar Wilayah
            if (!empty($_FILES['gambar_wilayah']['name'])) {
                $config['upload_path']   = './assets/uploads/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['encrypt_name']  = TRUE;
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_wilayah')) {
                    $upload_data = $this->upload->data();
                    $update_data['gambar_wilayah'] = $upload_data['file_name'];
                }
            }

            $this->Profil_model->update_profil($update_data);
            $this->session->set_flashdata('success', 'Profil berhasil diupdate!');
            redirect('adminprofil');
        }
    }
}
