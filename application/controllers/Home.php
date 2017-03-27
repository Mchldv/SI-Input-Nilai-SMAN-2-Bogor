<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
        $this->load->view('home/home');
	}
    public function opsi()
	{
        $this->load->view('home/opsi');
	}
    public function login()
	{
        $this->load->view('home/login');
	}
    public function opsimatpel()
	{
        $this->load->view('penilaian/opsimatpel');
	}

}
