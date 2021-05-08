<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Seller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['title'] = 'Dashboard Seller';
        $this->load->view('templates/seller/header', $data);
        $this->load->view('templates/seller/navbar', $data);
        $this->load->view('templates/seller/sidebar', $data);
        $this->load->view('seller/index', $data);
        $this->load->view('templates/seller/footer', $data);
    }
}
