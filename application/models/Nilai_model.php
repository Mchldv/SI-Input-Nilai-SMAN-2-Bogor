<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'Generic_model.php';

class Nilai_model extends Generic_model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	///---------------------------CRUD-----------------------------///

	public function insert ($data)
	{
		return $this->db->insert ($data, 'data_nilai');
	}

	public function update ($data, $id)
	{
		$data = $this->expunge ($data, array ('id'));

		$this->db->where ('id', $id);
		return $this->db->update ($data, 'data_nilai');
	}

	public function delete ($id)
	{
		$this->db->where ('id', $id);
		$this->db->delete ('data_nilai');
	}

	///--------------------------GETTERS-----------------------------///
}
