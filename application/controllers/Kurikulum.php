<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurikulum extends CI_Controller {

	public function __construct ()
	{
		parent::__construct();
		$this->load->model ('kurikulum_model');
	}

	public function index()
	{
		$data=null;
		$this->cetak($data);
	}

    public function tambah($data=null)
	{
		$this->load->view('header/header');
        $this->load->view('navbar/navbar');
        $this->load->view('kurikulum/tambahkurikulum',$data);
        $this->load->view('footer/footer');
	}

    public function edit($kode_kurikulum)
	{
		$data['kurikulum'] = $this->kurikulum_model->get_id($kode_kurikulum);

		$this->load->view('header/header');
        $this->load->view('navbar/navbar');
        $this->load->view('kurikulum/editkurikulum',$data);
        $this->load->view('footer/footer');
	}

    public function cetak($data=null)
	{
		$data['kurikulum'] = $this->kurikulum_model->get_all();
        //$data['edit_mapel'] = $this->db->query("select * from mapel");
		$this->load->view('header/header');
        $this->load->view('navbar/navbar');
        $this->load->view('kurikulum/cetakkurikulum.php', $data);
        $this->load->view('footer/footer');
	}

    public function hapus($id)
	{
		$this->kurikulum_model->delete($id);
		$this->cetak();
	}

    public function enroll()
	{
		$this->load->view('');
	}

    public function verifikasi_tambah()
	{
		$input = $this->input->post('nama');
		$this->load->helper('security');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama Kurikulum','required|max_length[20]|xss_clean');
        

		if ($this->form_validation->run() == TRUE)
		{
			$this->kurikulum_model->insert($input);
			$data['error']="sukses";
			$this->cetak($data);
		}
		else
		{
            $data['error']="gagal";
            $this->tambah($data);
        }
        //var_dump($data['error']);
        //exit();
    }
     public function verifikasi_edit()
	{
		$data['nama'] = $this->input->post('nama');
		$data['id'] = $this->input->post('id');
		$id['id']=$data['id'];
		$this->load->helper('security');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama Kurikulum','required|max_length[20]|xss_clean');
        
		if ($this->form_validation->run() == TRUE)
		{
			$this->kurikulum_model->update($data,$id);
			$data['error']="sukses";
		}
		else
            $data['error']="gagal";
        //var_dump($data['error']);
        //exit();
        $this->cetak($data);
	}

}
