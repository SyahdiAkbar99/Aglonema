<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buyer extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Home';
        $this->load->view('templates/buyer/header', $data);
        $this->load->view('templates/buyer/navbar', $data);
        $this->load->view('buyer/index', $data);
        $this->load->view('templates/buyer/footer', $data);
    }
}
