<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $data['title'] = 'Dashboard Admin';
        
        // Stats Users / Pengguna
        $data['total_users'] = $this->db->count_all('users');
        $data['recent_users'] = $this->db->order_by('id', 'DESC')->limit(6)->get('users')->result_array();

        // Stats Pengaduan
        $data['total_pengaduan'] = $this->db->count_all('pengaduan');
        $data['pengaduan_menunggu'] = $this->db->where('status', 'Menunggu')->count_all_results('pengaduan');
        $data['recent_pengaduan'] = $this->db->order_by('id', 'DESC')->limit(5)->get('pengaduan')->result_array();

        // Stats Konsultasi & Layanan
        $data['total_konsultasi'] = $this->db->count_all('konsultasi');
        $data['jumlah_tenaga'] = $this->db->count_all('tenaga_medis');
        $data['jumlah_artikel'] = $this->db->count_all('artikel');

        // Stats UHC & Reaktivasi
        $this->load->model('Uhc_model');
        $this->load->model('Reaktivasi_model');
        $data['total_uhc'] = $this->Uhc_model->count_all();
        $data['total_reaktivasi'] = $this->Reaktivasi_model->count_all();
        $data['uhc_today'] = $this->Uhc_model->count_today();
        $data['reaktivasi_today'] = $this->Reaktivasi_model->count_today();
        $data['uhc_ditolak'] = $this->Uhc_model->count_by_status('Ditolak');
        $data['reaktivasi_ditolak'] = $this->Reaktivasi_model->count_by_status('Ditolak');
        $data['uhc_selesai'] = $this->Uhc_model->count_by_status('Selesai');
        $data['reaktivasi_selesai'] = $this->Reaktivasi_model->count_by_status('Selesai');

        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/admin_footer');
    }

    public function profil() {
        $admin_id = $this->session->userdata('admin_id');
        $admin = $this->db->get_where('admin', ['id' => $admin_id])->row_array();

        $data['title'] = 'Profil Admin';
        $data['admin'] = $admin;

        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/profil_admin', $data);
        $this->load->view('templates/admin_footer');
    }

    public function update_profil() {
        $admin_id = $this->session->userdata('admin_id');
        $admin = $this->db->get_where('admin', ['id' => $admin_id])->row_array();

        if (!$admin) {
            $this->session->set_flashdata('error', 'Data admin tidak ditemukan.');
            redirect('dashboard/profil');
        }

        $update_data = [
            'nama_lengkap' => trim($this->input->post('nama_lengkap', true)),
        ];

        // Optional username change
        $username = trim($this->input->post('username', true));
        if (!empty($username)) {
            $update_data['username'] = $username;
        }

        // Optional password
        $password = $this->input->post('password');
        if (!empty($password)) {
            if (strlen($password) < 5) {
                $this->session->set_flashdata('error', 'Password minimal 5 karakter.');
                redirect('dashboard/profil');
            }
            $update_data['password'] = md5($password);
        }

        // Handle foto upload
        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path']   = './assets/uploads/avatars/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
            $config['max_size']      = 2048;
            $config['file_name']     = 'admin_' . $admin_id . '_' . time();
            $config['overwrite']     = true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $upload_data = $this->upload->data();
                $update_data['foto'] = $upload_data['file_name'];

                if (!empty($admin['foto']) && $admin['foto'] != 'default_avatar.png') {
                    $old_path = './assets/uploads/avatars/' . $admin['foto'];
                    if (file_exists($old_path)) unlink($old_path);
                }
            } else {
                $this->session->set_flashdata('error', 'Gagal upload foto: ' . $this->upload->display_errors('', ''));
                redirect('dashboard/profil');
            }
        }

        $this->db->where('id', $admin_id)->update('admin', $update_data);
        $this->session->set_userdata('nama_lengkap', $update_data['nama_lengkap']);

        $this->session->set_flashdata('success', 'Profil admin berhasil diperbarui!');
        redirect('dashboard/profil');
    }
}
