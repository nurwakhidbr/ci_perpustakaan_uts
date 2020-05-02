<?php

class Buku extends CI_Controller{
    public function index()
    {
        $this->load->view('template/_header');
        $this->load->view('data/buku');
        $this->load->view('template/_footer');
    }
}