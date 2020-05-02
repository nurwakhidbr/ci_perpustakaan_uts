<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index()
    {
        $this->load->view('template/_header');
        $this->load->view('template/_dashboard');
        $this->load->view('template/_footer');
    }

}