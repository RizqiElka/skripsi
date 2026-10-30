<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fasilitas_model extends CI_Model {
    public function get_all() {
        return $this->db->get('fasilitas')->result_array();
    }

    public function get_by_id($id) {
        return $this->db->get_where('fasilitas', ['id' => $id])->row_array();
    }

    public function insert($data) {
        return $this->db->insert('fasilitas', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('fasilitas', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('fasilitas');
    }
}
