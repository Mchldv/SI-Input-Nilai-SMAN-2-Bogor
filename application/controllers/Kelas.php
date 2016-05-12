<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

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
        $this->load->view('kelas/cetakkelas');
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
	public function verifikasi_kelas(){
		$this->load->helper('security');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nik_wali', 'NIK', 'trim|required|min_length[6]|max_length[20]|regex_match[/^[0-9]{6,20}$/]');
        $this->form_validation->set_rules('nisn', 'NIK', 'trim|required|min_length[6]|max_length[20]|regex_match[/^[0-9]{6,20}$/]');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[6]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('year', 'Name', 'trim|required|min_length[6]|max_length[50]|xss_clean');
		
		if($this->form_validation->run() == FALSE){
			redirect('/home');
		}else{
            $this->cetak();
		}	
	}
}
