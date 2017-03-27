<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct ()
	{
		parent::__construct ();
		//$this->load->model ('Siswa_Model');
	}

	public function index()
	{
		$this->cetak();
	}

    public function cetak()
	{
		$this->load->view('header/header');
        $this->load->view('navbar/navbar');
        $this->load->view('siswa/cetaksiswa');
        $this->load->view('footer/footer');
	}

}
