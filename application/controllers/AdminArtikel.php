<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminArtikel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('auth/login');
        }
        $this->load->model('Artikel_model');
    }

    public function index() {
        $data['title'] = 'Kelola Artikel & Berita';
        $data['artikel'] = $this->Artikel_model->get_all();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/artikel/index', $data);
        $this->load->view('templates/admin_footer');
    }

    public function tambah() {
        $judul = $this->input->post('judul', true);
        $slug = url_title($judul, 'dash', true);
        
        $gambar = 'default_artikel.jpg';
        $config['upload_path'] = './assets/uploads/artikel/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('gambar')) {
            $gambar = $this->upload->data('file_name');
        }

        $tanggal = $this->input->post('tanggal');
        if (empty($tanggal)) {
            $tanggal = date('Y-m-d');
        }
        
        $data = [
            'judul' => $judul,
            'slug' => $slug,
            'isi' => $this->input->post('isi', true),
            'gambar' => $gambar,
            'tanggal' => $tanggal
        ];
        $this->Artikel_model->insert($data);
        $this->session->set_flashdata('success', 'Artikel berhasil ditambahkan!');
        redirect('adminartikel');
    }

    public function hapus($id) {
        $this->Artikel_model->delete($id);
        $this->session->set_flashdata('success', 'Artikel berhasil dihapus!');
        redirect('adminartikel');
    }
}
