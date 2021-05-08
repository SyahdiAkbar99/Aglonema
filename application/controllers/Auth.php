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
        $data['title'] = 'Daftar sebagai Admin';
        $this->load->view('templates/auth/auth_header', $data);
        $this->load->view('auth/registrasi_admin', $data);
        $this->load->view('templates/auth/auth_footer', $data);
    }
    //Halaman Registrasi Buyer
    public function registration()
    {
        $data['title'] = 'Daftar';
        $this->load->view('templates/auth/auth_header', $data);
        $this->load->view('auth/registrasi', $data);
        $this->load->view('templates/auth/auth_footer', $data);
    }
    //Halaman Registrasi
    public function registration_seller()
    {
        $data['title'] = 'Daftar sebagai Seller';
        $this->load->view('templates/auth/auth_header', $data);
        $this->load->view('auth/registrasi_seller', $data);
        $this->load->view('templates/auth/auth_footer', $data);
    }
}
