<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model ('Penilaian_Model');
	}

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
		$data ['subject'] = $this->Penilaian_Model->get_subject();
		$data ['class'] = $this->Penilaian_Model->get_class();

		$this->load->view('header/header');
        $this->load->view('navbar/navbar');
        $this->load->view('penilaian/cetaknilai', $data);
        $this->load->view('footer/footer');
	}

    public function verifikasi_penilaian()
	{
		$this->load->helper('security');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nisn', 'NIK', 'trim|required|min_length[6]|max_length[20]|regex_match[/^[0-9]{6,20}$/]');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[6]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('score', 'Name', 'trim|required|min_length[6]|max_length[50]|xss_clean');
		
		if($this->form_validation->run() == FALSE){
			redirect('/home');
		}else{
            $this->cetak();
		}	
	}
}
