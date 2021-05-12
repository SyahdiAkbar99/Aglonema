<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Dashboard Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/navbar', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/admin/footer', $data);
    }

















    public function my_profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/navbar', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('admin/my_profile', $data);
        $this->load->view('templates/admin/footer', $data);
    }
    public function edit_profile()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/navbar', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('admin/edit_profile', $data);
        $this->load->view('templates/admin/footer', $data);
    }
}
