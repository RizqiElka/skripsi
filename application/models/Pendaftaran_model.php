<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model {

    public function insert($data) {
        return $this->db->insert('pendaftaran', $data);
    }

    public function get_all() {
        $this->db->select('pendaftaran.*, layanan.nama_layanan');
        $this->db->from('pendaftaran');
        $this->db->join('layanan', 'layanan.id = pendaftaran.id_layanan', 'left');
        return $this->db->get()->result_array();
    }

    public function get_next_antrean($id_layanan, $tanggal) {
        $this->db->where('id_layanan', $id_layanan);
        $this->db->where('tanggal_kunjungan', $tanggal);
        return $this->db->count_all_results('pendaftaran') + 1;
    }

    public function get_filtered($id_layanan = null, $tanggal = null) {
        $this->db->select('pendaftaran.*, layanan.nama_layanan');
        $this->db->from('pendaftaran');
        $this->db->join('layanan', 'layanan.id = pendaftaran.id_layanan', 'left');
        if ($id_layanan) $this->db->where('pendaftaran.id_layanan', $id_layanan);
        if ($tanggal) $this->db->where('pendaftaran.tanggal_kunjungan', $tanggal);
        $this->db->order_by('pendaftaran.tanggal_kunjungan', 'DESC');
        $this->db->order_by('pendaftaran.no_antrean', 'ASC');
        return $this->db->get()->result_array();
    }
}
