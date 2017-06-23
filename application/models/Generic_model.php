<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generic_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	/**
	 * Removes given key in given array
	 *
	 * @param array $array
	 * @param array $key
	 * @return array
	 */
	protected function expunge ($array, $key)
	{
		if ( ! is_array ($array) )
			return NULL;
		
		if ( ! is_array ($key) )
			$key = array ($key => NULL);
		
		//	Ensures to only return existing key in $array
		foreach ($key as $k)
		{
			if (array_key_exists ($k, $array))
				$array = array_diff_key ($array, array ($k => NULL));
		}
		
		return $array;
	}

	/**
	 * Cleans the output from query SELECT-ion result function
	 *
	 * @param array $query_result
	 * @return mixed
	 */
	protected function result_wrapper ($query_result)
	{
		$output = array();
		if ( ! isset ($query_result ) )
			return NULL;
		
		$output['count'] = $query_result->num_rows();
		$output['record'] = array ();

		if ($output['count'] > 1)
			$output['record'] = $query_result->row_array();
		
		else
			$output['record'] = $query_result->result_array();
		
		return $output;
	}
}
