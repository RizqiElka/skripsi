<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_model extends CI_Model {
    public function get_profil() {
        return $this->db->get('profil')->row_array();
    }

    public function update_profil($data) {
        // Asumsi id profil selalu 1 (single row)
        $this->db->where('id', 1);
        return $this->db->update('profil', $data);
    }
}
