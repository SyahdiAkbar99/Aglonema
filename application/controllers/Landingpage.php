<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landingpage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('email')) {
            if ($this->session->userdata('role_id') == 1) {
                redirect('admin');
            } elseif ($this->session->userdata('role_id') == 2) {
                redirect('seller');
            } elseif ($this->session->userdata('role_id') == 3) {
                redirect('buyer');
            }
        }
    }
    public function index()
    {
        $data['title'] = 'Home';
        $this->load->view('templates/landingpage/header', $data);
        $this->load->view('templates/landingpage/navbar', $data);
        $this->load->view('landingpage/index', $data);
        $this->load->view('templates/landingpage/footer', $data);
    }
    public function penanaman()
    {
        $data['title'] = 'Penanaman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/landingpage/header', $data);
        $this->load->view('templates/landingpage/navbar', $data);
        $this->load->view('landingpage/penanaman', $data);
        $this->load->view('templates/landingpage/footer', $data);
    }
}
