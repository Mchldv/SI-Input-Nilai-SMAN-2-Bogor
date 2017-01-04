<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {

	public function __construct ()
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

    public function edit($kode_mapel)
	{
		$this->load->view('header/header');
        $this->load->view('navbar/navbar');
        $this->load->view('mapel/editmapel');
        $this->load->view('footer/footer');
	}

    public function cetak()
	{
		$data['mapel'] = $this->Mapel_Model->get_all();
        $data['edit_mapel'] = $this->db->query("select * from mapel");
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

    public function verifikasi_tambah()
	{
		$this->load->helper('security');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('kode_mapel', 'NIS', 'trim|required|max_length[20]|xss_clean');
        $this->form_validation->set_rules('nama', 'NISN', 'trim|required|max_length[20]|xss_clean');
        
		if ($this->form_validation->run() == TRUE)
		{
			$this->Mapel_Model->insert();
			redirect('/mapel/cetak');
		}
		else
            $this->cetak();
	}
     public function verifikasi_edit()
	{
		$this->load->helper('security');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('kode_mapel', 'trim|required|max_length[30]|xss_clean');
        $this->form_validation->set_rules('nama', 'trim|required|max_length[30]|xss_clean');
        
		if ($this->form_validation->run() == TRUE)
		{
			$this->Mapel_Model->update();
			redirect('/mapel/cetak');
		}
		else
            $this->cetak();
	}

}
