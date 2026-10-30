<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reaktivasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Reaktivasi_model');
        $this->load->model('Profil_model');
        $this->load->library('form_validation');
    }

    // Cek apakah masyarakat sudah login
    private function _check_user_login() {
        if (!$this->session->userdata('user_logged_in')) {
            $this->session->set_flashdata('error', 'Silakan login terlebih dahulu untuk mengakses layanan.');
            redirect('auth/login');
        }
    }

    // Cek apakah admin sudah login
    private function _check_admin_login() {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('auth/login');
        }
    }

    // =====================================================
    // HALAMAN MASYARAKAT
    // =====================================================

    // Form Pengajuan Reaktivasi
    public function index() {
        $this->_check_user_login();

        $data['title'] = 'Reaktivasi Dinsos - Puskesmas';
        $data['profil'] = $this->Profil_model->get_profil();

        $this->load->view('templates/header', $data);
        $this->load->view('reaktivasi/index', $data);
        $this->load->view('templates/footer');
    }

    // Proses Pengajuan Reaktivasi
    public function proses() {
        $this->_check_user_login();

        $this->form_validation->set_rules('no_kk', 'Nomor KK', 'required|numeric|exact_length[16]');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|numeric|min_length[10]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error_reaktivasi', validation_errors());
            redirect('reaktivasi');
        }

        // Upload config
        $config_upload = [
            'upload_path' => './uploads/reaktivasi/',
            'allowed_types' => 'pdf|jpg|jpeg|png',
            'max_size' => 2048,
            'encrypt_name' => TRUE
        ];

        // Pastikan folder upload ada
        if (!is_dir('./uploads/reaktivasi/')) {
            mkdir('./uploads/reaktivasi/', 0777, TRUE);
        }

        $this->load->library('upload', $config_upload);

        // Upload Surat Keterangan Sakit
        if (!$this->upload->do_upload('bukti_sakit')) {
            $this->session->set_flashdata('error_reaktivasi', 'Upload Surat Keterangan Sakit gagal: ' . $this->upload->display_errors('', ''));
            redirect('reaktivasi');
            return;
        }
        $file_sakit = $this->upload->data('file_name');

        // Upload KK
        $this->upload->initialize($config_upload);
        if (!$this->upload->do_upload('bukti_kk')) {
            $this->session->set_flashdata('error_reaktivasi', 'Upload KK gagal: ' . $this->upload->display_errors('', ''));
            redirect('reaktivasi');
            return;
        }
        $file_kk = $this->upload->data('file_name');

        $data_insert = [
            'user_id' => $this->session->userdata('user_id'),
            'nik' => $this->session->userdata('user_nik'),
            'no_hp' => $this->input->post('no_hp', true),
            'bukti_sakit' => $file_sakit,
            'bukti_kk' => $file_kk,
            'keterangan' => $this->input->post('keterangan', true) ?: '',
            'status' => 'Diajukan'
        ];

        $this->Reaktivasi_model->insert($data_insert);
        $this->session->set_flashdata('success_reaktivasi', 'Pengajuan Reaktivasi Dinsos berhasil dikirim. Silakan pantau status pengajuan Anda.');
        redirect('reaktivasi/riwayat');
    }

    // Detail Pengajuan Reaktivasi Masyarakat (Tracking Progress)
    public function detail($id) {
        $this->_check_user_login();

        $data['title'] = 'Detail Pengajuan Reaktivasi - Puskesmas';
        $data['profil'] = $this->Profil_model->get_profil();
        $data['pengajuan'] = $this->Reaktivasi_model->get_by_id($id);

        if (!$data['pengajuan'] || $data['pengajuan']['user_id'] != $this->session->userdata('user_id')) {
            $this->session->set_flashdata('error_reaktivasi', 'Pengajuan tidak ditemukan.');
            redirect('reaktivasi/riwayat');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('reaktivasi/detail', $data);
        $this->load->view('templates/footer');
    }

    // Riwayat Pengajuan Reaktivasi Masyarakat
    public function riwayat() {
        $this->_check_user_login();

        $data['title'] = 'Riwayat Pengajuan Reaktivasi - Puskesmas';
        $data['profil'] = $this->Profil_model->get_profil();
        $data['pengajuan'] = $this->Reaktivasi_model->get_by_user($this->session->userdata('user_id'));

        $this->load->view('templates/header', $data);
        $this->load->view('reaktivasi/riwayat', $data);
        $this->load->view('templates/footer');
    }

    // =====================================================
    // HALAMAN ADMIN
    // =====================================================

    // Daftar Pengajuan Reaktivasi (Admin)
    public function admin_list() {
        $this->_check_admin_login();

        $data['title'] = 'Kelola Pengajuan Reaktivasi';
        $data['pengajuan'] = $this->Reaktivasi_model->get_all();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('reaktivasi/admin_list', $data);
        $this->load->view('templates/admin_footer');
    }

    // Detail Pengajuan Reaktivasi (Admin)
    public function admin_detail($id) {
        $this->_check_admin_login();

        $data['title'] = 'Detail Pengajuan Reaktivasi';
        $data['pengajuan'] = $this->Reaktivasi_model->get_by_id($id);

        if (!$data['pengajuan']) {
            $this->session->set_flashdata('error', 'Data pengajuan tidak ditemukan.');
            redirect('reaktivasi/admin_list');
        }

        $this->load->view('templates/admin_header', $data);
        $this->load->view('reaktivasi/admin_detail', $data);
        $this->load->view('templates/admin_footer');
    }

    // Update Status Pengajuan Reaktivasi (Admin)
    public function admin_update_status($id) {
        $this->_check_admin_login();

        $status = $this->input->post('status', true);
        $keterangan = $this->input->post('keterangan', true);

        $data_update = [
            'status' => $status,
            'keterangan' => $keterangan
        ];

        $this->Reaktivasi_model->update($id, $data_update);
        $this->session->set_flashdata('success', 'Status pengajuan berhasil diperbarui.');
        redirect('reaktivasi/admin_detail/' . $id);
    }
}
