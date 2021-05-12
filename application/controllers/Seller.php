<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Seller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Dashboard Seller';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/seller/header', $data);
        $this->load->view('templates/seller/navbar', $data);
        $this->load->view('templates/seller/sidebar', $data);
        $this->load->view('seller/index', $data);
        $this->load->view('templates/seller/footer', $data);
    }















    public function my_profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/seller/header', $data);
        $this->load->view('templates/seller/navbar', $data);
        $this->load->view('templates/seller/sidebar', $data);
        $this->load->view('seller/my_profile', $data);
        $this->load->view('templates/seller/footer', $data);
    }
    public function edit_profile()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/seller/header', $data);
        $this->load->view('templates/seller/navbar', $data);
        $this->load->view('templates/seller/sidebar', $data);
        $this->load->view('seller/edit_profile', $data);
        $this->load->view('templates/seller/footer', $data);
    }
}
