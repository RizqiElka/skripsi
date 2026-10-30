<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    // Satu Pintu Login (Unified Login: Admin & Masyarakat)
    public function login() {
        // Jika sudah login admin, arahkan ke dashboard
        if ($this->session->userdata('admin_logged_in')) {
            redirect('dashboard');
        }
        // Jika sudah login user, arahkan ke layanan digital
        if ($this->session->userdata('user_logged_in')) {
            redirect('layananonline');
        }

        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => 'Username atau NIK wajib diisi.'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Password wajib diisi.'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Login — Sistem Informasi Puskesmas';
            $this->load->view('auth/login_unified', $data);
        } else {
            $username = trim($this->input->post('username', true));
            $plain_pw = $this->input->post('password');
            $password = md5($plain_pw);

            // 1. Cek di tabel Admin
            $admin = $this->Admin_model->get_admin($username);
            if ($admin && ($admin['password'] === $password || $admin['password'] === $plain_pw)) {
                if ($admin['password'] === $plain_pw) {
                    $this->db->where('id', $admin['id'])->update('admin', ['password' => $password]);
                }
                $session_data = [
                    'admin_id'        => $admin['id'],
                    'username'        => $admin['username'],
                    'nama_lengkap'    => $admin['nama_lengkap'],
                    'admin_logged_in' => TRUE
                ];
                $this->session->set_userdata($session_data);
                redirect('dashboard');
                return;
            }

            // 2. Cek di tabel Users (Masyarakat / Akun dengan Role Admin)
            $user = $this->User_model->get_by_username($username);
            // Bisa juga login menggunakan 16 digit NIK
            if (!$user && strlen($username) === 16 && is_numeric($username)) {
                $user = $this->User_model->get_by_nik($username);
            }

            if ($user && ($user['password'] === $password || $user['password'] === $plain_pw)) {
                if ($user['password'] === $plain_pw) {
                    $this->db->where('id', $user['id'])->update('users', ['password' => $password]);
                }

                if (isset($user['role']) && $user['role'] === 'admin') {
                    $session_data = [
                        'admin_id'        => $user['id'],
                        'username'        => $user['username'],
                        'nama_lengkap'    => $user['nama_lengkap'],
                        'admin_logged_in' => TRUE
                    ];
                    $this->session->set_userdata($session_data);
                    redirect('dashboard');
                    return;
                } else {
                    $session_data = [
                        'user_id'        => $user['id'],
                        'user_username'  => $user['username'],
                        'user_nik'       => $user['nik'],
                        'user_nama'      => $user['nama_lengkap'],
                        'user_hp'        => $user['no_hp'],
                        'user_logged_in' => TRUE
                    ];
                    $this->session->set_userdata($session_data);
                    $this->session->set_flashdata('success', 'Selamat datang, ' . $user['nama_lengkap']);
                    redirect('layananonline');
                    return;
                }
            }

            // Jika tidak cocok di kedua tabel
            $this->session->set_flashdata('error', 'Username/NIK atau password tidak sesuai.');
            redirect('auth/login');
        }
    }

    // Redirect login_user ke login satu pintu
    public function login_user() {
        redirect('auth/login');
    }

    // Logout Admin
    public function logout() {
        $this->session->unset_userdata(['admin_id', 'username', 'nama_lengkap', 'admin_logged_in']);
        redirect('auth/login');
    }

    // Logout Masyarakat
    public function logout_user() {
        $this->session->unset_userdata(['user_id', 'user_username', 'user_nik', 'user_nama', 'user_hp', 'user_logged_in']);
        redirect('auth/login');
    }

    // Poin 3: Registrasi Akun Masyarakat
    public function register() {
        if ($this->session->userdata('user_logged_in')) {
            redirect('layananonline');
        }

        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric|exact_length[16]|is_unique[users.nik]', [
            'required'     => 'NIK wajib diisi.',
            'numeric'      => 'NIK harus berupa 16 digit angka.',
            'exact_length' => 'NIK harus tepat 16 digit angka.',
            'is_unique'    => 'NIK sudah terdaftar di sistem. Silakan login atau gunakan fitur Lupa Password.'
        ]);
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama lengkap wajib diisi sesuai KTP.'
        ]);
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|numeric|min_length[10]|max_length[15]', [
            'required'   => 'Nomor HP wajib diisi.',
            'numeric'    => 'Nomor HP harus berupa angka.',
            'min_length' => 'Nomor HP minimal 10 digit angka.',
            'max_length' => 'Nomor HP maksimal 15 digit angka.'
        ]);
        $this->form_validation->set_rules('password', 'Kata Sandi', 'required|min_length[5]', [
            'required'   => 'Kata sandi wajib diisi.',
            'min_length' => 'Kata sandi minimal 5 karakter.'
        ]);
        $this->form_validation->set_rules('passconf', 'Ulangi Kata Sandi', 'required|matches[password]', [
            'required' => 'Ulangi kata sandi wajib diisi.',
            'matches'  => 'Konfirmasi kata sandi tidak sama dengan kata sandi yang dimasukkan.'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Pendaftaran Akun Masyarakat';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/register_user');
            $this->load->view('templates/footer');
        } else {
            $nik = trim($this->input->post('nik', true));
            $username = $nik; // Otomatis NIK sebagai username login

            $data_insert = [
                'nik'          => $nik,
                'nama_lengkap' => trim($this->input->post('nama_lengkap', true)),
                'no_hp'        => trim($this->input->post('no_hp', true)),
                'username'     => $username,
                'password'     => md5($this->input->post('password')),
                'role'         => 'pasien'
            ];

            if ($this->User_model->insert($data_insert)) {
                $this->session->set_flashdata('success', 'Pendaftaran akun berhasil! Silakan login menggunakan NIK dan kata sandi Anda.');
                redirect('auth/login');
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan saat menyimpan data pendaftaran.');
                redirect('auth/register');
            }
        }
    }

    // Poin 5: Fitur Lupa Password Berbasis Verifikasi NIK & Nomor HP
    public function forgot_password() {
        if ($this->session->userdata('user_logged_in')) {
            redirect('layananonline');
        }

        $this->form_validation->set_rules('nik', 'NIK (16 Digit)', 'required|numeric|exact_length[16]', [
            'required'     => 'NIK wajib diisi.',
            'numeric'      => 'NIK harus berupa angka.',
            'exact_length' => 'NIK harus tepat 16 digit.'
        ]);
        $this->form_validation->set_rules('no_hp', 'Nomor HP Terdaftar', 'required|numeric|min_length[10]', [
            'required'   => 'Nomor HP wajib diisi.',
            'numeric'    => 'Nomor HP harus berupa angka.',
            'min_length' => 'Nomor HP minimal 10 digit.'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Lupa Kata Sandi — Sistem Informasi Puskesmas';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/forgot_password');
            $this->load->view('templates/footer');
        } else {
            $nik = trim($this->input->post('nik', true));
            $no_hp = trim($this->input->post('no_hp', true));

            $user = $this->User_model->get_by_nik($nik);

            // Bersihkan format nomor HP untuk perbandingan fleksibel (hilangkan strip/spasi/awalan 0 atau 62)
            $clean_input_hp = preg_replace('/[^0-9]/', '', $no_hp);
            $clean_db_hp    = $user ? preg_replace('/[^0-9]/', '', $user['no_hp']) : '';

            $match_hp = false;
            if ($user && !empty($clean_db_hp) && !empty($clean_input_hp)) {
                if ($clean_input_hp === $clean_db_hp) {
                    $match_hp = true;
                } elseif (substr($clean_input_hp, -9) === substr($clean_db_hp, -9)) {
                    // Cek kesesuaian 9 digit terakhir
                    $match_hp = true;
                }
            }

            if ($user && $match_hp) {
                // Simpan token sementara di session untuk otorisasi reset kata sandi
                $this->session->set_userdata('reset_user_id', $user['id']);
                $this->session->set_userdata('reset_user_nik', $user['nik']);
                $this->session->set_userdata('reset_user_nama', $user['nama_lengkap']);
                redirect('auth/reset_password');
            } else {
                $this->session->set_flashdata('error', 'Kombinasi NIK dan Nomor HP tidak cocok dengan data terdaftar kami.');
                redirect('auth/forgot_password');
            }
        }
    }

    // Form Setel Ulang Kata Sandi Baru
    public function reset_password() {
        $reset_user_id = $this->session->userdata('reset_user_id');
        if (!$reset_user_id) {
            $this->session->set_flashdata('error', 'Sesi verifikasi lupa kata sandi telah kedaluwarsa. Silakan ulangi.');
            redirect('auth/forgot_password');
        }

        $this->form_validation->set_rules('new_password', 'Kata Sandi Baru', 'required|min_length[5]', [
            'required'   => 'Kata sandi baru wajib diisi.',
            'min_length' => 'Kata sandi baru minimal 5 karakter.'
        ]);
        $this->form_validation->set_rules('passconf', 'Ulangi Kata Sandi Baru', 'required|matches[new_password]', [
            'required' => 'Ulangi kata sandi baru wajib diisi.',
            'matches'  => 'Konfirmasi kata sandi baru tidak sama.'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Buat Kata Sandi Baru — Sistem Informasi Puskesmas';
            $data['user_nama'] = $this->session->userdata('reset_user_nama');
            $data['user_nik'] = $this->session->userdata('reset_user_nik');
            $this->load->view('templates/header', $data);
            $this->load->view('auth/reset_password', $data);
            $this->load->view('templates/footer');
        } else {
            $new_password = md5($this->input->post('new_password'));
            $this->db->where('id', $reset_user_id)->update('users', [
                'password' => $new_password
            ]);

            // Hapus sesi reset
            $this->session->unset_userdata(['reset_user_id', 'reset_user_nik', 'reset_user_nama']);

            $this->session->set_flashdata('success', 'Kata sandi Anda berhasil diperbarui! Silakan masuk menggunakan kata sandi baru.');
            redirect('auth/login');
        }
    }

    // Halaman Profil & Riwayat Terintegrasi Masyarakat
    public function profil() {
        if (!$this->session->userdata('user_logged_in')) {
            $this->session->set_flashdata('error', 'Silakan login terlebih dahulu.');
            redirect('auth/login');
        }

        $user_id = $this->session->userdata('user_id');

        $this->load->model('Uhc_model');
        $this->load->model('Reaktivasi_model');
        $this->load->model('Profil_model');

        $data['title'] = 'Profil Saya - Puskesmas';
        $data['profil'] = $this->Profil_model->get_profil();
        $data['user'] = $this->User_model->get_by_id($user_id);
        $data['pengajuan_uhc'] = $this->Uhc_model->get_by_user($user_id);
        $data['pengajuan_reaktivasi'] = $this->Reaktivasi_model->get_by_user($user_id);

        $this->load->view('templates/header', $data);
        $this->load->view('auth/profil', $data);
        $this->load->view('templates/footer');
    }
}
