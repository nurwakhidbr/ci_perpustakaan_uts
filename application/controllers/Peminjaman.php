<?php

class Peminjaman extends CI_Controller{
    public function index()
    {
        $this->load->view('template/_header');
        $this->load->view('data/peminjaman');
        $this->load->view('template/_footer');
    }
}