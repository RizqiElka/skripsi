<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reminder_model extends CI_Model {
    public function get_all() {
        $this->db->select('reminder.*, layanan.nama_layanan as poli_tujuan');
        $this->db->from('reminder');
        $this->db->join('layanan', 'layanan.id = reminder.id_layanan', 'left');
        $this->db->order_by('reminder.created_at', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_by_id($id) {
        return $this->db->get_where('reminder', ['id' => $id])->row_array();
    }

    public function insert($data) {
        return $this->db->insert('reminder', $data);
    }

    public function update_status($id, $status) {
        $this->db->where('id', $id);
        return $this->db->update('reminder', ['status' => $status]);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('reminder');
    }
}
