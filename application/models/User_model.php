<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function insert($data) {
        return $this->db->insert('users', $data);
    }

    public function get_by_username($username) {
        return $this->db->get_where('users', ['username' => $username])->row_array();
    }

    public function get_by_nik($nik) {
        return $this->db->get_where('users', ['nik' => $nik])->row_array();
    }

    public function get_by_id($id) {
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    public function get_all() {
        return $this->db->order_by('id', 'DESC')->get('users')->result_array();
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    public function delete($id) {
        return $this->db->delete('users', ['id' => $id]);
    }

    public function count_all() {
        return $this->db->count_all('users');
    }
}
