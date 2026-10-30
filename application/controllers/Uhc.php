<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uhc extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Uhc_model');
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

    // Form Pengajuan UHC
    public function index() {
        $this->_check_user_login();

        $data['title'] = 'Usulan UHC - Puskesmas';
        $data['profil'] = $this->Profil_model->get_profil();

        $this->load->view('templates/header', $data);
        $this->load->view('uhc/index', $data);
        $this->load->view('templates/footer');
    }

    // Proses Pengajuan UHC
    // Proses Pengajuan UHC (Poin 7 Revisi)
    public function proses() {
        $this->_check_user_login();

        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric|exact_length[16]', [
            'required' => 'NIK wajib diisi 16 digit angka.',
            'numeric'  => 'NIK harus berupa angka.',
            'exact_length' => 'NIK harus tepat 16 digit.'
        ]);
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama lengkap wajib diisi sesuai KTP.'
        ]);
        $this->form_validation->set_rules('no_kk', 'Nomor KK', 'required|numeric|exact_length[16]', [
            'required' => 'Nomor KK wajib diisi 16 digit angka.',
            'numeric'  => 'Nomor KK harus berupa angka.',
            'exact_length' => 'Nomor KK harus tepat 16 digit.'
        ]);
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|numeric|min_length[10]', [
            'required' => 'Nomor HP/WhatsApp aktif wajib diisi.',
            'numeric'  => 'Nomor HP harus berupa angka.',
            'min_length' => 'Nomor HP minimal 10 digit.'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'required|trim', [
            'required' => 'Alamat lengkap domisili wajib diisi.'
        ]);
        $this->form_validation->set_rules('email', 'Email Aktif', 'required|valid_email', [
            'required'    => 'Email aktif wajib diisi untuk notifikasi jaminan.',
            'valid_email' => 'Format alamat email tidak valid.'
        ]);
        $this->form_validation->set_rules('diagnosa', 'Diagnosa Medis', 'required|trim', [
            'required' => 'Diagnosa penyakit / kondisi pasien wajib diisi.'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error_uhc', validation_errors('<div>• ', '</div>'));
            redirect('uhc');
            return;
        }

        // Cek file wajib
        if (empty($_FILES['bukti_sakit']['name'])) {
            $this->session->set_flashdata('error_uhc', 'Surat Keterangan Rawat/Sakit wajib diunggah.');
            redirect('uhc');
            return;
        }
        if (empty($_FILES['bukti_kk']['name'])) {
            $this->session->set_flashdata('error_uhc', 'Berkas Kartu Keluarga (KK) wajib diunggah.');
            redirect('uhc');
            return;
        }
        if (empty($_FILES['bukti_desil']['name'])) {
            $this->session->set_flashdata('error_uhc', 'Berkas Bukti Desil (DTKS/SKTM) wajib diunggah.');
            redirect('uhc');
            return;
        }

        // Upload Config
        $config_upload = [
            'upload_path'   => './uploads/uhc/',
            'allowed_types' => 'pdf|jpg|jpeg|png',
            'max_size'      => 2048,
            'encrypt_name'  => TRUE
        ];

        // Pastikan folder upload ada
        if (!is_dir('./uploads/uhc/')) {
            mkdir('./uploads/uhc/', 0777, TRUE);
        }

        $this->load->library('upload', $config_upload);

        // 1. Upload file surat keterangan
        if (!$this->upload->do_upload('bukti_sakit')) {
            $this->session->set_flashdata('error_uhc', 'Upload Surat Keterangan gagal: ' . $this->upload->display_errors('', ''));
            redirect('uhc');
            return;
        }
        $file_surat = $this->upload->data('file_name');

        // 2. Upload file kartu keluarga (KK)
        $this->upload->initialize($config_upload);
        if (!$this->upload->do_upload('bukti_kk')) {
            $this->session->set_flashdata('error_uhc', 'Upload Kartu Keluarga (KK) gagal: ' . $this->upload->display_errors('', ''));
            redirect('uhc');
            return;
        }
        $file_kk = $this->upload->data('file_name');

        // 3. Upload file bukti desil
        $this->upload->initialize($config_upload);
        if (!$this->upload->do_upload('bukti_desil')) {
            $this->session->set_flashdata('error_uhc', 'Upload Bukti Desil gagal: ' . $this->upload->display_errors('', ''));
            redirect('uhc');
            return;
        }
        $file_desil = $this->upload->data('file_name');

        $data_insert = [
            'user_id'      => $this->session->userdata('user_id'),
            'nik'          => $this->input->post('nik', true),
            'nama_lengkap' => $this->input->post('nama_lengkap', true),
            'no_kk'        => $this->input->post('no_kk', true),
            'no_hp'        => $this->input->post('no_hp', true),
            'alamat'       => $this->input->post('alamat', true),
            'email'        => $this->input->post('email', true),
            'bukti_sakit'  => $file_surat,
            'bukti_kk'     => $file_kk,
            'bukti_desil'  => $file_desil,
            'diagnosa'     => $this->input->post('diagnosa', true),
            'keterangan'   => $this->input->post('keterangan', true) ?: '',
            'status'       => 'Diajukan'
        ];

        $this->Uhc_model->insert($data_insert);
        $this->session->set_flashdata('success', 'Pengajuan UHC berhasil dikirim. Silakan pantau status pengajuan Anda.');
        redirect('uhc/riwayat');
    }

    // Detail Pengajuan UHC Masyarakat (Tracking Progress)
    public function detail($id) {
        $this->_check_user_login();

        $data['title'] = 'Detail Pengajuan UHC - Puskesmas';
        $data['profil'] = $this->Profil_model->get_profil();
        $data['pengajuan'] = $this->Uhc_model->get_by_id($id);

        if (!$data['pengajuan'] || $data['pengajuan']['user_id'] != $this->session->userdata('user_id')) {
            $this->session->set_flashdata('error_uhc', 'Pengajuan tidak ditemukan.');
            redirect('uhc/riwayat');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('uhc/detail', $data);
        $this->load->view('templates/footer');
    }

    // Riwayat Pengajuan UHC Masyarakat
    public function riwayat() {
        $this->_check_user_login();

        $data['title'] = 'Riwayat Pengajuan UHC - Puskesmas';
        $data['profil'] = $this->Profil_model->get_profil();
        $data['pengajuan'] = $this->Uhc_model->get_by_user($this->session->userdata('user_id'));

        $this->load->view('templates/header', $data);
        $this->load->view('uhc/riwayat', $data);
        $this->load->view('templates/footer');
    }

    // =====================================================
    // HALAMAN ADMIN
    // =====================================================

    // Daftar Pengajuan UHC (Admin)
    public function admin_list() {
        $this->_check_admin_login();

        $data['title'] = 'Kelola Pengajuan UHC';
        $data['pengajuan'] = $this->Uhc_model->get_all();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('uhc/admin_list', $data);
        $this->load->view('templates/admin_footer');
    }

    // Detail Pengajuan UHC (Admin)
    public function admin_detail($id) {
        $this->_check_admin_login();

        $data['title'] = 'Detail Pengajuan UHC';
        $data['pengajuan'] = $this->Uhc_model->get_by_id($id);

        if (!$data['pengajuan']) {
            $this->session->set_flashdata('error', 'Data pengajuan tidak ditemukan.');
            redirect('uhc/admin_list');
        }

        $this->load->view('templates/admin_header', $data);
        $this->load->view('uhc/admin_detail', $data);
        $this->load->view('templates/admin_footer');
    }

    // Update Status Pengajuan UHC (Admin)
    public function admin_update_status($id) {
        $this->_check_admin_login();

        $status = $this->input->post('status', true);
        $keterangan = $this->input->post('keterangan', true);

        $data_update = [
            'status' => $status,
            'keterangan' => $keterangan
        ];

        $this->Uhc_model->update($id, $data_update);
        $this->session->set_flashdata('success', 'Status pengajuan berhasil diperbarui.');
        redirect('uhc/admin_detail/' . $id);
    }
}
