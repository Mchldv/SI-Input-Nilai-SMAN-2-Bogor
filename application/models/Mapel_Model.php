<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*	Mapel consists of several attributes
*		kode_mapel 	( pk, char(12) )
*		nama 		( varchar(50) )
*/
class Mapel_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all()
	{
		$this->db->reconnect();

		$query = $this->db->get('mapel');

		return $query->result();
	}

	/*	Uses $_POST:
	 *		['kode_mapel'] fills the new record's 'kode_mapel'
	 *		['nama'] fills the new record's 'nama'
	 */
	public function insert ()
	{
		$this->db->reconnect();

		$data = array (
				'kode_mapel' => $this->input->post ('kode_mapel'),
				'nama'		 => $this->input->post ('nama')
				);

		$this->db->insert ('mapel', $data);
	}

	public function choose_class ()
	{
		$this->db->reconnect();

		$data = array (
				'kode_mapel' => $this->input->post ('kode_mapel'),
				'nama'		 => $this->input->post ('nama')
				);

		$this->db->insert ('mapel', $data);
	}
	/*	Uses $_POST:
	 *		['original_kode_mapel'] used to point which record will be changed
	 *		['new_kode_mapel'] will fill the record's 'kode_mapel'. By default should have the same value
	 *		with 'original_kode_mapel'
	 *		['nama'] will fill the record's 'nama'
	 */
	public function update ()
	{
		$this->db->reconnect();

		$this->db->where ('kode_mapel', $this->input->post ('original_kode_mapel'));

		$data = array (
				'kode_mapel' => $this->input->post ('new_kode_mapel'),
				'nama'		 => $this->input->post ('nama')
				);

		$this->db->replace ('mapel', $data);
	}

	//	Uses kode_mapel (id) as keyfinder
	public function delete ($kode_mapel)
	{
		$this->db->reconnect();

		$this->db->where('kode_mapel', $kode_mapel);

		$this->db->delete('mapel');
	}
}
