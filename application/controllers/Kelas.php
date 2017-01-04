<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	private $duplicate;
	public function __construct()
	{
		parent::__construct();
		$this->load->model ('Kelas_Model');
		$this->duplicate = false;
	}

	public function index()
	{
		$this->cetak();
	}

    public function tambah()
	{
		$this->load->view('');
	}

    public function edit($nike_wali_kelas)
	{
		$this->load->view('header/header');
        $this->load->view('navbar/navbar');
        $this->load->view('kelas/editkelas');
        $this->load->view('footer/footer');
	}

    public function cetak()
	{
		$data['kelas'] = $this->Kelas_Model->get_readable_kelas();
		$data['guru'] = $this->Kelas_Model->get_guru();
        $data['edit_kelas'] = $this->db->query("select * from kelas");
		$data['duplicate_error'] = $this->duplicate;
		$this->load->view('header/header');
        $this->load->view('navbar/navbar');
        $this->load->view('kelas/cetakkelas', $data);
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
		$this->form_validation->set_rules('nik_wali', 'NIK', 'trim|required|min_length[6]|max_length[20]|regex_match[/^[0-9]{6,20}$/]');
        // $this->form_validation->set_rules('nisn', 'NIK', 'trim|required|min_length[6]|max_length[20]|regex_match[/^[0-9]{6,20}$/]');
		// $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[6]|max_length[50]|xss_clean');
        // $this->form_validation->set_rules('year', 'Tahun Ajar', 'trim|required|min_length[6]|max_length[50]|xss_clean');
		
		if ($this->form_validation->run() == TRUE)
		{
			$this->duplicate = !$this->Kelas_Model->insert();

			if ($this->duplicate == TRUE)
				$this->cetak();
			else
				redirect('/kelas/cetak');
        }
        $this->form_validation->set_rules('nisn', 'NIK', 'trim|required|min_length[6]|max_length[20]|regex_match[/^[0-9]{6,20}$/]');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[6]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('year', 'Tahun Ajar', 'trim|required|min_length[6]|max_length[50]|xss_clean');
		
		if ($this->form_validation->run() == TRUE)
		{
			$this->Kelas_Model->insert();
			redirect('/guru/cetak');
		}
		else
            $this->cetak();
	}
}
