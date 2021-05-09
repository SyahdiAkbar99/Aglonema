<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    //Halaman Login
    public function index()
    {
        $data['title'] = 'Masuk';
        $this->load->view('templates/auth/auth_header', $data);
        $this->load->view('auth/login', $data);
        $this->load->view('templates/auth/auth_footer', $data);
    }



    //Halaman Registrasi Admin
    public function registration_admin()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => '%s sudah didaftarkan',
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Ulangi Password', 'required|trim|min_length[6]|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Daftar sebagai Admin';
            $this->load->view('templates/auth/auth_header', $data);
            $this->load->view('auth/registrasi_admin', $data);
            $this->load->view('templates/auth/auth_footer', $data);
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.png',
                'password' => password_hash(htmlspecialchars($this->input->post('password1')), PASSWORD_DEFAULT),
                'alamat' => htmlspecialchars($this->input->post('alamat')),
                'role_id' => 1,
                'is_active' => 1,
                'date_created' => time(),
            ];
            $true = $this->db->insert('user', $data);
            if ($true == true) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success" role="alert">
                    Akun anda sudah terdaftar sebagai admin!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
                );
                redirect('auth');
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">
                    Maaf Akun anda gagal didaftarkan !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
                );
                redirect('auth/registration_admin');
            }
        }
    }



    //Halaman Registrasi Buyer
    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => '%s sudah didaftarkan',
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Ulangi Password', 'required|trim|min_length[6]|matches[password1]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Daftar';
            $this->load->view('templates/auth/auth_header', $data);
            $this->load->view('auth/registrasi', $data);
            $this->load->view('templates/auth/auth_footer', $data);
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.png',
                'password' => password_hash(htmlspecialchars($this->input->post('password1')), PASSWORD_DEFAULT),
                'alamat' => htmlspecialchars($this->input->post('alamat')),
                'role_id' => 3,
                'is_active' => 1,
                'date_created' => time(),
            ];
            $true = $this->db->insert('user', $data);
            if ($true == true) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success" role="alert">
                        Akun anda sudah terdaftar!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>'
                );
                redirect('auth');
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">
                        Maaf Akun anda gagal didaftarkan !
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>'
                );
                redirect('auth/registration');
            }
        }
    }



    //Halaman Registrasi
    public function registration_seller()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => '%s sudah didaftarkan',
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Ulangi Password', 'required|trim|min_length[6]|matches[password1]');
        $this->form_validation->set_rules('no_rekening', 'No Rekening', 'required|trim|numeric|min_length[6]');
        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Daftar sebagai Seller';
            $this->load->view('templates/auth/auth_header', $data);
            $this->load->view('auth/registrasi_seller', $data);
            $this->load->view('templates/auth/auth_footer', $data);
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.png',
                'password' => password_hash(htmlspecialchars($this->input->post('password1')), PASSWORD_DEFAULT),
                'alamat' => htmlspecialchars($this->input->post('alamat')),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time(),
                'no_rekening' => htmlspecialchars($this->input->post('no_rekening')),
                'nama_bank' => htmlspecialchars($this->input->post('nama_bank')),
            ];
            $true = $this->db->insert('user', $data);
            if ($true == true) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success" role="alert">
                    Akun anda sudah terdaftar sebagai penjual!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
                );
                redirect('auth');
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">
                    Maaf Akun anda gagal didaftarkan !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
                );
                redirect('auth/registration_seller');
            }
        }
    }
}
