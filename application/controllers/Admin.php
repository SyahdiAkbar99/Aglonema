<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['title'] = 'Dashboard Admin';
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/navbar', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/admin/footer', $data);
    }
}