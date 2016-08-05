<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct ()
	{
		parent::__construct ();
		$this->load->model ('Siswa_Model');
	}

	public function index()
	{
		$this->cetak();
	}

    public function tambah()
	{
		$this->load->view('');
	}

    public function edit($nisn)
	{
		$this->load->view('header/header');
        $this->load->view('navbar/navbar');
        $this->load->view('siswa/cetaksiswa');
        $this->load->view('footer/footer');
	}

    public function cetak()
	{
		$data['siswa'] = $this->Siswa_Model->get_all();

		$this->load->view('header/header');
        $this->load->view('navbar/navbar');
        $this->load->view('siswa/cetaksiswa', $data);
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
    
    public function verifikasi_tambah()
	{
		$this->load->helper('security');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nis', 'NIS', 'trim|required|min_length[6]|max_length[20]|regex_match[/^[0-9]{6,20}$/]');
        $this->form_validation->set_rules('nisn', 'NISN', 'trim|required|min_length[6]|max_length[20]|regex_match[/^[0-9]{6,20}$/]');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[6]|max_length[50]|xss_clean');
        
		if ($this->form_validation->run() == TRUE)
		{
			$this->Siswa_Model->insert();
			redirect('/siswa/cetak');
		}
		else
			$this->cetak();
	}

}
