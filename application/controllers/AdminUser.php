<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminUser extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('auth/login');
        }
        $this->load->model('User_model');
    }

    public function index() {
        $data['title'] = 'Data Pengguna / Pasien Terdaftar';
        $data['users'] = $this->User_model->get_all();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/user/index', $data);
        $this->load->view('templates/admin_footer');
    }

    // Poin 9: Admin Tambah Pengguna Baru
    public function tambah() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric|exact_length[16]|is_unique[users.nik]', [
            'required'     => 'NIK wajib diisi 16 digit.',
            'numeric'      => 'NIK harus berupa angka.',
            'exact_length' => 'NIK harus 16 digit.',
            'is_unique'    => 'NIK sudah digunakan oleh user lain.'
        ]);
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|numeric|min_length[10]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors('<div>• ', '</div>'));
        } else {
            $nik = trim($this->input->post('nik', true));
            $data_insert = [
                'nik'          => $nik,
                'username'     => $nik,
                'nama_lengkap' => trim($this->input->post('nama_lengkap', true)),
                'no_hp'        => trim($this->input->post('no_hp', true)),
                'alamat'       => trim($this->input->post('alamat', true)),
                'password'     => md5($this->input->post('password')),
                'role'         => $this->input->post('role', true) ?: 'pasien',
                'foto'         => 'default_avatar.png'
            ];

            // Handle Upload Foto jika ada
            if (!empty($_FILES['foto']['name'])) {
                $upload_path = './assets/uploads/avatars/';
                if (!is_dir($upload_path)) {
                    mkdir($upload_path, 0777, true);
                }

                $config['upload_path']   = $upload_path;
                $config['allowed_types'] = 'jpg|jpeg|png|webp';
                $config['max_size']      = 2048; // 2MB
                $config['file_name']     = 'user_' . time() . '_' . rand(100, 999);

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto')) {
                    $upload_data = $this->upload->data();
                    $data_insert['foto'] = $upload_data['file_name'];
                }
            }

            $this->User_model->insert($data_insert);
            $this->session->set_flashdata('success', 'Pengguna ' . $data_insert['nama_lengkap'] . ' berhasil ditambahkan.');
        }
        redirect('adminuser');
    }

    // Admin Ubah Pengguna (Termasuk Alamat & Foto)
    public function edit($id) {
        $user = $this->User_model->get_by_id($id);
        if (!$user) {
            $this->session->set_flashdata('error', 'User tidak ditemukan.');
            redirect('adminuser');
            return;
        }

        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama lengkap wajib diisi.'
        ]);
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|trim|min_length[10]', [
            'required'   => 'Nomor HP wajib diisi.',
            'min_length' => 'Nomor HP minimal 10 karakter/digit.'
        ]);

        // Validasi NIK
        $nik_input = trim($this->input->post('nik', true));
        if ($nik_input !== $user['nik']) {
            $this->form_validation->set_rules('nik', 'NIK', 'required|numeric|exact_length[16]|is_unique[users.nik]', [
                'required'     => 'NIK wajib diisi 16 digit.',
                'numeric'      => 'NIK harus berupa angka.',
                'exact_length' => 'NIK harus 16 digit.',
                'is_unique'    => 'NIK sudah digunakan oleh user lain.'
            ]);
        } else {
            $this->form_validation->set_rules('nik', 'NIK', 'required|numeric|exact_length[16]', [
                'required'     => 'NIK wajib diisi 16 digit.',
                'numeric'      => 'NIK harus berupa angka.',
                'exact_length' => 'NIK harus 16 digit.'
            ]);
        }

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors('<div>• ', '</div>'));
        } else {
            $data_update = [
                'nik'          => $nik_input,
                'nama_lengkap' => trim($this->input->post('nama_lengkap', true)),
                'no_hp'        => trim($this->input->post('no_hp', true)),
                'alamat'       => trim($this->input->post('alamat', true)),
                'role'         => $this->input->post('role', true) ?: $user['role']
            ];

            // Sinkronkan username jika sebelumnya sama dengan NIK
            if ($user['username'] === $user['nik']) {
                $data_update['username'] = $nik_input;
            }

            // Password baru opsional jika diisi
            $new_pass = $this->input->post('password');
            if (!empty($new_pass)) {
                $data_update['password'] = md5($new_pass);
            }

            // Handle Upload Foto jika diunggah baru
            if (!empty($_FILES['foto']['name'])) {
                $upload_path = './assets/uploads/avatars/';
                if (!is_dir($upload_path)) {
                    mkdir($upload_path, 0777, true);
                }

                $config['upload_path']   = $upload_path;
                $config['allowed_types'] = 'jpg|jpeg|png|webp';
                $config['max_size']      = 2048; // 2MB
                $config['file_name']     = 'user_' . time() . '_' . rand(100, 999);

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto')) {
                    $upload_data = $this->upload->data();
                    
                    // Hapus foto lama jika bukan default
                    if (!empty($user['foto']) && $user['foto'] !== 'default_avatar.png' && file_exists($upload_path . $user['foto'])) {
                        unlink($upload_path . $user['foto']);
                    }

                    $data_update['foto'] = $upload_data['file_name'];
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('adminuser');
                    return;
                }
            }

            $this->User_model->update($id, $data_update);
            $this->session->set_flashdata('success', 'Data pengguna ' . $data_update['nama_lengkap'] . ' berhasil diperbarui.');
        }
        redirect('adminuser');
    }

    public function delete($id) {
        $user = $this->User_model->get_by_id($id);
        if ($user) {
            $this->User_model->delete($id);
            $this->session->set_flashdata('success', 'Data user ' . $user['nama_lengkap'] . ' berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'User tidak ditemukan.');
        }
        redirect('adminuser');
    }

    public function reset_password($id) {
        $user = $this->User_model->get_by_id($id);
        if ($user) {
            // Reset ke default password: 123456
            $new_password = md5('123456');
            $this->db->where('id', $id)->update('users', ['password' => $new_password]);
            $this->session->set_flashdata('success', 'Password user ' . $user['nama_lengkap'] . ' berhasil direset menjadi "123456".');
        } else {
            $this->session->set_flashdata('error', 'User tidak ditemukan.');
        }
        redirect('adminuser');
    }
}
