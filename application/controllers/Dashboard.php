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
}
