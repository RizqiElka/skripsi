<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peringatan_model extends CI_Model {

    public function get_all() {
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('peringatan')->result_array();
    }

    public function get_active() {
        $this->db->where('is_active', 1);
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('peringatan')->result_array();
    }

    public function insert($data) {
        return $this->db->insert('peringatan', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('peringatan', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('peringatan');
    }
}
