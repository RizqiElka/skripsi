<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan_model extends CI_Model {
    public function get_all() {
        return $this->db->get('layanan')->result_array();
    }

    public function get_by_id($id) {
        return $this->db->get_where('layanan', ['id' => $id])->row_array();
    }

    public function insert($data) {
        return $this->db->insert('layanan', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('layanan', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('layanan');
    }
}
