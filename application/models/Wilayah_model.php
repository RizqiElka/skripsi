<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah_model extends CI_Model {

    public function get_all() {
        return $this->db->get('wilayah')->result_array();
    }

    public function insert($data) {
        return $this->db->insert('wilayah', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('wilayah', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('wilayah');
    }
}
