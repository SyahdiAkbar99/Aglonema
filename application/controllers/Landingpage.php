<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landingpage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['title'] = 'Home';
        $this->load->view('templates/landingpage/header', $data);
        $this->load->view('templates/landingpage/navbar', $data);
        $this->load->view('landingpage/index', $data);
        $this->load->view('templates/landingpage/footer', $data);
    }
}
