<?php

class pengembalian extends CI_Controller{
    public function index()
    {
        $this->load->view('template/_header');
        $this->load->view('data/pengembalian');
        $this->load->view('template/_footer');
    }
}