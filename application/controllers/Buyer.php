<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buyer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['title'] = 'Home';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/buyer/header', $data);
        $this->load->view('templates/buyer/navbar', $data);
        $this->load->view('buyer/index', $data);
        $this->load->view('templates/buyer/footer', $data);
    }
}
