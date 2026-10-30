<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tenaga_model extends CI_Model {
    public function get_all() {
        return $this->db->get('tenaga_medis')->result_array();
    }

    public function get_by_id($id) {
        return $this->db->get_where('tenaga_medis', ['id' => $id])->row_array();
    }

    public function insert($data) {
        return $this->db->insert('tenaga_medis', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('tenaga_medis', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('tenaga_medis');
    }
}
