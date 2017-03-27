<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model ('Penilaian_Model');
	}

	public function index()
	{
		redirect('nilai/kolektif');
	}

    public function kolektif()
	{
		$this->load->view('header/header');
        $this->load->view('navbar/navbar');
        $this->load->view('nilai/kolektif');
        $this->load->view('footer/footer');
	}
    
    public function individu()
	{
		$this->load->view('header/header');
        $this->load->view('navbar/navbar');
        $this->load->view('nilai/individu');
        $this->load->view('footer/footer');
	}

	public function import()
	{
		$this->load->view('header/header');
        $this->load->view('navbar/navbar');
        $this->load->view('nilai/import');
        $this->load->view('footer/footer');
	}
	public function pilihkelas(){
		$id_=$this->input->post('categoryId');
		$data['sub'] = $this->db->query('SELECT * FROM `detail_kelas` WHERE nisn = (select nisn from `detail_mapel` where kode_mapel = (select kode_mapel from `mapel` where kode_mapel = id_))');
		$this->load->view('Penilaian/pilihkelas', $data);
	}
    
}
