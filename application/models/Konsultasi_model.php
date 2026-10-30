<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsultasi_model extends CI_Model {
    public function get_all() {
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('konsultasi')->result_array();
    }

    public function get_by_id($id) {
        return $this->db->get_where('konsultasi', ['id' => $id])->row_array();
    }

    public function insert($data) {
        return $this->db->insert('konsultasi', $data);
    }

    public function jawab($id, $jawaban) {
        $this->db->where('id', $id);
        return $this->db->update('konsultasi', ['jawaban' => $jawaban, 'status' => 'Sudah Dijawab']);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('konsultasi');
    }
}
