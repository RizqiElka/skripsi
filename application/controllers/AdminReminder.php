<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminReminder extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('auth/login');
        }
        $this->load->model('Reminder_model');
    }

    public function index() {
        $data['title'] = 'Kelola Reminder Kontrol';
        $data['reminder'] = $this->Reminder_model->get_all();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/reminder/index', $data);
        $this->load->view('templates/admin_footer');
    }

    public function update_status($id) {
        $this->Reminder_model->update_status($id, 'Diingatkan');
        $this->session->set_flashdata('success', 'Status reminder berhasil diupdate!');
        redirect('adminreminder');
    }

    public function hapus($id) {
        $this->Reminder_model->delete($id);
        $this->session->set_flashdata('success', 'Data reminder berhasil dihapus!');
        redirect('adminreminder');
    }
}
