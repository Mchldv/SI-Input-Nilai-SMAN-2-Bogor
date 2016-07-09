<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*	Siswa consists of several attributes
 *		nisn 	( pk, char(20) )
 *		nis 	( char(20) )
 *		nama 	(varchar(50) )
 */
class Siswa_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all()
	{
		$this->db->reconnect();

		$query = $this->db->get ('siswa');

		return $query->result();
	}

	/*	Uses $_POST:
	 *		['nisn'] fills the new record's 'nisn'
	 *		['nis'] fills the new record's 'nis'
	 *		['nama'] fills the new record's 'nama'
	 */
	public function insert()
	{
		$this->db->reconnect();

		$data = array (
				'nisn'	=> $this->input->post ('nisn'),
				'nis'	=> $this->input->post ('nis'),
				'nama'	=> $this->input->post ('nama')
				);

		$this->db->insert('siswa', $data);
	}

	/*	Uses $_POST:
	 *		['original_nisn'] used to point which record will be changed
	 *		['new_nisn'] will fill the record's 'nisn'
	 *		['nis'] will fill the record's 'nis'
	 *		['nama'] will fill the record's 'nama'
	 */
	public function update()
	{
		$this->db->reconnect();

		$this->db->where ('nisn', $this->input->post ('original_nisn'));
		$data = array (
				'nisn'	=> $this->input->post ('old_nisn'),
				'nis'	=> $this->input->post ('nis'),
				'nama'	=> $this->input->post ('nama')
				);

		$this->db->replace ('siswa', $data);
	}

	//	Uses nisn (id) as keyfinder
	public function delete($nisn)
	{
		$this->db->reconnect();

		$this->db->where ('nisn', $nisn);

		$this->db->delete ('siswa');
	}
}