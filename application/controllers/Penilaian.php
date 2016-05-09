<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {
	public function index()
	{
		$this->cetak();
	}
    public function input()
	{
		$this->load->view('header/header');
        $this->load->view('navbar/navbar');
        $this->load->view('penilaian/inputnilai');
        $this->load->view('footer/footer');
	}
    public function edit()
	{
		$this->load->view('header/header');
        $this->load->view('navbar/navbar');
        $this->load->view('penilaian/editnilai');
        $this->load->view('footer/footer');
	}
    public function cetak()
	{
		$this->load->view('header/header');
        $this->load->view('navbar/navbar');
        $this->load->view('penilaian/cetaknilai');
        $this->load->view('footer/footer');
	}
    public function hapus()
	{
		$this->load->view('header/header');
        $this->load->view('navbar/navbar');
        $this->load->view('penilaian/hapusnilai');
        $this->load->view('footer/footer');
	}
    public function lihat()
	{
		$this->load->view('header/header');
        $this->load->view('navbar/navbar');
        $this->load->view('penilaian/cetaknilai');
        $this->load->view('footer/footer');
	}

}
