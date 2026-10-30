<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uhc_model extends CI_Model {

    private $table = 'pengajuan_uhc';

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function get_all() {
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get($this->table)->result_array();
    }

    public function get_by_id($id) {
        return $this->db->get_where($this->table, ['id' => $id])->row_array();
    }

    public function get_by_user($user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get($this->table)->result_array();
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function count_all() {
        return $this->db->count_all($this->table);
    }

    public function count_by_status($status) {
        return $this->db->where('status', $status)->count_all_results($this->table);
    }

    public function count_today() {
        return $this->db->where('DATE(created_at)', date('Y-m-d'))->count_all_results($this->table);
    }
}
