<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*	Guru consists of several attribute:
 *		nik 	( pk, char(20) )
 *		nama 	( varchar(50) )
 */

class Guru_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all()
	{
		$this->db->reconnect();

		$query = $this->db->get('guru');

		return $query->result();
	}

	public function search_by_name ($name)
	{
		$this->db->reconnect();

		$this->db->where('nama', $name);
		$query = $this->db->get('guru');

		return $query->result();
	}

	public function search_by_id ($nik)
	{
		$this->db->reconnect();

		$this->db->where('nik', $nik);
		$query = $this->db->get('guru');

		return $query->result();
	}
    
	/*	Uses $_POST:
	 *		['nik'] fills the new record's 'nik'
	 *		['nama'] fills the new record's 'nama'
	 */
	public function insert ()
	{
		$this->db->reconnect();

		$this->db->set ('nik', $this->input->post('nik'));
		$this->db->set ('nama', $this->input->post('nama'));

		$this->db->insert ('guru');
	}

	/*	Uses $_POST:
	 *		['original_nik'] used to point which record will be changed
	 *		['new_nik'] will fill the record's 'nik' . By default should have the same value as 'originalNik'
	 *		['nama'] will fill the record's 'nama'
	 */
	public function update ($nik)
	{
		$this->db->reconnect();

		$this->db->where ('nik', $this->input->post('original_nik'));

		$this->db->set ('nik', $this->input->post('new_nik'));
		$this->db->set ('nama', $this->input->post('nama'));

		$this->db->replace ('guru');
	}

	//	Uses NIK (id) as keyfinder
	public function delete ($nik)
	{
		$this->db->reconnect();

		$this->db->where('nik', $nik);

		$this->db->delete('guru');
	}
}