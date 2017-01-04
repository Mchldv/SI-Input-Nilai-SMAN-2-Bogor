<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*	Kelas consists of several attributes:
 *		id ( pk, int(11) )
 *		nik_wali ( char(20) )
 *		tingkat ( int(2) )
 *		jurusan ( varchar(6) )
 *		nomor_kelas ( int(2) )
 *		tahun_ajar ( varchar(9) )
 */
class Kelas_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_kelas_all()
	{
		$this->db->reconnect();

		$query = $this->db->get('kelas');

		return $query->result();
	}

	public function get_guru()
	{
		$this->db->reconnect();

		$query = $this->db->get ('guru');

		return $query->result();
	}

	/*	Uses view instead of table. The view has the name of
	 *	'wali kelas' instead of his/her NIK
	 */
	public function get_readable_kelas()
	{
		$this->db->reconnect();

		$query = $this->db->get('readable_kelas');

		return $query->result();
	}

	/*	Uses $_POST:
	 *		['nik_wali'] fills the new record's 'nik_wali'
	 *		['tingkat'] fills the new record's 'tingkat'
	 *		['jurusan'] fills the new record's 'jurusan'
	 *		['nomor_kelas'] fills the new record's 'nomor_kelas'
	 *		['tahun_ajar'] fills the new record's 'tahun_ajar'
	 *	Returns true/false depends on whether the insertion is successful or not
	 */
	public function insert ()
	{
		$this->db->reconnect();

		if ($this->is_exist() == FALSE)
		{
			$data = array (
					'nik_wali'		=> $this->input->post ('nik_wali'),
					'tingkat'		=> $this->input->post ('tingkat'),
					'jurusan'		=> $this->input->post ('jurusan'),
					'nomor_kelas'	=> $this->input->post ('nomor_kelas'),
					'tahun_ajar'	=> $this->input->post ('tahun_ajar')
					);

			$this->db->insert ('kelas', $data);
			return TRUE;
		}
		else
			return FALSE;
	}

	public function is_exist ()
	{
		$this->db->reconnect();

		$this->db->select ('* FROM kelas
			WHERE
				tingkat = '		. $this->input->post ('tingkat') . ' AND
				jurusan = \''		. $this->input->post ('jurusan') . '\' AND
				nomor_kelas = '	. $this->input->post ('nomor_kelas') . ' AND
				tahun_ajar = \''	. $this->input->post ('tahun_ajar') . '\''
				, FALSE);
		
		$row = $this->db->get()->row();
		if (isset ($row))
			return TRUE;
		else
			return false;
	}

	/*	Uses $_POST:
	 *		['id'] used to point which record will be changed. Do not change; 'id' is generated automatically
	 *		['nik_wali'] will fill the record's 'nik_wali'
	 *		['jurusan'] will fill the record's 'jurusan'
	 *		['nomor_kelas'] will fill the record's 'nomor_kelas'
	 *		['tahun_ajar'] will fill the record's 'tahun_ajar'
	 */
	public function update ()
	{
		$this->db->reconnect();

		$this->db->where ('id', $this->input->post('id'));

		$data = array (
				'nik_wali'		=> $this->input->post ('nik_wali'),
				'tingkat'		=> $this->input->post ('tingkat'),
				'jurusan'		=> $this->input->post ('jurusan'),
				'nomor_kelas'	=> $this->input->post ('nomor_kelas'),
				'tahun_ajar'	=> $this->input->post ('tahun_ajar')
				);

		$this->db->replace ('kelas');
	}

	//	Uses id as keyfinder
	public function delete ($id)
	{
		$this->db->reconnect();

		$this->db->where('id', $id);

		$this->db->delete('kelas');
	}
}