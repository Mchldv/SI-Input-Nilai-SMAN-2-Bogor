<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {
	
	public function __construct ()
	{
		parent::__construct();
		$this->load->model ('Guru_Model');
	}

	public function index()
	{
		$this->cetak();
	}

    public function tambah()
	{
		$this->load->view('');
	}
    public function cetak()
	{
		$data['guru'] = $this->Guru_Model->get_all();

		$this->load->view('header/header');
        $this->load->view('navbar/navbar');
        $this->load->view('guru/cetakguru', $data);
        $this->load->view('footer/footer');
	}

    public function edit($nik)
	{
        //$data['update'] = $this->Guru_Model->update('$nik');
        $this->load->view('header/header');
        $this->load->view('navbar/navbar');
        $this->load->view('guru/editguru');
        $this->load->view('footer/footer');
	}

    public function enroll()
	{
		$this->load->view('');
	}

	public function verifikasi_tambah ()
	{
		$this->load->helper('security');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|min_length[6]|max_length[20]|regex_match[/^[0-9]{6,20}$/]');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[6]|max_length[50]|xss_clean');
		
		if ($this->form_validation->run() == TRUE)
		{
			$this->Guru_Model->insert();
			redirect('/guru/cetak');
		}
		else
            $this->cetak();
	}
 
}
