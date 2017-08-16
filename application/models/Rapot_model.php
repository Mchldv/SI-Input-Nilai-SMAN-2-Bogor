<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'Generic_model.php';

class Rapot_model extends Generic_model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	///---------------------------CRUD-----------------------------///

	public function insert ($data)
	{
		return $this->db->insert ($data, 'ref_mata_pelajaran');
	}

	public function update ($data, $id)
	{
		$data = $this->expunge ($data, array ('id'));

		$this->db->where ('id', $id);
		return $this->db->update ($data, 'ref_mata_pelajaran');
	}

	public function delete ($id)
	{
		$this->db->where ('id', $id);
		return $this->db->delete ('ref_mata_pelajaran');
	}

	///--------------------------GETTERS-----------------------------///

	public function get_all ($id)
	{
		$this->db->where ('id_kurikulum', $id);		
		$query = $this->db->get('ref_mata_pelajaran');
		
		return $query->result_array();
		//return $this->result_wrapper($query);
	}

	public function get_id ($id)
	{
		$this->db->where ('id', $id);
		$query = $this->db->get('ref_mata_pelajaran');

		return $query->result_array();
	}
}
