<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    //Halaman Login
    public function index()
    {
        $data['title'] = 'Login';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/login', $data);
        $this->load->view('templates/auth_footer', $data);
    }
    //Halaman Registrasi
    public function registration()
    {
        $data['title'] = 'Registrasi';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/registrasi', $data);
        $this->load->view('templates/auth_footer', $data);
    }
}
