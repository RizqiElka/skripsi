<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layananonline extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Reminder_model');
        $this->load->model('Konsultasi_model');
        $this->load->model('Layanan_model');
        $this->load->model('Profil_model');
        $this->load->model('Pendaftaran_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = 'Layanan Online - Puskesmas';
        $data['profil'] = $this->Profil_model->get_profil();
        
        $this->load->view('templates/header', $data);
        $this->load->view('layanan_online/index', $data);
        $this->load->view('templates/footer');
    }

    public function pendaftaran() {
        // Fitur pendaftaran online dialihkan ke panduan alur pelayanan resmi
        redirect('alurpelayanan');
    }

    public function reminder() {
        $data['title'] = 'Reminder Jadwal - Puskesmas';
        $data['profil'] = $this->Profil_model->get_profil();
        $data['layanan'] = $this->Layanan_model->get_all();
        
        $this->load->view('templates/header', $data);
        $this->load->view('layanan_online/reminder', $data);
        $this->load->view('templates/footer');
    }

    public function konsultasi() {
        $data['title'] = 'Konsultasi Medis - Puskesmas';
        $data['profil'] = $this->Profil_model->get_profil();
        
        $this->load->view('templates/header', $data);
        $this->load->view('layanan_online/konsultasi', $data);
        $this->load->view('templates/footer');
    }

    public function cek_status() {
        redirect('alurpelayanan');
    }

    public function proses_pendaftaran() {
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric|exact_length[16]');
        $this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('id_layanan', 'Poli Tujuan', 'required');
        $this->form_validation->set_rules('tanggal_kunjungan', 'Tanggal Kunjungan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error_pendaftaran', validation_errors());
            redirect('layananonline/pendaftaran');
        } else {
            // Generate No Pendaftaran: REG-YYYYMMDD-XXXX
            $no_reg = 'REG-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -4));
            
            $id_layanan = $this->input->post('id_layanan', true);
            $tanggal = $this->input->post('tanggal_kunjungan', true);
            
            // Get Next Queue Number
            $no_antrean = $this->Pendaftaran_model->get_next_antrean($id_layanan, $tanggal);

            $data = [
                'no_pendaftaran' => $no_reg,
                'no_antrean' => $no_antrean,
                'nik' => $this->input->post('nik', true),
                'nama_pasien' => $this->input->post('nama_pasien', true),
                'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
                'alamat' => $this->input->post('alamat', true),
                'id_layanan' => $id_layanan,
                'tanggal_kunjungan' => $tanggal,
                'status' => 'Dikonfirmasi'
            ];
            
            $this->Pendaftaran_model->insert($data);
            $layanan_info = $this->db->get_where('layanan', ['id' => $id_layanan])->row_array();
            $nama_poli = $layanan_info ? $layanan_info['nama_layanan'] : '-';

            $this->session->set_flashdata('success_pendaftaran', [
                'no_antrean' => $no_antrean,
                'no_reg' => $no_reg,
                'nama' => $data['nama_pasien'],
                'poli' => $nama_poli,
                'tanggal' => $tanggal
            ]);
            redirect('layananonline/pendaftaran');
        }
    }

    public function proses_reminder() {
        $this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required');
        $this->form_validation->set_rules('tanggal_kontrol', 'Tanggal Kontrol', 'required');
        $this->form_validation->set_rules('id_layanan', 'Poli Tujuan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error_reminder', validation_errors());
            redirect('layananonline/reminder');
        } else {
            $data = [
                'nama_pasien' => $this->input->post('nama_pasien', true),
                'no_hp' => $this->input->post('no_hp', true),
                'tanggal_kontrol' => $this->input->post('tanggal_kontrol', true),
                'id_layanan' => $this->input->post('id_layanan', true),
                'keterangan' => $this->input->post('keterangan', true)
            ];
            $this->Reminder_model->insert($data);
            $this->session->set_flashdata('success_reminder', 'Reminder berhasil diaktifkan. Anda akan diingatkan secara otomatis.');
            redirect('layananonline/reminder');
        }
    }

    public function proses_konsultasi() {
        $this->form_validation->set_rules('nama_pengirim', 'Nama Pengirim', 'required');
        $this->form_validation->set_rules('email_hp', 'Email', 'required');
        $this->form_validation->set_rules('no_wa', 'Nomor WhatsApp', 'required');
        $this->form_validation->set_rules('pesan', 'Pesan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error_konsultasi', validation_errors());
            redirect('layananonline/konsultasi');
        } else {
            $data = [
                'nama_pengirim' => $this->input->post('nama_pengirim', true),
                'email_hp' => $this->input->post('email_hp', true),
                'no_wa' => $this->input->post('no_wa', true),
                'pesan' => $this->input->post('pesan', true)
            ];
            $this->Konsultasi_model->insert($data);
            $this->session->set_flashdata('success_konsultasi', 'Konsultasi berhasil dikirim. Mohon tunggu jawaban dari tim medis.');
            redirect('layananonline/konsultasi');
        }
    }
}
