<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan_model extends CI_Model {

    public function insert($data) {
        return $this->db->insert('pengaduan', $data);
    }

    public function get_all() {
        return $this->db->order_by('id', 'DESC')->get('pengaduan')->result_array();
    }

    public function get_by_id($id) {
        return $this->db->get_where('pengaduan', ['id' => $id])->row_array();
    }

    public function update_status($id, $status, $tanggapan = null) {
        $data = ['status' => $status];
        if ($tanggapan !== null) {
            $data['tanggapan'] = $tanggapan;
        }
        return $this->db->where('id', $id)->update('pengaduan', $data);
    }

    public function delete($id) {
        return $this->db->delete('pengaduan', ['id' => $id]);
    }

    public function count_all() {
        return $this->db->count_all('pengaduan');
    }

    public function count_by_status($status) {
        return $this->db->where('status', $status)->count_all_results('pengaduan');
    }
}
