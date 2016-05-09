<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model ('Mapel_Model');
	}

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
		$data['mapel'] = $this->Mapel_Model->get_all();

		$this->load->view('header/header');
        $this->load->view('navbar/navbar');
        $this->load->view('mapel/cetakmapel', $data);
        $this->load->view('footer/footer');
	}
    public function hapus()
	{
		$this->load->view('');
	}
    public function enroll()
	{
		$this->load->view('');
	}

}
