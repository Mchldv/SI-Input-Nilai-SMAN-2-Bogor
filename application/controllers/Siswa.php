<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {


	public function index()
	{
		$this->cetak();
	}
    public function tambah()
	{
		$this->load->view('');
	}
    public function edit()
	{
		$this->load->view('');
	}
    public function cetak()
	{
		$this->load->view('header/header');
        $this->load->view('navbar/navbar');
        $this->load->view('siswa/cetaksiswa');
        $this->load->view('footer/footer');
	}
    public function hapus()
	{
		$this->load->view('');
	}
    public function konfirmasi()
	{
		$this->load->view('');
	}

}
