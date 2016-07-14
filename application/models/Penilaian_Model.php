<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*	Nilai consists of several attributes:
 *		nisn 				( pk, char(20) )
 *		kode_mapel 			( char(20) )
 *		pengetahuan 		( int(3) )
 *		keterampilan 		( int(3) )
 *		sosial 				( int(3) )
 *		deskr_pengetahuan 	( varchar(512) )
 *		deskr_keterampilan 	( varchar(512) )
 *		deskr_sosial 		( varchar(512) )
 */
class Penilaian_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all()
	{
		$this->db->reconnect();

		$query = $this->db->get('nilai');

		return $query->result();
	}

	/*	Uses $_POST:
	 *		['nisn'] fills the new record's 'nisn'
	 *		['kode_mapel'] fills the new record's 'kode_mapel'
	 *		['pengetahuan'] fills the new record's 'pengetahuan'
	 *		['keterampilan'] fills the new record's 'keterampilan'
	 *		['sosial'] fills the new record's 'sosial'
	 *		['deskr_pengetahuan'] fills the new record's 'deskr_pengetahuan'
	 *		['deskr_keterampilan'] fills the new record's 'deskr_keterampilan'
	 *		['deskr_sosial'] fills the new record's 'deskr_sosial'
	 */
	public function insert ()
	{
		$this->db->reconnect();

		$data = array (
				'nisn'					=> $this->input->post ('nisn'),
				'kode_mapel'			=> $this->input->post ('kode_mapel'),
				'pengetahuan' 			=> $this->input->post ('pengetahuan'),
				'keterampilan'			=> $this->input->post ('keterampilan'),
				'sosial'				=> $this->input->post ('sosial'),
				'deskr_pengetahuan'		=> $this->input->post ('deskr_pengetahuan'),
				'deskr_keterampilan'	=> $this->input->post ('deskr_keterampilan'),
				'deskr_sosial'			=> $this->input->post ('deskr_sosial')
				);

		$this->db->insert ('nilai');
	}

	/*	Uses $_POST:
	 *		['nisn'] used to point which record will be changed
	 *		['kode_mapel'] used to point which record will be changed
	 *		['pengetahuan'] will fill the record's 'pengetahuan'
	 *		['keterampilan'] will fill the record's 'keterampilan'
	 *		['sosial'] will fill the record's 'sosial'
	 *		['deskr_pengetahuan'] will fill the record's 'deskr_pengetahuan'
	 *		['deskr_keterampilan'] will fill the record's 'deskr_keterampilan'
	 *		['deskr_sosial'] will fill the record's 'deskr_sosial'
	 */
	public function update_field ()
	{
		$this->db->reconnect();

		$this->db->where ('nisn', $this->input->post ('nisn'));
		$this->db->where ('kode_mapel', $this->input->post ('kode_mapel'));

		$data = array (
				'pengetahuan' 			=> $this->input->post ('pengetahuan'),
				'keterampilan'			=> $this->input->post ('keterampilan'),
				'sosial'				=> $this->input->post ('sosial'),
				'deskr_pengetahuan'		=> $this->input->post ('deskr_pengetahuan'),
				'deskr_keterampilan'	=> $this->input->post ('deskr_keterampilan'),
				'deskr_sosial'			=> $this->input->post ('deskr_sosial')
				);

		$this->db->replace ('nilai', $data);
	}

	/*	Uses $_POST:
	 *		['original_nisn'] used to point which record will be changed
	 *		['original_kode_mapel'] used to point which record will be changed
	 *		['new_nisn'] will fill the record's 'nisn'
	 *		['new_kode_mapel'] will fill the record's 'kode_mapel'
	 */
	public function update_key ()
	{
		$this->db->reconnect();

		$this->db->where ('nisn', $this->input->post ('original_nisn'));
		$this->db->where ('kode_mapel', $this->input->post ('original_kode_mapel'));

		$data = array (
				'nisn'		 => $this->input->post ('new_nisn'),
				'kode_mapel' => $this->input->post ('new_kode_mapel')
				);

		$this->db->replace ('nilai', $data);
	}

	public function get_class ()
	{
		$this->db->reconnect();

		$this->db->select ('id, tingkat, jurusan, nomor_kelas, tahun_ajar');
		$query = $this->db->get ('kelas');

		return $query->result();
	}

	public function get_subject ()
	{
		$this->db->reconnect();

		$query = $this->db->get ('mapel');

		return $query->result();
	}

	//	Uses nisn and kode_mapel (id) as keyfinder
	public function delete ($nisn, $kode_mapel)
	{
		$this->db->reconnect();

		$this->db->where ('nisn', $nisn);
		$this->db->where ('kode_mapel', $kode_mapel);

		$this->db->delete('nilai');
	}
}
