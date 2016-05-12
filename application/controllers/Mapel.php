<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {

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
        $this->load->view('mapel/cetakmapel');
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
    public function verifikasi_mapel(){
		$this->load->helper('security');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('code', 'NIS', 'trim|required|min_length[6]|max_length[20]|xss_clean');
        $this->form_validation->set_rules('mapel', 'NISN', 'trim|required|min_length[6]|max_length[20]|xss_clean');
		$this->form_validation->set_rules('year', 'Name', 'trim|required|min_length[6]|max_length[50]|xss_clean');
        
		if($this->form_validation->run() == FALSE){
			redirect('/home');
		}else{
            $this->cetak();
		}	
	}

}
